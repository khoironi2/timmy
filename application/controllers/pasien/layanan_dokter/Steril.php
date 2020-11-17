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
            'paketsteril' => $this->db->get('tbl_paket_steril')->result_array()
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
                'time_create_boking_steril' => date('Y-m-d H:i:s')
            ];
            $insert = $this->Boking_steril_model->insert("tbl_boking_steril", $data);
            if ($insert) {
                $this->session->set_flashdata('success_login', 'Sukses, Data Berhasil Ditambah.');
                redirect('pasien/layanan_dokter/steril');
            }
        }
    }
}
