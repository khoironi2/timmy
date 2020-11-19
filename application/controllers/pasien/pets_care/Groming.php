<?php

class Groming extends CI_Controller
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
            'user' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'halaman' => 'Data | Groming',
            'icon' => 'fas fa-paw',
            'groming' => $this->Groming_model->getAllMyGroming(),
            'total' => $this->Groming_model->getGromingReady()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar_pasien');
        $this->load->view('templates/sidebar_pasien');
        $this->load->view('pasien/pets_care/groming/index');
        $this->load->view('templates/footer_pasien');
    }
    public function total()
    {
        $data = [
            'title' => 'Sistem informasi klinik pelayanan hewan',
            'user' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'halaman' => 'Data | Groming',
            'icon' => 'fas fa-paw',
            'total' => $this->Groming_model->getGromingReady()
        ];
        $this->load->view('pasien/pets_care/groming/total', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Sistem informasi klinik pelayanan hewan',
            'user' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'halaman' => 'Data | Create Groming',
            'icon' => 'fas fa-paw',
            'users' => $this->db->get_where('tbl_users', ['level' => 'pasien'])->result_array(),
            'pakets' => $this->db->get('tbl_paket_groming')->result_array()
        ];
        $data['record'] =  $this->Paket_groming_model->tampil_data();
        $this->form_validation->set_rules('id_pasien', 'pasien', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar_pasien');
            $this->load->view('templates/sidebar_pasien');
            $this->load->view('pasien/pets_care/groming/create');
            $this->load->view('templates/footer_pasien');
        } else {
            $data = [
                'id_pasien' => $this->input->post('id_pasien'),
                'nama_hewan_groming' => $this->input->post('nama_hewan_groming'),
                'id_paket_groming' => $this->input->post('id_paket_groming'),
                'dijemput' => $this->input->post('dijemput'),
                'keterangan_tambahan_groming' => $this->input->post('keterangan_tambahan_groming'),
                'total_harga_groming' => $this->input->post('total_harga_groming'),
                'time_create_boking_groming' => date('Y-m-d H:i:s'),
                'date_groming' => date('Y-m-d')
            ];

            $this->db->insert('tbl_boking_groming', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success">Sukses, Data Berhasil Ditambahkan.</div>');
            redirect('pasien/pets_care/groming');
        }
    }

    public function cari()
    {
        $id_paket_groming = $_GET['id_paket_groming'];
        $cari = $this->Paket_groming_model->cari($id_paket_groming)->result();
        echo json_encode($cari);
    }
}
