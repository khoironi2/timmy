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
}