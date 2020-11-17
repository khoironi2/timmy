<?php 

class Pasien_model extends CI_Model
{
    public function getAllAntrianPasien()
    {
        $query = "SELECT `tbl_antrian_pasien`.*, `tbl_users`.`name`
                    FROM `tbl_antrian_pasien`
                    JOIN `tbl_users` ON `tbl_users`.`id_users` = `tbl_antrian_pasien`.`id_pasien`";

        return $this->db->query($query)->result_array();
    }
}