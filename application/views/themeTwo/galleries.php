<?php
	include 'header.php';
?>
<?php $ret = $this->dashboard_model->get("spots");?>
<title>Gallery</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<div class="galleryBody">
    <?php foreach($ret as $value){?>

        <div class="container1">
	      <img src="<?php echo base_url();?>assets/images/<?= $value->photo?>" style="max-height: 200px; max-width:300px;cursor:pointer" onclick="onClick(this)" class="modal-hover-opacity">
	   </div>

   <?php  } ?>
	
	

	<div id="modal01" class="modalContainer" onclick="this.style.display='none'">
	  <span class="closeIcon">&times;&nbsp;&nbsp;&nbsp;&nbsp;</span>
	  	<div class="modal-content">
	    	<img id="img01" style="max-width:100%">
	 	</div>
	</div>
</div>
<?php
	include 'footer.php';
?>

<script>
	function onClick(element) {
  	document.getElementById("img01").src = element.src;
  	document.getElementById("modal01").style.display = "block";
}
</script>