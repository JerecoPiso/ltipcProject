<?php
	include 'header.php';
?>

<?php  $ret = $this->dashboard_model->get('spots');?>
<!DOCTYPE html>
<html>
<head>
	<title>Tourists Spots</title>
	<link rel="stylesheet" type="text/css" href="../Project/CSS/spots.css">
</head>
<body style="background-color: rgb(0,163,255);">
	<div class="spots">
		<h2 style="background-color: gold; padding-bottom: 20px; padding-left: 30px; padding-top: 20px;">
				Tourists Spots in Leyte
			</h2>
		<?php foreach($ret as $value){?>

			<div class="kalanggaman">
			<h2><?= $value->name ?></h2>
			
					<img src="<?php echo base_url();?>assets/images/<?= $value->photo?>"  style="max-height: 200px;" width="400">
			</a>
			<span><?= $value->description ?></span>
		</div>
		<hr>

		<?php } ?>
		
	
	</div>
	<?php include 'footer.php'; ?>

</body>
</html>