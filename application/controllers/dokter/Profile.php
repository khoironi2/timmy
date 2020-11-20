<?php

class Profile extends CI_Controller
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
            'halaman' => 'Data | Profile',
            'icon' => 'fas fa-hammer',
            'user' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
        ];

        $old_image = $data['user']['gambar_users'];

        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('alamat_users', 'alamat', 'required');
        $this->form_validation->set_rules('telepon_users', 'telepon', 'required');
        $this->form_validation->set_rules('facebook_users', 'facebook', 'required');
        $this->form_validation->set_rules('youtube_users', 'youtube', 'required');
        $this->form_validation->set_rules('twitter_users', 'twitter', 'required');
        $this->form_validation->set_rules('instagram_users', 'instagram', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar_dokter');
            $this->load->view('templates/sidebar_dokter');
            $this->load->view('dokter/profile/index');
            $this->load->view('templates/footer_dokter');
        } else {
            $email = $this->input->post('email');
            $data = [
                'name' => $this->input->post('name'),
                'alamat_users' => $this->input->post('alamat_users'),
                'telepon_users' => $this->input->post('telepon_users'),
                'facebook_users' => $this->input->post('facebook_users'),
                'youtube_users' => $this->input->post('youtube_users'),
                'twitter_users' => $this->input->post('twitter_users'),
                'instagram_users' => $this->input->post('instagram_users'),
            ];

            $upload_image = $_FILES['gambar_users']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/users/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar_users')) {
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/img/users/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar_users', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->where('email', $email);
            $this->db->update('tbl_users', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sukses, Data user berhasil diubah !</div>');
            redirect('dokter/profile');
        }
    }
}
