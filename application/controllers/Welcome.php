<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct(){
		parent::__construct();
		$this->load->model("Position_model");
		$this->load->model("Employee_model");

	}

	public function index()
	{

		$data = [];
		$positions = $this->position_model->getAll();
		// $employees = $this->employee_model->getAll();
		// var_dump($employees);
		$data["positions"]=$positions;
		  $data['title'] = "My Real Title";
		$this->load->view('employee/list', $data);
	}

	public function add_post()
	{
		echo 'test';
	}
	public function add()
	{
		$name = trim($this->input->post('name'));
		$surname = trim($this->input->post('surname'));
		$hired_date = $this->input->post('hired_date');
		$salary = $this->input->post('salary');
		$this->load->view('employee/add.php');
	}


}
