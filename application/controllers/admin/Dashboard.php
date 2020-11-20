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
            } elseif ($this->CI->session->userdata['level'] == 'pasien') {
                redirect('pasien/dashboard');
            }
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Sistem informasi klinik pelayanan hewan',
            'halaman' => 'Data | Dashboard',
            'icon' => 'fas fa-tachometer-alt',
            'user' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'totalvaksin' => $this->Dashboard_model->getTotalVaksin(),
            'totalsteril' => $this->Dashboard_model->getTotalSteril(),
            'totalgroming' => $this->Dashboard_model->getTotalGroming(),
            'totalpenitipan' => $this->Dashboard_model->getTotalPenitipan(),
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/dashboard/index');
        $this->load->view('templates/footer');
    }
}

// Dokter
// Antrian Pasien => yang konformasi dokter (keperluan apa)
// Jadwal Dokter => Jadwal dokter sesuai session
// Vaksin => tabel boking vaksin, minta persetujuan admin kalau udah bayar
// Steril => Hampir sam vaksin, jenis kelamin, jenis 
// rekamedis => Riwayat rekamedis dokter sesuai session

// Admin 
// Dashboard => total user, total pasien vaksin groming penitipan dll
// Antrian pasien => 
// Jadwal Dokter => Admin bisa menginputkan jadwal dokter
// Vaksin => Munculin data vaksin
// Steril => Munculin data steril
// Rekamedis -=> keseluruhan rekamedis dokter dan pasien

// kalau yang udah vaksin itu udah penitipan


// catatan2
// Frontend => Syarat2
// datang kerumah hewan yang besar
// Home visit => Sapi, Kerabau (Hewan Perawatan)