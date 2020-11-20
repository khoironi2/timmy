<?php 

class Groming extends CI_Controller
{
    public function index()
    {
        $data = [
            'title' => 'Sistem informasi klinik pelayanan hewan',
            'halaman' => 'Data | Groming',
            'icon' => 'fas fa-tachometer-alt',
            'user' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'groming' => $this->db->get('tbl_paket_groming')->result_array()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/paket/groming/index');
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $data = [
            'title' => 'Sistem informasi klinik pelayanan hewan',
            'halaman' => 'Data | Groming',
            'icon' => 'fas fa-tachometer-alt',
            'user' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
        ];

        $this->form_validation->set_rules('nama_paket_groming', 'nama', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar');
            $this->load->view('templates/sidebar');
            $this->load->view('admin/paket/groming/create');
            $this->load->view('templates/footer');
        } else {

            $upload_image = $_FILES['gambar_paket_groming']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/paket/groming';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar_paket_groming')) {
                    // if ($old_image != 'default.png') {
                    //     unlink(FCPATH . 'assets/img/users/' . $old_image);
                    // }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar_paket_groming', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->db->insert('tbl_paket_groming', [
                'nama_paket_groming' => $this->input->post('nama_paket_groming'),
                'keterangan_paket_groming' => $this->input->post('keterangan_paket_groming'),
                'harga_paket_groming' => $this->input->post('harga_paket_groming'),
            ]);

            $this->session->set_flashdata('message', '<div class="alert alert-success">Sukses, Data Berhasil Ditambahkan.</div>');
            redirect('admin/paket/groming');
        }
    }

    public function update($id)
    {
        $data = [
            'title' => 'Sistem informasi klinik pelayanan hewan',
            'halaman' => 'Data | Groming',
            'icon' => 'fas fa-tachometer-alt',
            'user' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'groming' => $this->db->get_where('tbl_paket_groming', ['id_paket_groming' => $id])->row_array(),
        ];

        $old_image = $data['groming']['gambar_paket_groming'];

        $this->form_validation->set_rules('nama_paket_groming', 'nama', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar');
            $this->load->view('templates/sidebar');
            $this->load->view('admin/paket/groming/update');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_paket_groming' => $this->input->post('nama_paket_groming'),
                'keterangan_paket_groming' => $this->input->post('keterangan_paket_groming'),
                'harga_paket_groming' => $this->input->post('harga_paket_groming'),
            ];

            $upload_image = $_FILES['gambar_paket_groming']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/paket/groming';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar_paket_groming')) {
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/img/paket/groming' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar_paket_groming', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->where('id_paket_groming', $this->input->post('id_paket_groming'));
            $this->db->update('tbl_paket_groming', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success">Sukses, Data Berhasil Diubah.</div>');
            redirect('admin/paket/groming');
        }
    }

    public function delete($id)
    {
        $this->db->delete('tbl_paket_groming', ['id_paket_groming' => $id]);

        $this->session->set_flashdata('message', '<div class="alert alert-success">Sukses, Data Berhasil Dihapus.</div>');
        redirect('admin/paket/groming');
    }
}