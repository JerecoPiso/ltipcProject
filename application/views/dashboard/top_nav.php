 <div  @mouseleave = "setting = false">
   <img @mouseover="setting = true" class="img" v-bind:src="'<?php echo base_url();?>assets/images/' + user.photo"><br><br>  
        <div  class="d-flex flex-row-reverse" >
       
          <ul class="nav flex-column logos-dropdown" v-if="setting" >

            <li class="nav-item">
               <a class="nav-link" href="<?php echo base_url();?>index.php/dashboard/settings"><span class="fa fa-cogs mr-1"></span> Settings</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="<?php echo base_url();?>index.php/dashboard/logout"><span class="fa fa-share mr-2"></span> Logout</a>
            </li>
           
           
         </ul>
       
      </div>
 </div>