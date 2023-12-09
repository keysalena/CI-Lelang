<?php

class Data_barang extends CI_Controller
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
        $data['barang'] = $this->model_barang->tampil()->result();
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('template_admin/footer');
        $this->load->view('admin/data_barang', $data);
    }

    public function tambah_aksi()
    {
        $nama_barang = $this->input->post('nama_barang');
        $tanggal = $this->input->post('tanggal');
        $harga = $this->input->post('harga');
        $deskripsi = $this->input->post('deskripsi');
        $gambar = $_FILES['gambar']['name'];

        if ($gambar != '') {
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                echo "Gambar gagal diupload!!";
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }

        $data = array(
            'nama_barang' => $nama_barang,
            'tgl' => $tanggal,
            'harga_awal' => $harga,
            'deskripsi_barang' => $deskripsi,
            'gambar' => $gambar,
            'status_barang' => 'belum dilelang'
        );

        $this->model_barang->tambah_barang($data, 'tb_barang');
        redirect('admin/data_barang/index');
    }

    public function edit_aksi($id_barang)
    {
        $id_barang = $this->input->post('id_barang');
        $nama_barang = $this->input->post('nama_barang');
        $tanggal = $this->input->post('tanggal');
        $harga = $this->input->post('harga');
        $deskripsi = $this->input->post('deskripsi');
        $status = $this->input->post('status');
        $data = array(
            'nama_barang' => $nama_barang,
            'tgl' => $tanggal,
            'harga_awal' => $harga,
            'deskripsi_barang' => $deskripsi,
            'status_barang' => $status,
        );

        $where = array(
            'id_barang' => $id_barang
        );


        $this->model_barang->edit_barang($where, $data, 'tb_barang');
        redirect('admin/data_barang/index');
    }
    public function hapus_aksi($id_barang)
    {
        $where = array(
            'id_barang' => $id_barang
        );
        $this->model_barang->hapus_barang($where, 'tb_barang');
        redirect('admin/data_barang/index');
    }
}
