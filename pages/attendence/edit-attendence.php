<?php

if(isset($_POST["btnEdit"])){
    $id=$_POST["txtId"];     
    $attendence=Attendence::get_attendence($id);


    print_r($attendence);
}

?>
<?php

if(isset($_POST["btnUpdate"])){

  $id=$_POST["txtId"];
  $employeename=$_POST["cmbEmployees"];
  $departmentname=$_POST["cmbDepartment"];
  
  $intime=$_POST["txtIntime"];
  $outtime=$_POST["txtOuttime"];
  $date=$_POST["txtDate"];

  $_attendence=new Attendence("",$employeename,$departmentname,$intime,$outtime,$date);

  if($_attendence->update()){
    echo "Success";
  }else{
    echo "fail to save";
  }
  
  echo "<script>window.location='manage-attendence'</script>";

}


?>


<!-- Content Header (Page header) -->
 <?php
    $breadcrumb=[
      ["name"=>"Home","url"=>"#"],
      ["name"=>"Update Attendence","url"=>"#"]
      
    ];     
   echo page_header("Update Attendence",$breadcrumb);
 ?>
  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
      <h3  class="card-title"><a href="manage-attendence" class="btn btn-primary">Manage attendence</a></h3>

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

      <form action="edit-attendence" class="form-horizontal" method="post">
              <div class="card-body">
                 <?php
                
                 
                
                echo Employees::html_select_employees(isset($attendence->employee_id)?$attendence->employee_id:0);
                echo Departments::html_select_departments(isset($attendence->department_id)?$attendence->department_id:0);
                
                echo input_field(["label"=>"In-Time","name"=>"Intime","type"=>"text","required"=>"required","value"=>isset($attendence->in_time)?$attendence->in_time:"" ]);
                echo input_field(["label"=>"Out-Time","name"=>"Outtime","type"=>"text","required"=>"required","value"=>isset($attendence->out_time)?$attendence->out_time:"" ]);
                echo input_field(["label"=>"Date","name"=>"Date","type"=>"text","placeholder"=>"Date","required"=>"required","value"=>isset($attendence->date)?$attendence->date:"" ]);               

              
                 
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