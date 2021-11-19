<?php

if(isset($_POST["btnEdit"])){
    $id=$_POST["txtId"];     
    $employee=Employees::get_employee($id);

    //print_r($departments);
}

?>
<?php

if(isset($_POST["btnUpdate"])){
    $id=$_POST["txtId"];
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

    $employee=new Employees($id,$employeename,$departmentname,$positionname,$presentaddress,$permanentaddress,$nidno,$mobile,$gender,$joiningdate,$email);

  if($employee->Update()){
    echo "Success";
  }else{
    echo "fail to save";
  }
  
  echo "<script>window.location='manage-employee'</script>";

}


?>


<!-- Content Header (Page header) -->
 <?php
    $breadcrumb=[
      ["name"=>"Home","url"=>"#"],
      ["name"=>"Update Employee","url"=>"#"]
      
    ];     
   echo page_header("Update Employee",$breadcrumb);
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

      <form action="edit-employee" class="form-horizontal" method="post">
              <div class="card-body">
                 <?php
          
                echo input_field(["label"=>"","name"=>"Id","type"=>"hidden","value"=>isset($employee->id)?$employee->id:""]);
         
                echo input_field(["label"=>"Employee Name","name"=>"Employee","type"=>"text","placeholder"=>"Enter Employee Name","required"=>"required","value"=>isset($employee->emp_name)?$employee->emp_name:"" ]);  

                 echo Departments::html_select_departments(isset($employee->department_id)?$employee->department_id:"");
                 echo Position::html_select_positions(isset($employee->position_id)?$employee->position_id:"");

                echo input_field(["label"=>"Present Address","name"=>"PresentAddress","type"=>"text","placeholder"=>"Enter Present address","required"=>"required","value"=>isset($employee->pre_address)?$employee->pre_address:""  ]);

                echo input_field(["label"=>"Permanent Address","name"=>"PermanentAddress","type"=>"text","placeholder"=>"Enter permanent address","required"=>"required","value"=>isset($employee->per_address)?$employee->per_address:""]);

                echo input_field(["label"=>"Nid No","name"=>"NidNo","type"=>"text","placeholder"=>"Enter nid no","required"=>"required","value"=>isset($employee->nid_no)?$employee->nid_no:"" ]);

                echo input_field(["label"=>"Mobile","name"=>"Mobile","type"=>"text","placeholder"=>"Enter your mobile","required"=>"required","value"=>isset($employee->mobile)?$employee->mobile:""]);

                $options=[
                  ["type"=>"radio", "name"=>"Gender", "value"=>"Male"],
                  ["type"=>"radio", "name"=>"Gender", "value"=>"Female"],
                  ["type"=>"radio", "name"=>"Gender", "value"=>"Others"]
                ];
                echo input_field_radio("Gender", $options);

                echo input_field(["label"=>"Joining date","name"=>"JoiningDate","type"=>"text","placeholder"=>"","required"=>"required","value"=>isset($employee->joining_date)?$employee->joining_date:""]);

                echo input_field(["label"=>"Email","name"=>"Email","type"=>"text","placeholder"=>"Enter your Email","required"=>"required","value"=>isset($employee->email)?$employee->email:"" ]);

         
                 ?>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" name="btnUpdate" value="Update" class="btn btn-info" >Update Employee</button>
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