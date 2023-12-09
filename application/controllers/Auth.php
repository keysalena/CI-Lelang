<?php

class Auth extends CI_Controller
{
    public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('login');
            $this->load->view('template/footer');
        } else {
            $auth = $this->model_auth->cek_login();

            if ($auth == FALSE) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          Username atau Password Anda Salah!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          ');
                redirect('auth/login');
            } else {
                $this->session->set_userdata('username', $auth->username);
                $this->session->set_userdata('level', $auth->level);
                $this->session->set_userdata('id_petugas', $auth->id_petugas);
                $this->session->set_userdata('id_user', $auth->id_user);

                if ($auth->level == 'masyarakat') {
                    redirect('welcome');
                } elseif ($auth->level == 'admin' || $auth->level == 'petugas') {
                    redirect('admin/dashboard_admin');
                }
            }
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}