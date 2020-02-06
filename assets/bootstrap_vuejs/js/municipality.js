//THE BASE URL
var url = "http://localhost/LTIPC/";
//this is for the municipality management in the admin panel
	var municipality = new Vue({
		el: "#municipality",
		data: {
			modal: false,
			modalDelete: false,
			modalEdit: false,
			municipalInfo: {id: '',name: '', dist_id: ''},
			message: '',
			districts: [],
			municipalities: []
		},
		mounted: function(){

			this.getDistrict();
			this.getMunicipalities();
		},
		methods:{

			addMunicipality: function(){

				var municipalInfo = district.toFormData(municipality.municipalInfo);

				axios.post(url+"index.php/dashboard/addMunicipality",municipalInfo).then(function(response){

					  municipality.message = response.data;
					  municipality.getDistrict();
					  municipality.getMunicipalities();
					  municipality.clear();

				});

			},
			deleteMunicipality: function(){

				var municipalInfo = district.toFormData(municipality.municipalInfo);

				axios.post(url+"index.php/dashboard/deleteMunicipality",municipalInfo).then(function(response){

					  municipality.message = response.data;
					  municipality.getDistrict();
					  municipality.getMunicipalities();

				});

			},
			editMunicipality: function(){
				var municipalInfo = district.toFormData(municipality.municipalInfo);

				axios.post(url+"index.php/dashboard/editMunicipality",municipalInfo).then(function(response){

					  municipality.message = response.data;
					  municipality.getDistrict();
					  municipality.getMunicipalities();

				});


			},
			getDistrict: function(){

				axios.post(url + "index.php/dashboard/getDistrict").then(function(response){

					municipality.districts = response.data;

			    });

			},
			getMunicipalities: function(){

				axios.post(url + "index.php/dashboard/getMunicipalities").then(function(response){
					
					municipality.municipalities = response.data;

			    });

			},

			clear: function(){

				municipality.municipalInfo.name = "";
				municipality.municipalInfo.dist_id = "";
			}

		}
		

	});