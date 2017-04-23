<?php
	class siswa_m extends CI_Model
	{
		function construct()
		{
			parent:: construct();
			$this->load->library('input');
			$this->load->library('form_validation');
		}
		
		public function insert_siswa($value){ 
			$result = $this->db->insert("siswa",$value);
			return $result;
		}
		
		function data($number,$offset){
			return $query = $this->db->get("siswa",$number,$offset)->result();		
		}
 
		function jumlah_data(){
			return $this->db->get("siswa")->num_rows();
		}
		
		public function delete_mhs($id){

			$con = array(
				'nisn' => $id
				);
			$even = $this->db->delete("siswa",$con);

			return $even;
		}
		
		function edit_siswa($value ,$where)
		{
			$this->db->where($where);
			$even = $this->db->update("siswa",$value);
			return $even;
		}
		
		function insert_file($data){
			$result = $this->db->insert("tb_file",$data);
			return $result;
		}
		
		function get_file() {
			$this->db->select("*");
			$this->db->from("tb_file");
			$data = $this->db->get();
			if ($data->num_rows() > 0) {
				return $data->result();
			}
		}
	}
?>