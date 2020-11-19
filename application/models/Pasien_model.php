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

    public function getAllSteril()
    {
        $user = $this->session->userdata('id_users');
        $query = "SELECT `tbl_boking_steril`.*, `tbl_users`.`name`, `tbl_paket_steril`.`nama_paket_steril`
                    FROM `tbl_boking_steril`
                    INNER JOIN `tbl_users` ON `tbl_users`.`id_users` = `tbl_boking_steril`.`id_users_pet`
                    INNER JOIN `tbl_paket_steril` ON `tbl_paket_steril`.`id_paket_steril` = `tbl_boking_steril`.`id_paket_steril`
                    WHERE `id_users_pet` = $user";

        return $this->db->query($query)->result_array();
    }

    public function getAllVaksin()
    {
        $user = $this->session->userdata('id_users');
        $query = "SELECT `tbl_boking_vaksin`.*, `tbl_users`.`name`, `tbl_paket_vaksin`.`nama_paket_vaksin`
                    FROM `tbl_boking_vaksin`
                    INNER JOIN `tbl_users` ON `tbl_users`.`id_users` = `tbl_boking_vaksin`.`id_pasien`
                    INNER JOIN `tbl_paket_vaksin` ON `tbl_paket_vaksin`.`id_paket_vaksin` = `tbl_boking_vaksin`.`id_paket_vaksin`
                    WHERE `id_pasien` = $user";

        return $this->db->query($query)->result_array();
    }
}