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
            } elseif ($this->CI->session->userdata['level'] == 'pasien') {
                redirect('pasien/dashboard');
            }
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Sistem informasi klinik pelayanan hewan',
            'user' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'halaman' => 'Data | Steril',
            'icon' => 'fas fa-lungs-virus',
            'steril' => $this->Steril_model->getAllSteril()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/layanan_dokter/steril/index');
        $this->load->view('templates/footer');
    }

    public function updateStatusSelesaiAdministrasi($id)
    {
        $client = $this->Boking_steril_model->getPById($id);
        $status_client = "";

        if ($client->status_boking_steril == "sudah") {
            $status_client = "selesai_administrasi";
        } else {
            $status_client = "selesai_administrasi";
        }

        $data = array(
            'id_boking_steril'         => $id,
            'status_boking_steril'     => $status_client
        );
        $data1 = array(
            'id_status_antrian'         => $id,
            'status_antrian_pasien'     => 'selesai_administrasi',
            'time_update_antrian' => date('Y-m-d H:i:s')
        );

        $this->Boking_steril_model->updateData($id, $data);
        $this->Antrian_pasien_model->update($id, $data1);

        redirect(site_url('admin/layanan_dokter/steril'));
    }
}
