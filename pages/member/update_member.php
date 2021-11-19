<?php
if(isset($_POST["btnEdit"])){
	$member_id=$_POST["txtId"];
	$obj=Member::get_member($member_id);
}

if(isset($_POST["btnUpdate"])){
$member_id=$_POST["txtId"];
$employee_name=$_POST["txtEmployee_name"];
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

	$obj=new Member($member_id,$employee_name,$member_name,$occupation,$mobile,$nid_no,$address,$guardian_name,$guardian_mobile,$nominee,$nominee_mobile,$nominee_relation,$refernce_by,$refernce_mobile);
	$obj->update();
}
?>
<form class='form-horizontal' action='manage-members' method='post'><div class='card-header'>
				<a href='manage-members' class='btn btn-success'>Manage Member</a>
			</div>
				<div class='card-body'>
<?php
$html="";
$html.=input_field(["type"=>"hidden","name"=>"txtId","value"=>$obj->id]);
$html.= Employees::html_select_employees();
//$html.=input_field(["label"=>"Employee_name","name"=>"txtEmployee_name","value"=>$obj->employee_name]);
$html.=input_field(["label"=>"Member_name","name"=>"txtMember_name","type"=>"text","value"=>$obj->member_name]);
$html.=input_field(["label"=>"Occupation","name"=>"txtOccupation","type"=>"text","value"=>$obj->occupation]);
$html.=input_field(["label"=>"Mobile","name"=>"txtMobile","type"=>"text","value"=>$obj->mobile]);
$html.=input_field(["label"=>"Nid_no","name"=>"txtNid_no","type"=>"text","value"=>$obj->nid_no]);
$html.=input_field(["label"=>"Address","name"=>"txtAddress","type"=>"text","value"=>$obj->address]);
$html.=input_field(["label"=>"Guardian_name","name"=>"txtGuardian_name","type"=>"text","value"=>$obj->guardian_name]);
$html.=input_field(["label"=>"Guardian_mobile","name"=>"txtGuardian_mobile","type"=>"text","value"=>$obj->guardian_mobile]);
$html.=input_field(["label"=>"Nominee","name"=>"txtNominee","type"=>"text","value"=>$obj->nominee]);
$html.=input_field(["label"=>"Nominee_mobile","name"=>"txtNominee_mobile","type"=>"text","value"=>$obj->nominee_mobile]);
$html.=input_field(["label"=>"Nominee_relation","name"=>"txtNominee_relation","type"=>"text","value"=>$obj->nominee_relation]);
$html.=input_field(["label"=>"Refernce_by","name"=>"txtRefernce_by","type"=>"text","value"=>$obj->refernce_by]);
$html.=input_field(["label"=>"Refernce_mobile","name"=>"txtRefernce_mobile","type"=>"text","value"=>$obj->refernce_mobile]);

		echo $html;
?>
			<!-- </div>
			<div class='card-footer'> -->
			<div class="card-footer">
                <button type="submit" name="btnUpdate" class="btn btn-info">Update Members</button>
                <button type="reset" name="Clear" class="btn btn-secondary float-right">Clear</button>
              </div>

	<!-- $html=input_button(["type"=>"submit","name"=>"btnUpdate","value"=>"Update"]);
		echo $html; -->

			</div>
</form>
</section>
    <!-- /.content -->