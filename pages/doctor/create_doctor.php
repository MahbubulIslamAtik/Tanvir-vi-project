<?php
if(isset($_POST["btnCreate"])){
	$name=$_POST["txtName"];
$email=$_POST["txtEmail"];
$phone=$_POST["txtPhone"];
$role=$_POST["txtRole"];
$specialists=$_POST["txtSpecialists"];
$gender=$_POST["rdoGender"];
$hospital=$_POST["txtHospital"];
$created_at=$_POST["txtTime"];

	$obj=new Doctor("",$name,$email,$phone,$role,$specialists,$gender,$hospital,$created_at);
	$obj->save();
}
?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Doctor</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Doctor</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card"><form class='form-horizontal' action='create-doctors' method='post'><div class='card-header'>
				<a href='manage-doctors' class='btn btn-success'>Manage Doctor</a>
			</div>
				<div class='card-body'>
<?php
      $html="";
      $html.=input_field(["label"=>"Name","name"=>"Name"]);
      $html.=input_field(["label"=>"Email","name"=>"Email"]);
      $html.=input_field(["label"=>"Phone","name"=>"Phone"]);
      $html.=input_field(["label"=>"Role","name"=>"Role"]);
      $options=[
        ["type"=>"radio", "name"=>"Gender", "value"=>"Male"],
        ["type"=>"radio", "name"=>"Gender", "value"=>"Female"],
       
      ];
      $html.=input_field_radio("Gender", $options);
      $html.=input_field(["label"=>"Specialists","name"=>"Specialists"]);
      //$html.=input_field(["label"=>"Gender","name"=>"txtGender"]);
      $html.=input_field(["label"=>"Hospital","name"=>"Hospital"]);
      $html.=input_field(["label"=>"Created_at","name"=>"Time"]);

		echo $html;
?>
    <div class="card-footer">
                <button type="submit" name="btnCreate" class="btn btn-info">Create Doctors</button>
                <button type="reset" name="Clear" class="btn btn-secondary float-right">Clear</button>
              </div>

			<!-- </div>
				<div class='card-footer'> -->
<?php
	// $html=input_button(["type"=>"submit","name"=>"btnCreate","value"=>"Create"]);
	// 	echo $html;
?>
			</div>
</form>

</section>
    <!-- /.content -->