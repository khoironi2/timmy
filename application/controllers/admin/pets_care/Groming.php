<?php

class Groming extends CI_Controller
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
            'halaman' => 'Data | Groming',
            'icon' => 'fas fa-paw',
            'groming' => $this->Groming_model->getAllGroming()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/pets_care/groming/index');
        $this->load->view('templates/footer');
    }

    public function total()
    {
        $data = [
            'title' => 'Sistem informasi klinik pelayanan hewan',
            'user' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'halaman' => 'Data | Groming',
            'icon' => 'fas fa-paw',
            'total' => $this->Groming_model->getGromingReady()
        ];
        $this->load->view('admin/pets_care/groming/total', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Sistem informasi klinik pelayanan hewan',
            'user' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'halaman' => 'Data | Create Groming',
            'icon' => 'fas fa-paw',
            'users' => $this->db->get_where('tbl_users', ['level' => 'pasien'])->result_array(),
            'pakets' => $this->db->get('tbl_paket_groming')->result_array()
        ];

        $this->form_validation->set_rules('id_pasien', 'pasien', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar');
            $this->load->view('templates/sidebar');
            $this->load->view('admin/pets_care/groming/create');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_pasien' => $this->input->post('id_pasien'),
                'nama_hewan_groming' => $this->input->post('nama_hewan_groming'),
                'id_paket_groming' => $this->input->post('id_paket_groming'),
                'dijemput' => $this->input->post('dijemput'),
                'keterangan_tambahan_groming' => $this->input->post('keterangan_tambahan_groming'),
                'total_harga_groming' => $this->input->post('total_harga_groming'),
                'time_create_boking_groming' => date('Y-m-d H:i:s'),
            ];

            $this->db->insert('tbl_boking_groming', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success">Sukses, Data Berhasil Ditambahkan.</div>');
            redirect('admin/pets_care/groming');
        }
    }

    public function update($id)
    {
        $data = [
            'title' => 'Sistem informasi klinik pelayanan hewan',
            'user' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'halaman' => 'Data | Update Groming',
            'icon' => 'fas fa-paw',
            'groming' => $this->db->get_where('tbl_boking_groming', ['id_boking_groming' => $id])->row_array(),
            'users' => $this->db->get_where('tbl_users', ['level' => 'pasien'])->result_array(),
            'pakets' => $this->db->get('tbl_paket_groming')->result_array()
        ];
        $this->form_validation->set_rules('id_pasien', 'pasien', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar');
            $this->load->view('templates/sidebar');
            $this->load->view('admin/pets_care/groming/update');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_pasien' => $this->input->post('id_pasien'),
                'nama_hewan_groming' => $this->input->post('nama_hewan_groming'),
                'id_paket_groming' => $this->input->post('id_paket_groming'),
                'dijemput' => $this->input->post('dijemput'),
                'keterangan_tambahan_groming' => $this->input->post('keterangan_tambahan_groming'),
                'total_harga_groming' => $this->input->post('total_harga_groming'),
            ];

            $this->db->where('id_boking_groming', $this->input->post('id_boking_groming'));
            $this->db->update('tbl_boking_groming', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success">Sukses, Data Berhasil Diubah.</div>');
            redirect('admin/pets_care/groming');
        }
    }

    public function destroy($id)
    {
        $this->db->delete('tbl_boking_groming', ['id_boking_groming' => $id]);

        $this->session->set_flashdata('message', '<div class="alert alert-success">Sukses, Data Berhasil Dihapus.</div>');
        redirect('admin/pets_care/groming');
    }
}
