<?php
class Data_barang extends CI_Controller {

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
		$data['tb_barang'] = $this->m_ambil->tampil_data('tb_barang')->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('data_barang', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_barang()
    {
        $this->load->view('templates/header');
		$this->load->view('templates/sidebar');
        $this->load->view('Data_barang_tambah');
		$this->load->view('templates/footer');
    }

    public function tambah_barang_aksi()
    {
        $this->_rules();
        if($this->form_validation->run()==FALSE){
            $this->tambah_barang();
        }else{
            $penginput_barang = $this->input->post('penginput_barang');
            $nama_barang = $this->input->post('nama_barang');
            $tanggal_input_barang = $this->input->post('tanggal_input_barang');
			$tanggal_terima_barang = $this->input->post('tanggal_terima_barang');
            $asal_donatur = $this->input->post('asal_donatur');
			$pemberi = $this->input->post('pemberi');
            $jenis_barang = $this->input->post('jenis_barang');
            $alat_kesehatan = $this->input->post('alat_kesehatan');
            $kuantitas = $this->input->post('kuantitas');
            $satuan = $this->input->post('satuan');
            $keterangan_harga = $this->input->post('keterangan_harga');
            $kondisi_barang = $this->input->post('kondisi_barang');
            $penerima_barang_distribusi = $this->input->post('penerima_barang_distribusi');
            $tanggal_barang_didistribusi = $this->input->post('tanggal_barang_didistribusi');
            $surat_resmi_donasi = $_FILES['surat_resmi_donasi'];
            if($surat_resmi_donasi=''){
            }else{
                $configsrd['upload_path'] = './assets/uploads/surat_resmi_donasi';
                $configsrd['allowed_types'] = 'pdf|docx|jpg|png|jpeg';

                $this->load->library('upload',$configsrd);
                if(!$this->upload->do_upload('surat_resmi_donasi')){

                }else{
                    $surat_resmi_donasi = $this->upload->data('file_name');
                }
                unset($this->upload);
            }

			$surat_tugas_pengambilan = $_FILES['surat_tugas_pengambilan'];
            if($surat_tugas_pengambilan=''){
            }else{
                $configstp['upload_path'] = './assets/uploads/surat_tugas_pengambilan';
                $configstp['allowed_types'] = 'pdf|docx|jpg|png|jpeg';

                $this->load->library('upload',$configstp);
                if(!$this->upload->do_upload('surat_tugas_pengambilan')){

                }else{
                    $surat_tugas_pengambilan = $this->upload->data('file_name');
                }
                unset($this->upload);
            }

			$surat_serah_terima = $_FILES['surat_serah_terima'];
            if($surat_serah_terima=''){
            }else{
                $configsst['upload_path'] = './assets/uploads/surat_serah_terima';
                $configsst['allowed_types'] = 'pdf|docx|jpg|png|jpeg';

                $this->load->library('upload',$configsst);
                if(!$this->upload->do_upload('surat_serah_terima')){

                }else{
                    $surat_serah_terima = $this->upload->data('file_name');
                }
                unset($this->upload);
            }

			$foto_dokumentasi_serah_terima = $_FILES['foto_dokumentasi_serah_terima'];
            if($foto_dokumentasi_serah_terima=''){
            }else{
                $configfdst['upload_path'] = './assets/uploads/foto_dokumentasi_serah_terima';
                $configfdst['allowed_types'] = 'pdf|docx|jpg|png|jpeg';

                $this->load->library('upload',$configfdst);
                if(!$this->upload->do_upload('foto_dokumentasi_serah_terima')){

                }else{
                    $foto_dokumentasi_serah_terima = $this->upload->data('file_name');
                }
                unset($this->upload);
            }

			$foto_barang = $_FILES['foto_barang'];
            if($foto_barang=''){
            }else{
                $configfb['upload_path'] = './assets/uploads/foto_barang';
                $configfb['allowed_types'] = 'pdf|docx|jpg|png|jpeg';

                $this->load->library('upload',$configfb);
                if(!$this->upload->do_upload('foto_barang')){

                }else{
                    $foto_barang = $this->upload->data('file_name');
                }
                unset($this->upload);
            }

			$sertifikat_ucapan_terima_kasih = $_FILES['sertifikat_ucapan_terima_kasih'];
            if($sertifikat_ucapan_terima_kasih=''){
            }else{
                $configsutk['upload_path'] = './assets/uploads/sertifikat_ucapan_terima_kasih';
                $configsutk['allowed_types'] = 'pdf|docx|jpg|png|jpeg';

                $this->load->library('upload',$configsutk);
                if(!$this->upload->do_upload('sertifikat_ucapan_terima_kasih')){

                }else{
                    $sertifikat_ucapan_terima_kasih = $this->upload->data('file_name');
                }
                unset($this->upload);
            }
            $laporan_distribusi = $_FILES['lp'];
            if($laporan_distribusi=''){
            }else{
                    $configlp2['upload_path'] = './assets/uploads/laporan_distribusi';
                    $configlp2['allowed_types'] = 'pdf|docx';

                    $this->load->library('upload',$configlp2);
                    if(!$this->upload->do_upload('lp')){

                    }else{
                        $laporan_distribusi = $this->upload->data('file_name');
                    }
                    unset($this->upload);
            }
            if($penerima_barang_distribusi==''){
                $data_barang = array(
                    'penginput_barang' => $penginput_barang,
                    'nama_barang' => $nama_barang,
                    'tanggal_input_barang' => $tanggal_input_barang,
                    'tanggal_terima_barang' => $tanggal_terima_barang,
                    'asal_donatur' => $asal_donatur,
                    'pemberi' => $pemberi,
                    'jenis_barang' => $jenis_barang.$alat_kesehatan,
                    'kuantitas' => $kuantitas,
                    'satuan' => $satuan,
                    'keterangan_harga' => $keterangan_harga,
                    'kondisi_barang' => $kondisi_barang,
                    'surat_resmi_donasi' => $surat_resmi_donasi,
                    'surat_tugas_pengambilan' => $surat_tugas_pengambilan,
                    'surat_serah_terima' => $surat_serah_terima,
                    'foto_dokumentasi_serah_terima' => $foto_dokumentasi_serah_terima,
                    'foto_barang' => $foto_barang,
                    'sertifikat_ucapan_terima_kasih' => $sertifikat_ucapan_terima_kasih,
                );
                $this->m_crud->input_data($data_barang,'tb_barang');
            }else{
                $data_barang_distribusi = array(
                    'nama_barang' => $nama_barang,
                    'tanggal_input_pendistribusian' => $tanggal_input_barang,
                    'tanggal_barang_didistribusi' => $tanggal_barang_didistribusi,
                    'tanggal_terima_barang' => $tanggal_terima_barang,
                    'asal_donatur' => $asal_donatur,
                    'pemberi' => $pemberi,
                    'jenis_barang' => $jenis_barang.$alat_kesehatan,
                    'kuantitas' => $kuantitas,
                    'satuan' => $satuan,
                    'keterangan_harga' => $keterangan_harga,
                    'kondisi_barang' => $kondisi_barang,
                    'penerima_barang_distribusi' => $penerima_barang_distribusi,
                    'tanggal_barang_didistribusi' => $tanggal_barang_didistribusi,
                    'laporan_distribusi' => $laporan_distribusi,
                );

                $data_barang = array(
                    'penginput_barang' => $penginput_barang,
                    'nama_barang' => $nama_barang,
                    'tanggal_input_barang' => $tanggal_input_barang,
                    'tanggal_terima_barang' => $tanggal_terima_barang,
                    'asal_donatur' => $asal_donatur,
                    'pemberi' => $pemberi,
                    'jenis_barang' => $jenis_barang.$alat_kesehatan,
                    'kuantitas' => 0,
                    'satuan' => $satuan,
                    'keterangan_harga' => $keterangan_harga,
                    'kondisi_barang' => $kondisi_barang,
                    'surat_resmi_donasi' => $surat_resmi_donasi,
                    'surat_tugas_pengambilan' => $surat_tugas_pengambilan,
                    'surat_serah_terima' => $surat_serah_terima,
                    'foto_dokumentasi_serah_terima' => $foto_dokumentasi_serah_terima,
                    'foto_barang' => $foto_barang,
                    'sertifikat_ucapan_terima_kasih' => $sertifikat_ucapan_terima_kasih,
                );
            $this->m_crud->input_data($data_barang_distribusi,'tb_barangdidistribusi');
            $this->m_crud->input_data($data_barang,'tb_barang');
            }
            $this->session->set_flashdata('pesan',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Barang Berhasil Ditambahkan!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
            redirect('data_barang');
        }
    }

    public function _rules(){

        $this->form_validation->set_rules('nama_barang','nama_barang','required',[
            'required' => 'Nama Barang Wajib Diisi!'
        ]);
		$this->form_validation->set_rules('tanggal_terima_barang','tanggal_terima_barang','required',[
            'required' => 'Tanggal Terima Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('asal_donatur','asal_donatur','required',[
            'required' => 'Asal Donatur Wajib Diisi!'
        ]);
		$this->form_validation->set_rules('pemberi','pemberi','required',[
            'required' => 'Pemberi Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('jenis_barang','jenis_barang','required',[
            'required' => 'Jenis Barang Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('kuantitas','kuantitas','required',[
            'required' => 'Kuantitas Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('satuan','satuan','required',[
            'required' => 'Satuan Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('keterangan_harga','keterangan_harga','required',[
            'required' => 'Keterangan Harga Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('kondisi_barang','kondisi_barang','required',[
            'required' => 'Kondisi Barang Wajib Diisi!'
        ]);
    }

	public function update($id)
    {
        $where = array('id_barang' => $id);
        $data['tb_barang'] = $this->db->get_where('tb_barang', $where)->result();

        $this->load->view('templates/header');
		$this->load->view('templates/sidebar');
        $this->load->view('data_barang_detail', $data);
		$this->load->view('templates/footer');
    }

    public function update_barang_aksi()
    {
        $id_barang = $this->input->post('id_barang');
        $penginput_barang = $this->input->post('penginput_barang');
        $nama_barang = $this->input->post('nama_barang');
        $tanggal_input_barang = $this->input->post('tanggal_input_barang');
		$tanggal_terima_barang = $this->input->post('tanggal_terima_barang');
        $asal_donatur = $this->input->post('asal_donatur');
		$pemberi = $this->input->post('pemberi');
        $jenis_barang = $this->input->post('jenis_barang');
        $alat_kesehatan = $this->input->post('alat_kesehatan');
        $kuantitas = $this->input->post('kuantitas');
        $satuan = $this->input->post('satuan');
        $keterangan_harga = $this->input->post('keterangan_harga');
        $kondisi_barang = $this->input->post('kondisi_barang');
        $surat_resmi_donasi = $_FILES['srd'];
        if($surat_resmi_donasi){
            $configsrd['upload_path'] = './assets/uploads/surat_resmi_donasi';
            $configsrd['allowed_types'] = 'pdf|docx|jpg|png|jpeg';

            $this->load->library('upload',$configsrd);

            if($this->upload->do_upload('srd')){
                $srd = $this->upload->data('file_name');
                $this->db->set('surat_resmi_donasi',$srd);
            }else{
                echo "Gagal Upload";
            }
            unset($this->upload);
        }

        $surat_tugas_pengambilan = $_FILES['stp'];
        if($surat_tugas_pengambilan){
            $configstp['upload_path'] = './assets/uploads/surat_tugas_pengambilan';
            $configstp['allowed_types'] = 'pdf|docx|jpg|png|jpeg';

            $this->load->library('upload',$configstp);

            if($this->upload->do_upload('stp')){
                $stp = $this->upload->data('file_name');
                $this->db->set('surat_tugas_pengambilan',$stp);
            }else{
                echo "Gagal Upload";
            }
            unset($this->upload);
        }

        $surat_serah_terima = $_FILES['sst'];
        if($surat_serah_terima){
            $configsst['upload_path'] = './assets/uploads/surat_serah_terima';
            $configsst['allowed_types'] = 'pdf|docx|jpg|png|jpeg';

            $this->load->library('upload',$configsst);

            if($this->upload->do_upload('sst')){
                $sst = $this->upload->data('file_name');
                $this->db->set('surat_serah_terima',$sst);
            }else{
                echo "Gagal Upload";
            }
            unset($this->upload);
        }

        $foto_dokumentasi_serah_terima = $_FILES['fdst'];
        if($foto_dokumentasi_serah_terima){
            $configfdst['upload_path'] = './assets/uploads/foto_dokumentasi_serah_terima';
            $configfdst['allowed_types'] = 'pdf|docx|jpg|png|jpeg';

            $this->load->library('upload',$configfdst);

            if($this->upload->do_upload('fdst')){
                $fdst = $this->upload->data('file_name');
                $this->db->set('foto_dokumentasi_serah_terima',$fdst);
            }else{
                echo "Gagal Upload";
            }
            unset($this->upload);
        }

        $foto_barang = $_FILES['fb'];
        if($foto_barang){
            $configfb['upload_path'] = './assets/uploads/foto_barang';
            $configfb['allowed_types'] = 'pdf|docx|jpg|png|jpeg';

            $this->load->library('upload',$configfb);

            if($this->upload->do_upload('fb')){
                $fb = $this->upload->data('file_name');
                $this->db->set('foto_barang',$fb);
            }else{
                echo "Gagal Upload";
            }
            unset($this->upload);
        }

        $sertifikat_ucapan_terima_kasih = $_FILES['sutk'];
        if($sertifikat_ucapan_terima_kasih){
            $configsutk['upload_path'] = './assets/uploads/sertifikat_ucapan_terima_kasih';
            $configsutk['allowed_types'] = 'pdf|docx|jpg|png|jpeg';

            $this->load->library('upload',$configsutk);

            if($this->upload->do_upload('sutk')){
                $sutk = $this->upload->data('file_name');
                $this->db->set('sertifikat_ucapan_terima_kasih',$sutk);
            }else{
                echo "Gagal Upload";
            }
            unset($this->upload);
        }

        $data = array(
            'nama_barang' => $nama_barang,
            'tanggal_input_barang' => $tanggal_input_barang,
			'tanggal_terima_barang' => $tanggal_terima_barang,
            'asal_donatur' => $asal_donatur,
			'pemberi' => $pemberi,
            'jenis_barang' => $jenis_barang.$alat_kesehatan,
            'kuantitas' => $kuantitas,
            'satuan' => $satuan,
            'keterangan_harga' => $keterangan_harga,
            'kondisi_barang' => $kondisi_barang,
        );

        $where = array(
            'id_barang' => $id_barang
        );

        $this->m_crud->update_data($where,$data,'tb_barang');
        $this->session->set_flashdata('pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Barang Berhasil Diupdate!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
        redirect('data_barang');
    }

    public function delete($id)
    {
        $where = array('id_barang' => $id);
        $this->m_crud->hapus_data($where,'tb_barang');
        $this->session->set_flashdata('pesan',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Data Barang Berhasil Dihapus!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
        redirect('data_barang');
    }

    public function pindah_barang($id)
    {
        $where = array('id_barang' => $id);
        $data['tb_barang'] = $this->db->get_where('tb_barang', $where)->result();

        $this->load->view('templates/header');
		$this->load->view('templates/sidebar');
        $this->load->view('pindah_barang', $data);
		$this->load->view('templates/footer');
    }

	public function pindah_barang_aksi($id)
    {
		$where = array('id_barang' => $id);
		$jumlah_barang = $this->input->post('kuantitas');
		$kuantitas = $this->m_ambil->ambil_data_barang($id);

		if($kuantitas->kuantitas >= $jumlah_barang){
			if($this->input->post('aksi') == 'disimpan'){
                $ceks = $this->db->get_where('tb_barangdisimpan', $where);
                if($ceks->num_rows() > 0){
                    $jml_simpan = $jumlah_barang;

                    $laporan_penyimpanan_logistik = $_FILES['lp'];
                    if($laporan_penyimpanan_logistik){
                        $configlp['upload_path'] = './assets/uploads/laporan_penyimpanan_logistik';
                        $configlp['allowed_types'] = 'pdf|docx|jpg|png|jpeg';

                        $this->load->library('upload',$configlp);

                        if($this->upload->do_upload('lp')){
                            $lp = $this->upload->data('file_name');
                            $this->db->set('laporan_penyimpanan_logistik',$lp);
                        }else{
                            echo "Gagal Upload";
                        }
                        unset($this->upload);
                    }
                $data = array(
                    'qty' => $jml_simpan,
                    'id_barang' => $id
                );
                $this->m_crud->update_qty_simpan($data);
                $this->session->set_flashdata('pesan',
                        '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Barang Berhasil Disimpan!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>');
                }else{
                $id_barang = $this->input->post('id_barang');
                $nama_barang = $this->input->post('nama_barang');
                $tanggal_terima_barang = $this->input->post('tanggal_terima_barang');
                $tanggal_input = $this->input->post('tanggal_input');
                $tanggal_barang_disimpan = $this->input->post('tanggal_barang_disimpan');
                $tempat_penyimpanan_barang = $this->input->post('tempat_penyimpanan_barang');
                $asal_donatur = $this->input->post('asal_donatur');
                $pemberi = $this->input->post('pemberi');
                $jenis_barang = $this->input->post('jenis_barang');
                $kuantitas = $this->input->post('kuantitas');
                $satuan = $this->input->post('satuan');
                $keterangan_harga = $this->input->post('keterangan_harga');
                $kondisi_barang = $this->input->post('kondisi_barang');
                $laporan_penyimpanan_logistik = $_FILES['lp'];
                if($laporan_penyimpanan_logistik=''){
                }else{
                    $configlp['upload_path'] = './assets/uploads/laporan_penyimpanan_logistik';
                    $configlp['allowed_types'] = 'pdf|docx';

                    $this->load->library('upload',$configlp);
                    if(!$this->upload->do_upload('lp')){

                    }else{
                        $laporan_penyimpanan_logistik = $this->upload->data('file_name');
                    }
                    unset($this->upload);
                }

                $data = array(
                    'id_barang' => $id_barang,
                    'nama_barang' => $nama_barang,
                    'tanggal_terima_barang' => $tanggal_terima_barang,
                    'tanggal_input_penyimpanan' => $tanggal_input,
                    'tanggal_barang_disimpan' => $tanggal_barang_disimpan,
                    'tempat_penyimpanan_barang' => $tempat_penyimpanan_barang,
                    'asal_donatur' => $asal_donatur,
                    'pemberi' => $pemberi,
                    'jenis_barang' => $jenis_barang,
                    'kuantitas' => $kuantitas,
                    'satuan' => $satuan,
                    'keterangan_harga' => $keterangan_harga,
                    'kondisi_barang' => $kondisi_barang,
                    'laporan_penyimpanan_logistik' => $laporan_penyimpanan_logistik,

                );
                $this->m_crud->input_data($data,'tb_barangdisimpan');
                $this->session->set_flashdata('pesan',
                        '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Barang Berhasil Disimpan!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>');
            }
			}else{
                $cekd = $this->db->get_where('tb_barangdidistribusi', $where);
                if($cekd->num_rows() > 0){
                    $jml_simpan = $jumlah_barang;
                    $laporan_distribusi = $_FILES['lp'];
                    if($laporan_distribusi){
                        $configlp['upload_path'] = './assets/uploads/laporan_distribusi';
                        $configlp['allowed_types'] = 'pdf|docx|jpg|png|jpeg';

                        $this->load->library('upload',$configlp);

                        if($this->upload->do_upload('lp')){
                            $lp = $this->upload->data('file_name');
                            $this->db->set('laporan_distribusi',$lp);
                        }else{
                            echo "Gagal Upload";
                        }
                        unset($this->upload);
                    }
                $data = array(
                    'qty' => $jml_simpan,
                    'id_barang' => $id
                );
                $this->m_crud->update_qty_distribusi($data);
                $this->session->set_flashdata('pesan',
                        '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Barang Berhasil Didistribusi!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>');
                }else{
                $id_barang = $this->input->post('id_barang');
                $penerima_barang_distribusi = $this->input->post('penerima_barang_distribusi');
                $nama_barang = $this->input->post('nama_barang');
                $tanggal_terima_barang = $this->input->post('tanggal_terima_barang');
                $tanggal_input = $this->input->post('tanggal_input');
                $tanggal_barang_didistribusi = $this->input->post('tanggal_barang_didistribusi');
                $asal_donatur = $this->input->post('asal_donatur');
                $pemberi = $this->input->post('pemberi');
                $jenis_barang = $this->input->post('jenis_barang');
                $kuantitas = $this->input->post('kuantitas');
                $satuan = $this->input->post('satuan');
                $keterangan_harga = $this->input->post('keterangan_harga');
                $kondisi_barang = $this->input->post('kondisi_barang');
                $laporan_distribusi = $_FILES['lp'];
                if($laporan_distribusi=''){
                }else{
                    $configlp2['upload_path'] = './assets/uploads/laporan_distribusi';
                    $configlp2['allowed_types'] = 'pdf|docx';

                    $this->load->library('upload',$configlp2);
                    if(!$this->upload->do_upload('lp')){

                    }else{
                        $laporan_distribusi = $this->upload->data('file_name');
                    }
                    unset($this->upload);
                }

                $data = array(
                    'id_barang' => $id_barang,
                    'penerima_barang_distribusi' => $penerima_barang_distribusi,
                    'nama_barang' => $nama_barang,
                    'tanggal_terima_barang' => $tanggal_terima_barang,
                    'tanggal_input_pendistribusian' => $tanggal_input,
                    'tanggal_barang_didistribusi' => $tanggal_barang_didistribusi,
                    'asal_donatur' => $asal_donatur,
                    'pemberi' => $pemberi,
                    'jenis_barang' => $jenis_barang,
                    'kuantitas' => $kuantitas,
                    'satuan' => $satuan,
                    'keterangan_harga' => $keterangan_harga,
                    'kondisi_barang' => $kondisi_barang,
                    'laporan_distribusi' => $laporan_distribusi,

                );
                $this->m_crud->input_data($data,'tb_barangdidistribusi');
                $this->session->set_flashdata('pesan',
                        '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Barang Berhasil Didistribusi!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>');
            }
            }
			$data = [
			'qty' => $jumlah_barang,
			'id_barang' => $id
			];
			$this->m_crud->update_qty($data);
		redirect('data_barang');
		}else{
		$this->session->set_flashdata('pesan',
          '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          Barang Kurang!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>');
		redirect('data_barang');
		}
    }

    public function delete_disimpan($id)
    {
        $where = array('id_barang_disimpan' => $id);
        $this->m_crud->hapus_data($where,'tb_barangdisimpan');
        $this->session->set_flashdata('pesan',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Data Barang di Simpan Berhasil Dihapus!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
        redirect('data_barang/data_barang_disimpan');
    }

    public function delete_didistribusi($id)
    {
        $where = array('id_barang_didistribusi' => $id);
        $this->m_crud->hapus_data($where,'tb_barangdidistribusi');
        $this->session->set_flashdata('pesan',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Data Barang di distribusi Berhasil Dihapus!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
        redirect('data_barang/data_barang_didistribusi');
    }

    public function pindah_barang_skd($id)
    {
		$where = array('id_barang' => $id);
        $brg_simpan = array('id_barang_disimpan' => $this->input->post('id_barang_disimpan'));
		$jumlah_barang = $this->input->post('kuantitas');
		$kuantitas = $this->db->get_where('tb_barangdisimpan', $brg_simpan)->row();

		if($kuantitas->kuantitas >= $jumlah_barang){
                $cekd = $this->db->get_where('tb_barangdidistribusi', $where);
                if($cekd->num_rows() > 0){
                    $jml_simpand = $jumlah_barang;
                    $laporan_distribusi = $_FILES['lp'];
                    if($laporan_distribusi){
                        $configlp['upload_path'] = './assets/uploads/laporan_distribusi';
                        $configlp['allowed_types'] = 'pdf|docx|jpg|png|jpeg';

                        $this->load->library('upload',$configlp);

                        if($this->upload->do_upload('lp')){
                            $lp = $this->upload->data('file_name');
                            $this->db->set('laporan_distribusi',$lp);
                        }else{
                            echo "Gagal Upload";
                        }
                        unset($this->upload);
                    }
                $data = array(
                    'qty' => $jml_simpand,
                    'id_barang' => $id
                );
                $this->m_crud->update_qty_distribusi($data);
                $this->session->set_flashdata('pesan',
                        '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Barang Berhasil Didistribusi!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>');
                }else{
                $id_barang = $this->input->post('id_barang');
                $penerima_barang_distribusi = $this->input->post('penerima_barang_distribusi');
                $nama_barang = $this->input->post('nama_barang');
                $tanggal_terima_barang = $this->input->post('tanggal_terima_barang');
                $tanggal_input = $this->input->post('tanggal_input');
                $tanggal_barang_didistribusi = $this->input->post('tanggal_barang_didistribusi');
                $asal_donatur = $this->input->post('asal_donatur');
                $pemberi = $this->input->post('pemberi');
                $jenis_barang = $this->input->post('jenis_barang');
                $kuantitas = $this->input->post('kuantitas');
                $satuan = $this->input->post('satuan');
                $keterangan_harga = $this->input->post('keterangan_harga');
                $kondisi_barang = $this->input->post('kondisi_barang');
                $laporan_distribusi = $_FILES['lp'];
                if($laporan_distribusi=''){
                }else{
                    $configlp2['upload_path'] = './assets/uploads/laporan_distribusi';
                    $configlp2['allowed_types'] = 'pdf|docx';

                    $this->load->library('upload',$configlp2);
                    if(!$this->upload->do_upload('lp')){

                    }else{
                        $laporan_distribusi = $this->upload->data('file_name');
                    }
                    unset($this->upload);
                }

                $data = array(
                    'id_barang' => $id_barang,
                    'penerima_barang_distribusi' => $penerima_barang_distribusi,
                    'nama_barang' => $nama_barang,
                    'tanggal_terima_barang' => $tanggal_terima_barang,
                    'tanggal_input_pendistribusian' => $tanggal_input,
                    'tanggal_barang_didistribusi' => $tanggal_barang_didistribusi,
                    'asal_donatur' => $asal_donatur,
                    'pemberi' => $pemberi,
                    'jenis_barang' => $jenis_barang,
                    'kuantitas' => $kuantitas,
                    'satuan' => $satuan,
                    'keterangan_harga' => $keterangan_harga,
                    'kondisi_barang' => $kondisi_barang,
                    'laporan_distribusi' => $laporan_distribusi,

                );
                $this->m_crud->input_data($data,'tb_barangdidistribusi');
                $this->session->set_flashdata('pesan',
                        '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Barang Berhasil Didistribusi!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>');
            }
			$data = [
			'qty' => $jumlah_barang,
			'id_barang' => $id
			];
			$this->m_crud->update_qty_simpan_kurang($data);
		redirect('data_barang/data_barang_disimpan');
		}else{
		$this->session->set_flashdata('pesan',
          '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          Barang Kurang!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>');
		redirect('data_barang/data_barang_disimpan');
		}
    }

    public function data_barang_disimpan()
    {
        $data['tb_barang_disimpan'] = $this->m_ambil->tampil_data('tb_barangdisimpan')->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('data_barang_disimpan', $data);
		$this->load->view('templates/footer');
    }

    public function data_barang_didistribusi()
    {
        $data['tb_barang_didistribusi'] = $this->m_ambil->tampil_data('tb_barangdidistribusi')->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('data_barang_didistribusi', $data);
		$this->load->view('templates/footer');
    }

    public function detail_didistribusi($id)
    {
        $where = array('id_barang_didistribusi' => $id);
        $data['tb_barang_didistribusi'] = $this->db->get_where('tb_barangdidistribusi', $where)->result();

        $this->load->view('templates/header');
		$this->load->view('templates/sidebar');
        $this->load->view('data_didistribusi_detail', $data);
		$this->load->view('templates/footer');
    }

    public function detail_didistribusi_aksi($id)
    {
        $laporan_distribusi = $_FILES['ld'];
        if($laporan_distribusi){
            $configld['upload_path'] = './assets/uploads/laporan_distribusi';
            $configld['allowed_types'] = 'pdf|docx|jpg|png|jpeg';

            $this->load->library('upload',$configld);

            if($this->upload->do_upload('ld')){
                $ld = $this->upload->data('file_name');
                $this->db->set('laporan_distribusi',$ld);
            }else{
                echo "Gagal Upload";
            }
            unset($this->upload);
        }
        $this->db->where('id_barang_didistribusi', $id);
        $this->db->update('tb_barangdidistribusi');
        $this->session->set_flashdata('pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Distribusi Berhasil Diupdate!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
        redirect('data_barang/data_barang_didistribusi');
    }

    public function detail_disimpan($id)
    {
        $where = array('id_barang_disimpan' => $id);
        $data['tb_barang_disimpan'] = $this->db->get_where('tb_barangdisimpan', $where)->result();

        $this->load->view('templates/header');
		$this->load->view('templates/sidebar');
        $this->load->view('data_disimpan_detail', $data);
		$this->load->view('templates/footer');
    }

    public function detail_disimpan_aksi($id)
    {
        $laporan_penyimpanan_logistik = $_FILES['lpl'];
        if($laporan_penyimpanan_logistik){
            $configlpl['upload_path'] = './assets/uploads/laporan_penyimpanan_logistik';
            $configlpl['allowed_types'] = 'pdf|docx|jpg|png|jpeg';

            $this->load->library('upload',$configlpl);

            if($this->upload->do_upload('lpl')){
                $lpl = $this->upload->data('file_name');
                $this->db->set('laporan_penyimpanan_logistik',$lpl);
            }else{
                echo "Gagal Upload";
            }
            unset($this->upload);
        }
        $this->db->where('id_barang_disimpan', $id);
        $this->db->update('tb_barangdisimpan');
        $this->session->set_flashdata('pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Simpanan Berhasil Diupdate!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
        redirect('data_barang/data_barang_disimpan');
    }

    public function cetak_laporan_barang()
    {
        $mulai = $this->input->post('tgl_mulai');
        $selesai = $this->input->post('tgl_selesai');

        if($mulai!=null || $selesai!=null){
            $this->db->where('tanggal_terima_barang >=', $mulai);
            $this->db->where('tanggal_terima_barang <=', $selesai);
            $data['tb_barang'] = $this->db->get('tb_barang')->result();
        }else{
            $data['tb_barang'] = $this->m_ambil->tampil_data('tb_barang')->result();
        }
        $this->load->view('templates/header');
        $this->load->view('cetak_laporan_barang', $data);
    }

    public function cetak_laporan_barangdisimpan()
    {
        $mulai = $this->input->post('tgl_mulai');
        $selesai = $this->input->post('tgl_selesai');

        if($mulai!=null || $selesai!=null){
            $this->db->where('tanggal_barang_disimpan >=', $mulai);
            $this->db->where('tanggal_barang_disimpan <=', $selesai);
            $data['tb_barangdisimpan'] = $this->db->get('tb_barangdisimpan')->result();
        }else{
            $data['tb_barangdisimpan'] = $this->m_ambil->tampil_data('tb_barangdisimpan')->result();
        }
        $this->load->view('templates/header');
        $this->load->view('cetak_laporan_barangdisimpan', $data);
    }

    public function cetak_laporan_barangdidistribusi()
    {
        $mulai = $this->input->post('tgl_mulai');
        $selesai = $this->input->post('tgl_selesai');

        if($mulai!=null || $selesai!=null){
            $this->db->where('tanggal_barang_didistribusi >=', $mulai);
            $this->db->where('tanggal_barang_didistribusi <=', $selesai);
            $data['tb_barangdidistribusi'] = $this->db->get('tb_barangdidistribusi')->result();
        }else{
            $data['tb_barangdidistribusi'] = $this->m_ambil->tampil_data('tb_barangdidistribusi')->result();
        }
        $this->load->view('templates/header');
        $this->load->view('cetak_laporan_barangdidistribusi', $data);
    }
}