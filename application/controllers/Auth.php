<?php

class Auth extends CI_Controller{

    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('Login');
    }


    public function proses_login()
    {
        $this->form_validation->set_rules('username','username','required',[
            'required' => 'Username Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('password','password','required',[
            'required' => 'Password Wajib Diisi!'
        ]);
        if ($this->form_validation->run() == FALSE){
            $this->load->view('templates/header');
            $this->load->view('login');
        }else{
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $username;
            $pass = MD5($password);

            $cek = $this->m_auth->cek_akun($user, $pass);
            if ($cek->num_rows() > 0){
                        foreach ($cek->result() as $cek){
                            $sess_data['id_user'] = $cek->id_user;
                            $sess_data['username'] = $cek->username;
                            $sess_data['nama'] = $cek->nama;
                            $sess_data['role'] = $cek->role;

                            $this->session->set_userdata($sess_data);
                        }
                        redirect('dashboard');

            }else{
                    $this->session->set_flashdata('pesan',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Username atau Password Salah!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
                    redirect('auth');
                }
            }
        }

        public function logout()
        {
            $this->session->sess_destroy();
            redirect('auth');
        }
    }
?>