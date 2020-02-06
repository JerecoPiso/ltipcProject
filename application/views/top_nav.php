
<div class="row header" id="main">
	<!-- for the logo and LTIPC meaning -->
	<div class="col-lg-6"> 
		<img class="logo" src="<?php echo base_url();?>assets/images/ltipc.png">
		<h4 class="ltipc">Leyte Tourism and Investment Promotion Center</h4>
	</div>
	<!-- for the links in the right top  of the page -->
	<div class="col-lg-6"> 
		<nav class="navbar navbar-expand-md nav">
			<!-- Toggler/collapsibe Button -->
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
				   <span class="navbar-toggler-icon"></span>
			</button>

			<!-- Navbar links -->
			<div class="collapse navbar-collapse" id="collapsibleNavbar"  v-if="!search">
			  <ul class="navbar-nav">

			    <li class="nav-item">
			       <a class="nav-link" href="<?php echo base_url();?>"  v-b-tooltip.hover title="Home Page"><span class="fa fa-home" ></span> Home</a>
			    </li>	
			     <li class="nav-item">
			       <a class="nav-link" href="<?php echo base_url();?>index.php/main/hotels"  v-b-tooltip.hover title="Establishments"><span class="fa fa-building" ></span> Hotels</a>
			    </li>	
			    <li class="nav-item">
			       <a class="nav-link" href="<?php echo base_url();?>index.php/main/touristSpots"  v-b-tooltip.hover title="All tourist spots"><span class="fa fa-plane"></span> Spots</a>
			    </li>		  
			    <!-- Dropdown -->
				<li class="nav-item"  @mouseleave="showCat = false" @mouseover="showCat = true">

				   <a class="nav-link categories" href="#"><span class="fa fa-list"></span> Categories </a>
				   

				   <div class="dropdown categories-dropdown" v-if="showCat"  @mouseover="showCat = true">

					 <!-- get all the spot categories in the database -->
				     <?php  $ret = $this->dashboard_model->get('spot_category');

         	  			foreach ($ret as $key => $value) { ?>
         	  				<a class="nav-link links" href="<?php echo base_url();?>index.php/main/spotCategories?cat=<?php echo $value->name; ?>"><?php echo $value->name; ?></a>

         	  		<?php  }?>
				      	   
				    </div><!-- class categories-dropdown end -->

				</li>
				<li class="nav-item">
			       <a class="nav-link" v-b-tooltip.hover title="Login as Admin" href="<?php echo base_url();?>index.php/dashboard/"><span class="fa fa-share"></span> Login</a>
			    </li>
				<li class="nav-item">

			      <a class="nav-link" href="#" @click="search = true" v-b-tooltip.hover title="Search for spots"><span class="fa fa-search"></span></a>

			    </li>
			     
			 </ul>
			   
	      </div><!-- class navbar navbar-collapse end -->
	      <div class="div-search" v-if="search">
	      	 <!-- for the search input -->
  				<div class="input-group search mb-2" >
				    <input type="text" class="form-control" v-model="data.search" @keyup="searchSpot();sendSearch();" placeholder="Search for spots..." id="search-input">
				    <div class="input-group-append ">
				      <span @click="search = false" v-b-tooltip.hover title="Close" class="input-group-text pt-1 search-logo" >&times;</span>
				    </div>
  				</div>
  				<ul class="p-1 list-group ul-autocomplete">
  					<li class="list-group-item autocomplete" v-for="cat in categories">
  				  
  						<strong @click="data.search = cat.name">{{cat.name}}</strong><br>
  					
  					</li>
  					
  				</ul>
	      </div>
			 
	    </nav>	
	</div><!-- class col-lg-6 end -->
</div><!-- class row header end -->