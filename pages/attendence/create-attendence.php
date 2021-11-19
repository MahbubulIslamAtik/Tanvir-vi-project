<?php

if(isset($_POST["btnCreate"])){

  //$id=$_POST["txtId"];
  $employeename=$_POST["cmbEmployees"];
  $departmentname=$_POST["cmbDepartment"];
  
  $intime=$_POST["txtIntime"];
  $outtime=$_POST["txtOuttime"];
  $date=$_POST["txtDate"];

  $attendence=new Attendence("",$employeename,$departmentname,$intime,$outtime,$date);

  print_r($attendence);

  if($attendence->save()){
    
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
      ["name"=>"Create Attendence","url"=>"#"]
      
    ];     
   echo page_header("Create Attendence",$breadcrumb);
 ?>
  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
     <h3  class="card-title"><a href="manage-attendence" class="btn btn-primary">Manage Attendence</a></h3>

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

      <form action="create-attendence" class="form-horizontal " method="post">
              <div class="card-body">
                 <?php      
                //  echo input_field(["label"=>"ID","name"=>"Id","type"=>"text","placeholder"=>"Enter Employee Name","required"=>"required" ]);    
                 //echo input_field(["label"=>"Employee Name","name"=>"Employee","type"=>"text","placeholder"=>"Enter Employee Name","required"=>"required" ]);

                 echo Employees::html_select_employees();
                 echo Departments::html_select_departments();
                 
                 echo input_field(["label"=>"In-Time","name"=>"Intime","type"=>"time","required"=>"required" ]);
                 echo input_field(["label"=>"Out-Time","name"=>"Outtime","type"=>"time","required"=>"required" ]);
                 echo input_field(["label"=>"Date","name"=>"Date","type"=>"date","placeholder"=>"Date","required"=>"required" ]);
            
                 ?>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" name="btnCreate" class="btn btn-info">Create Attendence</button>
                <button type="reset" name="Clear" class="btn btn-secondary float-right">Clear</button>
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
