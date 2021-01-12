<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = [
            'title' => 'Sistem informasi klinik pelayanan hewan',
        ];

        $this->load->view('layouts/header', $data);
        $this->load->view('auth/login');
        $this->load->view('layouts/footer');
    }

    public function loginForm()
    {
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {

            $errors = $this->form_validation->error_array();
            $this->session->set_flashdata('errors', $errors);
            $this->session->set_flashdata('input', $this->input->post());
            redirect('/auth');
        } else {

            $email = htmlspecialchars($this->input->post('email'));
            $pass = htmlspecialchars($this->input->post('password'));
            $cek_login = $this->Auth_model->cek_login($email);

            if ($cek_login == FALSE) {

                $this->session->set_flashdata('error_login', 'Email yang Anda masukan tidak terdaftar.');
                redirect('index.php/auth');
            } else {

                if (password_verify($pass, $cek_login->password)) {
                    $this->session->set_userdata('id_users', $cek_login->id_users);
                    $this->session->set_userdata('name', $cek_login->name);
                    $this->session->set_userdata('email', $cek_login->email);
                    $this->session->set_userdata('level', $cek_login->level);
                    date_default_timezone_set("ASIA/JAKARTA");
                    //$email = $this->session->userdata('email');
                    $data = array('time_login_users' => date('Y-m-d H:i:s'));
                    $this->Auth_model->logout($data, $email);
                    redirect('admin/dashboard');
                } else {

                    $this->session->set_flashdata('error_login', 'Email atau password yang Anda masukan salah.');
                    redirect('auth');
                }
            }
        }
    }

    public function register()
    {

        $this->load->view('auth/register');
    }

    public function registerForm()
    {

        $this->form_validation->set_rules('name', 'Nama', 'required');
        // $this->form_validation->set_rules('telepon_users', 'Telepon Telah Terdaftar', 'required|is_unique[tbl_users.telepon_users]');
        $this->form_validation->set_rules('email', 'Email Telah Terdaftar', 'required|is_unique[tbl_users.email]|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('confrim_password', 'Konfirmasi Password', 'required|trim|matches[password]');
        // $this->form_validation->set_rules('level', 'Level', 'required');

        if ($this->form_validation->run() == FALSE) {

            $errors = $this->form_validation->error_array();
            $this->session->set_flashdata('errors', $errors);
            $this->session->set_flashdata('input', $this->input->post());
            redirect('/auth');
        } else {

            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $pass = password_hash($password, PASSWORD_DEFAULT);
            $telepon_users = $this->input->post('telepon_users');
            // $level = $this->input->post('level');
            date_default_timezone_set("ASIA/JAKARTA");
            $data = [
                'name' => $name,
                'email' => $email,
                'password' => $pass,
                'level' => 'pasien',
                'time_create_users' => date('Y-m-d H:i:s')
            ];

            $insert = $this->Auth_model->register("tbl_users", $data);
            //$insert = $this->db->insert('tbl_users', $data);

            if ($insert) {

                $this->session->set_flashdata('success_login', 'Sukses, Anda telah terdaftar Silhakan login.');
                redirect('/auth');
            }
        }
    }

    public function logout()
    {
        date_default_timezone_set("ASIA/JAKARTA");
        $email = $this->session->userdata('email');
        $data = array('time_logout_users' => date('Y-m-d H:i:s'));

        $this->Auth_model->logout($data, $email);
        $this->session->sess_destroy();
        echo '<script>
            alert("Sukses! Anda berhasil logout."); 
            window.location.href="' . base_url('/') . '";
            </script>';
    }
}
