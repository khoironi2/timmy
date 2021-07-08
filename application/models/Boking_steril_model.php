<?php

class Boking_steril_model extends CI_model
{
    public function getAll()
    {
        $this->db->select('
        pasien.name as nama_pemilik,
        pasien.alamat_users as alamat_pemilik,
        paketsteril.nama_paket_steril,
        tbl_boking_steril.total_harga_steril,
        tbl_boking_steril.keterangan_tambahan_steril,
        tbl_boking_steril.nama_hewan_steril,
        tbl_boking_steril.status_boking_steril,
        tbl_boking_steril.id_boking_steril,
        tbl_boking_steril.time_create_boking_steril,
        dokter.name as nama_dokter,
        dokter.id_users as id_dokter
        ');
        $this->db->from('tbl_boking_steril');
        $this->db->join('tbl_users as pasien', 'pasien.id_users=tbl_boking_steril.id_users_pet');
        $this->db->join('tbl_users as dokter', 'dokter.id_users=tbl_boking_steril.id_dokter_steril');
        $this->db->join('tbl_paket_steril as paketsteril', 'paketsteril.id_paket_steril=tbl_boking_steril.id_paket_steril');
        $this->db->where('tbl_boking_steril.id_users_pet', $this->session->userdata('id_users'));
        $this->db->order_by('tbl_boking_steril.id_boking_steril', 'desc');
        $result = $this->db->get();

        return $result->result();
    }
    public function getAllInDokter()
    {
        $this->db->select('
        pasien.name as nama_pemilik,
        pasien.alamat_users as alamat_pemilik,
        paketsteril.nama_paket_steril,
        tbl_boking_steril.total_harga_steril,
        tbl_boking_steril.keterangan_tambahan_steril,
        tbl_boking_steril.nama_hewan_steril,
        tbl_boking_steril.status_boking_steril,
        tbl_boking_steril.id_boking_steril,
        tbl_boking_steril.time_create_boking_steril,
        dokter.name as nama_dokter,
        dokter.id_users as id_dokter
        ');
        $this->db->from('tbl_boking_steril');
        $this->db->join('tbl_users as pasien', 'pasien.id_users=tbl_boking_steril.id_users_pet');
        $this->db->join('tbl_users as dokter', 'dokter.id_users=tbl_boking_steril.id_dokter_steril');
        $this->db->join('tbl_paket_steril as paketsteril', 'paketsteril.id_paket_steril=tbl_boking_steril.id_paket_steril');
        $this->db->where('tbl_boking_steril.id_dokter_steril', $this->session->userdata('id_users'));
        $this->db->order_by('tbl_boking_steril.id_boking_steril', 'desc');
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

    public function Insert($table, $data)
    {
        return $this->db->insert($table, $data);
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

    public function update($id, $data)
    {
        $this->db->where('id_users', $id);
        $this->db->update('tbl_users', $data);

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

    public function getPById($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_boking_steril');
        $this->db->where('id_boking_steril', $id);

        $result = $this->db->get();

        return $result->row();
    }
    public function updateData($id, $data)
    {
        $this->db->where('id_boking_steril', $id);
        $this->db->update('tbl_boking_steril', $data);
    }
}
