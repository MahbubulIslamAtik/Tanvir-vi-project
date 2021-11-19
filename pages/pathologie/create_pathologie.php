<?php
if(isset($_POST["btnCreate"])){
	$name=$_POST["txtName"];
$price=$_POST["txtPrice"];

	$obj=new Pathologie("",$name,$price);
	$obj->save();
}
?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Pathologie</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Pathologie</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card"><form class='form-horizontal' action='create-pathologies' method='post'><div class='card-header'>
				<a href='manage-pathologies' class='btn btn-success'>Manage Pathologie</a>
			</div>
				<div class='card-body'>
<?php
$html="";
$html.=input_field(["label"=>"Name","name"=>"Name"]);
$html.=input_field(["label"=>"Price","name"=>"Price"]);

		echo $html;
?>
			<!-- </div>
				<div class='card-footer'> -->
        <div class="card-footer">
                <button type="submit" name="btnCreate" class="btn btn-info">New Test</button>
                <button type="reset" name="Clear" class="btn btn-secondary float-right">Clear</button>
              </div>
<?php
	// $html=input_button(["type"=>"submit","name"=>"btnCreate","value"=>"Create"]);
	// 	echo $html;
?>
			</div>
</form>

</section>
    <!-- /.content -->