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
            'halaman' => 'Data | Vaksin',
            'icon' => 'fas fa-syringe',
            'user' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'dokter' => $this->db->get_where('tbl_users', ['level' => 'dokter'])->result_array(),
            'paketvaksin' => $this->db->get('tbl_paket_vaksin')->result_array(),
            'boking' => $this->Boking_vaksin_model->getAllinDokter()
        ];
        $data['record'] =  $this->Paket_vaksin_model->tampil_data();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar_dokter');
        $this->load->view('templates/sidebar_dokter');
        $this->load->view('dokter/layanan_dokter/vaksin/index');
        $this->load->view('templates/footer_dokter');
    }
}
