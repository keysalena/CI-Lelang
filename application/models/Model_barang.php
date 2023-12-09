<?php
class Model_barang extends CI_Model
{
    public function tampil()
    {
        return $this->db->select('*')
            ->from('tb_barang')
            ->order_by('id_barang', 'DESC')
            ->get();
    }

    public function tampil_data()
    {
        $this->db->select('*');
        $this->db->from('tb_lelang');
        $this->db->join('tb_barang', 'tb_lelang.id_barang = tb_barang.id_barang', 'left');
        $this->db->where('tb_barang.status_barang', 'dilelang');
        $this->db->order_by('id_lelang', 'DESC');

        $query = $this->db->get();
        return $query;
    }

    public function penawaran($id_user)
    {
        $this->db->select('*');
        $this->db->from('history_lelang');
        $this->db->join('tb_barang', 'history_lelang.id_barang = tb_barang.id_barang', 'left');
        $this->db->join('tb_lelang', 'history_lelang.id_lelang = tb_lelang.id_lelang', 'left');
        $this->db->join('tb_masyarakat', 'history_lelang.id_user = tb_masyarakat.id_user', 'left');
        $this->db->where('history_lelang.id_user', $id_user);

        $result = $this->db->get();

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function tambah_barang($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function edit_barang($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function hapus_barang($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function find($id_barang)
    {
        $result = $this->db->where('id_barang', $id_barang)
            ->limit(1)
            ->get('tb_barang');

        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }
    public function detail($id_barang)
    {
        $this->db->select('*');
        $this->db->from('tb_lelang');
        $this->db->join('tb_barang', 'tb_lelang.id_barang = tb_barang.id_barang', 'left');
        $this->db->join('tb_masyarakat', 'tb_lelang.id_user = tb_masyarakat.id_user', 'left');
        $this->db->where('tb_barang.id_barang', $id_barang);

        $result = $this->db->get();

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }
}
