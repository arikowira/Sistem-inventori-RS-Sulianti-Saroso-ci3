<?php
class Download extends CI_Controller {

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

    public function download_laporan_penyimpanan_logistik($lp)
    {
        force_download('assets/uploads/laporan_penyimpanan_logistik/'.$lp,null);
    }

    public function download_laporan_distribusi($lp)
    {
        force_download('assets/uploads/laporan_distribusi/'.$lp,null);
    }

    public function download_surat_resmi_donasi($lp)
    {
        force_download('assets/uploads/surat_resmi_donasi/'.$lp,null);
    }

    public function download_surat_tugas_pengambilan($lp)
    {
        force_download('assets/uploads/surat_tugas_pengambilan/'.$lp,null);
    }

    public function download_surat_serah_terima($lp)
    {
        force_download('assets/uploads/surat_serah_terima/'.$lp,null);
    }

    public function download_foto_dokumentasi_serah_terima($lp)
    {
        force_download('assets/uploads/foto_dokumentasi_serah_terima/'.$lp,null);
    }

    public function download_foto_barang($lp)
    {
        force_download('assets/uploads/foto_barang/'.$lp,null);
    }

    public function download_sertifikat_ucapan_terima_kasih($lp)
    {
        force_download('assets/uploads/sertifikat_ucapan_terima_kasih/'.$lp,null);
    }

    public function hapus_file($lp,$id,$file)
    {
        $dir = './assets/uploads/'.$lp.'/'.$file;
        if(is_readable($dir) && unlink($dir)){
            $this->db->set($lp,'');
            $this->db->where('id_barang', $id);
            $this->db->update('tb_barang');
            redirect('data_barang/update/'.$id);
        }else{
            redirect('data_barang/update/'.$id);
        }
    }

    public function hapus_file_disimpan($lp,$id,$file)
    {
        $dir = './assets/uploads/'.$lp.'/'.$file;
        if(is_readable($dir) && unlink($dir)){
            $this->db->set($lp,'');
            $this->db->where('id_barang_disimpan', $id);
            $this->db->update('tb_barangdisimpan');
            redirect('data_barang/detail_disimpan/'.$id);
        }else{
            redirect('data_barang/detail_disimpan/'.$id);
        }
    }

    public function hapus_file_didistribusi($lp,$id,$file)
    {
        $dir = './assets/uploads/'.$lp.'/'.$file;
        if(is_readable($dir) && unlink($dir)){
            $this->db->set($lp,'');
            $this->db->where('id_barang_didistribusi', $id);
            $this->db->update('tb_barangdidistribusi');
            redirect('data_barang/detail_didistribusi/'.$id);
        }else{
            redirect('data_barang/detail_didistribusi/'.$id);
        }
    }
}