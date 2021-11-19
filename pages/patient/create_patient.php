<?php
if(isset($_POST["btnCreate"])){
	$name=$_POST["txtName"];
$age=$_POST["txtAge"];
$gender=$_POST["rdoGender"];
$problem=$_POST["txtProblem"];
$doctor_id=$_POST["cmbDoctor"];

	$obj=new Patient("",$name,$age,$gender,$problem,$doctor_id);
	$obj->save();
}
?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Patient</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Patient</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card"><form class='form-horizontal' action='create-patients' method='post'><div class='card-header'>
				<a href='manage-patients' class='btn btn-success'>Manage Patient</a>
			</div>
				<div class='card-body'>
<?php
$html="";
$html.=input_field(["label"=>"Name","name"=>"Name"]);
$html.=input_field(["label"=>"Age","name"=>"Age"]);
$options=[
  ["type"=>"radio", "name"=>"Gender", "value"=>"Male"],
  ["type"=>"radio", "name"=>"Gender", "value"=>"Female"],
 
];
$html.=input_field_radio("Gender", $options);
$html.=input_field(["label"=>"Problem","name"=>"Problem"]);
$html.=select_field(["label"=>"Doctor","name"=>"cmbDoctor","table"=>"doctors"]);

		echo $html;
?>
<div class="card-footer">
                <button type="submit" name="btnCreate" class="btn btn-info">Create Patient</button>
                <button type="reset" name="Clear" class="btn btn-secondary float-right">Clear</button>
              </div>
			<!-- </div>
				<div class='card-footer'> -->
<?php
	// $html=input_button(["type"=>"submit","name"=>"Create","value"=>"Create"]);
	// 	echo $html;
?>
			</div>
</form>

</section>
    <!-- /.content -->