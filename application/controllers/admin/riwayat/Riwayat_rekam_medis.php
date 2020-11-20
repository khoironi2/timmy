<?php

class Riwayat_rekam_medis extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->cek_status();
        $this->CI = &get_instance();
        if ($this->CI->router->fetch_class() != "login") {
            // session check logic here...change this accordingly
            if ($this->CI->session->userdata['level'] == 'dokter') {
                redirect('dokter/dashboard');
            } elseif ($this->CI->session->userdata['level'] == 'pasien') {
                redirect('pasien/dashboard');
            }
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Sistem informasi klinik pelayanan hewan',
            'user' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'halaman' => 'Data | Riwayat Rekam Medis',
            'icon' => 'fas fa-user-md',
            'steril' => $this->Steril_model->getAllSteril(),
            'vaksin' => $this->Vaksin_model->getAllVaksin(),
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/riwayat/riwayat_rekam_medis/index');
        $this->load->view('templates/footer');
    }
    public function laporan_steril_pdf()
    {
        $this->load->library('dompdf_gen');

        $keyword1 = $this->input->post('keyword1');
        $keyword2 = $this->input->post('keyword2');
        $data = [
            'awal' =>  $keyword1,
            'akhir' => $keyword2,
            // 'totalpenjualan' => $this->Steril_model->getAllSteril($keyword1, $keyword2),
            // 'totalpenjualan' => $this->Penjualan_model->getTotalPenjualan(),
            'logo' => '<img src="assets/img/sample/apple.png" alt="" class="mr-3" height="50">',
            'gambar' => 'assets/img/perbaikan/'
        ];
        $data['nasabah'] = $this->Steril_model->getAllSterilByDate($keyword1, $keyword2);
        $this->load->view('admin/riwayat/riwayat_rekam_medis/laporan/pdf/Steril', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_data_steril.pdf", ['Attachment' => 0]);
    }
    public function laporan_vaksin_pdf()
    {
        $this->load->library('dompdf_gen');

        $keyword1 = $this->input->post('keyword1');
        $keyword2 = $this->input->post('keyword2');
        $data = [
            'awal' =>  $keyword1,
            'akhir' => $keyword2,
            // 'totalpenjualan' => $this->Steril_model->getAllSteril($keyword1, $keyword2),
            // 'totalpenjualan' => $this->Penjualan_model->getTotalPenjualan(),
            'logo' => '<img src="assets/img/sample/apple.png" alt="" class="mr-3" height="50">',
            'gambar' => 'assets/img/perbaikan/'
        ];
        $data['nasabah'] = $this->Vaksin_model->getAllVaksinByDate($keyword1, $keyword2);
        $this->load->view('admin/riwayat/riwayat_rekam_medis/laporan/pdf/Vaksin', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_data_vaksin.pdf", ['Attachment' => 0]);
    }
}
