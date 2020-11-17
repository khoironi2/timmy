<?php

class Jadwal_dokter extends CI_Controller
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
            'halaman' => 'Data | Jadwal Dokter',
            'icon' => 'fas fa-calendar-alt',
            'user' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'dokter' => $this->db->get_where('tbl_users', ['level' => 'dokter'])->result_array()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/layanan_dokter/jadwal_dokter/index');
        $this->load->view('templates/footer');
    }

    public function insert()
    {
        $this->form_validation->set_rules('hari', 'hari', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = $this->form_validation->error_array();
            $this->session->set_flashdata('errors', $errors);
            $this->session->set_flashdata('input', $this->input->post());
            redirect('admin/create_nasabah');
        } else {
            $hari = $this->input->post('hari');
            $jam_mulai = $this->input->post('jam_mulai');
            $jam_selesai = $this->input->post('jam_selesai');
            $id_dokter = $this->input->post('id_dokter');
            $data = [
                'hari' => $hari,
                'jam_mulai' => $jam_mulai,
                'jam_selesai' => $jam_selesai,
                'id_dokter' => $id_dokter
            ];
            $insert = $this->Jadwal_dokter_model->insert("tbl_jadwal_dokter", $data);
            if ($insert) {
                $this->session->set_flashdata('success_login', 'Sukses, Data Berhasil Ditambah.');
                redirect('admin/layanan_dokter/jadwal_dokter');
            }
        }
    }
}
