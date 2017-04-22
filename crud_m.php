<?php
	class Crud_m extends CI_Model{
		function __construct(){
			parent:: __construct();
		}
		function insert($value){
			$data=$this->db->insert('siswa',$value);	
			return $data;
		}
		function get(){
			$this->db->select("*");
			$this->db->from("siswa");
			$data=$this->db->get();
			return $data->result();
		}
		function get_by_nis($where){
			$this->db->where($where);
			$this->db->select("*");
			$this->db->from("siswa");
			$data=$this->db->get();
			
			return $data->$result();
		}
				}
		function insertguru($value){
			$data=$this->db->insert('guru',$value);	
			return $data;
		}
		function get(){
			$this->db->select("*");
			$this->db->from("guru");
			$data=$this->db->get();
			return $data->result();
		}
		function get_by_nip($where){
			$this->db->where($where);
			$this->db->select("*");
			$this->db->from("guru");
			$data=$this->db->get();
			
			return $data->$result();
		}
				}
		function insertpeminjaman($value){
			$data=$this->db->insert('peminjaman',$value);	
			return $data;
		}
		function get(){
			$this->db->select("*");
			$this->db->from("peminjaman");
			$data=$this->db->get();
			return $data->result();
		}
		function get_by_idbuku($where){
			$this->db->where($where);
			$this->db->select("*");
			$this->db->from("peminjaman");
			$data=$this->db->get();
			
			return $data->$result();
		}
	}
?>