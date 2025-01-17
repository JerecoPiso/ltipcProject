<!-- header -->
<?php require_once('top_nav.php');?>

<?php  $ret = $this->main_model->searchResult($search);?>
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
			
			<p class="p-desc" v-if="spotInfo.desc != ''">{{spotInfo.desc}}</p>
			<p class="p-desc text-center" v-else>No description available.</p>
			  
     </div><!--end class modalBody-->  
  </div><!--end class modal-->
<div class="row m-0 min-h">

	<div class="col-lg-1">
		
	</div>
	<div class="col-lg-10 card p-3 mt-4">
        <?php if($ret != false){ ?>
			<h5 class="mt-2"><b>Search result for:</b> <?php echo $search;?></h5>
       <?php }?>

    <div class="row">
         	
       <?php 

         if($search != ""){
        
          

           if($ret != false){ ?>
         	  
         	  <?php foreach ($ret as $key => $value) { ?>
         	  	<!-- this is for the photo for the spot categories selected  -->
         		<div class="col-lg-4 mt-3">

         		   <div class="card admin-card">
					<div class="card-header spot-head p-1"> 
	         				<img class="spot-photo" src="<?php echo base_url();?>assets/images/<?= $value->photo?>">
	         			 </div>
	         			 <div class="card-body spot-body text-center p-1 spot-name">
	         				  	<?= $value->name?>
	         			 </div>
	         			 <div class="card-footer p-1">
						  <div class="descript"  id="text-desc<?php echo $value->id; ?>">
								<?php if($value->description != ""){

										echo $value->description;
							    	}else{

										echo "No description available.";
									} ?>
							
							</div>
							<button  class="see-info right" @click="spotInfo.municipality = '<?php echo $value->municipality; ?>';spotInfo.photo = '<?php echo $value->photo; ?>';spotInfo.name = ' <?php echo $value->name; ?>' ;trial(<?php echo $value->id; ?>)" v-b-tooltip.hover title="View spot"><span class="fa fa-eye"></span></button>
	         			 </div>
         			</div><!--clas card end-->
         				  	
         		</div><!--class col-lg-4 end-->
         			<?php	  	
         				
         				  }/*for each end*/

         			?>
         	

         	 <?php  }else{ ?>


         	 		<div class="col-lg-12">

         	 			<h5 class="text-center no-result">No result found for: <b class="search-value"><?php echo $search;?></b></h5>
         	 
         	 		</div>
         	 
         	 		

	         <?php	}/*end for the checking if the result of the query is false */


	         	}/*end for the checking if $cat or categories is null*/

	         ?>
         	  
         	 </div><!--class row end-->
            
           
	</div>
	<div class="col-lg-1">
		
	</div>
</div><!--class row end-->
</div><!-- id spot-lists end-->