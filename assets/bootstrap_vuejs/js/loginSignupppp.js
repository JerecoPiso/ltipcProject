var url = "http://localhost/LTIPC/";
var loginSignup = new Vue({
		el: "#loginSignup",
		data: {
			modal: false,
			signup: false,
			login: true,
			signupDetails: {id: '',name: '', password: '', pass2:'', hint: ''},
			file: '',
			loginDetails:{name: '', password: ''},
			message: '',
			errors: {name: '', pass: '', pass2: '', hint: ''},
			success: '',
			registered: '',
			login_text: 'Login',
			recover: {name: '', hint: ''},
			modalErr: ''

		},
		methods: {
			handleFileUpload(){
	        this.file = this.$refs.file.files[0];
	      },
	      loginMonitor: function(){

	      	if(event.key == "Enter"){
	      		loginSignup.loginAdmin();
	      	}

	      },
	      recoverMonitor: function(){

	      	if(event.key == "Enter"){
	      		loginSignup.recoverAcc();
	      	}

	      },
	      changePassMonitor: function(){

	      	if(event.key == "Enter"){
	      		loginSignup.changePass();
	      	}

	      },
	      recoverAcc: function(){
	      	if (loginSignup.recover.name == "") {

	      		loginSignup.message = "Name must not be empty!";

	      	}else if(loginSignup.recover.hint == ""){

	      		loginSignup.message = "Hint must not be empty!";
	      	}else{

	      		var info = district.toFormData(loginSignup.recover);
		      	axios.post(url+'index.php/dashboard/recoverAccount', info).then(function(response){

		      		if(response.data.msg == "True"){

		      			loginSignup.signupDetails.id = response.data.id;
		      			loginSignup.modal = true;
		      			
		      		}else{

		      			loginSignup.message = response.data.msg;
		      		}

		      	});
	      	}
	      	
	      },
	      changePass: function(){
	      	   var pass = loginSignup.signupDetails.password;
	      	   var pass2 = loginSignup.signupDetails.pass2;
		       var passwords = district.toFormData(loginSignup.signupDetails)

		       if(pass == ""){

		      	 loginSignup.modalErr = "Password must not be empty!";

		       }else if(pass.length <= 7){

		       	  loginSignup.modalErr = "Password must not contain at least 9 characters!";

		       }else if(pass != pass2){

		       	  loginSignup.modalErr = "Password didn't matched!";

		       }else{

		       		axios.post(url+"index.php/dashboard/changePass", passwords).then(function(response){

		      		  alert(response.data)
		      		  loginSignup.modal = false;
		      		  loginSignup.clear(); 

		      	  });
		       }
		      	
	      },
	      loginAdmin: function(){

	      	var info = district.toFormData(loginSignup.loginDetails);

	      	axios.post(url+"index.php/dashboard/login", info).then(function(response){
	      		
	      		if(response.data.login == "True"){
	      			loginSignup.login_text = response.data.msg;
	      			setInterval(function(){

	      			  window.location.href = url+"index.php/dashboard/dashboard";

	      			},2000)
	      		}else{

	      			loginSignup.message = response.data.msg;

	      		}

	      	});

	      },
	      register: function(){
	      		var letters = /^[a-zA-Z ]+$/;
				//var infos = district.toFormData(touristSpot.spotInfo);
				let formData = new FormData();
	            formData.append('file', this.file);
	            formData.append('name', loginSignup.signupDetails.name);
	            formData.append('password', loginSignup.signupDetails.password);
	            formData.append('pass2', loginSignup.signupDetails.pass2);
	            formData.append('hint', loginSignup.signupDetails.hint);

	            if(loginSignup.signupDetails.name == ""){

	            	loginSignup.message = "Name must not be empty!";

	            }else if(!loginSignup.signupDetails.name.match(letters)){

	            	loginSignup.message = "Name must contain letters only!";
	            }else if(loginSignup.signupDetails.name.length <= 7){

	            	loginSignup.message = "Name must contain at least 8 letters!";

	            }else if(loginSignup.signupDetails.password.length <= 7){

	            	loginSignup.message = "Password must contain at least 8 characters!";

	            }else if(loginSignup.signupDetails.password != loginSignup.signupDetails.pass2){
	            	loginSignup.message = "Password didn't matched!";

	            }else if(loginSignup.signupDetails.hint == ""){
	            	loginSignup.message = "Hint must not be empty!";

	            }else if(loginSignup.file == ""){

	            	loginSignup.message = "Profile picture is required!";
	            }else{

	            	axios.post(url+"index.php/uploader/signup",formData).then(function(response){

						if(response.data.message == "Added succesfully"){
						   loginSignup.registered = "Registered succesfully";
						}else{

							loginSignup.registered = response.data.message;
						}
						loginSignup.clear();
					
					});


	            }

				
			},
			nameMonitor: function(){
				var name = loginSignup.signupDetails.name
				var pass = loginSignup.signupDetails.password;
				var pass2 = loginSignup.signupDetails.pass2;
				var hint = loginSignup.signupDetails.hint;
				var letters = /^[a-zA-Z ]+$/;
			   if(name.length <= 7){

	            	loginSignup.errors.name = "Name must contain at least 8 letters!";
	            }else if(!name.match(letters) ){

	            	loginSignup.errors.name = "Name must contain letters only!";

	            }else{

	            	loginSignup.errors.name = "";
	            	if(name != "" && pass != "" && pass2 != "" && name.length >= 8 && name.match(letters) && hint != ""){

	   		  				
	   		  					if(event.key == "Enter"){
         							loginSignup.register();
        						}   		  				
	   		  			}

	            }
			},
			pass1Monitor: function(){

				var name = loginSignup.signupDetails.name
				var pass = loginSignup.signupDetails.password;
				var pass2 = loginSignup.signupDetails.pass2;
				var hint = loginSignup.signupDetails.hint;
				var letters = /^[a-zA-Z ]+$/;
			   if(pass.length <= 7){

	            	loginSignup.errors.pass = "Password must contain at least 8 characters!";
	            }else{

	            	loginSignup.errors.pass = "";
	            	if(name != "" && pass != "" && pass2 != "" && name.length >= 8 && name.match(letters) && hint != ""){

	   		  				
	   		  					if(event.key == "Enter"){
         							loginSignup.register();
        						}   		  				
	   		  			}
	            }

			},
			pass2Monitor: function(){

				var name = loginSignup.signupDetails.name
				var pass = loginSignup.signupDetails.password;
				var pass2 = loginSignup.signupDetails.pass2;
				var hint = loginSignup.signupDetails.hint;
				var letters = /^[a-zA-Z ]+$/;
			   if(pass != pass2){

	            	loginSignup.errors.pass2 = "Password didn't matched!";
	            	loginSignup.success = "";
	            }else{
	            	loginSignup.errors.pass2 = "";
	            	loginSignup.success = "Password matched";
	            	if(name != "" && pass != "" && pass2 != "" && name.length >= 8 && name.match(letters) && hint != ""){

	   		  				
	   		  					if(event.key == "Enter"){
         							loginSignup.register();
        						}   		  				
	   		  			}
	            }
			},

			hintMonitor: function(){

				var name = loginSignup.signupDetails.name
				var pass = loginSignup.signupDetails.password;
				var pass2 = loginSignup.signupDetails.pass2;
				var hint = loginSignup.signupDetails.hint;
				var letters = /^[a-zA-Z ]+$/;
			   if(hint == ""){

	            	loginSignup.errors.hint = "Hint must not be empty!";
	            
	            }else{
	            	loginSignup.errors.hint = "";
	            	if(name != "" && pass != "" && pass2 != "" && name.length >= 8 && name.match(letters) && hint != ""){

	   		  					if(event.key == "Enter"){
         							loginSignup.register();
        						}   		  				
	   		  			}
	            }

			},
			clear: function(){
				loginSignup.recover = "";
				loginSignup.signupDetails = "";
				loginSignup.file = '';
				loginSignup.errors = '';
				loginSignup.success = '';
			}

		}
	});