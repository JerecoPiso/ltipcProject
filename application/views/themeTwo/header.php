<!DOCTYPE html>
<html>
<head>
	<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
	<div class="container">
	  <div class="row">
	    <div class="span12">
	      <div class="head">
	        <div class="row-fluid">
	            <div class="span12">
	                <div class="span6">
	                    <h1 class="muted" style="color: white; font-size: 50px; letter-spacing: 3px; margin-left: 1px;"><img class="" style="width: 15%;border-radius: 50%;" src="<?php echo base_url();?>assets/images/ltipc.png"> LTIPC</h1>
	                </div>

	                <div class="span4 offset2" style="margin-top:48px;">
	                	<input type="text" class="form-control" name="search" placeholder="Search places..." style="width: 80%; margin-left: -25px;"/>
	                    <button class="btn btn-warning pull-right" type="button" style="margin-right: 10px;">Search</button>
	                </div>
	            </div>
	        </div>

	        <div class="navbar" style="top: 0;position: sticky;">
	            <div class="navbar-inner">
	                <div class="container">
	                    <ul class="nav">
	                        <li>
	                            <a href="homePage.php"><span class="fa fa-home"></span> Home</a>
	                        </li>
	                        <li>
	                            <a href="<?php echo base_url();?>index.php/Secondtheme/hotels"><span class="fa fa-building"></span>  Hotels</a>
	                        </li>
	                        <li>
	                            <a href="<?php echo base_url();?>index.php/Secondtheme/spots"><span class="fa fa-plane"></span>  Spots</a>
	                        </li>
	                       
	                        <li>
	                            <a href=""> <span class="fa fa-camera"></span> Gallery</a>
	                        </li>
	                        
	                    </ul>
	                </div>
	            </div>
	        </div>

</body>
</html>