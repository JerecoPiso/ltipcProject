<?php require_once('top_nav.php');?>
<!-- get the tourist spots -->
<?php $ret = $this->dashboard_model->get('spots');?>
<!-- get the tourist spot top destination -->
<?php $topDestination = $this->dashboard_model->getTopDestination();?>

<!-- for the carousel  -->
<div id="demo" class="carousel slide ml-4 mr-4 mt-2 mb-2 demo" data-ride="carousel" >
	  <ul class="carousel-indicators">
	  	<?php 
	  		 $ctr = 0;
	  	     foreach ($ret as $key => $value) { ?>
	  	      <li data-target="#demo" data-slide-to="<?php echo $ctr;?>" class="<?php if($ctr == 0){echo 'active';}?>"></li>
		
	  	<?php $ctr++; } ?>   
	  </ul>
	  <div class="carousel-inner">

	  	<?php 

	  		if($ret != ""){
	  			$counter = 0;
	  			foreach ($ret as $key => $value) { ?>	
	  			<div  class="carousel-item <?php if($counter == 0){ 
                         echo 'active';}?>">
					  <img  src="<?php echo base_url();?>assets/images/<?= $value->photo?>" class="carousel-img" >
					  
				      <div class="carousel-caption spot-caption">
				        <h3><?= $value->name?></h3>
				        <p></p>
					  </div>
					     
				</div>


	  	<?php	$counter++;	}

	  		} ?>
	    
	  </div>
  	  <!-- carousel controls for next and previous photo -->
	  <a class="carousel-control-prev" href="#demo" data-slide="prev"  v-b-tooltip.hover title="Previous">
	    <span class="carousel-control-prev-icon"></span>
	  </a>
	  <a class="carousel-control-next" href="#demo" data-slide="next"  v-b-tooltip.hover title="Next">
	    <span class="carousel-control-next-icon"></span>
	  </a>
</div><!-- id demo end-->

   <!-- most popular spot destination -->
   <h5 class="text-center top-destination-title">Top Destination</h5>
   <div class="card m-4">

		<div class='row top-destination'>
			<?php 	foreach ($topDestination as $key => $values) { ?>	

				<div class="col-lg-4">
					
						<div class="photos">
							<img src="<?php echo base_url();?>assets/images/<?= $values->photo?>" class="top-destination-photo">
							<div class="middle">
								<div class="text"><?= $values->name ?></div>
							</div>
						</div>
		
				</div> 

				<?php } ?>	
				
		</div>

	</div><!-- class card-end-->
  <!-- world map-->
   <iframe class="p-4" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1003054.5961105291!2d124.15748731331618!3d10.87375669210104!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3307edc695e239e1%3A0x8faf820ff8faf2d3!2sLeyte!5e0!3m2!1sen!2sph!4v1581313266656!5m2!1sen!2sph" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
	    
   <!-- <div class="row">
	   <div class="col-lg-4 p-4">
		 <a href="" class="food-delicacies">Foods & Delicacies
			 
		 </a>
	   </div>
	   <div class="col-lg-4">

		</div>
		<div class="col-lg-4">

		</div>
   </div> -->