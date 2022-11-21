<?php

class Dashboard extends CI_Controller{

    function __construct(){
      parent::__construct();

      if(!isset($this->session->userdata['username'])){
        $this->session->set_flashdata('pesan',
        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Anda Belum Login!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
      redirect('auth');
      }
    }

    public function index()
    {
		$data = $this->m_ambil->ambil_data_user($this->session->userdata('id_user'));
        $data = array(
        'nama' => $data->nama,
        'username' => $data->username,
        'role' => $data->role,

      );
        $this->load->view('templates/header');
		    $this->load->view('templates/sidebar');
        $this->load->view('dashboard', $data);
		    $this->load->view('templates/footer');
    }
}