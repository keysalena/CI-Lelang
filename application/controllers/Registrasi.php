<?php

class Registrasi extends CI_Controller
{
    public function index()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[tb_masyarakat.username]');
        $this->form_validation->set_rules('telp', 'Telepon', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|matches[password_2]');
        $this->form_validation->set_rules('password_2', 'Password Confirmation', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('registrasi');
            $this->load->view('template/footer');
        } else {

            $data = array(
                'id_user' => '',
                'nama_lengkap' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'telp' => $this->input->post('telp'),
                'level' => 'masyarakat',
            );

            $this->db->insert('tb_masyarakat', $data);

            redirect('auth/login');
        }
    }
    public function petugas()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[tb_masyarakat.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|matches[password_2]');
        $this->form_validation->set_rules('password_2', 'Password Confirmation', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('registrasi');
            $this->load->view('template/footer');
        } else {

            $data = array(
                'id_petugas' => '',
                'nama_petugas' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'level' => $this->input->post('level'),
            );

            $this->db->insert('tb_petugas', $data);

            redirect('admin/dashboard_admin');
        }
    }
}
