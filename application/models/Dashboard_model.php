<?php

class Dashboard_model extends CI_Model
{

    public function getTotalVaksin()
    {
        $this->db->select('*, COUNT(*) as count');

        $this->db->from('tbl_boking_vaksin');
        // $this->db->where('date_groming', date('Y-m-d'));
        $result = $this->db->get();

        return $result->result();
    }
    public function getTotalSteril()
    {
        $this->db->select('*, COUNT(*) as count');

        $this->db->from('tbl_boking_steril');
        // $this->db->where('date_groming', date('Y-m-d'));
        $result = $this->db->get();

        return $result->result();
    }
    public function getTotalGroming()
    {
        $this->db->select('*, COUNT(*) as count');

        $this->db->from('tbl_boking_groming');
        // $this->db->where('date_groming', date('Y-m-d'));
        $result = $this->db->get();

        return $result->result();
    }
    public function getTotalPenitipan()
    {
        $this->db->select('*, COUNT(*) as count');

        $this->db->from('tbl_boking_penitipan');
        // $this->db->where('date_groming', date('Y-m-d'));
        $result = $this->db->get();

        return $result->result();
    }
}
