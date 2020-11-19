<?php

class Penitipan_model extends CI_Model
{
    public function getAllPenitipan()
    {
        $query = "SELECT `tbl_boking_penitipan`.*, `tbl_users`.`name`, `tbl_paket_penitpan`.`nama_paket_penitipan`
                    FROM `tbl_boking_penitipan`
              INNER JOIN `tbl_users` ON `tbl_users`.`id_users` = `tbl_boking_penitipan`.`id_users_pet`
              INNER JOIN `tbl_paket_penitpan` ON `tbl_paket_penitpan`.`id_paket_penitipan` = `tbl_boking_penitipan`.`id_paket_penitipan`";

        return $this->db->query($query)->result_array();
    }
    public function getAllMyPenitipan()
    {
        $this->db->select('*');
        $this->db->from('tbl_boking_penitipan');
        $this->db->join('tbl_users as user', 'user.id_users=tbl_boking_penitipan.id_users_pet');
        $this->db->join('tbl_paket_penitpan as pakettitip', 'pakettitip.id_paket_penitipan=tbl_boking_penitipan.id_paket_penitipan');
        $this->db->where('tbl_boking_penitipan.id_users_pet', $this->session->userdata('id_users'));
        $result = $this->db->get();

        return $result->result();
    }
}
