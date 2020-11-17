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
            'halaman' => 'Data | Vaksin',
            'icon' => 'fas fa-syringe',
            'user' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'dokter' => $this->db->get_where('tbl_users', ['level' => 'dokter'])->result_array(),
            'paketvaksin' => $this->db->get('tbl_paket_vaksin')->result_array()
        ];
        $data['record'] =  $this->Paket_vaksin_model->tampil_data();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar_pasien');
        $this->load->view('templates/sidebar_pasien');
        $this->load->view('pasien/layanan_dokter/vaksin/index');
        $this->load->view('templates/footer_pasien');
    }
    public function cari()
    {
        $id_paket_vaksin = $_GET['id_paket_vaksin'];
        $cari = $this->Paket_vaksin_model->cari($id_paket_vaksin)->result();
        echo json_encode($cari);
    }

    public function insert()
    {
        $this->form_validation->set_rules('nama_hewan_vaksin', 'nama peliharaan', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = $this->form_validation->error_array();
            $this->session->set_flashdata('errors', $errors);
            $this->session->set_flashdata('input', $this->input->post());
            redirect('admin/create_nasabah');
        } else {
            $nama_hewan_vaksin = $this->input->post('nama_hewan_vaksin');
            $id_pasien = $this->input->post('id_pasien');
            $id_paket_vaksin = $this->input->post('id_paket_vaksin');
            $id_dokter_vaksin = $this->input->post('id_dokter_vaksin');
            $total_harga_vaksin = $this->input->post('total_harga_vaksin');
            $data = [
                'nama_hewan_vaksin' => $nama_hewan_vaksin,
                'id_pasien' => $id_pasien,
                'id_paket_vaksin' => $id_paket_vaksin,
                'id_dokter_vaksin' => $id_dokter_vaksin,
                'total_harga_vaksin' => $total_harga_vaksin,
                'time_create_boking_vaksin' => date('Y-m-d H:i:s')
            ];
            $insert = $this->Boking_vaksin_model->insert("tbl_boking_vaksin", $data);
            if ($insert) {
                $this->session->set_flashdata('success_login', 'Sukses, Data Berhasil Ditambah.');
                redirect('pasien/layanan_dokter/vaksin');
            }
        }
    }
}
