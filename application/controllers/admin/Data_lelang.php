<?php

class Data_lelang extends CI_Controller
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

            // Redirect to login or another page if the condition is not met
            redirect('auth/login');
        }
    }
    public function index()
    {
        $data['lelang'] = $this->model_lelang->tampil_data();

        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('template_admin/footer');
        $this->load->view('admin/data_lelang', $data);
    }
    public function tambah()
    {
        $id_barang = $this->input->post('id_barang');
        $tanggal = $this->input->post('tanggal');
        $id_petugas = $this->input->post('id_petugas');

        $this->model_lelang->update($id_barang);

        $lelang = array(
            'id_barang' => $id_barang,
            'tgl_lelang' => $tanggal,
            'id_petugas' => $id_petugas,
            'status' => 'dibuka',
        );
        $this->model_lelang->insert($lelang);
        redirect('admin/data_lelang');
    }
}
