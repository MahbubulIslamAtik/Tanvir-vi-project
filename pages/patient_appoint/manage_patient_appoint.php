<?php
if(isset($_POST["btnDelete"])){
	$patient_appoint_id=$_POST["txtId"];
	Patient_appoint::delete($patient_appoint_id);}
?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Patient_appoint</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Patient_appoint</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card">
      <div class='card-header'>
				<a href='create-patient_appoints' class='btn btn-success'>New Patient_appoint</a>
			</div>
				<div class='card-body'>
		<?php
			echo Patient_appoint::manage_patient_appoints();
		?>
			</div>
    <div class="card-footer">
      &nbsp;
    </div>
</div>

</section>
    <!-- /.content -->