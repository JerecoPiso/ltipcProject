<!-- header -->
<?php require_once('top_nav.php');?>

<?php  $ret = $this->dashboard_model->get('establishment');?>

<div class="row m-0 min-h">

	<div class="col-lg-1">
		
	</div>
	<div class="col-lg-10">
    
            <h5 class="mt-2 text-center alert alert-info all-title"><b> <span class="fa fa-building"></span> Hotels / Establishments</b></h5>
     
    <div class="row all-spots">
         	
       <?php 

           if($ret != false){ ?>
         	  
         	  <?php foreach ($ret as $key => $value) { ?>
         	  	<!-- this is for the photo for the spot categories selected  -->
         		<div class="col-lg-4 mt-3">

         		   <div class="card admin-card">
	         			 <div class="card-header spot-head p-1"> 
	         				<img class="spot-photo" src="<?php echo base_url();?>assets/images/<?=$value->photo?>">
	         			 </div>
	         			 <div class="card-body spot-body text-center p-1 spot-name">
	         				  	<?= $value->name?>
	         			 </div>
	         			 <div class="card-footer p-1">
						  <div class="descript">
								<?php if($value->rates != ""){

										echo "<b>Rates:</b> " .$value->rates ."<br>";
										echo "<b>Location:</b> " .$value->location ."<br>";
										echo "<b>Contact:</b> " .$value->contact;
										
							    	}else{

										echo "No description available.";
									} ?>
							
							</div>
							
	         			 </div>
         			</div><!--clas card end-->
         				  	
         		</div><!--class col-lg-4 end-->
         			<?php	  	
         				  	
         				  }/*for each end*/

         			?>
         		

         	 <?php  }else{ ?>


         	 		<div class="col-lg-12">

         	 			<h5 class="text-center no-result">No result found</h5>
         	 
         	 		</div>
         	 
         	 		

	         <?php	}/*end for the checking if the result of the query is false */


	         	

	         ?>
         	  
         	 </div><!--class row end-->
            
           
	</div>
	<div class="col-lg-1">
		
	</div>
</div>

