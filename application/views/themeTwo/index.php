<?php include "header.php";?>
<!-- get the tourist spot top destination -->
<?php $ret = $this->dashboard_model->get('spots');?>
<?php $topDestination = $this->dashboard_model->getTopDestination();?>
<div class="body">
	        	<div class="w3-content w3-section" style="margin-top: -10px;">
				<div class="leyte" style="text-align:center; text-shadow: 2px 2px 10px black;">
					<h1 style="color: white;"><b style="color: yellow;">Explore</b> the <b style="color: yellow;">Beauty</b> of the <b style="color: yellow;">Province</b> of <b style="color: yellow;">Leyte.</b></h1>
			       </div>
						
					 <?php foreach($ret as $value){?>

						<img class="mySlides" src="<?php echo base_url();?>assets/images/<?= $value->photo?>" width="400" height="250">

				<?php	 } ?>
						
		  	
			</div>
	      </div>
	    </div>
	    <!--
	    <div class="first">
	    	<span>LASDAda asd asd asd asd asd asd asd asd as das da sd asd asd asd as da sd asds a</span>
	    </div>
	-->
	    <div class="nextBody">
	    	<div class="wonders">
	    	<h2 style="color: rgb(0,0,0,0.5);">Top Destinations in Leyte Province.</h2>
	    </div>
	    	<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
				<?php foreach($topDestination as $value) {?>

				<div class="hovereffect">
				
					<img class="img-responsive" src="<?php echo base_url();?>assets/images/<?= $value->photo?>">
			        <div class="overlay">
			            <h2><?= $value->name?></h2>
			            <a class="info" href="<?php echo base_url();?>assets/images/<?= $value->photo?>">View Image</a>
			        </div>
			    </div>

			 <?php	} ?>
			    
			  
			</div>
	    </div>
	   <?php
	   	include 'about.php';
	   ?>
	   <?php
	   	include 'footer.php';
	   ?>
	  </div>
	</div>