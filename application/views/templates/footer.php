<!-- JAVASCRIPT LINKS -->
<script src="<?php echo base_url();?>assets/bootstrap_vuejs/js/niceedit.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
<script src="<?php echo base_url();?>assets/bootstrap_vuejs/js/vue.js"></script>
<script src="<?php echo base_url();?>assets/bootstrap_vuejs/js/bootstrap_vue.js"></script>
<script src="<?php echo base_url();?>assets/bootstrap_vuejs/js/axios.js"></script>
<script src="<?php echo base_url();?>assets/bootstrap_vuejs/js/jquery.js"></script>
<script src="<?php echo base_url();?>assets/bootstrap_vuejs/js/setting.js"></script>
<script src="<?php echo base_url();?>assets/bootstrap_vuejs/js/admins.js"></script>
<script src="<?php echo base_url();?>assets/bootstrap_vuejs/js/dashboardhomepage.js"></script>
<script src="<?php echo base_url();?>assets/bootstrap_vuejs/js/loginsignup.js"></script>
<script src="<?php echo base_url();?>assets/bootstrap_vuejs/js/tourist_spotssssss.js"></script>
<script src="<?php echo base_url();?>assets/bootstrap_vuejs/js/establishment.js"></script>
<script src="<?php echo base_url();?>assets/bootstrap_vuejs/js/spotCategory.js"></script>
<script src="<?php echo base_url();?>assets/bootstrap_vuejs/js/municipality.js"></script>
<script src="<?php echo base_url();?>assets/bootstrap_vuejs/js/district.js"></script>
<script src="<?php echo base_url();?>assets/bootstrap_vuejs/js/filter_table.js"></script>


<script type="text/javascript">
	var top_destination = new Vue({
		el: "#top-destination",
		data: {
			modalRemove: false,
			spots: [],
			destinations: [],
			topDestination: {spotId:'', name:'', photo: ''},
			success: ''

		},
		mounted: function(){

			this.getSpots();
			this.getDestination();

		},
		methods: {
			getSpots: function(){

				
				axios.get(url + "index.php/dashboard/getSpot").then(function(response){

					top_destination.spots = response.data;

				});
				
			},
			add: function(){

				var info = district.toFormData(top_destination.topDestination);
			
				axios.post(url + "index.php/dashboard/addTopDestination", info).then(function(response){
					top_destination.getDestination();
					top_destination.getSpots();
					top_destination.success = response.data;

					setInterval(function() {
						top_destination.success = ""
					}, 3000);

				});

			},
			remove: function(){

				var info = district.toFormData(top_destination.topDestination);
			
				axios.post(url + "index.php/dashboard/deleteTopDestination", info).then(function(response){
					top_destination.getDestination();
					top_destination.getSpots();
					top_destination.success = response.data;
					
					setInterval(function() {
						top_destination.success = ""
					}, 3000);

				});

			},
			getDestination: function(){

				axios.get(url + "index.php/dashboard/getDestination").then(function(response){

					top_destination.destinations = response.data;

				});

			}
		}

	})

	//the use of these is for the top photo with dropdown*/
	var app = new Vue({
		el: "#settings",
		data: {
			setting: false,
			user: {photo: ''}
		},
		mounted: function(){

			this.getAdminInfo();

		},
		methods: {

			getAdminInfo: function(){

				axios.get(url+"index.php/dashboard/adminInfo").then(function(response){
					
					app.user.photo = response.data.photo;
					
				});

			}

		}

	});

	$(document).on('click', '.view', function set(val){
	

			$('.ModalView').show();
		

	
	});
	$(document).on('click', '.close', function(){
	

	$('.ModalView').hide();

});

</script>
</body>
</html>