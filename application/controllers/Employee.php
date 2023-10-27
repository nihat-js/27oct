<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {




	public function index()
	{
		$this->load->view('employee/list.php');
	}
	public function add_data(){

	}
	public  function add () {
		$name = trim($this->input->post('name'));
		$surname = trim($this->input->post('surname'));
		$hired_date = $this->input->post('hired_date');
		$salary = $this->input->post('salary');
		$this->load->view('employee/add.php');
	}

	
}
