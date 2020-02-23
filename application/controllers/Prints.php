<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Prints extends CI_Controller {

		function __construct(){
	 			parent::__construct();
				$this->load->helper("URL");
				$this->load->model('dashboard_model');
				//$this->load->library('Pdf');

		
		 }
		function windowsPrint(){
			$this->load->view("dashboard/windowsPrint");

		}




}