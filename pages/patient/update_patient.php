<?php
if(isset($_POST["btnEdit"])){
	$patient_id=$_POST["txtId"];
	$obj=Patient::get_patient($patient_id);
}
if(isset($_POST["btnUpdate"])){
	$patient_id=$_POST["txtId"];
	$name=$_POST["txtName"];
$age=$_POST["txtAge"];
$gender=$_POST["txtGender"];
$problem=$_POST["txtProblem"];
$doctor_id=$_POST["cmbDoctor"];

	$obj=new Patient($patient_id,$name,$age,$gender,$problem,$doctor_id);
	$obj->update();
}
?>
<form class='form-horizontal' action='edit-patient' method='post'><div class='card-header'>
				<a href='manage-patients' class='btn btn-success'>Manage Patient</a>
			</div>
				<div class='card-body'>
<?php
$html="";
$html.=input_field(["type"=>"hidden","name"=>"txtId","value"=>$obj->id]);
$html.=input_field(["label"=>"Name","name"=>"txtName","value"=>$obj->name]);
$html.=input_field(["label"=>"Age","name"=>"txtAge","value"=>$obj->age]);
$html.=input_field(["label"=>"Gender","name"=>"txtGender","value"=>$obj->gender]);
$html.=input_field(["label"=>"Problem","name"=>"txtProblem","value"=>$obj->problem]);
$html.=select_field(["label"=>"Doctor","name"=>"cmbDoctor","table"=>"doctors","value"=>$obj->doctor_id]);

		echo $html;
?>
			</div>
				<div class='card-footer'>
<?php
	$html=input_button(["type"=>"submit","name"=>"btnUpdate","value"=>"Update"]);
		echo $html;
?>
			</div>
</form>
</section>
    <!-- /.content -->