<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Secondtheme extends CI_Controller {

		function __construct(){
	 			parent::__construct();
				$this->load->helper('url');
				$this->load->model("dashboard_model");
	 	}
	 	/*index page of the web app*/
	 	function hotels(){
            $this->load->view('templates/themeTwoHeader');
	 		 $this->load->view('themeTwo/hotels');
			 $this->load->view('templates/themeTwoFooter');
	 		
		 }
		 
		 function spots(){
			$this->load->view('templates/themeTwoHeader');
			$this->load->view('themeTwo/spots');
		    $this->load->view('templates/themeTwoFooter');
		 }
		 function galleries(){
			$this->load->view('templates/themeTwoHeader');
			$this->load->view('themeTwo/galleries');
		    $this->load->view('templates/themeTwoFooter');

		 }
	



}