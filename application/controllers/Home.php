<?php

class Home extends CI_Controller
{
    public function index()
    {
        $data = [
            'title' => 'Sistem Informasi Bank Sampah Enviro 18',
        ];

        $this->load->view('layouts/header', $data);
        $this->load->view('frontend/home/index');
        $this->load->view('layouts/footer');
    }
}
