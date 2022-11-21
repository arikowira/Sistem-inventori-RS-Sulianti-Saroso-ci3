<?php

class M_crud extends CI_Model{
    // ambil suatu data
    public function input_data($data,$table)
    {
        $this->db->insert($table,$data);
    }

    public function edit_data($where,$table)
    {
        return $this->db->get_where($table,$where);
    }

    public function update_data($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    public function hapus_data($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function update_qty($data)
    {
        $qty = $data['qty'];
        $id_barang = $data['id_barang'];
        $this->db->set('kuantitas', 'kuantitas'. - $qty, FALSE);
        $this->db->where('id_barang', $id_barang);
        $this->db->update('tb_barang');
    }

    public function update_qty_simpan($data)
    {
        $qty = $data['qty'];
        $id_barang = $data['id_barang'];
        $this->db->set('kuantitas', 'kuantitas +'.$qty, FALSE);
        $this->db->where('id_barang', $id_barang);
        $this->db->update('tb_barangdisimpan');
    }

    public function update_qty_simpan_kurang($data)
    {
        $qty = $data['qty'];
        $id_barang = $data['id_barang'];
        $this->db->set('kuantitas', 'kuantitas'. - $qty, FALSE);
        $this->db->where('id_barang', $id_barang);
        $this->db->update('tb_barangdisimpan');
    }

    public function update_qty_distribusi($data)
    {
        $qty = $data['qty'];
        $id_barang = $data['id_barang'];
        $this->db->set('kuantitas', 'kuantitas +'.$qty, FALSE);
        $this->db->where('id_barang', $id_barang);
        $this->db->update('tb_barangdidistribusi');
    }

    public function update_qty_distribusi_kurang($data)
    {
        $qty = $data['qty'];
        $id_barang = $data['id_barang'];
        $this->db->set('kuantitas', 'kuantitas'. - $qty, FALSE);
        $this->db->where('id_barang', $id_barang);
        $this->db->update('tb_barangdidistribusi');
    }
}
?>