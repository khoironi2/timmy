<?php

class Vaksin_model extends CI_Model
{
    public function getAllVaksin()
    {
        $query = "SELECT `tbl_boking_vaksin`.*, `tbl_users`.`name`, `tbl_paket_vaksin`.`nama_paket_vaksin`
                    FROM `tbl_boking_vaksin`
                    INNER JOIN `tbl_users` ON `tbl_users`.`id_users` = `tbl_boking_vaksin`.`id_pasien`
                    INNER JOIN `tbl_paket_vaksin` ON `tbl_paket_vaksin`.`id_paket_vaksin` = `tbl_boking_vaksin`.`id_paket_vaksin`";

        return $this->db->query($query)->result_array();
    }

    public function getAllVaksinByDate($keyword1, $keyword2)
    {
        $this->db->select('
        pasien.name as nama_pemilik,
        pasien.alamat_users as alamat_pemilik,
        paketvaksin.nama_paket_vaksin,
        tbl_boking_vaksin.total_harga_vaksin,
        tbl_boking_vaksin.keterangan_tambahan_vaksin,
        tbl_boking_vaksin.nama_hewan_vaksin,
        tbl_boking_vaksin.status_boking_vaksin,
        tbl_boking_vaksin.id_boking_vaksin,
        tbl_boking_vaksin.time_create_boking_vaksin,
        dokter.name as nama_dokter,
        dokter.id_users as id_dokter
        ');
        $this->db->from('tbl_boking_vaksin');
        $this->db->join('tbl_users as pasien', 'pasien.id_users=tbl_boking_vaksin.id_pasien');
        $this->db->join('tbl_users as dokter', 'dokter.id_users=tbl_boking_vaksin.id_dokter_vaksin');
        $this->db->join('tbl_paket_vaksin as paketvaksin', 'paketvaksin.id_paket_vaksin=tbl_boking_vaksin.id_paket_vaksin');
        $this->db->where('time_create_boking_vaksin >=', $keyword1);
        $this->db->where('time_create_boking_vaksin <=', $keyword2);

        $result = $this->db->get();

        return $result->result();
    }
}
