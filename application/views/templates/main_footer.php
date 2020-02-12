<!-- for the slogan of its more fun in the philippines photo -->
<img class="slogan mt-4" src="<?php echo base_url();?>assets/images/its.png">


<footer>All Rights Reserved <?php echo date("Y"); ?> </footer>
<script src="<?php echo base_url();?>assets/bootstrap_vuejs/js/niceedit.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
<script src="<?php echo base_url();?>assets/bootstrap_vuejs/js/vue.js"></script>
<script src="<?php echo base_url();?>assets/bootstrap_vuejs/js/bootstrap_vue.js"></script>
<script src="<?php echo base_url();?>assets/bootstrap_vuejs/js/axios.js"></script>
<script src="<?php echo base_url();?>assets/bootstrap_vuejs/js/jquery.js"></script>

<script type="text/javascript">
	var url = "http://localhost/LTIPC/";
	var main = new Vue({
		el: "#main",
		data: {
			showCat: false,
			search: false,
			data: {search: ''},
			categories: [],

		},
		methods: {

			
			searchSpot: function(){

				var sear = main.toFormData(main.data);

				if (main.data.search != "") {

					axios.post(url+"index.php/main/search", sear).then(function(response){

						if (response.data != 'False') {
							//alert(response.data)
							main.categories = response.data;

						}else{

							//alert(response.data)
							main.categories = null					
					}
					
				})

				}else{

					main.categories = null			
				}

				
			},
			sendSearch: function(){

				if (event.key == "Enter" && main.data.search != "") {

					window.location.href = url+"index.php/main/searchResult?search="+main.data.search;	

				}	
				

			},
			toFormData: function(obj){
					var form_data = new FormData();
					for(var key in obj){
						form_data.append(key, obj[key]);
					}
					return form_data;
			  },

		}

	})
	var spots = new Vue({
		el: "#spot-lists",
		data: {
			modal: false,
			spotInfo: {name: '', photo: '', desc: '', municipality: ''}

		},
		methods: {
			
			trial: function(id){

				 var desc =  $('#text-desc'+id).text();
				
				 spots.spotInfo.desc = desc;
				 spots.modal = true;
				
				
			}

		}

	});

</script>
</body>
</html>