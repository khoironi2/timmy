<?php 

class Steril extends CI_Controller
{
    public function index()
    {
        $data = [
            'title' => 'Sistem informasi klinik pelayanan hewan',
            'halaman' => 'Data | Steril',
            'icon' => 'fas fa-tachometer-alt',
            'user' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'steril' => $this->db->get('tbl_paket_steril')->result_array()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/paket/steril/index');
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $data = [
            'title' => 'Sistem informasi klinik pelayanan hewan',
            'halaman' => 'Data | Steril',
            'icon' => 'fas fa-tachometer-alt',
            'user' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
        ];

        $this->form_validation->set_rules('nama_paket_steril', 'nama', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar');
            $this->load->view('templates/sidebar');
            $this->load->view('admin/paket/steril/create');
            $this->load->view('templates/footer');
        } else {

            $upload_image = $_FILES['gambar_paket_steril']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/paket/steril';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar_paket_steril')) {
                    // if ($old_image != 'default.png') {
                    //     unlink(FCPATH . 'assets/img/users/' . $old_image);
                    // }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar_paket_steril', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->db->insert('tbl_paket_steril', [
                'nama_paket_steril' => $this->input->post('nama_paket_steril'),
                'keterangan_paket_steril' => $this->input->post('keterangan_paket_steril'),
                'harga_paket_steril' => $this->input->post('harga_paket_steril'),
            ]);

            $this->session->set_flashdata('message', '<div class="alert alert-success">Sukses, Data Berhasil Ditambahkan.</div>');
            redirect('admin/paket/steril');
        }
    }

    public function update($id)
    {
        $data = [
            'title' => 'Sistem informasi klinik pelayanan hewan',
            'halaman' => 'Data | Steril',
            'icon' => 'fas fa-tachometer-alt',
            'user' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'steril' => $this->db->get_where('tbl_paket_steril', ['id_paket_steril' => $id])->row_array(),
        ];

        $old_image = $data['steril']['gambar_paket_steril'];

        $this->form_validation->set_rules('nama_paket_steril', 'nama', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar');
            $this->load->view('templates/sidebar');
            $this->load->view('admin/paket/steril/update');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_paket_steril' => $this->input->post('nama_paket_steril'),
                'keterangan_paket_steril' => $this->input->post('keterangan_paket_steril'),
                'harga_paket_steril' => $this->input->post('harga_paket_steril'),
            ];

            $upload_image = $_FILES['gambar_paket_steril']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/paket/steril';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar_paket_steril')) {
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/img/paket/steril' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar_paket_steril', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->where('id_paket_steril', $this->input->post('id_paket_steril'));
            $this->db->update('tbl_paket_steril', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success">Sukses, Data Berhasil Diubah.</div>');
            redirect('admin/paket/steril');
        }
    }

    public function delete($id)
    {
        $this->db->delete('tbl_paket_steril', ['id_paket_steril' => $id]);

        $this->session->set_flashdata('message', '<div class="alert alert-success">Sukses, Data Berhasil Dihapus.</div>');
        redirect('admin/paket/steril');
    }
}