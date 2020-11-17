<?php 

class Steril_model extends CI_Model
{
    public function getAllSteril()
    {
        $query = "SELECT `tbl_boking_steril`.*, `tbl_users`.`name`, `tbl_paket_steril`.`nama_paket_steril`
                    FROM `tbl_boking_steril`
                    INNER JOIN `tbl_users` ON `tbl_users`.`id_users` = `tbl_boking_steril`.`id_users_pet`
                    INNER JOIN `tbl_paket_steril` ON `tbl_paket_steril`.`id_paket_steril` = `tbl_boking_steril`.`id_paket_steril`";

        return $this->db->query($query)->result_array();
    }
}