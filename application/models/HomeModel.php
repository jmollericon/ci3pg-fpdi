<?php
class HomeModel extends CI_Model {

  public function __construct() {
      parent::__construct();
  }
  public function getArchivos() {
    $this->db->select('*');
    return $this->db->get('archivo')->result();
  }
  public function getArchivoById($id) {
    $this->db->select('*');
    $this->db->where('id', $id);
    return $this->db->get('archivo')->row();
  }
  public function guardarArchivoNombre($data) {
    return $this->db->insert('archivo', $data);
  }
}