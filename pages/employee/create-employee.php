
<?php

if(isset($_POST["btnCreate"])){

  $employeename=$_POST["txtEmployee"];
  $departmentname=$_POST["cmbDepartment"];
  $positionname=$_POST["cmbPosition"];
  $presentaddress=$_POST["txtPresentAddress"];
  $permanentaddress=$_POST["txtPermanentAddress"];
  $nidno=$_POST["txtNidNo"];
  $mobile=$_POST["txtMobile"];
  $gender=$_POST["rdoGender"];
  $joiningdate=$_POST["txtJoiningDate"];
  $email=$_POST["txtEmail"];

  $employee=new Employees("",$employeename,$departmentname,$positionname,$presentaddress,$permanentaddress,$nidno,$mobile,$gender,$joiningdate,$email);

  print_r($employee);

  if($employee->save()){
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
      ["name"=>"Create Employee","url"=>"#"]
      
    ];     
   echo page_header("Create Employee",$breadcrumb);
 ?>
  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
     <h3  class="card-title"><a href="manage-employee" class="btn btn-primary">Manage Employee</a></h3>

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

      <form action="create-employee" class="form-horizontal" method="post">
              <div class="card-body" >
                 <?php          
                 echo input_field(["label"=>"Employee Name","name"=>"Employee","type"=>"text","placeholder"=>"Enter Employee Name","required"=>"required"]);
                 echo Departments::html_select_departments();
                 echo Position::html_select_positions();
                 echo input_field(["label"=>"Present Address","name"=>"PresentAddress","type"=>"text","placeholder"=>"Enter Present address","required"=>"required" ]);
                 echo input_field(["label"=>"Permanent Address","name"=>"PermanentAddress","type"=>"text","placeholder"=>"Enter Permanent address","required"=>"required" ]);
                 echo input_field(["label"=>"Nid No","name"=>"NidNo","type"=>"text","placeholder"=>"Enter nid no","required"=>"required" ]);
                 echo input_field(["label"=>"Mobile","name"=>"Mobile","type"=>"text","placeholder"=>"Enter your mobile","required"=>"required" ]);
                 $options=[
                  ["type"=>"radio", "name"=>"Gender", "value"=>"Male"],
                  ["type"=>"radio", "name"=>"Gender", "value"=>"Female"],
                  ["type"=>"radio", "name"=>"Gender", "value"=>"Others"]
                ];
                echo input_field_radio("Gender", $options);
    
                 echo input_field(["label"=>"Joining date","name"=>"JoiningDate","type"=>"text","placeholder"=>"","required"=>"required" ]);
                 echo input_field(["label"=>"Email","name"=>"Email","type"=>"text","placeholder"=>"Enter your Email","required"=>"required" ]);
            
                 ?>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" name="btnCreate" class="btn btn-info">Create Employee</button>
                <button type="reset" name="btnClear" class="btn btn-secondary float-right">Clear</button>
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