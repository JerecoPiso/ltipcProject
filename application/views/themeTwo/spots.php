<?php
	include 'header.php';
?>

<?php  $ret = $this->dashboard_model->get('spots');?>
<!DOCTYPE html>
<html>
<head>
	<title>Tourists Spots</title>
	
</head>
<body style="background-color: rgb(0,163,255);">
	
	<h2 style="background-color: gold; padding-bottom: 20px; padding-left: 30px; padding-top: 20px;">
				Tourists Spots in Leyte
			</h2>
			<?php foreach($ret as $value){?>
				<div style="display: flex;width: 100%;box-sizing: border-box;background-color: white;padding: 2%;max-height:500px;	border: 1px solid gold;"> 
				

					<div style="width:40%;">
					<h3><?= $value->name ?></h3>
						
						<img src="<?php echo base_url();?>assets/images/<?= $value->photo?>"  style="max-height: 200px;" width="400">
					</div>
					<div style="width:60%;">
					
						<div style="border: 1px solid rgb(0,163,255);;max-height: 350px;overflow:auto;margin: 8%;padding: 2%;">
						        <?php if($value->description != ""){
										
										echo $value->description;


								}else{
									echo "No description available";
								} ?>
						</div>	
					</div>
					
				</div>
	<?php } ?>
	<?php include 'footer.php'; ?>

</body>
</html>