<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Prints extends CI_Controller {

		function __construct(){
	 			parent::__construct();
				
				$this->load->model('dashboard_model');
				$this->load->library('Pdf');

		
	 	}
	 	function printSpot(){


				$pdf = new Pdf('L', 'mm', 'A4-L', true, 'UTF-8', false);


				$pdf->AddPage();
				$pdf->Cell(50,10,'Date:'.date('d-m-Y').'',0,"R");
				$pdf->Ln(10);
				$pdf->Image('http://localhost/LTIPC/assets/images/ltipc.png',90,20,25);
				$pdf->Ln(25);
				$html = '<h4 style="text-align: center;letter-spacing: 2px;"><br><b>LEYTE TOURISM INVESTMENT <br> PROMOTION CENTER</b></h4>';

				$pdf->writeHTML($html, true, 0, true, true);
				
				$html = '<h4><b>Tourist Spots in Leyte</b></h4>';
					
				$pdf->writeHTML($html, true, 0, true, true);
				
				$pdf->SetTitle("LTIPC");
				$pdf->SetTopMargin(15);
				$pdf->SetFooterMargin(0);
				$pdf->SetAutoPageBreak(true);
				$pdf->SetAuthor('LTIPC');
				$pdf->SetDisplayMode('real', 'default');
			
				$ret = $this->dashboard_model->municipalities();
				if($ret != ""){

					foreach($ret as $values){

						$checker = $this->dashboard_model->spotChecker('spots',$values->name);
						if($checker > 0){

							$pdf->Ln(8);
						
							//  $html = '<h3 style="font-size: 15px;border: 1px solid black;"> '.$values->name.'</h3>';
							//  $pdf->writeHTML($html, true, 0, true, true);
							 $pdf->Cell(190,8,$values->name,1);
							$pdf->Ln(8);
							
						    // $pdf->Cell(10,8,"df",1);
							// $pdf->Cell(40,8,$values->name,1);
							// $pdf->Cell(45,8,$values->name,1);
							// $pdf->Cell(45,8,$values->name,1);
							// $pdf->Cell(50,8,$values->name,1);
						}
						
					
					$spots = $this->dashboard_model->getSpotToPrint('spots',$values->name);

					if($spots != ""){
						$ctr = -10;
						
						foreach ($spots as $key => $spot) {
								 	
					      
						// $html = '<p style="font-size:14px;border: 1px solid black;
						// 	  "> '.($key + 1).".  " . $spot->name." ( <i>" .$spot->category."</i> )".'</p>';

						// $pdf->writeHTML($html, true, 0, true, true);
						  
						     $pdf->Cell(95,8,$spot->name,1);
							 $pdf->Cell(45,8,$spot->category,1);
							
							 $pdf->Cell(50,8,$values->name,1);
						     $pdf->Ln(8);
						
				
		

						}


						
					    
					}
													
				}
				$html = '<p style="border-top: 1px solid black;
							   "></p>';

			  $pdf->writeHTML($html, true, 0, true, true);
		   }else{

		   	$pdf->Cell(190,8,"No municipalities that are inserted in the database",1,2,"C");


		   }
				
				$data = $pdf->Output('My-File-Name.pdf', 'I');
	 	}




}