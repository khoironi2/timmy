<?php

class Boking_vaksin_model extends CI_model
{
    public function getAll()
    {
        $this->db->select('
        pasien.name as nama_pemilik,
        pasien.alamat_users as alamat_pemilik,
        paketvaksin.nama_paket_vaksin,
        tbl_boking_vaksin.total_harga_vaksin,
        tbl_boking_vaksin.keterangan_tambahan_vaksin,
        tbl_boking_vaksin.nama_hewan_vaksin,
        tbl_boking_vaksin.status_boking_vaksin,
        tbl_boking_vaksin.id_boking_vaksin,
        tbl_boking_vaksin.time_create_boking_vaksin,
        dokter.name as nama_dokter,
        dokter.id_users as id_dokter
        ');
        $this->db->from('tbl_boking_vaksin');
        $this->db->join('tbl_users as pasien', 'pasien.id_users=tbl_boking_vaksin.id_pasien');
        $this->db->join('tbl_users as dokter', 'dokter.id_users=tbl_boking_vaksin.id_dokter_vaksin');
        $this->db->join('tbl_paket_vaksin as paketvaksin', 'paketvaksin.id_paket_vaksin=tbl_boking_vaksin.id_paket_vaksin');
        $this->db->where('tbl_boking_vaksin.id_pasien', $this->session->userdata('id_users'));
        $this->db->order_by('tbl_boking_vaksin.id_boking_vaksin', 'desc');

        $result = $this->db->get();

        return $result->result();
    }
    public function getAllinDokter()
    {
        $this->db->select('
        pasien.name as nama_pemilik,
        pasien.alamat_users as alamat_pemilik,
        paketvaksin.nama_paket_vaksin,
        tbl_boking_vaksin.total_harga_vaksin,
        tbl_boking_vaksin.keterangan_tambahan_vaksin,
        tbl_boking_vaksin.nama_hewan_vaksin,
        tbl_boking_vaksin.status_boking_vaksin,
        tbl_boking_vaksin.id_boking_vaksin,
        tbl_boking_vaksin.time_create_boking_vaksin,
        dokter.name as nama_dokter,
        dokter.id_users as id_dokter
        ');
        $this->db->from('tbl_boking_vaksin');
        $this->db->join('tbl_users as pasien', 'pasien.id_users=tbl_boking_vaksin.id_pasien');
        $this->db->join('tbl_users as dokter', 'dokter.id_users=tbl_boking_vaksin.id_dokter_vaksin');
        $this->db->join('tbl_paket_vaksin as paketvaksin', 'paketvaksin.id_paket_vaksin=tbl_boking_vaksin.id_paket_vaksin');
        $this->db->where('tbl_boking_vaksin.id_dokter_vaksin', $this->session->userdata('id_users'));

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
        $this->db->from('tbl_boking_vaksin');
        $this->db->where('id_boking_vaksin', $id);

        $result = $this->db->get();

        return $result->row();
    }
    public function updateData($id, $data)
    {
        $this->db->where('id_boking_vaksin', $id);
        $this->db->update('tbl_boking_vaksin', $data);
    }
}
