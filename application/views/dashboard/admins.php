<!--for the header of the admin panel-->
<div class="row header">

  <div class="col-lg-4">
    <h3 class="pt-2 ml-4 admin-panel-text">Admin Panel</h3>
  </div><!--class col-lg-4 end-->

  <div class="col-lg-8" id="settings">
    <?php 
    //for the top  of the admin panel
    require_once 'top_nav.php'

  ;?>
  </div><!--class col-lg-8 end-->
</div><!--class header end-->

<div class="row m-0" id="admin">

  <div class="col-lg-2 side-nav">
    
  <?php 
  //for the side nav of the admin panel
  require_once 'side_nav.php'

  ;?>

  </div><!--class col-lg-2 end-->

  
  <div class="col-lg-10">
    <div class="card mt-4">

      <div class="card-header admin-card-header">
        <h3>Admin User <span class="fa fa-users"></span></h3>
      </div>

        <div class="card-body">

          <div class="table-responsive">
         	
         	<div class="row">
         
         	<?php 
         	   $ret = $this->dashboard_model->get('admin');

         	   foreach ($ret as $key => $value) { ?>
         		 <div class="col-lg-3 mt-3">
         		   <div class="card admin-card">
	         			 <div>
	         				<img class="admin-photo" src="<?php echo base_url();?>assets/images/<?php	   	echo $value->photo; ?>">
	         			 </div>
	         			 <div class="card-footer text-center">
	         				  	<b><?php echo $value->name; ?></b>
	         			 </div>
         			</div><!--clas card end-->
         				  	
         		</div><!--class col-lg-4 end-->
         			<?php	  	
         				  	
         				  }

         			?>
         		
         	 </div><!--class row end-->
            
            </div><!--class table responsive end-->
       
         </div><!-- class card body end-->      
      </div><!-- class card end-->
   </div><!--class col-lg-10 end-->
</div><!--class row end-->


