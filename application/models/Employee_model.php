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


  private $table_name = "avh_employees";


  public function getAll()
  {
    $query = $this->db
      ->select("avh_employees.* ")
      ->select("avh_positions.name as position_name")
      ->where("avh_employees.deleted_at", NULL)
      ->order_by("avh_employees.created_at", "desc")
      ->join("avh_positions", " avh_employees.position = avh_positions.id", "left")
      ->get($this->table_name);
    $result = $query->result();
    // echo json_encode($result);
    return $result;
  }

  public function getOne($id)
  {
    $query = $this->db
      ->select("*")
      ->where("id", $id)
      ->where("deleted_at", NULL)
      ->get($this->table_name);
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

  public function deleteOne($id)
  {

    // echo time();

    $query = $this->db
      ->where("deleted_at", NULL)
      ->where("id", $id)
      ->update($this->table_name, ['deleted_at' =>  date("Y-m-d H:i:s", time()) ]);
  }

  public function searchByKeyword($arr)
  {
    $this->db->select('first_name, last_name');

    if ($arr['first_name']) {
      $this->db->like('first_name', $arr['first_name'], 'both');
    }
    if ($arr['last_name']) {
      $this->db->like('last_name', $arr['last_name'], 'both');
    }

    $query = $this->db
    ->where("avh_employees.deleted_at", NULL)
    ->get($this->table_name);
    return $query->result();

  }
  public function searchFull($arr)
  {
    $this->db
      ->select("avh_employees.* ")
      ->select("avh_positions.name as position_name")
      ->like('first_name', $arr['first_name'])
      ->where("avh_employees.deleted_at", NULL);



    if ($arr['salary_min']) {
      $this->db->where('salary > ', $arr['salary_min']);
    }

    if ($arr['salary_max']) {
      $this->db->where('salary < ', $arr['salary_max']);
    }

    if ($arr['position'] != -1) {
      $this->db->where('position', $arr['position']);
    }

    $this->db->join("avh_positions", " avh_employees.position = avh_positions.id", "left");

    $query = $this->db
      ->get($this->table_name)

    ;

    return $query->result();
  }

  public function update_entry()
  {
    // $this->title    = $_POST['title'];
    // $this->content  = $_POST['content'];
    // $this->db->update('entries', $this, array('id' => $_POST['id']));
  }
}
