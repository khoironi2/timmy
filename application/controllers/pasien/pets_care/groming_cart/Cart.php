<?php 

class Cart extends CI_Controller
{
    public function index()
    {
        $data = [
            'title' => 'Sistem informasi klinik pelayanan hewan',
            'user' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'halaman' => 'Data | Cart',
            'icon' => 'fas fa-paw',
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar_pasien');
        $this->load->view('templates/sidebar_pasien');
        $this->load->view('pasien/pets_care/groming/cart');
        $this->load->view('templates/footer_pasien');
    }

    public function insert($id)
    {
        $groming = $this->Cart_model->find($id);

        $data = [
            'id'      => $groming->id_paket_groming,
            'qty'     => 1,
            'price'   => $groming->harga_paket_groming,
            'name'    => $groming->nama_paket_groming,
            'image'   => $groming->gambar_paket_groming
        ];
        
        $this->cart->insert($data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Groming yang dpilih sudah masuk kekeranjang!</div>');
        redirect('pasien/pets_care/groming');
    }

    public function destroy()
    {
        $this->cart->destroy();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Cart Groming sudah terhapus!</div>');
        redirect('pasien/pets_care/groming');
    }

}