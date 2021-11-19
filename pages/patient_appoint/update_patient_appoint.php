<?php
if(isset($_POST["btnEdit"])){
	$patient_appoint_id=$_POST["txtId"];
	$obj=Patient_appoint::get_patient_appoint($patient_appoint_id);
}
if(isset($_POST["btnUpdate"])){
	$patient_appoint_id=$_POST["txtId"];
	$name=$_POST["txtName"];
$age=$_POST["txtAge"];
$doctor_id=$_POST["cmbDoctor"];
$shift_time=$_POST["txtShift_time"];
$appoint_date=$_POST["txtAppoint_date"];

	$obj=new Patient_appoint($patient_appoint_id,$name,$age,$doctor_id,$shift_time,$appoint_date);
	$obj->update();
}
?>
<form class='form-horizontal' action='edit-patient_appoints' method='post'><div class='card-header'>
				<a href='manage-patient_appoints' class='btn btn-success'>Manage Patient_appoint</a>
			</div>
				<div class='card-body'>
<?php
$html="";
$html.=input_field(["type"=>"hidden","name"=>"txtId","value"=>$obj->id]);
$html.=input_field(["label"=>"Name","name"=>"txtName","value"=>$obj->name]);
$html.=input_field(["label"=>"Age","name"=>"txtAge","value"=>$obj->age]);
$html.=select_field(["label"=>"Doctor","name"=>"cmbDoctor","table"=>"doctors","value"=>$obj->doctor_id]);
$html.=input_field(["label"=>"Shift_time","name"=>"txtShift_time","value"=>$obj->shift_time]);
$html.=input_field(["label"=>"Appoint_date","name"=>"txtAppoint_date","value"=>$obj->appoint_date]);

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