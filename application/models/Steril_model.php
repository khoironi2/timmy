<?php

class Steril_model extends CI_Model
{
    public function getAllSteril()
    {
        $query = "SELECT `tbl_boking_steril`.*, `tbl_users`.`name`, `tbl_paket_steril`.`nama_paket_steril`
                    FROM `tbl_boking_steril`
                    INNER JOIN `tbl_users` ON `tbl_users`.`id_users` = `tbl_boking_steril`.`id_users_pet`
                    INNER JOIN `tbl_paket_steril` ON `tbl_paket_steril`.`id_paket_steril` = `tbl_boking_steril`.`id_paket_steril`
                    ORDER BY `tbl_boking_steril`.`id_boking_steril` DESC";

        return $this->db->query($query)->result_array();
    }

    public function getAllSterilByDate($keyword1, $keyword2)
    {
        $this->db->select('
        pasien.name as nama_pemilik,
        pasien.alamat_users as alamat_pemilik,
        paketsteril.nama_paket_steril,
        tbl_boking_steril.total_harga_steril,
        tbl_boking_steril.keterangan_tambahan_steril,
        tbl_boking_steril.nama_hewan_steril,
        tbl_boking_steril.status_boking_steril,
        tbl_boking_steril.id_boking_steril,
        tbl_boking_steril.time_create_boking_steril,
        dokter.name as nama_dokter,
        dokter.id_users as id_dokter
        ');
        $this->db->from('tbl_boking_steril');
        $this->db->join('tbl_users as pasien', 'pasien.id_users=tbl_boking_steril.id_users_pet');
        $this->db->join('tbl_users as dokter', 'dokter.id_users=tbl_boking_steril.id_dokter_steril');
        $this->db->join('tbl_paket_steril as paketsteril', 'paketsteril.id_paket_steril=tbl_boking_steril.id_paket_steril');

        $this->db->where('time_create_boking_steril >=', $keyword1);
        $this->db->where('time_create_boking_steril <=', $keyword2);

        $result = $this->db->get();

        return $result->result();
    }
}
