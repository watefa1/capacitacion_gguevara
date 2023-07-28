<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cosas_model extends CI_Model {

public function save($data){
	$this->db->query("ALTER TABLE cosas AUTO_INCREMENT 1");
	$this->db->insert("cosas",$data);
}

public function saveTag($data)
{
    $this->db->insert("tags", $data);
}


public function saveEtiquetasDB($tag)
{
	$data = array(
		"tag" => $tag
	);
	$this->db->insert("tags", $data);
}

public function getEtiquetasBD()
{
	$query = $this->db->get("tags");
	return $query->result();
}

public function deleteEtiquetasBD($id)
{
	$this->db->where("id", $id);
	$this->db->delete("tags");
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

public function getTags(){
	$this->db->select("*");
	$this->db->from("tags");
	$results=$this->db->get();
	return $results->result();
}

public function getTag($id){
	$this->db->select("t.*");
	$this->db->from("tags t");
	$this->db->where("t.id",$id);
	$results=$this->db->get();
	return $results->row();
}

public function delete($id, $usuario)
{
	$this->db->where('id', $id);
	$this->db->update('cosas', array(
		'eliminado_por' => $usuario,
		'eliminado_en' => date('Y-m-d H:i:s')
	));
}

public function update($data, $id)
{
	$this->db->where("id", $id);
	$this->db->update("cosas", $data);
}

public function buscar_cosas($termino_busqueda)
{
	$this->db->like('cosa', $termino_busqueda);
	$query = $this->db->get('cosas');
	return $query->result();
}

public function getEtiquetas(){
	$this->db->select("*");
	$this->db->from("tags");
	$results=$this->db->get();
	return $results->result();
}

public function saveCosasTags($id_cosa, $id_tags)
{
    foreach ($id_tags as $id_tag) {
        $data = array(
            "cosas_id" => $id_cosa,
            "tags_id" => $id_tag
        );
        $this->db->insert("Cosas_tags", $data);
    }
}

public function getTagsByCosaId($cosa_id){
	$this->db->select("t.*");
	$this->db->from("Cosas_tags ct");
	$this->db->join("tags t", "t.id = ct.tags_id");
	$this->db->where("ct.cosas_id", $cosa_id);
	$results=$this->db->get();
	return $results->result();
}

public function getTagsId($tag_id){
	$this->db->select("t.*");
	$this->db->from("Cosas_tags ct");
	$this->db->join("tags t", "t.id = ct.tags_id");
	$this->db->where("ct.tags_id", $tag_id);
	$results=$this->db->get();
	return $results->result();
}

public function clearTags($cosaId)
{
    $this->db->where('cosas_id', $cosaId);
    $this->db->delete('Cosas_tags');
}

public function addTag($cosaId, $tagId)
{
    $data = array(
        'cosas_id' => $cosaId,
        'tags_id' => $tagId
    );
    $this->db->insert('Cosas_tags', $data);
}

public function guardarCosa($data)
    {
        $this->db->insert('cosas', $data);
    }

	public function obtenerIdPorNombreUsuario($nombreUsuario)
    {
        $this->db->select('id');
        $this->db->where('username', $nombreUsuario);
        $query = $this->db->get('usuarios');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->id;
        } else {
            return null;
        }
    }


}
