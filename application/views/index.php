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
   <h5 class="text-center top-destination-title">Most Popular Destination</h5>
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
  