<?php
class Employee_model extends CI_Model
{

  public $first_name;
  public $last_name;
  public $start_date;
  public $position;
  public $salary;
  private $created_at;
  private $updated_at;
  private $deleted_at;

  public function getAll()
  {
    $query = $this->db->select("*")->where("deleted_at", NULL)->order_by("created_at","desc")->get('avh_employees');
    return $query->result();
  }

  public function insertOne($arr)
  {
    try {
      $this->db->insert('avh_employees', $arr);
    } catch (Exception $e) {
      return $e;
    }
  }

  public function deleteOne($id){
    // $query = $this->db->
  }

  public function update_entry()
  {
    // $this->title    = $_POST['title'];
    // $this->content  = $_POST['content'];
    // $this->db->update('entries', $this, array('id' => $_POST['id']));
  }
}
