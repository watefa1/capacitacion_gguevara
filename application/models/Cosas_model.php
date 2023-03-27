<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cosas_model extends CI_Model {

	public function save($data){
		$this->db->query("ALTER TABLE cosas AUTO_INCREMENT 1");
		$this->db->insert("cosas",$data);
	}

	public function getCosas(){
		$this->db->select("*");
		$this->db->from("cosas");
		$results=$this->db->get();
		return $results->result();
	}

	public function getCosa($id){
		$this->db->select("c.*");
		$this->db->from("cosas c");
		$this->db->where("c.id",$id);
		$results=$this->db->get();
		return $results->row();
	}

	public function delete($id){
		$this->db->where("id",$id);
		$this->db->delete("cosas");

	}

	public function update($data, $id){
		$this->db->where("id",$id);
		$this->db->update("cosas",$data);
	}
	
	public function buscar_cosas($termino_busqueda)
	{
		$this->db->like('cosa', $termino_busqueda);
		$query = $this->db->get('cosas');
		return $query->result();
	}
}
