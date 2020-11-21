<?php

class Jasa extends CI_Controller
{
    public function index()
    {
        $data = [
            'title' => 'Sistem informasi klinik pelayanan hewan',
        ];

        $this->load->view('layouts/header', $data);
        $this->load->view('frontend/jasa/index');
        $this->load->view('layouts/footer');
    }
}