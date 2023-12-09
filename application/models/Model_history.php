<?php
class Model_history extends CI_Model
{
    public function tampil_data()
    {
        $this->db->select('*');
        $this->db->from('history_lelang');
        $this->db->join('tb_barang', 'history_lelang.id_barang = tb_barang.id_barang', 'left');
        $this->db->join('tb_lelang', 'history_lelang.id_lelang = tb_lelang.id_lelang', 'left');
        $this->db->group_by('tb_lelang.id_lelang');
        $this->db->where('tb_lelang.status', 'dibuka');
        $this->db->order_by('history_lelang.id_history', 'DESC');


        $result = $this->db->get();

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }
    public function tampil_data1()
    {
        $this->db->select('*');
        $this->db->from('history_lelang');
        $this->db->join('tb_barang', 'history_lelang.id_barang = tb_barang.id_barang', 'left');
        $this->db->join('tb_lelang', 'history_lelang.id_lelang = tb_lelang.id_lelang', 'left');
        $this->db->group_by('tb_lelang.id_lelang');
        $this->db->where('tb_lelang.status', 'ditutup');
        $this->db->order_by('history_lelang.id_history', 'DESC');


        $result = $this->db->get();

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }
    public function insert($data)
    {
        return $this->db->insert('history_lelang', $data);
    }



    public function updateLelang($id_lelang, $id_user, $harga)
    {
        $this->db->set('status', 'ditutup');
        $this->db->set('id_user', $id_user);
        $this->db->set('harga_akhir', $harga);
        $this->db->where('id_lelang', $id_lelang);
        return $this->db->update('tb_lelang');
    }

    public function updateHistory($id, $id_lelang)
    {
        $this->db->set('status_lelang', 'terpilih');
        $this->db->where('id_history', $id);
        $this->db->update('history_lelang');

        $this->db->set('status_lelang', 'tidak terpilih');
        $this->db->where('id_lelang', $id_lelang);
        $this->db->where('id_history !=', $id);
        $this->db->update('history_lelang');

        return true;
    }
    public function detail($id_lelang)
    {
        $this->db->select('*');
        $this->db->from('history_lelang');
        $this->db->join('tb_barang', 'history_lelang.id_barang = tb_barang.id_barang', 'left');
        $this->db->join('tb_lelang', 'history_lelang.id_lelang = tb_lelang.id_lelang', 'left');
        $this->db->join('tb_masyarakat', 'history_lelang.id_user = tb_masyarakat.id_user', 'left');
        $this->db->where('history_lelang.id_lelang', $id_lelang);
        $this->db->order_by('history_lelang.id_history', 'DESC');

        $result = $this->db->get();

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }
}
