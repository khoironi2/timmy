<?php

class Rekam_medis_model extends CI_Model
{
    public function getAllMedis()
    {
        $query = "SELECT `tbl_rekan_medis`.*, `tbl_users`.*
                FROM `tbl_rekan_medis`
                JOIN `tbl_users` ON `tbl_users`.`id_users` = `tbl_rekan_medis`.`id_dokter`";
        return $this->db->query($query)->result_array();
    }
}