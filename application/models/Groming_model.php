<?php 

class Groming_model extends CI_Model
{
    public function getAllGroming()
    {
        $query = "SELECT `tbl_boking_groming`.*, `tbl_users`.`name`, `tbl_paket_groming`.`nama_paket_groming`
                    FROM `tbl_boking_groming`
              INNER JOIN `tbl_users` ON `tbl_users`.`id_users` = `tbl_boking_groming`.`id_pasien`
              INNER JOIN `tbl_paket_groming` ON `tbl_paket_groming`.`id_paket_groming` = `tbl_boking_groming`.`id_paket_groming`";

        return $this->db->query($query)->result_array();
    }
}