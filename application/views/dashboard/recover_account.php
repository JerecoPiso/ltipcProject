<div id="loginSignup" >

	<!--for the modal add in action-->
  <div class="Modal mt-4" v-if="modal">
     <button class="close mr-2 mt-2" @click="modal = false;;">&times;</button>

     <div class="modalHeader p-2">
        <h4 class="ml-2">Change Password</h4>
     </div>

     <div class="modalBody p-3">
     <h6 class="text-center error" v-if="modalErr">{{modalErr}}</h6>
       <label>New Password</label>
       <input type="password" @keyup="changePassMonitor()" v-model="signupDetails.password" class="form-control"><br>
       <label>Re-type Password</label>
       <input type="password" @keyup="changePassMonitor()" v-model="signupDetails.pass2" class="form-control">

       <button class="add" @click="changePass()">Change</button>
     </div><!--end class modalBody-->
  </div><!--end class modal-->
	<div class="recover-form">
		
	 <div class="form">
	   <h4 class="signup-label">Recover Account</h4>
	     <h6 class="text-center error" v-if="message">{{message}}</h6>
		 <label>Username</label><br>
		 <input type="text" v-model="recover.name" @keyup="recoverMonitor()" class="form-input" placeholder="Username...">

		 <label class="mt-2">Hint</label><br>
		 <input type="text" class="form-input" @keyup="recoverMonitor()" v-model="recover.hint" placeholder="Hint...">

		 <button class="login" @click="recoverAcc()">Send<span class="fa fa-sign-out"></span></button>

	  </div>
	 
	</div>

	

</div>