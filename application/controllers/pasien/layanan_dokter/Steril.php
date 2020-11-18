<?php

class Steril extends CI_Controller
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
            'halaman' => 'Data | Steril',
            'icon' => 'fas fa-lungs-virus',
            'user' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'dokter' => $this->db->get_where('tbl_users', ['level' => 'dokter'])->result_array(),
            'paketsteril' => $this->db->get('tbl_paket_steril')->result_array(),
            'boking' => $this->Boking_steril_model->getAll()
        ];
        $data['record'] =  $this->Paket_steril_model->tampil_data();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar_pasien');
        $this->load->view('templates/sidebar_pasien');
        $this->load->view('pasien/layanan_dokter/steril/index');
        $this->load->view('templates/footer_pasien');
    }

    public function cari()
    {
        $id_paket_steril = $_GET['id_paket_steril'];
        $cari = $this->Paket_steril_model->cari($id_paket_steril)->result();
        echo json_encode($cari);
    }

    public function insert()
    {
        $this->form_validation->set_rules('nama_hewan_steril', 'nama peliharaan', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = $this->form_validation->error_array();
            $this->session->set_flashdata('errors', $errors);
            $this->session->set_flashdata('input', $this->input->post());
            redirect('admin/create_nasabah');
        } else {
            $nama_hewan_steril = $this->input->post('nama_hewan_steril');
            $id_users_pet = $this->input->post('id_users_pet');
            $id_paket_steril = $this->input->post('id_paket_steril');
            $id_dokter_steril = $this->input->post('id_dokter_steril');
            $total_harga_steril = $this->input->post('total_harga_steril');
            $data = [
                'nama_hewan_steril' => $nama_hewan_steril,
                'id_users_pet' => $id_users_pet,
                'id_paket_steril' => $id_paket_steril,
                'id_dokter_steril' => $id_dokter_steril,
                'total_harga_steril' => $total_harga_steril,
                'status_boking_steril'     => 'belum',
                'time_create_boking_steril' => date('Y-m-d H:i:s')
            ];
            $insert = $this->Boking_steril_model->insert("tbl_boking_steril", $data);
            if ($insert) {
                $this->session->set_flashdata('success_login', 'Sukses, Data Berhasil Ditambah.');
                redirect('pasien/layanan_dokter/steril');
            }
        }
    }

    public function updateStatusW($id)
    {
        $client = $this->Boking_steril_model->getPById($id);
        $status_client = "";

        if ($client->status_boking_steril == "belum") {
            $status_client = "antri";
        } else {
            $status_client = "antri";
        }

        $data = array(
            'id_boking_steril'         => $id,
            'status_boking_steril'     => $status_client
        );
        $data1 = array(
            'id_status_antrian'         => $id,
            'status_antrian_pasien'     => 'belum',
            'id_pasien'     => $this->input->post('id_pasien'),
            'id_dokter'     => $this->input->post('id_dokter'),
            'time_create_antrian' => date('Y-m-d H:i:s'),
            'time_update_antrian' => date('Y-m-d H:i:s')
        );

        $this->Boking_steril_model->updateData($id, $data);
        $this->Antrian_pasien_model->Insert('tbl_antrian_pasien', $data1);

        redirect(site_url('pasien/layanan_dokter/steril'));
    }

    public function updateStatusandVisit($id)
    {
        $client = $this->Boking_steril_model->getPById($id);
        $status_client = "";

        if ($client->status_boking_steril == "belum") {
            $status_client = "visit";
        } else {
            $status_client = "visit";
        }

        $data = array(
            'id_boking_steril'         => $id,
            'status_boking_steril'     => $status_client
        );
        $data1 = array(
            'id_status_visit'         => $id,
            'status_visit_pasien'     => 'waiting',
            'id_pasien'     => $this->input->post('id_pasien'),
            'id_dokter'     => $this->input->post('id_dokter'),
            'time_create_visit' => date('Y-m-d H:i:s'),
            'time_update_visit' => date('Y-m-d H:i:s')
        );

        $this->Boking_steril_model->updateData($id, $data);
        $this->Visit_pasien_model->Insert('tbl_visit_pasien', $data1);

        redirect(site_url('pasien/layanan_dokter/steril'));
    }
}
