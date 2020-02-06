<!--for the header of the admin panel-->
<div class="row header">

  <div class="col-lg-4">
    <h3 class="pt-2 ml-4 admin-panel-text">Admin Panel</h3>
  </div><!--class col-lg-4 end-->

  <div class="col-lg-8" id="settings">
    <?php 
    //for the top  of the admin panel
    require_once 'top_nav.php'

  ;?>
  </div><!--class col-lg-8 end-->
</div><!--class header end-->

<div class="row m-0" id="admin-settings">

  <div class="col-lg-2 side-nav">
    
  <?php 
  //for the side nav of the admin panel
  require_once 'side_nav.php'

  ;?>

  </div><!--class col-lg-2 end-->
      <div class="Modal" v-if="modal">
       <button class="close mr-2 mt-2" @click="modal = false">&times;</button>
       <div class="modalHeader p-2">
          <h4 class="ml-2">Change Profile</h4>
       </div>
       <div class="modalBody p-3">
        <label>Photo</label><br>
        <input type="file" id="file" ref="file" v-on:change="handleFileUpload()">
        <button class="change-dp mt-2" @click="editDp">Change</button>

       </div><!--end class modalBody-->
    </div><!--end class modal-->

  <div class="col-lg-10">
     
      <div class="row">
        <div class="col-lg-1">
          
        </div>
        <div class="col-lg-5">
 
          <div class="card card-admin-settings" >

            <div class="card-header">
                <img class="admin-photo" v-bind:src="'<?php echo base_url();?>assets/images/' + user.photo"><br>
                <button class="change-dp" @click="modal = true"><span class="fa fa-camera"></span></button>
            </div>

            <div class="card-body">
              <label>Name</label><br>
              <input type="text" class="admin-info"  @keyup="nameMonitor()" v-model="user.name" v-bind:disabled="disabledName" >
              <i v-if="nameErr" class="error">{{nameErr}}</i>

            
              <button v-if="change" class="edit-info" @click="disabledName = false; change = false">Edit Name</button>
              <button v-if="!change" class="edit-info" @click="editName();change = true;disabledName = true;">Change</button>

            </div><!-- class card-body end-->
          </div><!-- class card end-->

          <h6 class="text-center alert alert-info mt-3" v-if="nameDpMsg">{{nameDpMsg}}</h6>
      
          </div><!--class col-lg-5 end-->
        <div class="col-lg-5">

           <div class="card card-admin-settings" >

            <div class="card-header">
                <h5>Security <span class="fa fa-lock"></span></h5>
            </div>

            <div class="card-body">

              <label>Password</label><br>
              <input type="password" class="admin-info" @keyup="passMonitor()" v-model="user.password"  v-bind:disabled="disabled" placeholder="********">
              <i v-if="passErr" class="error">{{passErr}}</i><br>

              <label class="mt-3">Re-type Password</label><br>
              <input type="password" @keyup="pass2Monitor()" v-model="user.pass2" class="admin-info" v-bind:disabled="disabled" placeholder="********">
              <i v-if="pass2Err" class="error">{{pass2Err}}</i>
              <i v-if="success" class="success">{{success}}</i><br>

              <label class="mt-3">Hint</label><br>
              <input type="text" class="admin-info" v-model="user.hint" v-bind:disabled="disabled" >
              <i v-if="hintErr" class="error">{{hintErr}}</i><br>

              <button v-if="securityChange" class="edit-info mt-2" @click="disabled = false; securityChange = false;">Edit Security</button>
              <button v-if="!securityChange" class="edit-info" @click="editSecurity();securityChange = true;disabled = true">Change</button>

            </div><!-- class card-body end-->
          </div><!--class card end-->

           <h6 class="text-center alert alert-info mt-3" v-if="secMsg">{{secMsg}}</h6>

        </div><!--class col-lg-5 end-->

         <div class="col-lg-1">
          
        </div>

      </div><!--class row end-->
     
   </div><!--class col-lg-10 end-->
</div><!--class row end-->


