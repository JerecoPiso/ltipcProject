
var url = "http://localhost/LTIPC/";
var touristSpot = new Vue({
		el: "#touristSpot",
		data: {
			modalView: false,
			modal: false,
			modalDelete: false,
			modalEdit: false,
			modalAddPhoto: false,
			message: '',
			spotInfo: {id: '',name: '', municipality: '', district: '', category: '' ,photo: '', description: ''},
			categories: [],
			districts: [],
			municipalities: [],
			spots: [],
			keyword: '',
			file: '',
			editFile: '',
			editPhoto: false
		
		},
		
		mounted: function(){

			this.getCategory();
			this.getDistrict();
			this.getMunicipalities();
			this.getSpot();

		},
		
		methods: {
		 //for uploading adding photo
	      handleFileUpload(){
	        this.file = this.$refs.file.files[0];
	      },
	      handleEditFile(){
	        this.editfile = this.$refs.files.files[0];
		  },
		  	// set the value of the  niceedit  text area
		  	setDesc: function(){

				nicEditors.findEditor( "desc" ).setContent(touristSpot.spotInfo.description);

			},
			// editing the description of the spot
		  	editDesc: function(){
		
					var nicE = new nicEditors.findEditor('desc');
					question = nicE.getContent();
					touristSpot.spotInfo.description = question;

					var info = district.toFormData(touristSpot.spotInfo);
					axios.post(url+"index.php/dashboard/editDesc",info).then(function(response){

						touristSpot.message = response.data.message;
					
						touristSpot.getSpot();
						var nicE = new nicEditors.findEditor('desc');
						question = nicE.getContent();
						touristSpot.spotInfo.description = question;
						nicEditors.findEditor( "desc" ).setContent(touristSpot.spotInfo.description);


					});

			},
			// adding spot
			addSpot: function(){
				 var total = touristSpot.spotInfo.municipality.split('(');
				 
				//slice the municipality and district
				 touristSpot.spotInfo.municipality = total[0];
				 touristSpot.spotInfo.district = total[total.length - 1].slice(0,-1);
				
				
				let formData = new FormData();
	            formData.append('file', this.file);
	            formData.append('name', touristSpot.spotInfo.name);
	            formData.append('municipality', touristSpot.spotInfo.municipality);
	            formData.append('district', touristSpot.spotInfo.district);
	            formData.append('category', touristSpot.spotInfo.category);
	        

				axios.post(url+"index.php/uploader/addSpot",formData).then(function(response){

					touristSpot.message = response.data.message;
					touristSpot.clear();
					touristSpot.getSpot();
				});
			},
			deleteSpot: function(){

				var infos = district.toFormData(touristSpot.spotInfo);

				axios.post(url+"index.php/dashboard/deleteSpot",infos).then(function(response){

				    touristSpot.message = response.data;
					touristSpot.getSpot();


				});

			},
			editSpot: function(){

				var total = touristSpot.spotInfo.municipality.split('(');
				 
				 touristSpot.spotInfo.municipality = total[0];
				 touristSpot.spotInfo.district = total[total.length - 1].slice(0,-1);
			
				 let formData = new FormData();
	            // formData.append('file', this.editfile);
	            formData.append('name', touristSpot.spotInfo.name);
	            formData.append('municipality', touristSpot.spotInfo.municipality);
	            formData.append('district', touristSpot.spotInfo.district);
	            formData.append('category', touristSpot.spotInfo.category);
	        	formData.append('id', touristSpot.spotInfo.id);

				axios.post(url+"index.php/dashboard/editSpot",formData).then(function(response){

					touristSpot.message = response.data;
					touristSpot.clear();
					touristSpot.getSpot();
				});

			},
			editSpotPhoto: function(){
				 let formData = new FormData();
	            formData.append('file', this.editfile);
	    
	        	formData.append('id', touristSpot.spotInfo.id);

				axios.post(url+"index.php/uploader/editSpots",formData).then(function(response){

					touristSpot.message = response.data.message;
					
					touristSpot.clear();
					touristSpot.getSpot();
				});

			},
			getCategory: function(){
				axios.get(url+"index.php/dashboard/getCategory").then(function(response){

					touristSpot.categories = response.data;

				});
			},
			getDistrict: function(){

				axios.get(url + "index.php/dashboard/getDistrict").then(function(response){

					touristSpot.districts = response.data;

			    });

			},
			getMunicipalities: function(){

				axios.post(url + "index.php/dashboard/getMunicipalities").then(function(response){
					
					touristSpot.municipalities = response.data;

			    });

			},
			getSpot: function(){

				axios.get(url + "index.php/dashboard/getSpot").then(function(response){

					touristSpot.spots = response.data;

			    });


			},

			clear: function(){
				touristSpot.spotInfo.name = "";
				touristSpot.spotInfo.municipality = "";
				touristSpot.spotInfo.district = "";
				touristSpot.spotInfo.category = "";

			}

		},
		 
 	
	});