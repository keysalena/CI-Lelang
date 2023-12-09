<?php

class Dashboard_admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('level') != 'admin' && $this->session->userdata('level') != 'petugas') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Belum Login!!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            ');
            redirect('auth/login');
        }
    }
    public function detail($id_barang)
    {
        $data['barang'] = $this->model_barang->detail($id_barang);
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/footer');
        $this->load->view('detail_barang', $data);
    }
    public function index()
    {
        // $data['barang'] = $this->model_barang->tampil_data()->result();
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('template_admin/footer');
        $this->load->view('admin/dashboard');
        // $this->load->view('dashboard', $data);
    }
}
