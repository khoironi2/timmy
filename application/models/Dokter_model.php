<?php

class Dokter_model extends CI_Model
{
    public function getAllDokter()
    {
        $query = "SELECT `tbl_jadwal_dokter`.*, `tbl_users`.`name`
        FROM `tbl_jadwal_dokter`
        JOIN `tbl_users` ON `tbl_users`.`id_users` = `tbl_jadwal_dokter`.`id_dokter`";

        return $this->db->query($query)->result_array();
    }

    public function getAllPenjualan()
    {
        $query = "SELECT `tbl_penjualan`.*, `tbl_users`.`name`, `tbl_katalog`.`nama_katalog`
        FROM `tbl_penjualan`
        INNER JOIN `tbl_users` ON `tbl_penjualan`.`id_users` = `tbl_users`.`id_users`
        INNER JOIN `tbl_katalog` ON `tbl_penjualan`.`id_katalog` = `tbl_katalog`.`id_katalog`";

        return $this->db->query($query)->result_array();
    }

    function tampil_data()
    {
        return $this->db->get_where('tbl_users', ['level' => 'dokter']);
    }

    function cari($id_katalog)
    {
        $query = $this->db->get_where('tbl_katalog', array('id_katalog' => $id_katalog));
        return $query;
    }

    public function getTotalPenjualan()
    {
        $this->db->select('sum(tbl_penjualan.total_penjualan) as total');
        $this->db->from('tbl_penjualan');

        $result = $this->db->get();

        return $result->result();
    }

    public function getNasabahbytgl($keyword1, $keyword2)
    {
        $this->db->select('tbl_penjualan.time_create_penjualan,tbl_katalog.nama_katalog,sum(tbl_penjualan.berat_penjualan) as berat,sum(tbl_penjualan.total_penjualan) as total');
        $this->db->from('tbl_penjualan');
        $this->db->join('tbl_katalog', 'tbl_katalog.id_katalog=tbl_penjualan.id_katalog');
        $this->db->group_by('tbl_katalog.id_katalog');
        $this->db->where('time_create_penjualan >=', $keyword1);
        $this->db->where('time_create_penjualan <=', $keyword2);
        $result = $this->db->get();

        return $result->result();
    }
    public function getSaldoku($keyword1, $keyword2)
    {
        $this->db->select('sum(tbl_penjualan.berat_penjualan) as berat,sum(tbl_penjualan.total_penjualan) as total');
        $this->db->from('tbl_penjualan');
        $this->db->join('tbl_katalog', 'tbl_katalog.id_katalog=tbl_penjualan.id_katalog');
        $this->db->where('time_create_penjualan >=', $keyword1);
        $this->db->where('time_create_penjualan <=', $keyword2);

        $result = $this->db->get();

        return $result->result();
    }

    public function getStokReady()
    {
        $this->db->select('*, COUNT(*) as count');

        $this->db->from('armada');
        $this->db->where('status', 'ready');
        $result = $this->db->get();

        return $result->result();
    }

    public function getAllSteril()
    {
        $user = $this->session->userdata('id_users');
        $query = "SELECT `tbl_boking_steril`.*, `tbl_users`.`name`, `tbl_paket_steril`.`nama_paket_steril`
                    FROM `tbl_boking_steril`
                    INNER JOIN `tbl_users` ON `tbl_users`.`id_users` = `tbl_boking_steril`.`id_users_pet`
                    INNER JOIN `tbl_paket_steril` ON `tbl_paket_steril`.`id_paket_steril` = `tbl_boking_steril`.`id_paket_steril`
                    WHERE `id_dokter_steril` = $user";

        return $this->db->query($query)->result_array();
    }

    public function getAllVaksin()
    {
        $user = $this->session->userdata('id_users');
        $query = "SELECT `tbl_boking_vaksin`.*, `tbl_users`.`name`, `tbl_paket_vaksin`.`nama_paket_vaksin`
                    FROM `tbl_boking_vaksin`
                    INNER JOIN `tbl_users` ON `tbl_users`.`id_users` = `tbl_boking_vaksin`.`id_pasien`
                    INNER JOIN `tbl_paket_vaksin` ON `tbl_paket_vaksin`.`id_paket_vaksin` = `tbl_boking_vaksin`.`id_paket_vaksin`
                    WHERE `id_dokter_vaksin` = $user";

        return $this->db->query($query)->result_array();
    }
}
