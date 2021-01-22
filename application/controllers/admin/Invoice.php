<?php 

class Invoice extends CI_Controller
{
    public function index()
    {
        $data = [
            'title' => 'Admin | Invoice',
            'user' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'invoices' => $this->Invoice_model->getAllInvoice(),
            'halaman' => 'Invoice',
            'icon' => 'fas fa-file-invoice-dollar'
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/invoices/index');
        $this->load->view('templates/footer');
    }
}