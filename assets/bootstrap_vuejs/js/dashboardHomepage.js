var url = "http://localhost/LTIPC/";
	var dashboardHomePage = new Vue({
		el: "#home_dashboard",
		data: {
			totals: {spot:'', mun: '', estab: '', admin: ''},
			spots: [],
			modal: false,
			modalEstablishment: false,
			modalMunicipality: false,
			municipalities: [],
			hotels: []
		},
		mounted: function(){

			this.count();
			this.getSpot();
			this.getHotels();
			this.getMunicipalities();
			
		},
		methods: {

			print: function(){

				window.location.href = url+"index.php/prints/printSpot"

			},
			count: function(){

				axios.post(url+"index.php/dashboard/count").then(function(response){
					 var total = response.data.split(' ');
					 
				     dashboardHomePage.totals.spot = total[3];
				     dashboardHomePage.totals.mun = total[2];
				     dashboardHomePage.totals.estab = total[1];	
				     dashboardHomePage.totals.admin = total[0];	

				});

			},
			getSpot: function(){

				axios.get(url + "index.php/dashboard/getSpot").then(function(response){

					dashboardHomePage.spots = response.data;

			    });


			},
			getHotels: function(){

				axios.get(url+"index.php/dashboard/getHotels").then(function(response){

					dashboardHomePage.hotels = response.data;

				});
			},
			getMunicipalities: function(){

				axios.post(url + "index.php/dashboard/getMunicipalities").then(function(response){
					
					dashboardHomePage.municipalities = response.data;

			    });

			},


		}

	});
