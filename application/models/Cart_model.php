<?php 

class Cart_model extends CI_Model
{
    public function find($id)
    {
        $result = $this->db->where('id_paket_groming', $id)
            ->limit(1)
            ->get('tbl_paket_groming');

        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return [];
        }
    }
}