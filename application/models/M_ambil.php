<?php

class M_ambil extends CI_Model{
    // ambil suatu data
    public function tampil_data($table)
    {
        return $this->db->get($table);
    }
    // ambil data user
    public function ambil_data_user($id)
    {
        $this->db->where('id_user', $id);
        return $this->db->get('tb_user')->row();
    }

    public function ambil_data_barang($id)
    {
        $this->db->where('id_barang', $id);
        return $this->db->get('tb_barang')->row();
    }
}
?>