<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
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
		$data['tb_user'] = $this->m_ambil->tampil_data('tb_user')->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('user', $data);
		$this->load->view('templates/footer');
	}

	public function _rules(){

        $this->form_validation->set_rules('nama','nama','required',[
            'required' => 'Nama Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('username','username','required',[
            'required' => 'Username Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('password','password','required',[
            'required' => 'Password Wajib Diisi!'
        ]);
		$this->form_validation->set_rules('role','role','required',[
            'required' => 'Role Wajib Diisi!'
        ]);
    }

	public function tambah_user()
    {
        $data['tb_user'] = $this->m_ambil->tampil_data('tb_user')->result();

        $this->load->view('templates/header');
		$this->load->view('templates/sidebar');
        $this->load->view('tambah_user', $data);
		$this->load->view('templates/footer');
    }
	public function tambah_user_aksi()
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE){
            $this->tambah_user();
        }else{
            $nama = $this->input->post('nama');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $role = $this->input->post('role');

            $data = array(
                'nama' => $nama,
                'username' => $username,
                'password' => MD5($password),
                'role' => $role,
            );


            $this->m_crud->input_data($data,'tb_user');
            $this->session->set_flashdata('pesan',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    User Berhasil Ditambahkan!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
            redirect('user');
        }
    }

	public function update($id)
    {
        $where = array('id_user' => $id);
        $data['tb_user'] = $this->m_crud->edit_data($where,'tb_user')->result();
        $this->load->view('templates/header');
		$this->load->view('templates/sidebar');
        $this->load->view('edit_user', $data);
		$this->load->view('templates/footer');
    }

    public function update_aksi()
    {
        $id = $this->input->post('id_user');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
		$role = $this->input->post('role');

        if($password){
            $data = array(
            	'nama' => $nama,
                'username' => $username,
                'password' => MD5($password),
                'role' => $role,
        );
        }else{
            $data = array(
            'nama' => $nama,
            'username' => $username,
            'role' => $role,
        );
        }


        $where = array(
            'id_user' => $id
        );

        $this->m_crud->update_data($where,$data,'tb_user');
        $this->session->set_flashdata('pesan',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    User Berhasil Diupdate!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
        redirect('user');
    }

    public function delete($id)
    {
        $where = array('id_user' => $id);
        $this->m_crud->hapus_data($where,'tb_user');
        $this->session->set_flashdata('pesan',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    User Berhasil Dihapus!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
        redirect('user');
    }
}
