<!--for the header of the admin panel-->
<div class="row header">

  <div class="col-lg-4">
    <h3 class="pt-2 ml-4 admin-panel-text">Admin Panel</h3>
  </div><!--class col-lg-4 end-->

  <div class="col-lg-8" id="settings">
   <?php 
    //for the side nav of the admin panel
    require_once 'top_nav.php'

  ;?>
  </div><!--class col-lg-8 end-->
</div><!--class header end-->

<div class="row m-0" id="category">

  <div class="col-lg-2 side-nav">
    
  <?php 
  //for the side nav of the admin panel
  require_once 'side_nav.php'

  ;?>

  </div><!--class col-lg-2 end-->
  <!--for the modal add in action-->
  <div class="Modal" v-if="modal">
     <button class="close mr-2 mt-2" @click="modal = false; clear();">&times;</button>
     <div class="modalHeader p-2">
        <h4 class="ml-2">Add Category</h4>
     </div>
     <div class="modalBody p-3">
       <label>Category</label>
       <input type="" class="form-control" v-model="categoryInfo.category">

       <button class="add" @click="addCategory()">Add Category</button>

     </div>
  </div><!--end class modal-->
  <!--for the modal delete in action-->
  <div class="Modal" v-if="modalDelete">
     <button class="close mr-2 mt-2" @click="modalDelete = false; clear();">&times;</button>
     <div class="modalHeader p-2">
        <h4 class="ml-2">Delete Category</h4>
     </div>
     <div class="modalBody p-3">
       <h6 class="text-center red">Are you sure you want to delete this data?</h6>
       
       <button class="cancel" @click="modalDelete = false">Cancel</button> 
       <button class="yes" @click="deleteCategory();modalDelete = false;">Yes</button>

     </div>
  </div><!--end class modal-->
   <!--for the modal edit in action-->
  <div class="Modal" v-if="modalEdit">
     <button class="close mr-2 mt-2" @click="modalEdit = false; clear();">&times;</button>
     <div class="modalHeader p-2">
        <h4 class="ml-2">Edit Category</h4>
     </div>
     <div class="modalBody p-3">
       
       <label>Category</label>
       <input type="" class="form-control" v-model="categoryInfo.category">
   
       <button class="edit mt-2" @click="editCategory();modalEdit = false;">Edit</button>

     </div>
  </div><!--end class modal-->

  <div class="col-lg-10">
    <div class="page-name">
        <h4 class="p-2">Tourist Spots Category |<span class="fa fa-tasks ml-2"></span>  |</h4>
    </div>
     <div class="card mt-4">
      <div class="card-header">
        <button  class="btn btn-success" @click="modal = true">Add <span class="fa fa-plus"></span></button> 
        <h6 class="pull-right alert alert-info p-2" v-if="message">{{message}}</h6>
      </div>
        <div class="card-body"> 
         <input type="text"  class="form-control pull-right mb-2 filter" placeholder="Filter datas..." id="myInput" >        
          <div class="table-responsive table-min-height">
            <table class="table table-striped table-bordered" >
              <thead >
                    
                <th>ID</th>
                <th>Category</th>         
                <th>Action</th>
                   
              </thead>
               <tbody id="myTable" >
                  <tr v-for="category in categories">
                    <td>{{category.id}}</td>
                    <td>{{category.name}}</td>
                    <td>
                      <button class="btn-edit" @click="categoryInfo.category = category.name;
                      categoryInfo.id = category.id; modalEdit = true;"><span class="fa fa-edit"></span> Edit</button>
                      <button class="btn-delete" @click="categoryInfo.id = category.id;modalDelete = true;"><span class="fa fa-trash"></span> Delete</button>
                    </td>
                   </tr>
               </tbody>
              </table>
            </div><!--class table-responsive end-->
         </div><!-- class card body end-->      
      </div><!-- class card end-->

     
  </div><!--class col-lg-10 end-->

</div><!--class row end-->


