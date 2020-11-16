<?php

class Home extends CI_Controller
{
    public function index()
    {
        $data = [
            'title' => 'Sistem informasi klinik pelayanan hewan',
        ];

        $this->load->view('layouts/header', $data);
        $this->load->view('frontend/home/index');
        $this->load->view('layouts/footer');
    }
}
