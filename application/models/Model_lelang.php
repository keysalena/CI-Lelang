<?php
class Model_lelang extends CI_Model
{
    public function tampil_data()
    {
        $this->db->select('*');
        $this->db->from('tb_lelang');
        $this->db->join('tb_barang', 'tb_lelang.id_barang = tb_barang.id_barang', 'left');
        $this->db->join('tb_petugas', 'tb_lelang.id_petugas = tb_petugas.id_petugas', 'left');
        $this->db->join('tb_masyarakat', 'tb_lelang.id_user = tb_masyarakat.id_user', 'left');

        $result = $this->db->get();

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }
    public function barang()
    {
        $this->db->select('*');
        $this->db->from('tb_barang');
        $this->db->where('status_barang', 'belum dilelang');
        $query = $this->db->get();
        return $query->result();
    }
    public function insert($lelang)
    {
        return $this->db->insert('tb_lelang', $lelang);
    }
    public function update($id_barang)
    {
        $this->db->set('status_barang', 'dilelang');
        $this->db->where('id_barang', $id_barang);
        return $this->db->update('tb_barang');
    }
    public function updateLelang($id_lelang, $id_user, $harga)
    {
        $this->db->set('id_user.harga_akhir', $id_user.$harga);
        $this->db->where('id_lelang', $id_lelang);
        return $this->db->update('tb_lelang');
    }
}
