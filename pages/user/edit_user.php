<?php

if(isset($_POST["btnEdit"])){
    $id=$_POST["txtId"];     
    $user=User::get_user($id);
}
   
?>

<?php

 

  if(isset($_POST["btnUpdate"])){

    $id=$_POST["txtId"];
    $username=$_POST["txtUsername"];
    $password=$_POST["txtPassword"];
    $role_id=$_POST["cmbRole"];


    $_user=new User($id,$role_id,$username,$password);   
    $_user->update();

    echo "<script>window.location='manage-user'</script>";
    
  }


?>



  <!-- Content Header (Page header) -->
   <?php
      $breadcrumb=[
        ["name"=>"Home","url"=>"#"],
        ["name"=>"Update User","url"=>"#"]
        
      ];     
     echo page_header("Update User",$breadcrumb);
   ?>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Title</h3>

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
       
        <form action="edit-user" class="form-horizontal" method="post">
                <div class="card-body">
                   <?php   
                    echo input_field(["label"=>"","name"=>"Id","type"=>"hidden","value"=>isset($user->id)?$user->id:""])       ;         
                                  
                   echo Role::html_select_roles(isset($user->role_id)?$user->role_id:0);
                    
                   echo input_field(["label"=>"User Name","name"=>"Username","type"=>"text","placeholder"=>"Enter Username","required"=>"required","value"=>isset($user->username)?$user->username:""]);
                   echo input_field(["label"=>"Password","name"=>"Password","type"=>"password","placeholder"=>"Enter Username","value"=>isset($user->password)?$user->password:""]);                  
                   echo input_field(["label"=>"Retype Password","name"=>"RePassword","type"=>"password","placeholder"=>"Enter Username","value"=>isset($user->password)?$user->password:""]);                  
                                      
                   ?>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <?php
                   echo input_button(["type"=>"submit","name"=>"Update","value"=>"Update User"]);
                   echo input_button(["type"=>"reset","name"=>"Clear","value"=>"Clear"]);
                  ?>                 
                </div>
                <!-- /.card-footer -->
          </form>


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