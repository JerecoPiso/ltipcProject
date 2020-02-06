var url = "http://localhost/LTIPC/";

	
	var district = new Vue({
		el: "#district",
		data: {
			modal: false,
			modalDelete: false,
			modalEdit: false,
			districtInfo: { name: '', id: ''},
			districts: [],
			message: ''

		},
		mounted: function(){

			this.getDistrict();

		},
		methods: {

			addDistrict: function(){

			 if(district.districtInfo.name != ""){

			  var dist = district.toFormData(district.districtInfo);

			  axios.post(url + "index.php/dashboard/addDistrict", dist).then(function(response){

					district.message = response.data;
					district.getDistrict();
					district.clear();
					

			   });

			 }else{

			 	   district.message = "District name must not be empty!";
			 }
			 
			},

			deleteDistrict: function(){

			 var dist = district.toFormData(district.districtInfo);

			  axios.post(url + "index.php/dashboard/deleteDistrict", 
			  	dist).then(function(response){

			  		district.message = response.data;
					district.getDistrict();
					district.clear();

			  });

			},

			editDistrict: function(){

			 var dist = district.toFormData(district.districtInfo);

			  axios.post(url + "index.php/dashboard/editDistrict", 
			  	dist).then(function(response){

			  		district.message = response.data;
					district.getDistrict();
					district.clear();

			  });

			},

			getDistrict: function(){

				axios.get(url + "index.php/dashboard/getDistrict").then(function(response){

					district.districts = response.data;

			    });

			},


			toFormData: function(obj){
					var form_data = new FormData();
					for(var key in obj){
						form_data.append(key, obj[key]);
					}
					return form_data;
			  },

			 clear: function(){

			 	
			 	district.districtInfo.name = '';
			 	district.districtInfo.id = '';

			 }

		}

	});
	