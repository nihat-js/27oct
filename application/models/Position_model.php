<?php
class Position_model extends CI_Model
{

  // private $id;
  // private $name;
  // private $descrption;
  // private $created_at;

  // private $updated_at;


  public function getAll()
  {
    $query = $this->db->get('avh_positions',);
    return $query->result();
  }

  // public function insert()
  // {


  //     $this->db->insert('entries', $this);
  // }

  // public function update()
  // {

  //     // $this->db->update('entries', $this, array('id' => $_POST['id']));
  // }

}
