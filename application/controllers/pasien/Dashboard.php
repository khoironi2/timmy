<?php

class Dashboard extends CI_Controller
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
            'halaman' => 'Data | Dashboard',
            'icon' => 'fas fa-tachometer-alt'
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar_pasien');
        $this->load->view('templates/sidebar_pasien');
        $this->load->view('pasien/dashboard/index');
        $this->load->view('templates/footer');
    }
}
