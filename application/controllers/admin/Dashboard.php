<?php 

class Dashboard extends CI_Controller
{
    public function index()
    {
        $data = [
            'title' => 'Sistem informasi klinik pelayanan hewan',
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/dashboard/index');
        $this->load->view('templates/footer'); 
    }
}