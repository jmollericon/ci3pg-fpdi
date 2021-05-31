<?php
class HomeModel extends CI_Model {

  public function __construct() {
      parent::__construct();
  }
  public function getProductos() {
    $this->db->select('*');
    return $this->db->get('producto')->result();
  }
}