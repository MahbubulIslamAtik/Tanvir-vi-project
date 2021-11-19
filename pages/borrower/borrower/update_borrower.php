<?php
if(isset($_POST["btnEdit"])){
	$borrower_id=$_POST["txtId"];
	$obj=Borrower::get_borrower($borrower_id);
}
if(isset($_POST["btnUpdate"])){
	$borrower_id=$_POST["txtId"];
	$borrower_name=$_POST["txtBorrower_name"];
$address=$_POST["txtAddress"];
$nid=$_POST["txtNid"];
$mobile=$_POST["txtMobile"];
$gender=$_POST["txtGender"];
$loan_type=$_POST["txtLoan_type"];
$duration_time=$_POST["txtDuration_time"];
$amount=$_POST["txtAmount"];

	$obj=new Borrower($borrower_id,$borrower_name,$address,$nid,$mobile,$gender,$loan_type,$duration_time,$amount);
	$obj->update();
}
?>
<form class='form-horizontal' action='edit-borrower' method='post'><div class='card-header'>
				<a href='manage-borrower' class='btn btn-success'>Manage Borrower</a>
			</div>
				<div class='card-body'>
<?php
$html="";
$html.=input_field(["type"=>"hidden","name"=>"Id","value"=>$obj->id]);
$html.=input_field(["label"=>"Borrower_name","name"=>"Borrower_name","type"=>"text","value"=>$obj->borrower_name ]);
$html.=input_field(["label"=>"Address","name"=>"Address","type"=>"text","value"=>$obj->address]);
$html.=input_field(["label"=>"Nid","name"=>"Nid","type"=>"text","value"=>$obj->nid]);
$html.=input_field(["label"=>"Mobile","name"=>"Mobile","type"=>"text","value"=>$obj->mobile]);
$html.=input_field(["label"=>"Gender","name"=>"Gender","type"=>"text","value"=>$obj->gender]);
$html.=input_field(["label"=>"Loan Type","name"=>"Loan_type","type"=>"text","value"=>$obj->loan_type]);

// $options=[
//   ["type"=>"radio", "name"=>"Gender","type"=>"text","value"=>"Male"],
//   ["type"=>"radio", "name"=>"Gender", "type"=>"text","value"=>"Female"],
//   ["type"=>"radio", "name"=>"Gender", "type"=>"text","value"=>"Others"],
// ];
// $html.=input_field_radio("Gender", $options);
// $options=[
// 	["type"=>"radio", "name"=>"Loan_type", "value"=>"D.P.S","type"=>"text"],
// 	["type"=>"radio", "name"=>"Loan_type", "value"=>"F.D.R","type"=>"text"],
// 	["type"=>"radio", "name"=>"Loan_type", "value"=>"Others","type"=>"text"]
//   ];
//   $html.=input_field_radio("Loan_type", $options);


//$html.=input_field(["label"=>"Gender","name"=>"txtGender"]);
//$html.=input_field(["label"=>"Loan_type","name"=>"txtLoan_type"]);
$html.=input_field(["label"=>"Duration_time","name"=>"Duration_time","type"=>"text","value"=>$obj->duration_time]);
$html.=input_field(["label"=>"Amount","name"=>"Amount","type"=>"text","value"=>$obj->amount]);

		echo $html;
?>
			</div>
				<div class='card-footer'>
<?php
	$html=input_button(["type"=>"submit","name"=>"Update","value"=>"Update"]);
		echo $html;
?>
			</div>
</form>
</section>
    <!-- /.content -->