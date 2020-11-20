<?php

class Antrian_pasien extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->cek_status();
        $this->CI = &get_instance();
        if ($this->CI->router->fetch_class() != "login") {
            // session check logic here...change this accordingly
            if ($this->CI->session->userdata['level'] == 'admin') {
                redirect('admin/dashboard');
            } elseif ($this->CI->session->userdata['level'] == 'pasien') {
                redirect('pasien/dashboard');
            }
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Sistem informasi klinik pelayanan hewan',
            'halaman' => 'Data | Antrian Pasien',
            'icon' => 'fas fa-pen-square',
            'user' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'antriansteril' => $this->Antrian_pasien_model->getAllSterilInDokter(),
            'antrianvaksin' => $this->Antrian_pasien_model->getAllVaksinInDokter()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar_dokter');
        $this->load->view('templates/sidebar_dokter');
        $this->load->view('dokter/layanan_pasien/antrian_pasien/index');
        $this->load->view('templates/footer_dokter');
    }
}
