<?php 

class Rekam_medis extends CI_Controller
{
    public function index()
    {
        $data = [
            'title' => 'Sistem informasi klinik pelayanan hewan',
            'halaman' => 'Data | Rekam Medis',
            'icon' => 'fas fa-pen-square',
            'user' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'rekam_medis' => $this->Rekam_medis_model->getAllMedis()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar_dokter');
        $this->load->view('templates/sidebar_dokter');
        $this->load->view('dokter/layanan_pasien/rekam_medis/index');
        $this->load->view('templates/footer_dokter');
    }

    public function create()
    {
        $data = [
            'title' => 'Sistem informasi klinik pelayanan hewan',
            'halaman' => 'Data | Tambah Rekam Medis',
            'icon' => 'fas fa-pen-square',
            'user' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
        ];

        $this->form_validation->set_rules('pemilik', 'pemilik', 'required');
        $this->form_validation->set_rules('pemeliharaan', 'pemeliharaan', 'required');
        $this->form_validation->set_rules('catatan', 'catatan', 'required');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar_dokter');
            $this->load->view('templates/sidebar_dokter');
            $this->load->view('dokter/layanan_pasien/rekam_medis/create');
            $this->load->view('templates/footer_dokter');
        } else {
            $data = [
                'id_dokter' => $data['user']['id_users'],
                'nama_pemilik' => $this->input->post('pemilik'),
                'nama_pemeliharaan' => $this->input->post('pemeliharaan'),
                'catatan' => $this->input->post('catatan'),
            ];

            $this->db->insert('tbl_rekan_medis', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sukses, Data Berhasil Ditambahkan !</div>');
            redirect('dokter/layanan_pasien/rekam_medis');
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Sistem informasi klinik pelayanan hewan',
            'halaman' => 'Data | Edit Rekam Medis',
            'icon' => 'fas fa-pen-square',
            'user' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'medis' => $this->db->get_where('tbl_rekan_medis', ['id' => $id])->row_array()
        ];

        $this->form_validation->set_rules('pemilik', 'pemilik', 'required');
        $this->form_validation->set_rules('pemeliharaan', 'pemeliharaan', 'required');
        $this->form_validation->set_rules('catatan', 'catatan', 'required');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar_dokter');
            $this->load->view('templates/sidebar_dokter');
            $this->load->view('dokter/layanan_pasien/rekam_medis/edit');
            $this->load->view('templates/footer_dokter');
        } else {
            $data = [
                'id_dokter' => $data['user']['id_users'],
                'nama_pemilik' => $this->input->post('pemilik'),
                'nama_pemeliharaan' => $this->input->post('pemeliharaan'),
                'catatan' => $this->input->post('catatan'),
            ];

            $this->db->where('id', $id);
            $this->db->update('tbl_rekan_medis', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sukses, Data Berhasil Diubah !</div>');
            redirect('dokter/layanan_pasien/rekam_medis');
        }
    }

    public function destroy($id)
    {
        $this->db->delete('tbl_rekan_medis', ['id' => $id]);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sukses, Data Berhasil Dihapus !</div>');
        redirect('dokter/layanan_pasien/rekam_medis');
    }
}