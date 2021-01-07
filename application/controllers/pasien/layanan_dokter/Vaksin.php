<?php

class Vaksin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->cek_status();
        $this->CI = &get_instance();
        if ($this->CI->router->fetch_class() != "login") {
            // session check logic here...change this accordingly
            if ($this->CI->session->userdata['level'] == 'dokter') {
                redirect('dokter/dashboard');
            } elseif ($this->CI->session->userdata['level'] == 'admin') {
                redirect('admin/dashboard');
            }
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Sistem informasi klinik pelayanan hewan',
            'halaman' => 'Data | Vaksin',
            'icon' => 'fas fa-syringe',
            'user' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'dokter' => $this->db->get_where('tbl_users', ['level' => 'dokter'])->result_array(),
            'paketvaksin' => $this->db->get('tbl_paket_vaksin')->result_array(),
            'boking' => $this->Boking_vaksin_model->getAll()
        ];
        $data['record'] =  $this->Paket_vaksin_model->tampil_data();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar_pasien');
        $this->load->view('templates/sidebar_pasien');
        $this->load->view('pasien/layanan_dokter/vaksin/index');
        $this->load->view('templates/footer_pasien');
    }
    public function cari()
    {
        $id_paket_vaksin = $_GET['id_paket_vaksin'];
        $cari = $this->Paket_vaksin_model->cari($id_paket_vaksin)->result();
        echo json_encode($cari);
    }

    public function insert()
    {
        $this->form_validation->set_rules('nama_hewan_vaksin', 'nama peliharaan', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = $this->form_validation->error_array();
            $this->session->set_flashdata('errors', $errors);
            $this->session->set_flashdata('input', $this->input->post());
            redirect('admin/create_nasabah');
        } else {
            $nama_hewan_vaksin = $this->input->post('nama_hewan_vaksin');
            $id_pasien = $this->input->post('id_pasien');
            $id_paket_vaksin = $this->input->post('id_paket_vaksin');
            $id_dokter_vaksin = $this->input->post('id_dokter_vaksin');
            $total_harga_vaksin = $this->input->post('total_harga_vaksin');
            $time_create_boking_vaksin = $this->input->post('time_create_boking_vaksin');
            $data = [
                'nama_hewan_vaksin' => $nama_hewan_vaksin,
                'id_pasien' => $id_pasien,
                'id_paket_vaksin' => $id_paket_vaksin,
                'id_dokter_vaksin' => $id_dokter_vaksin,
                'total_harga_vaksin' => $total_harga_vaksin,
                'status_boking_vaksin'     => 'belum',
                'time_create_boking_vaksin' => $time_create_boking_vaksin,
            ];
            $insert = $this->Boking_vaksin_model->insert("tbl_boking_vaksin", $data);
            if ($insert) {
                $this->session->set_flashdata('success_login', 'Sukses, Data Berhasil Ditambah.');
                redirect('pasien/layanan_dokter/vaksin');
            }
        }
    }

    public function cetak_antrian($id)
    {
        $this->load->library('dompdf_gen');

        // $keyword1 = $this->input->post('keyword1');
        // $keyword2 = $this->input->post('keyword2');
        $data = [
            // 'awal' =>  $keyword1,
            // 'akhir' => $keyword2,
            // 'totalpenjualan' => $this->Steril_model->getAllSteril($keyword1, $keyword2),
            // 'totalpenjualan' => $this->Penjualan_model->getTotalPenjualan(),
            'logo' => '<img src="assets/img/sample/apple.png" alt="" class="mr-3" height="50">',
            'gambar' => 'assets/img/perbaikan/'
        ];
        $data['antrian'] = $this->Antrian_pasien_model->getAllVaksinID($id);
        $this->load->view('pasien/layanan_pasien/antrian_pasien/cetak/Vaksin', $data);
        $customPaper = array(0, 0, 300, 300);
        // $dompdf->set_paper($customPaper);

        // $paper_size = 'b5';
        $orientation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($customPaper, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("cetak.pdf", ['Attachment' => 0]);
    }

    public function updateStatusW($id)
    {
        $client = $this->Boking_vaksin_model->getPById($id);
        $status_client = "";

        if ($client->status_boking_vaksin == "belum") {
            $status_client = "antri";
        } else {
            $status_client = "antri";
        }

        $data = array(
            'id_boking_vaksin'         => $id,
            'status_boking_vaksin'     => $status_client
        );
        $data1 = array(
            'id_status_antrian'         => $id,
            'status_antrian_pasien'     => 'belum',
            'id_pasien'     => $this->input->post('id_pasien'),
            'id_dokter'     => $this->input->post('id_dokter'),
            'time_create_antrian' => date('Y-m-d H:i:s'),
            'time_update_antrian' => date('Y-m-d H:i:s')
        );

        $this->Boking_vaksin_model->updateData($id, $data);
        $this->Antrian_pasien_model->Insert('tbl_antrian_pasien', $data1);

        redirect(site_url('pasien/layanan_dokter/vaksin'));
    }

    public function updateStatusandVisit($id)
    {
        $client = $this->Boking_vaksin_model->getPById($id);
        $status_client = "";

        if ($client->status_boking_vaksin == "belum") {
            $status_client = "visit";
        } else {
            $status_client = "visit";
        }

        $data = array(
            'id_boking_vaksin'         => $id,
            'status_boking_vaksin'     => $status_client
        );
        $data1 = array(
            'id_status_visit'         => $id,
            'status_visit_pasien'     => 'waiting',
            'id_pasien'     => $this->input->post('id_pasien'),
            'id_dokter'     => $this->input->post('id_dokter'),
            'time_create_visit' => date('Y-m-d H:i:s'),
            'time_update_visit' => date('Y-m-d H:i:s')
        );

        $this->Boking_vaksin_model->updateData($id, $data);
        $this->Visit_pasien_model->Insert('tbl_visit_pasien', $data1);

        redirect(site_url('pasien/layanan_dokter/vaksin'));
    }
}
