<?php 

class Layanan extends CI_Controller
{
    public function index()
    {
        $data = [
            'title' => 'Sistem informasi klinik pelayanan hewan',
        ];

        $this->load->view('layouts/header', $data);
        $this->load->view('frontend/layanan/index');
        $this->load->view('layouts/footer');
    }
}