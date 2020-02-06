<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Uploader extends CI_Controller {

		function __construct(){
	 			parent::__construct();
				$this->load->helper('url');
				$this->load->library('session');
				$this->load->model('dashboard_model');
				//$this->load->model('main_model');
				//$this->load->library('Pdf');
				//$this->load->library('unit_test');

	 	}
	 	//inserting new to spot to the database
	 	public function addEstablishment(){

	    $output = array('error' => false);
	    //check if the filename is not empty
        if(!empty($_FILES['file']['name'])){

        	//upload path of the file
            $config['upload_path'] = 'assets/images/';
            $config['file_name'] = $_FILES['file']['name'];
            //allowed MIME type of the file
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            
            //check if true uploading the file to the path
            if($this->upload->do_upload('file')){
                $uploadData = $this->upload->data();
                $filename = $uploadData['file_name'];

				$file['filename'] = $filename;
                //get the data from the users input
				$data['name'] = $_POST['name'];
				$data['location'] = $_POST['location'];
				$data['rates'] = $_POST['rates'];
				$data['contact'] = $_POST['contact'];
				$data['photo'] = $file['filename'];
				
				//call the add function in the model	
				$query = $this->dashboard_model->Add($data,'establishment');
				//check if the return of query is not empty
				if($query != ""){
					
					$output['error'] = false;
					$output['message'] = $query;

				}
				else{
					$output['error'] = true;
					$output['message'] = 'Photo uploaded but not inserted to database';
				}

            }else{

            	$output['error'] = true;
				$output['message'] = 'Cannot upload photo';
				//$output['message'] = $_FILES['file']['name'];
            }

        }else{

        	$output['error'] = true;
			$output['message'] = 'Cannot upload empty photo';
        }

        echo json_encode($output);

	 	}
	 	//controller for the editing the  profile
	 	public function editEstablishment(){
	 		
	    $output = array('error' => false);
	    //check if the filename is not empty
        if(!empty($_FILES['file']['name'])){

        	//upload path of the file
            $config['upload_path'] = 'assets/images/';
            $config['file_name'] = $_FILES['file']['name'];
            //allwoed MIME type of the file
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            
            //check if true uploading the file to the path
            if($this->upload->do_upload('file')){
                $uploadData = $this->upload->data();
                $filename = $uploadData['file_name'];

				$file['filename'] = $filename;
                //get the data from the users input
                 //get the data from the users input
				$data['name'] = $_POST['name'];
				$data['location'] = $_POST['location'];
				$data['rates'] = $_POST['rates'];
				$data['contact'] = $_POST['contact'];
				$id = $_POST['id'];
				$data['photo'] = $file['filename'];
				
				//call the add function in the model	
				$query = $this->dashboard_model->EditInfo($data,$id,'establishment');
				//check if the return of query is not empty
				if($query != ""){
					
					$output['error'] = false;
					$output['message'] = $query;

				}
				else{
					$output['error'] = true;
					$output['message'] = 'Photo uploaded but not inserted to database';
				}

            }else{

            	$output['error'] = true;
				$output['message'] = 'Cannot upload photo';
				//$output['message'] = $_FILES['file']['name'];
            }

        }else{

        	$output['error'] = true;
			$output['message'] = 'Cannot upload empty photo';
        }

        echo json_encode($output);
		}
		 
		//controller for the editing the  tourist spots
		public function editSpots(){
	
			$output = array('error' => false);
		   //check if the filename is not empty
		   if(!empty($_FILES['file']['name'])){
   
			   //upload path of the file
			   $config['upload_path'] = 'assets/images/';
			   $config['file_name'] = $_FILES['file']['name'];
			   //allwoed MIME type of the file
			   $config['allowed_types'] = 'gif|jpg|png|jpeg';
			   
   
			   $this->load->library('upload', $config);
			   $this->upload->initialize($config);
			   
			   //check if true uploading the file to the path
			   if($this->upload->do_upload('file')){
				   $uploadData = $this->upload->data();
				   $filename = $uploadData['file_name'];
   
				   $file['filename'] = $filename;
   
				   $data['name'] = $_POST['name'];
				   $data['municipality'] = $_POST['municipality'];
				   $data['district'] = $_POST['district'];
				   $data['category'] = $_POST['category'];
				   $data['photo'] = $file['filename'];
				   $id = $_POST['id'];
   
				   //call the function for editing
				   $query = $this->dashboard_model->Edit($data,$id,'spots');
				   if($query != ""){
					   
					   $output['error'] = false;
					   $output['message'] = 'Spot changed successfully';
   
				   }
				   else{
					   $output['error'] = true;
					   $output['message'] = 'File uploaded but not inserted to database';
				   }
   
			   }else{
				   $output['error'] = true;
				   $output['message'] = 'Cannot upload file';
				   //$output['message'] = $_FILES['file']['name'];
			   }
		   }else{
			   $output['error'] = true;
			   $output['message'] = 'Cannot upload empty file';
		   }
   
		   echo json_encode($output);
   
			}


				//controller for the editing the  profile
				public function editDp(){
	 		
					$output = array('error' => false);
					//check if the filename is not empty
					if(!empty($_FILES['file']['name'])){
			
						//upload path of the file
						$config['upload_path'] = 'assets/images/';
						$config['file_name'] = $_FILES['file']['name'];
						//allwoed MIME type of the file
						$config['allowed_types'] = 'gif|jpg|png|jpeg';
						
			
						$this->load->library('upload', $config);
						$this->upload->initialize($config);
						
						//check if true uploading the file to the path
						if($this->upload->do_upload('file')){
							$uploadData = $this->upload->data();
							$filename = $uploadData['file_name'];
			
							$file['filename'] = $filename;
							//get the data from the users input
							$id = $_POST['id'];
							$data['photo'] = $file['filename'];
							
							//call the add function in the model	
							$query = $this->dashboard_model->EditInfo($data,$id,'admin');
							//check if the return of query is not empty
							if($query != ""){
								
								$output['error'] = false;
								$output['message'] = $query;
			
							}
							else{
								$output['error'] = true;
								$output['message'] = 'Photo uploaded but not inserted to database';
							}
			
						}else{
			
							$output['error'] = true;
							$output['message'] = 'Cannot upload photo';
							//$output['message'] = $_FILES['file']['name'];
						}
			
					}else{
			
						$output['error'] = true;
						$output['message'] = 'Cannot upload empty photo';
					}
			
					echo json_encode($output);
					 }
		//signup admin
		public function signup(){

			$output = array('error' => false);
			//check if the filename is not empty
			if(!empty($_FILES['file']['name'])){
	
				//upload path of the file
				$config['upload_path'] = 'assets/images/';
				$config['file_name'] = $_FILES['file']['name'];
				//allwoed MIME type of the file
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				
	
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				
				//check if true uploading the file to the path
				if($this->upload->do_upload('file')){
					$uploadData = $this->upload->data();
					$filename = $uploadData['file_name'];
	
					$file['filename'] = $filename;
					//get the data from the users input
					$data['name'] = $_POST['name'];
					$data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
					$data['hint'] = $_POST['hint'];
					$data['photo'] = $file['filename'];
					
					//call the add function in the model	
					$query = $this->dashboard_model->Add($data,'admin');
					//check if the return of query is not empty
					if($query != ""){
						
						$output['error'] = false;
						$output['message'] = $query;
	
					}
					else{
						$output['error'] = true;
						$output['message'] = 'Photo uploaded but not inserted to database';
					}
	
				}else{
	
					$output['error'] = true;
					$output['message'] = 'Cannot upload photo';
					//$output['message'] = $_FILES['file']['name'];
				}
	
			}else{
	
				$output['error'] = true;
				$output['message'] = 'Cannot upload empty photo';
			}
	
			echo json_encode($output);
	
			 }
	
			//inserting new to spot to the database
		public function addSpot(){

			$output = array('error' => false);
			//check if the filename is not empty
			if(!empty($_FILES['file']['name'])){
	
				//upload path of the file
				$config['upload_path'] = 'assets/images/';
				$config['file_name'] = $_FILES['file']['name'];
				//allwoed MIME type of the file
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				
	
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				
				//check if true uploading the file to the path
				if($this->upload->do_upload('file')){
					$uploadData = $this->upload->data();
					$filename = $uploadData['file_name'];
	
					$file['filename'] = $filename;
					//get the data from the users input
					$data['name'] = $_POST['name'];
					$data['municipality'] = $_POST['municipality'];
					$data['district'] = $_POST['district'];
					$data['category'] = $_POST['category'];
					$data['photo'] = $file['filename'];
					
					//call the add function in the model	
					$query = $this->dashboard_model->Add($data,'spots');
					//check if the return of query is not empty
					if($query != ""){
						
						$output['error'] = false;
						$output['message'] = 'Spot added successfully';
	
					}
					else{
						$output['error'] = true;
						$output['message'] = 'File uploaded but not inserted to database';
					}
	
				}else{
	
					$output['error'] = true;
					$output['message'] = 'Cannot upload file';
					//$output['message'] = $_FILES['file']['name'];
				}
	
			}else{
	
				$output['error'] = true;
				$output['message'] = 'Cannot upload empty file';
			}
	
			echo json_encode($output);
	
			 }
}