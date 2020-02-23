<?php
	include 'header.php';
?>
<?php  $ret = $this->dashboard_model->get('establishment');?>
<!DOCTYPE html>
<html>
<head>
	<title>Hotels</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../Project/CSS/hotels.css">
</head>
<body style="background-color: rgb(0,163,255);">
	<div class="hotels">
			<h2 style="background-color: gold; padding-bottom: 20px; padding-left: 30px; padding-top: 20px;">
				Hotels Around Leyte
			</h2>
	    <?php foreach($ret as $value){ ?>

			<div class="summit">
			<h2><?= $value->name ?></h2>
			<a href="<?php echo base_url();?>assets/images/<?= $value->photo?>">
			
				<img src="<?php echo base_url();?>assets/images/<?= $value->photo?>"  height="250" width="400">
			</a>
			<h3>&#8369;<?= $value->rates?></h3>
			<!-- <div class="stars">
				<h4>4.4
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star checked"></span>
				<i class="fa fa-star-half-full" style="color: orange;"></i>
				</h4>
			</div> -->
			<div class="location">

				<p><span class="fa fa-map-marker"></span> <b><?= $value->location?></b></p>
				<h6 style=""><?= $value->other ?>
				</h6>
			</div>
		</div>
		<hr>


	<?php	} ?>
		
		
	</div>
	<?php
		include 'footer.php';
	?>

</body>
</html>