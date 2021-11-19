<?php

if(isset($_POST["btnEdit"])){
    $id=$_POST["txtId"];     
    $department=Departments::get_department($id);

    print_r($department);
}

?>
<?php

if(isset($_POST["btnUpdate"])){

  $id=$_POST["txtId"];
  $departmentsname=$_POST["txtDepartment"];

  $department=new Departments($id,$departmentsname);

  if($department->update()){
    echo "Success";
  }else{
    echo "fail to save";
  }
  
  echo "<script>window.location='manage-department'</script>";

}


?>


<!-- Content Header (Page header) -->
 <?php
    $breadcrumb=[
      ["name"=>"Home","url"=>"#"],
      ["name"=>"Update Department","url"=>"#"]
      
    ];     
   echo page_header("Update Department",$breadcrumb);
 ?>
  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
      <h3  class="card-title"><a href="manage-department" class="btn btn-primary">Manage Department</a></h3>

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

      <form action="edit-department" class="form-horizontal" method="post">
              <div class="card-body">
                 <?php
                
                 
                
                echo input_field(["label"=>"","name"=>"Id","type"=>"hidden","value"=>isset($department->id)?$department->id:""]);


                
                echo input_field(["label"=>"Department Name","name"=>"Department","type"=>"text","placeholder"=>"Enter Department Name","required"=>"required","value"=>isset($department->name)?$department->name:"" ]);                  

              
                 
                 ?>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" name="btnUpdate" class="btn btn-info">Update Department</button>
                <button type="reset" name="btnClear" class="btn btn-default float-right">Clear</button>
              </div>
              <!-- /.card-footer -->
        </form>


      </div>

      <div class="card-body">
        
        
         
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