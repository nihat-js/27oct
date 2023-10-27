<?php
class Position_model extends CI_Model
{

    private $id;
    private $name;
    private $descrption;
    private $created_at;

    private $updated_at;

    public function __construct(){
    }

    public function getAll()
    {
      echo "line15";
        $query = $this->db->get('test_positions', );
        return $query->result();
    }

    public function insert()
    {

        $this->date = time();

        $this->db->insert('entries', $this);
    }

    public function update()
    {

        // $this->db->update('entries', $this, array('id' => $_POST['id']));
    }

}
