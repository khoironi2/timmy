<?php

class Antrian_pasien_model extends CI_model
{
    public function getAllSteril()
    {
        $this->db->select('tbl_antrian_pasien.status_antrian_pasien,tbl_users.name,dok.name as dokter,tbl_boking_steril.nama_hewan_steril,tbl_paket_steril.nama_paket_steril');
        $this->db->from('tbl_antrian_pasien');
        $this->db->join('tbl_users', 'tbl_users.id_users=tbl_antrian_pasien.id_pasien');
        $this->db->join('tbl_users as dok', 'dok.id_users=tbl_antrian_pasien.id_dokter');
        $this->db->join('tbl_boking_steril', 'tbl_boking_steril.id_boking_steril=tbl_antrian_pasien.id_status_antrian');
        $this->db->join('tbl_paket_steril', 'tbl_paket_steril.id_paket_steril=tbl_boking_steril.id_paket_steril');
        $this->db->where('tbl_antrian_pasien.id_pasien', $this->session->userdata('id_users'));
        $this->db->where('status_antrian_pasien !=', 'selesai_administrasi');

        $result = $this->db->get();

        return $result->result();
    }
    public function getAllVaksin()
    {
        $this->db->select('tbl_antrian_pasien.status_antrian_pasien,tbl_users.name,dok.name as dokter,tbl_boking_vaksin.nama_hewan_vaksin,tbl_paket_vaksin.nama_paket_vaksin');
        $this->db->from('tbl_antrian_pasien');
        $this->db->join('tbl_users', 'tbl_users.id_users=tbl_antrian_pasien.id_pasien');
        $this->db->join('tbl_users as dok', 'dok.id_users=tbl_antrian_pasien.id_dokter');
        $this->db->join('tbl_boking_vaksin', 'tbl_boking_vaksin.id_boking_vaksin=tbl_antrian_pasien.id_status_antrian');
        $this->db->join('tbl_paket_vaksin', 'tbl_paket_vaksin.id_paket_vaksin=tbl_boking_vaksin.id_paket_vaksin');
        $this->db->where('tbl_antrian_pasien.id_pasien', $this->session->userdata('id_users'));
        $this->db->where('status_antrian_pasien !=', 'selesai_administrasi');
        $result = $this->db->get();

        return $result->result();
    }
    public function getAllSterilInDokter()
    {
        $this->db->select('tbl_antrian_pasien.status_antrian_pasien,tbl_users.name,dok.name as dokter,tbl_boking_steril.nama_hewan_steril,tbl_paket_steril.nama_paket_steril');
        $this->db->from('tbl_antrian_pasien');
        $this->db->join('tbl_users', 'tbl_users.id_users=tbl_antrian_pasien.id_pasien');
        $this->db->join('tbl_users as dok', 'dok.id_users=tbl_antrian_pasien.id_dokter');
        $this->db->join('tbl_boking_steril', 'tbl_boking_steril.id_boking_steril=tbl_antrian_pasien.id_status_antrian');
        $this->db->join('tbl_paket_steril', 'tbl_paket_steril.id_paket_steril=tbl_boking_steril.id_paket_steril');
        $this->db->where('tbl_antrian_pasien.id_dokter', $this->session->userdata('id_users'));
        $this->db->where('status_antrian_pasien !=', 'selesai_administrasi');

        $result = $this->db->get();

        return $result->result();
    }
    public function getAllVaksinInDokter()
    {
        $this->db->select('tbl_antrian_pasien.status_antrian_pasien,tbl_users.name,dok.name as dokter,tbl_boking_vaksin.nama_hewan_vaksin,tbl_paket_vaksin.nama_paket_vaksin');
        $this->db->from('tbl_antrian_pasien');
        $this->db->join('tbl_users', 'tbl_users.id_users=tbl_antrian_pasien.id_pasien');
        $this->db->join('tbl_users as dok', 'dok.id_users=tbl_antrian_pasien.id_dokter');
        $this->db->join('tbl_boking_vaksin', 'tbl_boking_vaksin.id_boking_vaksin=tbl_antrian_pasien.id_status_antrian');
        $this->db->join('tbl_paket_vaksin', 'tbl_paket_vaksin.id_paket_vaksin=tbl_boking_vaksin.id_paket_vaksin');
        $this->db->where('tbl_antrian_pasien.id_dokter', $this->session->userdata('id_users'));
        $this->db->where('status_antrian_pasien !=', 'selesai_administrasi');
        $result = $this->db->get();

        return $result->result();
    }
    public function getAllUsersDokter()
    {
        $this->db->select('*');
        $this->db->from('tbl_users');
        $this->db->where('level', 'dokter');
        $result = $this->db->get();

        return $result->result();
    }

    public function getID($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_users');
        $this->db->where('id_users', $id);

        $result = $this->db->get();

        return $result->result();
    }

    public function Insert($table, $data1)
    {
        return $this->db->insert($table, $data1);
    }


    function tampil_data()
    {
        return $this->db->get('santri');
    }

    function cari($ids)
    {
        $query = $this->db->get_where('santri', array('ids' => $ids));
        return $query;
    }

    public function update($id, $data1)
    {
        $this->db->where('id_status_antrian', $id);
        $this->db->update('tbl_antrian_pasien', $data1);

        if ($this->db->affected_rows() > 0)
            return true;
        else
            return false;
    }
    public function update1($id, $data1)
    {
        $this->db->where('id', $id);
        $this->db->update('santri', $data1);

        if ($this->db->affected_rows() > 0)
            return true;
        else
            return false;
    }

    public function updateAva($id, $data)
    {
        $update = $this->db->get('santri');
        $row = $update->row_array();
        if ($update->num_rows() > 0) {
            if (isset($data['gambar_santri'])) {
                #lets delete the image                
                unlink("./assets/img/users/" . $row['gambar_santri']);
            }
        }
        $this->db->where('id', $id);
        $this->db->update('santri', $data);

        if ($this->db->affected_rows() > 0)
            return true;
        else
            return false;
    }

    public function Cetak()
    {
        $this->db->select('*');
        $this->db->from('santri');
        $this->db->join('users', 'users.id=santri.id');
        $this->db->where('santri.id', $this->session->userdata('id'));

        $result = $this->db->get();

        return $result->result();
    }

    public function delete($id)
    {
        $this->db->where('id_users', $id);
        $this->db->delete('tbl_users');

        if ($this->db->affected_rows() > 0)
            return true;
        else
            return false;
    }
}
