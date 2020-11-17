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
            'halaman' => 'Data | Antrian Pasien',
            'icon' => 'fas fa-pen-square',
            'antriansteril' => $this->Antrian_pasien_model->getAllSteril(),
            'antrianvaksin' => $this->Antrian_pasien_model->getAllVaksin()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar_pasien');
        $this->load->view('templates/sidebar_pasien');
        $this->load->view('pasien/layanan_pasien/antrian_pasien/index');
        $this->load->view('templates/footer_pasien');
    }
}
