
<?php

if(isset($_POST["btnCreate"])){

  $rolename=$_POST["txtRole"];
  $role=new Role(null,$rolename);

  if($role->save()){
    echo "Success";
  }else{
    echo "fail to save";
  }
  

}


?>


<!-- Content Header (Page header) -->
 <?php
    $breadcrumb=[
      ["name"=>"Home","url"=>"#"],
      ["name"=>"Manage Role","url"=>"#"]
      
    ];     
   echo page_header("Manage Role",$breadcrumb);
 ?>
  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Role</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">

      <form action="#" class="form-horizontal" method="post">
              <div class="card-body">
                 <?php
                
                 
                 $config_username=[
                      "label"=>"Role Name",
                      "name"=>"Role",
                      "type"=>"text",
                      "placeholder"=>"Enter Role Name",
                      "required"=>"required"                      
                 ];
                  
                 echo input_field($config_username);                  

              
                 
                 ?>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" name="btnCreate" class="btn btn-info">Create User</button>
                <button type="reset" name="btnClear" class="btn btn-default float-right">Clear</button>
              </div>
              <!-- /.card-footer -->
        </form>


      </div>

      <div class="card-body">
        
        <?php
        echo Role::get_roles();
        ?>
         
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        Footer
      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->