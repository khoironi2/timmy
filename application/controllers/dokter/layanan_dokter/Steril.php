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
            'halaman' => 'Data | Steril',
            'icon' => 'fas fa-lungs-virus',
            'user' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'dokter' => $this->db->get_where('tbl_users', ['level' => 'dokter'])->result_array(),
            'paketsteril' => $this->db->get('tbl_paket_steril')->result_array(),
            'boking' => $this->Boking_steril_model->getAllInDokter()
        ];
        $data['record'] =  $this->Paket_steril_model->tampil_data();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar_dokter');
        $this->load->view('templates/sidebar_dokter');
        $this->load->view('dokter/layanan_dokter/steril/index');
        $this->load->view('templates/footer_dokter');
    }

    public function updateStatusWaiting($id)
    {
        $client = $this->Boking_steril_model->getPById($id);
        $status_client = "";

        if ($client->status_boking_steril == "antri") {
            $status_client = "waiting";
        } else {
            $status_client = "waiting";
        }

        $data = array(
            'id_boking_steril'         => $id,
            'status_boking_steril'     => $status_client
        );
        $data1 = array(
            'id_status_antrian'         => $id,
            'status_antrian_pasien'     => 'waiting',
            'time_update_antrian' => date('Y-m-d H:i:s')
        );

        $this->Boking_steril_model->updateData($id, $data);
        $this->Antrian_pasien_model->update($id, $data1);

        redirect(site_url('dokter/layanan_dokter/steril'));
    }
    public function updateStatusPersilahkanMasuk($id)
    {
        $client = $this->Boking_steril_model->getPById($id);
        $status_client = "";

        if ($client->status_boking_steril == "waiting") {
            $status_client = "giliran_anda";
        } else {
            $status_client = "giliran_anda";
        }

        $data = array(
            'id_boking_steril'         => $id,
            'status_boking_steril'     => $status_client
        );
        $data1 = array(
            'id_status_antrian'         => $id,
            'status_antrian_pasien'     => 'giliran_anda',
            'time_update_antrian' => date('Y-m-d H:i:s')
        );

        $this->Boking_steril_model->updateData($id, $data);
        $this->Antrian_pasien_model->update($id, $data1);

        redirect(site_url('dokter/layanan_dokter/steril'));
    }
    public function updateStatusPeriksa($id)
    {
        $client = $this->Boking_steril_model->getPById($id);
        $status_client = "";

        if ($client->status_boking_steril == "giliran_anda") {
            $status_client = "mulai";
        } else {
            $status_client = "mulai";
        }

        $data = array(
            'id_boking_steril'         => $id,
            'status_boking_steril'     => $status_client
        );
        $data1 = array(
            'id_status_antrian'         => $id,
            'status_antrian_pasien'     => 'mulai',
            'time_update_antrian' => date('Y-m-d H:i:s')
        );

        $this->Boking_steril_model->updateData($id, $data);
        $this->Antrian_pasien_model->update($id, $data1);

        redirect(site_url('dokter/layanan_dokter/steril'));
    }
    public function updateStatusSelesaiPeriksa($id)
    {
        $client = $this->Boking_steril_model->getPById($id);
        $status_client = "";
        if ($client->status_boking_steril == "mulai") {
            $status_client = "sudah";
        } else {
            $status_client = "sudah";
        }
        $data = array(
            'id_boking_steril'         => $id,
            'status_boking_steril'     => $status_client
        );
        $data1 = array(
            'id_status_antrian'         => $id,
            'status_antrian_pasien'     => 'sudah',
            'time_update_antrian' => date('Y-m-d H:i:s')
        );
        $this->Boking_steril_model->updateData($id, $data);
        $this->Antrian_pasien_model->update($id, $data1);
        redirect(site_url('dokter/layanan_dokter/steril'));
    }

    public function updateStatusandVisit($id)
    {
        $client = $this->Boking_steril_model->getPById($id);
        $status_client = "";

        if ($client->status_boking_steril == "visit") {
            $status_client = "menuju";
        } else {
            $status_client = "menuju";
        }

        $data = array(
            'id_boking_steril'         => $id,
            'status_boking_steril'     => $status_client
        );
        $data1 = array(
            'id_status_visit'         => $id,
            'status_visit_pasien'     => 'menuju',
            'time_update_visit' => date('Y-m-d H:i:s')
        );

        $this->Boking_steril_model->updateData($id, $data);
        $this->Visit_pasien_model->update($id, $data1);

        redirect(site_url('dokter/layanan_dokter/steril'));
    }
    public function updateStatusandVisitTangani($id)
    {
        $client = $this->Boking_steril_model->getPById($id);
        $status_client = "";

        if ($client->status_boking_steril == "menuju") {
            $status_client = "ditangani";
        } else {
            $status_client = "ditangani";
        }

        $data = array(
            'id_boking_steril'         => $id,
            'status_boking_steril'     => $status_client
        );
        $data1 = array(
            'id_status_visit'         => $id,
            'status_visit_pasien'     => 'ditangani',
            'time_update_visit' => date('Y-m-d H:i:s')
        );

        $this->Boking_steril_model->updateData($id, $data);
        $this->Visit_pasien_model->update($id, $data1);

        redirect(site_url('dokter/layanan_dokter/steril'));
    }
    public function updateStatusandVisitCatatanMedis($id)
    {
        $client = $this->Boking_steril_model->getPById($id);
        $status_client = "";

        if ($client->status_boking_steril == "ditangani") {
            $status_client = "visit_selesai";
        } else {
            $status_client = "visit_selesai";
        }

        $data = array(
            'id_boking_steril'         => $id,
            'status_boking_steril'     => $status_client,
            'keterangan_tambahan_steril' => $this->input->post('keterangan_tambahan_steril'),
        );
        $data1 = array(
            'id_status_visit'         => $id,
            'status_visit_pasien'     => 'sudah',
            'time_update_visit' => date('Y-m-d H:i:s')
        );

        $this->Boking_steril_model->updateData($id, $data);
        $this->Visit_pasien_model->update($id, $data1);

        redirect(site_url('dokter/layanan_dokter/steril'));
    }
}
