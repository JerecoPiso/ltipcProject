    //THE BASE URL
	var url = "http://localhost/LTIPC/";
	var userSettings = new Vue({
		el: "#admin-settings",
		data: {
			nameDpMsg: '',
			secMsg: '',
			securityChange: true,
			change: true,
			modal: false,
			disabled: true,
			disabledName: true,
			file: '',
			user: {id: '',name: '', hint: '', password: '', pass2:'', photo: ''},
			nameErr: '',
			passErr: '',
			pass2Err: '',
			hintErr: '',
			success: ''
		
		},
		mounted: function(){

			this.getAdminInfo();

		},
		methods: {

			getAdminInfo: function(){

				axios.get(url+"index.php/dashboard/adminInfo").then(function(response){
					userSettings.user.id = response.data.id;
					userSettings.user.name = response.data.name;
					userSettings.user.hint = response.data.hint;
					userSettings.user.photo = response.data.photo;
					
				});

			},
			nameMonitor: function(){

				var letters = /^[a-zA-Z ]+$/;
				var name = userSettings.user.name;
	        	if(name == ""){
	        		userSettings.nameErr = "Name must not  empty!";
	        	}else if(name <= 7){
	        		userSettings.nameErr ="Name must contain letat least 8 letters!";
	        	}else if(!name.match(letters)){
	        			userSettings.nameErr ="Name must contain letters only!";
	        	}else{
	        		userSettings.nameErr = "";
	        		if(event.key == "Enter"){

	        			userSettings.editName();
	        			userSettings.change = true;
	        			userSettings.disabledName = true;

	        		}


	        	}
			},
			passMonitor: function(){

				var pass = userSettings.user.password;
	        	if(pass == "" ){
	        			
	        	   userSettings.passErr = "Password must not  empty!";
	        		
	        	}else if(pass.length <= 7 ){

	        	  userSettings.passErr ="Password must contain letat least 8 characters!";
	  	
	        	}else{
	        		userSettings.passErr = "";
	        		if(event.key == "Enter"){

	        			userSettings.editSecurity();
	        			userSettings.securityChange = true;
	        			userSettings.disabled = true;

	        		}


	        	}

			},
			pass2Monitor: function(){

				var pass = userSettings.user.password;

	        	if(pass != userSettings.user.pass2){
	        			
	        	   userSettings.pass2Err = "Password didn't matched!";
	        	
	        	}else{
	        		userSettings.pass2Err = "";
	        		userSettings.success = "Password matched";
	        		if(event.key == "Enter"){

	        			userSettings.editSecurity();
	        			userSettings.securityChange = true;
	        			userSettings.disabled = true;
	        			userSettings.success = "";

	        		}


	        	}

			},
			editDp: function(){

				//var infos = district.toFormData(touristSpot.spotInfo);
				let formData = new FormData();
	            formData.append('file', this.file);
	            formData.append('id', userSettings.user.id);
	           
	        
				axios.post(url+"index.php/uploader/editDp",formData).then(function(response){
					  userSettings.nameDpMsg = response.data.message;
					  userSettings.modal = false;
					  userSettings.getAdminInfo();
				});
			},
			editName: function(){
				var letters = /^[a-zA-Z ]+$/;
				var info = district.toFormData(userSettings.user);
	        	
	        	if(userSettings.user.name == ""){
	        		userSettings.nameErr = "Name must not  empty!";
	        	}else if(userSettings.user.name.length <= 7){
	        		userSettings.nameErr ="Name must contain letat least 8 letters!";
	        	}else if(!userSettings.user.name.match(letters)){
	        		userSettings.nameErr ="Name must contain letters only!";
	        	}else{
	        		userSettings.nameErr = "";
		        	axios.post(url+"index.php/dashboard/editName",info).then(function(response){
		        		userSettings.nameDpMsg = response.data;
						userSettings.getAdminInfo();
					});

	        	}
				
			},
			editSecurity: function(){

				var info = district.toFormData(userSettings.user);
	        	
	        	if (userSettings.user.password != "") {
	        		  userSettings.passErr = "Password must not  empty!";
	        	}else if(userSettings.user.password != userSettings.user.pass2){
	        		 userSettings.pass2Err = "Password didn't matched!";
	        	}else if(userSettings.user.hint == ""){

	        		 userSettings.hintErr = "Hint must not be empty!";
	        	}else{

	        		axios.post(url+"index.php/dashboard/editSecurity",info).then(function(response){

	        		userSettings.secMsg = response.data;

					userSettings.getAdminInfo();
				});

	        	}
				
			},
			handleFileUpload(){
	        this.file = this.$refs.file.files[0];
	      },
		}

	});