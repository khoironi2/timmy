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
    public function getAllMyGroming()
    {
        $this->db->select('*');
        $this->db->from('tbl_boking_groming');
        $this->db->join('tbl_users as user', 'user.id_users=tbl_boking_groming.id_pasien');
        $this->db->join('tbl_paket_groming as paketgrom', 'paketgrom.id_paket_groming=tbl_boking_groming.id_paket_groming');
        $this->db->where('tbl_boking_groming.id_pasien', $this->session->userdata('id_users'));
        $this->db->order_by('tbl_boking_groming.id_boking_groming', 'DESC');
        $result = $this->db->get();

        return $result->result();
    }
    public function getGromingReady()
    {
        $this->db->select('*, COUNT(*) as count');

        $this->db->from('tbl_boking_groming');
        $this->db->where('date_groming', date('Y-m-d'));
        $result = $this->db->get();

        return $result->result();
    }
}
