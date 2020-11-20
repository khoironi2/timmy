<?php

class Riwayat_rekam_medis extends CI_Controller
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
            'halaman' => 'Data | Riwayat Rekam Medis',
            'icon' => 'fas fa-user-md',
            'steril' => $this->Dokter_model->getAllSteril(),
            'vaksin' => $this->Dokter_model->getAllVaksin(),
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar_dokter');
        $this->load->view('templates/sidebar_dokter');
        $this->load->view('dokter/riwayat/riwayat_rekam_medis/index');
        $this->load->view('templates/footer_dokter');
    }
}
