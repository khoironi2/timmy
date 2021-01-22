<?php 

class Checkout extends CI_Controller
{
    public function index()
    {
        $data = [
            'title' => 'Sistem informasi klinik pelayanan hewan',
            'user' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'halaman' => 'Data | Checkout',
            'icon' => 'fas fa-paw',
        ];

        $this->form_validation->set_rules('invoices_name', 'nama', 'required');
        $this->form_validation->set_rules('invoices_tlp', 'telphone', 'required');
        $this->form_validation->set_rules('invoices_address', 'alamat', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar_pasien');
            $this->load->view('templates/sidebar_pasien');
            $this->load->view('pasien/pets_care/groming/checkout');
            $this->load->view('templates/footer_pasien');
        } else {
            $invoice = [
                'user_id' => $data['user']['id_users'],
                'invoices_name' => $this->input->post('invoices_name'),
                'invoices_tlp' => $this->input->post('invoices_tlp'),
                'invoices_address' => $this->input->post('invoices_address'),
            ];

            $this->db->insert('tbl_invoices', $invoice);
            $invoice_id = $this->db->insert_id();

            foreach ($this->cart->contents() as $groming) {
                $booking = [
                    'invoice_id' => $invoice_id,
                    'groming_id' => $groming['id'],
                    'bookings_name' => $groming['name'],
                    'qty' => $groming['qty'],
                    'harga' => $groming['price'],
                ];

                $this->db->insert('tbl_bookings', $booking);
            }
            $this->cart->destroy();

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pesanan sedang diproses, Mohon tunggu di meja yang anda tempati!</div>');
            redirect('pasien/pets_care/groming');
        }
    }
}