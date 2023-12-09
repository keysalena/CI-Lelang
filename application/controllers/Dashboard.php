<?php

//use PgSql\Result;

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        if ($this->session->userdata('level') != 'masyarakat') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Belum Login!!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
              ');
            redirect('auth/login');
        }
    }
    public function index()
    {
        $data['barang'] = $this->model_barang->tampil_data()->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/footer');
        $this->load->view('dashboard', $data);
    }
    public function penawaran()
    {
        $id_user = $this->session->userdata('id_user'); 
        $data['history'] = $this->model_barang->penawaran($id_user);
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/footer');
        $this->load->view('data_penawaran', $data);
    }
    public function detail($id_barang)
    {
        $data['barang'] = $this->model_barang->detail($id_barang);
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/footer');
        $this->load->view('detail_barang', $data);
    }
    public function tawar()
    {
        $id_barang = $this->input->post('id_barang');
        $id_lelang = $this->input->post('id_lelang');
        $id_user = $this->input->post('id_user');
        $penawaran = $this->input->post('penawaran');

        $data = array(
            'id_barang' => $id_barang,
            'id_lelang' => $id_lelang,
            'id_user' => $id_user,
            'penawaran_harga' => $penawaran,
        );
        $this->model_history->insert($data);
        redirect('dashboard/index');
    }
}
