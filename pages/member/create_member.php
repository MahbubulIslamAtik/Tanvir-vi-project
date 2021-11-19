<?php
if(isset($_POST["btnCreate"])){

$employee_name=$_POST["cmbEmployees"];
$member_name=$_POST["txtMember_name"];
$occupation=$_POST["txtOccupation"];
$mobile=$_POST["txtMobile"];
$nid_no=$_POST["txtNid_no"];
$address=$_POST["txtAddress"];
$guardian_name=$_POST["txtGuardian_name"];
$guardian_mobile=$_POST["txtGuardian_mobile"];
$nominee=$_POST["txtNominee"];
$nominee_mobile=$_POST["txtNominee_mobile"];
$nominee_relation=$_POST["txtNominee_relation"];
$refernce_by=$_POST["txtRefernce_by"];
$refernce_mobile=$_POST["txtRefernce_mobile"];

$file=$_FILES["file"];


	$obj=new Member("",$employee_name,$member_name,$occupation,$mobile,$nid_no,$address,$guardian_name,$guardian_mobile,$nominee,$nominee_mobile,$nominee_relation,$refernce_by,$refernce_mobile);
	$id=$obj->save($file);

  if($id>0){
    echo "Success";
  }elseif($id==-1){
    echo "Invalid file type";
  }elseif($id==-2){
    echo "Invalid file size";
  }else{
    echo "Fail to sava";
  }

  echo $obj;

  //echo "success";
}
?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Member</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Member</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card">
     <form class='form-horizontal' action='create-members' method='post' enctype="multipart/form-data"><div class='card-header' >
				<a href='manage-members' class='btn btn-success'>Manage Member</a>
			</div>
				<div class='card-body'>
<?php
$html="";
$html.= Employees::html_select_employees();
//$html.=input_field(["label"=>"Employee_name","name"=>"txtEmployee_name"]);
$html.=input_field(["label"=>"Member_name","name"=>"Member_name", "type"=>"text"]);

$html.="<div class='form-group row'>
<label for='' class='col-sm-2 col-form-label'>Photo</label>
<div class='col-sm-10'>
  <input type='file' name='file'>
</div>
</div>";


$html.=input_field(["label"=>"Occupation","name"=>"Occupation","type"=>"text"]);
$html.=input_field(["label"=>"Mobile","name"=>"Mobile","type"=>"text"]);
$html.=input_field(["label"=>"Nid_no","name"=>"Nid_no","type"=>"text"]);
$html.=input_field(["label"=>"Address","name"=>"Address","type"=>"text"]);
$html.=input_field(["label"=>"Guardian_name","name"=>"Guardian_name","type"=>"text"]);
$html.=input_field(["label"=>"Guardian_mobile","name"=>"Guardian_mobile","type"=>"text"]);
$html.=input_field(["label"=>"Nominee","name"=>"Nominee","type"=>"text"]);
$html.=input_field(["label"=>"Nominee_mobile","name"=>"Nominee_mobile","type"=>"text"]);
$html.=input_field(["label"=>"Nominee_relation","name"=>"Nominee_relation","type"=>"text"]);
$html.=input_field(["label"=>"Refernce_by","name"=>"Refernce_by","type"=>"text"]);
$html.=input_field(["label"=>"Refernce_mobile","name"=>"Refernce_mobile","type"=>"text"]);

		echo $html;

  //echo alert("Success","Your work is Success","bx bx-home","danger");
?>

             <div class="card-footer">
                <button type="submit" name="btnCreate" class="btn btn-info">Create Members</button>
                <button type="reset" name="Clear" class="btn btn-secondary float-right">Clear</button>
              </div>
			<!-- </div>
				<div class='card-footer'> -->

<!-- $html=input_button(["type"=>"submit","name"=>"btnCreate","value"=>"Create"]); -->
<!-- //   $html.=input_button(["type"=>"clear","name"=>"btnClear","value"=>"clear"]); -->
<!-- // 		echo $html; -->

 	</div>
</form>

</section>
    <!-- /.content -->