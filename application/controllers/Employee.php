<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->model("Employee_model");
    $this->load->model("Position_model");
  }



  public function all()
  {
    $data = [];
    $data['employees'] = $this->Employee_model->getAll();
    $data['positions'] = $this->Position_model->getAll();
    $this->load->view('employee/list', $data);
  }
  public function add()
  {
    $data = [];
    $data['positions'] = $this->Position_model->getAll();
    $this->load->view('employee/add', $data);
  }
  public function add_action()
  {

    if ($this->input->method(TRUE) != "POST") {
      $this->output->set_status_header(400);
    }

    $first_name = $this->input->post('firstName');
    $last_name = $this->input->post('lastName');
    $start_date = $this->input->post('startDate');
    $position = $this->input->post('position');
    $salary = $this->input->post('salary');



    if (!$first_name || !$last_name || !$start_date || !$position || !$salary) {
      echo "REQUIRED_FIELDS";
      $this->output->set_status_header(400);
      return false;
    }

    $first_name = trim($first_name);
    $last_name = trim($last_name);

    $arr = [
      'first_name' => $first_name,
      'last_name' => $last_name,
      'start_date' => $start_date,
      'position' => $position,
      'salary' => $salary,
    ];

    $hasError = $this->Employee_model->insertOne($arr);
    if ($hasError) {
      $this->output->set_status_header(404);
      return false;
    }
    $this->output->set_status_header(201);
  }


  public function search_keyword_action()
  {
    $first_name = $this->input->post('firstName');
    $last_name = $this->input->post('lastName');
   
    $arr = [
      'first_name' => $first_name,
      'last_name' => $last_name,
    ];
    $results = $this->Employee_model->searchByKeyword($arr);
    echo json_encode($results);
  }


  public function search_full_action()
  {
    $full_name = $this->input->post('fullName');
    $full_name = trim($full_name);
    $full_name_arr = explode(" ", $full_name);
    $first_name = $full_name_arr[0];
    $last_name = isset($full_name_arr[1]) ? $full_name_arr[1] : NULL;

    $salary_min = $this->input->post('salaryMin');
    $salary_max = $this->input->post('salaryMax');
    $position = $this->input->post("position");



    $arr = [
      'first_name' => $first_name,
      'last_name' => $last_name,
      'salary_min' => $salary_min,
      'salary_max' => $salary_max,
      'position' => $position,

    ];



    $results = $this->Employee_model->search($arr);
    echo json_encode($results);


  }

}
