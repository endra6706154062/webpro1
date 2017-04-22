<?php
 class Crud extends CI_Controller{
	 function __construct(){
		 parent::__construct();
		 $this->load->model('crud_m');
	 }
	 public function siswa(){
		 $result = $this->crud_m->get();
		 $data['siswa'] = $result;
		 $this->load->view('index',$data);
	 }
	 public function action_insert(){
		 $nim = $this->input->post('nis');
		 $nama = $this->input->post('nama');
		 $kelas = $this->input->post('kelas');
		 $value = array(
			'nim'=>$nim,
			'nama'=>$nama,
			'kelas'=>kelas,
		 );
		 $result = $this->crud_m->insert($value);
		 if($result){
			 echo "data berhasil diinput";
		 }
		 else{
			 echo "data gagal diinput";
		 }
	 }
	 public function insert_buku(){
		 $result = $this->crud_m->get();
		 $data['tb_file'] = $result;
		 $this->load->view('perpustakaan',$data);
	} 
	public function action_upload(){
		 $id = $this->input->post('idbuku');
		 $namabuku = $this->input->post('namabuku');
		 $judul = $this->input->post('judul');
		 $pengarang = $this->input->post('pengarang');
		 $value = array(
			'idbuku'=>$id,
			'namabuku'=>$namabuku,
			'judul'=>$judul,
			'pengarang'=>$pengarang
	);
	if($result){
			 echo "berhasil";
		 }
		 else{
			 echo "gagal";
		 }
	}
	public function viewpeminjaman(){
		 $result = $this->crud_m->get();
		 $data['mahasiswa'] = $result;
		 $this->load->view('*ciew belum dibuat',$data);
	 }
	  public function perpustakaan(){
		 $result = $this->crud_m->get();
		 $data['siswa'] = $result;
		 $this->load->view('index',$data);
	 }
	 public function insert_peminjaman(){
		 $nis = $this->input->post('nis');
		 $nama = $this->input->post('nama');
		 $idbuku = $this->input->post('idbuku');
		 $kelas = $this->input->post('kelas');
		 $value = array(
			'nis'=>$nis,
			'nama'=>$nama,
			'idbuku'=>$idbuku,
			'kelas'=>kelas
		 );
		 $result = $this->crud_m->insert($value);
		 if($result){
			 echo "peminjaman berhasil diinput";
		 }
		 else{
			 echo "peminjaman gagal ";
		 }
	 }
	  public function guru(){
		 $result = $this->crud_m->get();
		 $data['guru'] = $result;
		 $this->load->view('guru',$data);
	 }
	 public function insert_peminjaman(){
		 $nis = $this->input->post('nip');
		 $nama = $this->input->post('nama');
		 $value = array(
			'nip'=>$nip,
			'nama'=>$nama
		 );
		 $result = $this->crud_m->insert($value);
		 if($result){
			 echo "data berhasil diinput";
		 }
		 else{
			 echo "data gagal diinput";
		 }
	 }
 }
 ?>
