<?php
class M_auth extends CI_Model{
    // ambil data user
    public function cek_akun($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        return $this->db->get('tb_user');
    }
}