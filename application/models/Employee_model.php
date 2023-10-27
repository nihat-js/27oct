<?php
class Employee_model extends CI_Model {

public $name;
public $surname;
public $startDate;
public $position;
public $salary;
public $content;
public $date;

public function getAll()
{
        $query = $this->db->select("*")->left("test_positions name","test_employees.position=test_positions.id",'left')->get('test_employees', );
        return $query->result();
}

public function insert_entry()
{

        $this->date     = time();

        $this->db->insert('entries', $this);
}

public function update_entry()
{
        $this->title    = $_POST['title'];
        $this->content  = $_POST['content'];
        $this->date     = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
}

}
