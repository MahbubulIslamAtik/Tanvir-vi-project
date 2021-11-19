<?php
if(isset($_POST["btnCreate"])){

  $borrower_name=$_POST["txtBorrower_name"];
$address=$_POST["txtAddress"];
$nid=$_POST["txtNid"];
$mobile=$_POST["txtMobile"];
$gender=$_POST["rdoGender"];
$loan_type=$_POST["rdoLoan_type"];
$duration_time=$_POST["txtDuration_time"];
$amount=$_POST["txtAmount"];

	$obj=new Borrower("",$borrower_name,$address,$nid,$mobile,$gender,$loan_type,$duration_time,$amount);
	$obj->save();
}
?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Borrower</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Borrower</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card"><form class='form-horizontal' action='create-borrower' method='post'><div class='card-header'>
				<a href='manage-borrower' class='btn btn-success'>Manage Borrower</a>
			</div>
				<div class='card-body'>
<?php
$html="";
$html.=input_field(["label"=>"Borrower_name","name"=>"Borrower_name","type"=>"text" ]);
$html.=input_field(["label"=>"Address","name"=>"Address","type"=>"text"]);
$html.=input_field(["label"=>"Nid","name"=>"Nid","type"=>"text"]);
$html.=input_field(["label"=>"Mobile","name"=>"Mobile","type"=>"text"]);
$options=[
  ["type"=>"radio", "name"=>"Gender", "value"=>"Male","type"=>"text"],
  ["type"=>"radio", "name"=>"Gender", "value"=>"Female","type"=>"text"],
  ["type"=>"radio", "name"=>"Gender", "value"=>"Others","type"=>"text"]
];
$html.=input_field_radio("Gender", $options);
$options=[
  ["type"=>"radio", "name"=>"Loan_type", "value"=>"D.P.S","type"=>"text"],
  ["type"=>"radio", "name"=>"Loan_type", "value"=>"F.D.R","type"=>"text"],
  ["type"=>"radio", "name"=>"Loan_type", "value"=>"Others","type"=>"text"]
];
$html.=input_field_radio("Loan_type", $options);


//$html.=input_field(["label"=>"Gender","name"=>"txtGender"]);
//$html.=input_field(["label"=>"Loan_type","name"=>"txtLoan_type"]);
$html.=input_field(["label"=>"Duration_time","name"=>"Duration_time","type"=>"text"]);
$html.=input_field(["label"=>"Amount","name"=>"Amount","type"=>"text"]);

		echo $html;
?>
    <div class="card-footer">
                <button type="submit" name="btnCreate" class="btn btn-info">Create Borrower</button>
                <button type="reset" name="Clear" class="btn btn-secondary float-right">Clear</button>
              </div>

			<!-- </div>
				<div class='card-footer'> -->
<?php
	// $html=input_button(["type"=>"submit","name"=>"btnCreate","value"=>"Create"]);
  // $html.=input_button(["type"=>"reset","name"=>"clear","value"=>"Clear"]);
	// 	echo $html;
?>
			</div>
</form>

</section>
    <!-- /.content -->