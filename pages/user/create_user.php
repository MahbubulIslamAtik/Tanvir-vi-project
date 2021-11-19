<?php

 

  if(isset($_POST["btnCreate"])){

    $username=$_POST["txtUsername"];
    $password=$_POST["txtPassword"];
    $role_id=$_POST["cmbRole"];

    $user=new User("",$role_id,$username,$password);
    $user->save();

    echo "Success";

    //echo "<script>window.location='manage-user'</script>";

  }


?>



  <!-- Content Header (Page header) -->
   <?php
      $breadcrumb=[
        ["name"=>"Home","url"=>"#"],
        ["name"=>"Create User","url"=>"#"]
        
      ];     
     echo page_header("Create User",$breadcrumb);
   ?>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
        <h3  class="card-title"><a href="manage-user" class="btn btn-primary">Manage User</a></h3>

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
       
        <form action="create-user" class="form-horizontal" method="post">
                <div class="card-body">
                   <?php                   
                   echo Role::html_select_roles();            
                   echo input_field(["label"=>"User Name","name"=>"Username","type"=>"text","placeholder"=>"Enter Username","required"=>"required"]);
                   echo input_field(["label"=>"Password","name"=>"Password","type"=>"password","placeholder"=>"Enter Username"]);                  
                   echo input_field(["label"=>"Retype Password","name"=>"RePassword","type"=>"password","placeholder"=>"Enter Username"]);                  
                                      
                   ?>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                   <div class="btn-group">
                    <?php
                    echo input_button(["type"=>"submit","name"=>"Create","value"=>"Create User"]);
                    echo input_button(["type"=>"reset","name"=>"Clear","value"=>"Clear"]);
                    ?>   
                  </div>              
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