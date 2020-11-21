<?php 

class Vaksin extends CI_Controller
{
    public function index()
    {
        $data = [
            'title' => 'Sistem informasi klinik pelayanan hewan',
            'halaman' => 'Data | Vaksin',
            'icon' => 'fas fa-tachometer-alt',
            'user' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'vaksin' => $this->db->get('tbl_paket_vaksin')->result_array()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/paket/vaksin/index');
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $data = [
            'title' => 'Sistem informasi klinik pelayanan hewan',
            'halaman' => 'Data | Vaksin',
            'icon' => 'fas fa-tachometer-alt',
            'user' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
        ];

        $this->form_validation->set_rules('nama_paket_vaksin', 'nama', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar');
            $this->load->view('templates/sidebar');
            $this->load->view('admin/paket/vaksin/create');
            $this->load->view('templates/footer');
        } else {

            $upload_image = $_FILES['gambar_paket_vaksin']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/paket/vaksin';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar_paket_vaksin')) {
                    // if ($old_image != 'default.png') {
                    //     unlink(FCPATH . 'assets/img/users/' . $old_image);
                    // }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar_paket_vaksin', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->db->insert('tbl_paket_vaksin', [
                'nama_paket_vaksin' => $this->input->post('nama_paket_vaksin'),
                'keterangan_paket_vaksin' => $this->input->post('keterangan_paket_vaksin'),
                'harga_paket_vaksin' => $this->input->post('harga_paket_vaksin'),
            ]);

            $this->session->set_flashdata('message', '<div class="alert alert-success">Sukses, Data Berhasil Ditambahkan.</div>');
            redirect('admin/paket/vaksin');
        }
    }

    public function update($id)
    {
        $data = [
            'title' => 'Sistem informasi klinik pelayanan hewan',
            'halaman' => 'Data | Vaksin',
            'icon' => 'fas fa-tachometer-alt',
            'user' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'vaksin' => $this->db->get_where('tbl_paket_vaksin', ['id_paket_vaksin' => $id])->row_array(),
        ];

        $old_image = $data['vaksin']['gambar_paket_vaksin'];

        $this->form_validation->set_rules('nama_paket_vaksin', 'nama', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar');
            $this->load->view('templates/sidebar');
            $this->load->view('admin/paket/vaksin/update');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_paket_vaksin' => $this->input->post('nama_paket_vaksin'),
                'keterangan_paket_vaksin' => $this->input->post('keterangan_paket_vaksin'),
                'harga_paket_vaksin' => $this->input->post('harga_paket_vaksin'),
            ];

            $upload_image = $_FILES['gambar_paket_vaksin']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/paket/vaksin';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar_paket_vaksin')) {
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/img/paket/vaksin' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar_paket_vaksin', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->where('id_paket_vaksin', $this->input->post('id_paket_vaksin'));
            $this->db->update('tbl_paket_vaksin', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success">Sukses, Data Berhasil Diubah.</div>');
            redirect('admin/paket/vaksin');
        }
    }

    public function delete($id)
    {
        $this->db->delete('tbl_paket_vaksin', ['id_paket_vaksin' => $id]);

        $this->session->set_flashdata('message', '<div class="alert alert-success">Sukses, Data Berhasil Dihapus.</div>');
        redirect('admin/paket/vaksin');
    }
}