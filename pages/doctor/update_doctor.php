<?php
if(isset($_POST["btnEdit"])){
	$doctor_id=$_POST["txtId"];
	$obj=Doctor::get_doctor($doctor_id);
}
if(isset($_POST["btnUpdate"])){
	$doctor_id=$_POST["txtId"];
	$name=$_POST["txtName"];
$email=$_POST["txtEmail"];
$phone=$_POST["txtPhone"];
$role=$_POST["txtRole"];
$specialists=$_POST["txtSpecialists"];
$gender=$_POST["txtGender"];
$hospital=$_POST["txtHospital"];
$created_at=$_POST["txtCreated_at"];

	$obj=new Doctor($doctor_id,$name,$email,$phone,$role,$specialists,$gender,$hospital,$created_at);
	$obj->update();
}
?>
<form class='form-horizontal' action='edit-doctor' method='post'><div class='card-header'>
				<a href='manage-doctors' class='btn btn-success'>Manage Doctor</a>
			</div>
				<div class='card-body'>
<?php
$html="";
$html.=input_field(["type"=>"hidden","name"=>"Id","value"=>$obj->id]);
$html.=input_field(["label"=>"Name","name"=>"Name","value"=>$obj->name]);
$html.=input_field(["label"=>"Email","name"=>"Email","value"=>$obj->email]);
$html.=input_field(["label"=>"Phone","name"=>"Phone","value"=>$obj->phone]);
$html.=input_field(["label"=>"Role","name"=>"Role","value"=>$obj->role]);
$html.=input_field(["label"=>"Specialists","name"=>"Specialists","value"=>$obj->specialists]);
$html.=input_field(["label"=>"Gender","name"=>"Gender","value"=>$obj->gender]);
$html.=input_field(["label"=>"Hospital","name"=>"Hospital","value"=>$obj->hospital]);
$html.=input_field(["label"=>"Created_at","name"=>"Created_at","value"=>$obj->created_at]);

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