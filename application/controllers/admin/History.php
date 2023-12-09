<?php

class History extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('level') != 'admin' && $this->session->userdata('level') != 'petugas') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
Belum Login!!              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            ');
            redirect('auth/login');
        }
    }
    public function index()
    {
        $data['history1'] = $this->model_history->tampil_data1();
        $data['history'] = $this->model_history->tampil_data();
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('template_admin/footer');
        $this->load->view('admin/history', $data);
    }

    public function detail($id_lelang)
    {
        $data['history'] = $this->model_history->detail($id_lelang);
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('template_admin/footer');
        $this->load->view('admin/detail', $data);
    }

    public function update()
    {
        $id_history = $this->input->post('id_history');

        $data = $this->db->select('*')
            ->from('history_lelang')
            ->where('history_lelang.id_history', $id_history)
            ->get()
            ->row();

        if ($data) {

            $id_lelang = $data->id_lelang;
            $harga = $data->penawaran_harga;
            $id_user = $data->id_user;

            $this->model_history->updateHistory($id_history, $id_lelang);

            $this->model_history->updateLelang($id_lelang, $id_user, $harga);
        }

        redirect('admin/history');
    }
}
