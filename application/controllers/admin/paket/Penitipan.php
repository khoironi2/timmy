<?php 

class Penitipan extends CI_Controller
{
    public function index()
    {
        $data = [
            'title' => 'Sistem informasi klinik pelayanan hewan',
            'halaman' => 'Data | Penitipan',
            'icon' => 'fas fa-tachometer-alt',
            'user' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'penitipan' => $this->db->get('tbl_paket_penitpan')->result_array()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/paket/penitipan/index');
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $data = [
            'title' => 'Sistem informasi klinik pelayanan hewan',
            'halaman' => 'Data | Penitipan',
            'icon' => 'fas fa-tachometer-alt',
            'user' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
        ];

        $this->form_validation->set_rules('nama_paket_penitipan', 'nama', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar');
            $this->load->view('templates/sidebar');
            $this->load->view('admin/paket/penitipan/create');
            $this->load->view('templates/footer');
        } else {

            $upload_image = $_FILES['gambar_paket_penitipan']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/paket/penitipan';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar_paket_penitipan')) {
                    // if ($old_image != 'default.png') {
                    //     unlink(FCPATH . 'assets/img/users/' . $old_image);
                    // }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar_paket_penitipan', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->db->insert('tbl_paket_penitpan', [
                'nama_paket_penitipan' => $this->input->post('nama_paket_penitipan'),
                'keterangan_paket_penitipan' => $this->input->post('keterangan_paket_penitipan'),
                'harga_paket_penitipan' => $this->input->post('harga_paket_penitipan'),
            ]);

            $this->session->set_flashdata('message', '<div class="alert alert-success">Sukses, Data Berhasil Ditambahkan.</div>');
            redirect('admin/paket/penitipan');
        }
    }

    public function update($id)
    {
        $data = [
            'title' => 'Sistem informasi klinik pelayanan hewan',
            'halaman' => 'Data | Penitipan',
            'icon' => 'fas fa-tachometer-alt',
            'user' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'penitipan' => $this->db->get_where('tbl_paket_penitpan', ['id_paket_penitipan' => $id])->row_array(),
        ];

        $old_image = $data['penitipan']['gambar_paket_penitipan'];

        $this->form_validation->set_rules('nama_paket_penitipan', 'nama', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar');
            $this->load->view('templates/sidebar');
            $this->load->view('admin/paket/penitipan/update');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_paket_penitipan' => $this->input->post('nama_paket_penitipan'),
                'keterangan_paket_penitipan' => $this->input->post('keterangan_paket_penitipan'),
                'harga_paket_penitipan' => $this->input->post('harga_paket_penitipan'),
            ];

            $upload_image = $_FILES['gambar_paket_penitipan']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/paket/penitipan';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar_paket_penitipan')) {
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/img/paket/penitipan' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar_paket_penitipan', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->where('id_paket_penitipan', $this->input->post('id_paket_penitipan'));
            $this->db->update('tbl_paket_penitpan', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success">Sukses, Data Berhasil Diubah.</div>');
            redirect('admin/paket/penitipan');
        }
    }

    public function delete($id)
    {
        $this->db->delete('tbl_paket_penitpan', ['id_paket_penitipan' => $id]);

        $this->session->set_flashdata('message', '<div class="alert alert-success">Sukses, Data Berhasil Dihapus.</div>');
        redirect('admin/paket/penitipan');
    }
}