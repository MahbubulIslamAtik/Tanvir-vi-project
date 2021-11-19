<?php

    require_once("lib/component.php");
?>

<?php        

    if(isset($_POST["btnDelete"])){
      $id=$_POST["txtId"];
      User::delete($id);

    }

?>

<!-- Content Header (Page header) -->
 <?php
    $breadcrumb=[
      ["name"=>"Home","url"=>"#"],
      ["name"=>"Manage User","url"=>"#"]
      
    ];     
   echo page_header("Manage User",$breadcrumb);
 ?>
  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3  class="card-title"><a href="create-user" class="btn btn-primary">Create User</a></h3>
        

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

      <?php
            echo User::get_users();
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