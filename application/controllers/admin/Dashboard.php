<?php 

class Dashboard extends CI_Controller
{
    public function index()
    {
        $data = [
            'title' => 'Sistem informasi klinik pelayanan hewan',
        ];

        $this->load->view('admin/dashboard/index', $data);
    }
}