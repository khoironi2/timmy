<?php 

class Pengertian extends CI_Controller
{
    public function index()
    {
        $data = [
            'title' => 'Sistem informasi klinik pelayanan hewan',
        ];

        $this->load->view('layouts/header', $data);
        $this->load->view('frontend/pengertian/index');
        $this->load->view('layouts/footer');
    }
}