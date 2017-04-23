<?php
	class siswa extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('siswa_m');
		}
		
		public function index()
		{
			$this->load->view('index');
		}
		
		public function proses_input(){
			$this->form_validation->set_rules('nama', 'Nama', 'required');
			$this->form_validation->set_rules('nisn', 'NISN', 'required|numeric');
			$this->form_validation->set_rules('tl', 'Tempat Lahir', 'required');
			$this->form_validation->set_rules('tgl', 'Tanggal', 'required');
			$this->form_validation->set_rules('agama', 'Agama', 'required');
			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('index');
			}
			else
			{
				$nama = $this->input->post('nama');
				$nisn = $this->input->post('nisn');
				$tl = $this->input->post('tl');
				$tgl = $this->input->post('tgl');
				$agama = $this->input->post('agama');

				$value = array(
					'nama' => $nama,
					'nisn' => $nisn,
					'tl' => $tl,
					'tgl' => $tgl,
					'agama' => $agama
					);
					
				$insert = $this->siswa_m->insert_siswa($value); 
				if($insert){
					echo "<script>alert ('data berhasil di inputkan');</script>";
					redirect('siswa/view_mhs');
				}
				else{
					echo "gagal";
				}
			}
		}
		
		public function view_mhs(){
			$this->load->database();
			$jumlah_data = $this->siswa_m->jumlah_data();
			$this->load->library('pagination');
			$config['base_url'] = base_url().'index.php/siswa/view_mhs/';
			$config['total_rows'] = $jumlah_data;
			$config['per_page'] = 10;
			$from = $this->uri->segment(3);
			$this->pagination->initialize($config);		
			$data['user'] = $this->siswa_m->data($config['per_page'],$from);
			$this->load->view('table',$data);
		}
		
		public function delete_siswa($id){
			$del = $this->siswa_m->delete_mhs($id);
			if($del){
				redirect('siswa/view_mhs');
			}
			else{
				echo "Gagal Men-delete Siswa!";
			}		
		}
		
		public function edit_siswa($nisn)
		{
			$data['nisn'] = $nisn;
			$this->load->view('edit_siswa',$data);
		}
		
		public function action_edit_mhs($nim)
		{
			$nama = $this->input->post('nama');
			$tl = $this->input->post('tl');
			$tgl = $this->input->post('tgl');
			$agama = $this->input->post('agama');
			$where['nisn'] = $nisn;
			$value = array(
				'nama' => $nama,
				'tl' => $tl,
				'tgl' => $tgl,
				'agama' => $agama
			);
			$update = $this->siswa_m->edit_siswa($value,$where);
			if($update){
				redirect('siswa/view_mhs');
			}
			else{
				echo "gagal";
			}
		}
		
		public function activity(){
			$file = $this->siswa_m->get_file();
			$data['file'] = $file;
			$this->load->view('upload',$data);
		}
		
		public function upload_file(){
			$this->load->library('upload');
			$nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
			$config['upload_path'] = './upload/'; //path folder
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
			$config['max_size'] = '2048'; //maksimum besar file 2M
			$config['max_width']  = '1288'; //lebar maksimum 1288 px
			$config['max_height']  = '768'; //tinggi maksimu 768 px
			$config['file_name'] = $nmfile; //nama yang terupload nantinya
	 
			$this->upload->initialize($config);
			 
			if($_FILES['filefoto']['name'])
			{
				if ($this->upload->do_upload('filefoto'))
				{
					$value = $this->upload->data();
					$data = array(
					  'nama_file' =>$value['file_name'],
					  'tipe_file' =>$value['file_type'],
					  'judul' =>$this->input->post('judul')
					);
	 
					$this->siswa_m->insert_file($data); //akses model untuk menyimpan ke database
					//pesan yang muncul jika berhasil diupload pada session flashdata
					echo "<script>alert ('Profile Berhasil di Update'); window.location.href='".base_url()."index.php/siswa/activity'</script>";//jika berhasil maka akan ditampilkan form upload
				}else{
					//pesan yang muncul jika terdapat error dimasukkan pada session flashdata
					echo "<script>alert ('Profile gagal di Update'); window.location.href='".base_url()."index.php/siswa/activity'</script>"; //jika gagal maka akan ditampilkan form upload
				}
		 	}
		}
	}
?>