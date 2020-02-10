<!--for the header of the admin panel-->
<div class="row header">

  <div class="col-lg-4">
    <h3 class="pt-2 ml-4 admin-panel-text">Admin Panel</h3>
  </div><!--class col-lg-4 end-->

  <div class="col-lg-8" id="settings">
  <?php 
    //for the side nav of the admin panel
    require_once 'top_nav.php'

  ;?>
  </div><!--class col-lg-8 end-->
</div><!--class header end-->
<div class="row m-0" id="top-destination">

  <div class="col-lg-2 side-nav">
    
  <?php 
  //for the side nav of the admin panel
  require_once 'side_nav.php'

  ;?>

  </div><!--class col-lg-2 end-->
  <div class="col-lg-10">
    <strong class="strong-success" v-if="success">{{success}}</strong>
     <div class="page-name">
        <h4 class="p-2">Top Destinations of Leyte |<span class="fa fa-map-marker ml-2"></span>  |</h4>
    </div>
   
    <div class="row">
        <div class="col-lg-7">
        <h6 class="alert alert-info text-center">Top Destination</h6>
           <ul class="list-group top-destinations-list">
                <li class="list-group-item" v-for="destination in destinations">
                    <img class="top-destination-photo" v-bind:src="'<?php echo base_url();?>assets/images/' + destination.photo">
                    <strong>{{destination.name}}</strong><br>
                    <button class="remove pull-right" v-b-tooltip.hover title="Remove to top destination" @click="topDestination.spotId = destination.id;remove()"> Remove</button>
                </li>
           </ul>
        </div>
        <div class="col-lg-5">
            <h6 class="alert alert-info text-center">Select spot to add in the top destination</h6>
            <ul class="list-group">
                <li class="list-group-item" v-for="spot in spots" style="color: black;" v-if="spot.top_destination_status != 'Yes'">{{spot.name}}
                    <button class="pull-right add-to-destination" v-b-tooltip.hover title="Add to top destination" @click="topDestination.spotId = spot.id; topDestination.name = spot.name; topDestination.photo = spot.photo; add();;">Add</button>
                </li>            
             </ul>
        </div>
    </div><!--class row end-->
    
   
  </div><!--class col-lg-10 end-->

</div><!--class row end-->


