<?php
class Model_auth extends CI_Model
{
    public function cek_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $result_masyarakat = $this->db->where('username', $username)
            ->where('password', $password)
            ->limit(1)
            ->get('tb_masyarakat');

        $result_petugas = $this->db->where('username', $username)
            ->where('password', $password)
            ->limit(1)
            ->get('tb_petugas');

        if ($result_masyarakat->num_rows() > 0) {
            return $result_masyarakat->row();
        } elseif ($result_petugas->num_rows() > 0) {
            return $result_petugas->row();
        } else {
            return array(); 
        }
    }
}
?>
