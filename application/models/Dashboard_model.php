<?php
	
	class Dashboard_model extends CI_Model{

		function __construct(){
			parent::__construct();
			$this->load->database();		
		}
		//function for the login of the admin
 		public function adminLogin($data){
 			$query = $this->db->get_where('admin', array('name'=> $data['username']));
 			
 			if($query->num_rows() >= 1){

 					return $query->row_array();

 			}else{

 				return false;
 			}
 			
 		}
 		function accountRecovery($data){

 			/*$query = $this->db->where('admin', array('name'=> $data['username'], 'hint' => $data['hint']));*/
 			$this->db->where('admin.name', $data['username']);
 			$this->db->where('admin.hint', $data['hint']);
 			$query = $this->db->get('admin');

 			if($query->num_rows() >= 1){

 					return $query->row_array();

 			}else{

 				return false;
 			}

 		}
 		/*count the data entries in selected tables*/
 		function counter($table){
 			$query = $this->db->get($table);
 			return $query->num_rows();

		 }
		 /*check if what theme is in used*/
		 public function selectTheme(){
			$this->db->where("themeused.status", "used");
			$ret = $this->db->get("themeused");

			return $ret->row_array();

		 }
 		/*setting the admins info to be displayed in the admin panel*/
 		function setAdminInfo($id){

 			$this->db->where('admin.id', $id);
 			$ret = $this->db->get('admin');

 			if($ret->num_rows() < 1){

 				return false;

 			}else{

 				return $ret->row_array();

 			}

 		}
 		/*update photo of the tourist spot*/
		function updatePhoto($file,$id){
			$array = array('photo' => $file);
			$this->db->where('spots.id',$id);
			return $this->db->update('spots', $array);
		}
		/*function for getting datas in some tables*/
		function get($table){

			$ret = $this->db->get($table);

			return $ret->result();
		}
		function getSpotsToPrint($table){
			$this->db->from($table);
			$this->db->order_by($table.".municipality");
			$ret = $this->db->get();
			return $ret->result();
		}
		/*getting the spots to print in the pdf*/
		// function getSpotToPrint($table,$name){
		// 	$this->db->where($table.'.municipality', $name);
		// 	$this->db->group_by($table.'.category');
		// 	$ret = $this->db->get($table);

		// 	return $ret->result();
		// }
		public function getTopDestination(){
			$this->db->select('spots.id, spots.name, spots.photo, spots.category');
			$this->db->from('spots');
			$this->db->join('top_destination', 'spots.id = top_destination.spot_id');
			$this->db->order_by("top_destination.id");
			$ret = $this->db->get();

			return $ret->result();

		}
		/*check if the municipalities has its name entry in the tourist spot*/
		function spotChecker($table,$name){

			$this->db->where($table.'.municipality', $name);
			$ret = $this->db->get($table);

			return $ret->num_rows();

		}
		/*function for inserting datas to database*/
		function Add($data,$table){

			$this->db->where($table.'.name', $data['name']);
			$ret = $this->db->get($table);

			if($ret->num_rows() >= 1){

				return $data['name'] . " is already existed!";

			}else{

				if($this->db->insert($table, $data)){

					return "Added succesfully";

				}else{

					return "Error";
				}

			}
			
		}
		/*function for adding most popular destination*/
		function popularDestination($data,$table){

			// $this->db->where($table.'.name', $data['name']);
			// $ret = $this->db->get($table);

			// if($ret->num_rows() >= 1){

			// 	return $data['name'] . " is already existed!";

			// }else{

				if($this->db->insert($table, $data)){
					$status['top_destination_status'] = "Yes";
					$this->db->where('spots.id', $data['spot_id']);
				
					$this->db->update('spots', $status);
					return "Added succesfully";

				}else{

					return "Error";
				}

			// }
			
		}
		function useTheme($data){
			$status['status'] = "unused";
			if($this->db->update("themeused", $status)){
				$this->db->where("themeused.id", $data['id']);
				$stat['status'] = "used";
				if($this->db->update("themeused", $stat)){

					return "Changed successfully.";

				}else{

					return "Cannot changed theme!";
					
				}

			}else{

				return "Cannot changed theme!";
			}
			
		}
		function unuseTheme($data){
			$status['status'] = "used";
			if($this->db->update("themeused", $status)){
				$this->db->where("themeused.id", $data['id']);
				$stat['status'] = "unused";
				if($this->db->update("themeused", $stat)){

					return "Changed successfully.";

				}else{

					return "Cannot changed theme!";
					
				}

			}else{

				return "Cannot changed theme!";
			}
			
		}
		/*function for deleting a data in database*/
		public function Delete($id,$table){

				$this->db->where($table.'.id', $id);
				if($this->db->delete($table)){

					return "Deleted succesfully";
				}else{

					return "Error";
				}		
			
		}
		/*function for deleting a data in database*/
		public function removeTopDestination($id,$table){

			$this->db->where($table.'.spot_id', $id);
			if($this->db->delete($table)){

				$status['top_destination_status'] = "";
				$this->db->where('spots.id', $id);
			
				$this->db->update('spots', $status);
			
				return "Deleted succesfully";
			}else{

				return "Error";
			}		
		
	}
		/*function for edting datas in table*/
		public function Edit($data,$id,$table){
  			$this->db->where($table.'.id != ', $id);
			$this->db->where($table.'.name', $data['name']);
			$ret = $this->db->get($table);

			if($ret->num_rows() >= 1){

				return $data['name'] . " is already existed!";

			}else{
				
				$this->db->where($table.'.id', $id);
				if($this->db->update($table, $data)){

					return "Updated succesfully";

				}else{

					return "Error";
				}

			}		
		}
		/*function for edting datas in table*/
		public function EditSpotEstablishmentPhoto($data,$id,$table){
		
			  $this->db->where($table.'.id', $id);
			  if($this->db->update($table, $data)){

				  return "Updated succesfully";

			  }else{

				  return "Error";
			  }

		
	  }
		/*function for edting the desription of the tourist spot*/
		public function EditDesc($data,$id,$table){
		
		
			  $this->db->where($table.'.id', $id);
			  if($this->db->update($table, $data)){

				  return "Updated succesfully";

			  }else{

				  return "Error";
			  }	
	  }
		/*function for edting datas in table*/
		public function newPassword($data,$id,$table){
  					
				$this->db->where($table.'.id', $id);
				if($this->db->update($table, $data)){

					return "Password successfully changed.";

				}else{

					return "Error";
				}

				
		}
	
		/*edit the admins info only and its security*/
		public function EditInfo($data,$id,$table){
  			
				
				$this->db->where($table.'.id', $id);
				if($this->db->update($table, $data)){

					return "Updated succesfully";

				}else{

					return "Error";
				}

					
		}
		public function municipalities(){
			$this->db->select('municipality.id, municipality.name, district.name AS dist_name');
			$this->db->from('municipality');
			$this->db->join('district', 'municipality.district_id = district.id');
			$this->db->order_by("district.name");
			$ret = $this->db->get();

			return $ret->result();

		}
	}