<?php 

class Invoice_model extends CI_Model
{
    public function getAllInvoice()
    {
        // $query = "SELECT `invoices`.*, `meja`.*
        //             FROM `invoices`
        //             JOIN `meja` ON `meja`.`id_meja` = `invoices`.`meja_id`
        //         ";
        
        // return $this->db->query($query)->result_array();

        return $this->db->get('tbl_invoices')->result_array();
    }
}