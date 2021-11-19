<?php
if(isset($_POST["btnCreate"])){
	$name=$_POST["txtName"];
$age=$_POST["txtAge"];
$doctor_id=$_POST["cmbDoctor"];
$shift_time=$_POST["txtShift_time"];
$appoint_date=$_POST["txtAppoint_date"];

	$obj=new Patient_appoint("",$name,$age,$doctor_id,$shift_time,$appoint_date);
	$obj->save();
}
?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Patient_appoint</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Patient_appoint</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card"><form class='form-horizontal' action='create-patient_appoints' method='post'><div class='card-header'>
				<a href='manage-patient_appoints' class='btn btn-success'>Manage Patient_appoint</a>
			</div>
				<div class='card-body'>
<?php
$html="";
$html.=input_field(["label"=>"Name","name"=>"Name"]);
$html.=input_field(["label"=>"Age","name"=>"Age"]);
$html.=select_field(["label"=>"Doctor","name"=>"cmbDoctor","table"=>"doctors"]);
$html.=input_field(["label"=>"Shift_time","name"=>"Shift_time"]);
$html.=input_field(["label"=>"Appoint_date","name"=>"Appoint_date","type"=>"date"]);

		echo $html;
?>
<div class="card-footer">
                <button type="submit" name="btnCreate" class="btn btn-info">Create Appoint</button>
                <button type="reset" name="Clear" class="btn btn-secondary float-right">Clear</button>
              </div>
			<!-- </div>
				<div class='card-footer'> -->
<?php
// 	$html=input_button(["type"=>"submit","name"=>"btnCreate","value"=>"Create"]);
// 		echo $html;
// ?>
			</div>
</form>

</section>
    <!-- /.content -->