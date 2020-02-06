<!-- header -->
<?php require_once('top_nav.php');?>

<?php  $ret = $this->dashboard_model->get('spots');?>
<div id="spot-lists">
		<!--for the modal add in action-->
		<div class="ModalView" v-if="modal">
			<button class="close mr-2 mt-2 close" @click="modal = false" v-b-tooltip.hover title="Close">&times;
			</button>
			<div class="modalViewHeader p-2">
				<h4 class="ml-2">View Spot</h4>
			</div>
			<div class="modalViewBody p-3">

			<img class="view-photo" v-bind:src="'<?php echo base_url();?>assets/images/' + spotInfo.photo">
			<h4 class="text-center"><b> {{spotInfo.name + " ( "+ spotInfo.municipality + " )"}} </b></h4>
			
			<p class="p-desc">{{spotInfo.desc}}</p>
			  
     </div><!--end class modalBody-->  
</div><!--end class modal-->

<div class="row m-0 min-h" >
	<div class="col-lg-1">
		
	</div>
	<div class="col-lg-10">
    
            <h5 class="mt-2 text-center alert alert-info all-title"><b> <span class="fa fa-plane"></span> Tourist Spots in Leyte</b></h5>
     
    <div class="row all-spots">
        
       <?php 

           if($ret != false){ ?>
         	  
         	  <?php foreach ($ret as $key => $value) { ?>
         	  	<!-- this is for the photo for the spot categories selected  -->
         		<div class="col-lg-4 mt-3">

         		   <div class="card admin-card">
	         			 <div class="card-header p-1 spot-head"> 
	         				<img class="spot-photo" src="<?php echo base_url();?>assets/images/<?=$value->photo?>">
	         			 </div>
	         			 <div class="card-body spot-body text-center p-1 spot-name">
	         				  	<?= $value->name?>
	         			 </div>
	         			 <div class="card-footer p-1">
							  <div class="descript">
								<?php if($value->description != ""){

										echo $value->description;
							    	}else{

										echo "No description available.";
									} ?>
							
							</div>
							  <button class="see-info right" @click="spotInfo.municipality = '<?php echo $value->municipality; ?>';spotInfo.photo = '<?php echo $value->photo; ?>';spotInfo.desc = '<?php echo $value->description; ?>';  spotInfo.name = ' <?php echo $value->name; ?>' ;modal = true;" v-b-tooltip.hover title="View spot"><span class="fa fa-eye"></span></button>
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
</div> <!-- id spot-lists end-->

