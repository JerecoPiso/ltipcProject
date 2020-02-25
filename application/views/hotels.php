<!-- header -->
<?php require_once('top_nav.php');?>

<?php  $ret = $this->dashboard_model->get('establishment');?>

<div class="row m-0 min-h">

	<div class="col-lg-1">
		
	</div>
	<div class="col-lg-10 card p-3 mt-4">
    
            <h5 class="mt-2 text-center alert alert-info all-title"><b> <span class="fa fa-building"></span> Hotels / Establishments</b></h5>
     
    <div class="row all-spots">
         	<!-- for the carousel  -->

       <?php 

           if($ret != false){ ?>
         	  
         	  <?php $demoCounter = 1; foreach ($ret as $key => $value) { ?>
         	  	<!-- this is for the photo for the spot categories selected  -->
         		<div class="col-lg-6 mt-3">

         		   <div class="card admin-card">
	         			 <div class="card-header spot-head p-1">
						    <?php  $return = $this->dashboard_model->getHotelPhotos($value->id); ?>
							<div id="demo<?php echo $demoCounter;?>" class="carousel slide demo" data-ride="carousel" >
								<ul class="carousel-indicators">
									<?php 
										$ctr = 0; ?>
										
										
										<?php foreach($return as $key => $values){ ?> 
										
											<li data-target="#demo" data-slide-to="<?php echo $ctr;?>" class="<?php if($ctr == 0){echo 'active';}?>"></li>

										<?php  $ctr++;  } $ctr = 0; ?>
										
									<?php ?>   
								</ul>
								<div class="carousel-inner">

									<?php 						
											$counter = 0; ?>
											<?php foreach($return as $photosValue){ ?>
												<div  class="carousel-item <?php if($counter == 0){ 
													echo 'active';}?>">
												<img  src="<?php echo base_url();?>assets/images/<?= $photosValue->photo ?>" class="spot-photo" >
														
												</div>
											<?php  echo $photosValue->photo; ?>
											

									<?php $counter++;	 }	$counter = 0;  ?>						
								</div>
  
								<a class="carousel-control-prev" href="#demo<?php echo $demoCounter ;?>" data-slide="prev"  v-b-tooltip.hover title="Previous">
									<span class="carousel-control-prev-icon"></span>
								</a>
								<a class="carousel-control-next" href="#demo<?php echo $demoCounter ;?>" data-slide="next"  v-b-tooltip.hover title="Next">
									<span class="carousel-control-next-icon"></span>
								</a>
						</div> <!-- end id demo  for carousel-->
	         				<!-- <img class="spot-photo" src="<?php echo base_url();?>assets/images/<?=$value->photo?>"> -->
	         			 </div>
	         			 <div class="card-body spot-body text-center p-1 spot-name">
	         				  	<?= $value->name?>
	         			 </div>
	         			 <div class="card-footer p-1">
						  <div class="descript">
								<?php if($value->rates != ""){

										echo "<b>Rates:</b>  Php " .$value->rates ."<br>";
										echo "<b>Location:</b>  " .$value->location ."<br>";
										echo "<b>Contact:</b>  " .$value->contact . "<br>";
										echo "<b>Other Details: </b> <br>" . $value->other;
										
							    	}else{

										echo "No description available.";
									} ?>
							
						 </div>
						 
						
						   
							
	         			 </div>
         			</div><!--clas card end-->
         				  	
         		</div><!--class col-lg-4 end-->
         			<?php	  	
         				  	
         			$demoCounter++;	  }/*for each end*/

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

