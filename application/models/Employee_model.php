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


  private $table_name="avh_employees";


  public function getAll()
  {
    $query = $this->db->select("*")->where("deleted_at", NULL)->order_by("created_at","desc")->get($this->table_name);
    return $query->result();
  }

  public function getOne($id){
    $query = $this->db->select("*")->where("id",$id)->where("deleted_at", NULL)->get($this->table_name);
    return $query->row();
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

  public function searchByKeyword($arr){
    $this->db->select('first_name, last_name');

    if (!empty($arr['first_name'])){
      $this->db->like('first_name',$arr['first_name'],'after');
    }
    if (!empty($arr['last_name'])){
      $this->db->like('last_name',$arr['last_name'],'after');
    }

    $query = $this->db->get($this->table_name);
    return $query->result();

  }

  public function searchFull($arr){
    $this->db->select("*")->like('first_name',$arr['first_name']);


    if (is_numeric($arr['salary_min'] ?? null) ){
      echo "works".$arr['salary_min'];
      $this->db->where('salary > ',$arr['salary_min']);
    }

    if (is_numeric($arr['salary_max'] ?? null )){
      $this->db->where('salary < ',$arr['salary_max']);
    }

    if ($arr['position'] != -1){
      $this->db->where('position' , $arr['position']);
    }
    
    $query = $this->db->get($this->table_name);

    // echo "query is".json_encode($query);
    return $query->result();
  }

  public function update_entry()
  {
    // $this->title    = $_POST['title'];
    // $this->content  = $_POST['content'];
    // $this->db->update('entries', $this, array('id' => $_POST['id']));
  }
}
