<?php
if(isset($_POST["btnEdit"])){
	$pathologie_id=$_POST["txtId"];
	$obj=Pathologie::get_pathologie($pathologie_id);
}
if(isset($_POST["btnUpdate"])){
	$pathologie_id=$_POST["txtId"];
	$name=$_POST["txtName"];
$price=$_POST["txtPrice"];

	$obj=new Pathologie($pathologie_id,$name,$price);
	$obj->update();
}
?>
<form class='form-horizontal' action='edit-pathologie' method='post'><div class='card-header'>
				<a href='manage-pathologies' class='btn btn-success'>Manage Pathologie</a>
			</div>
				<div class='card-body'>
<?php
$html="";
$html.=input_field(["type"=>"hidden","name"=>"txtId","value"=>$obj->id]);
$html.=input_field(["label"=>"Name","name"=>"txtName","value"=>$obj->name]);
$html.=input_field(["label"=>"Price","name"=>"txtPrice","value"=>$obj->price]);

		echo $html;
?>
			<!-- </div>
				<div class='card-footer'> -->
				<div class="card-footer">
                <button type="submit" name="btnCreate" class="btn btn-info">Update Test</button>
                <button type="reset" name="Clear" class="btn btn-secondary float-right">Clear</button>
              </div>
<?php
	// $html=input_button(["type"=>"submit","name"=>"btnUpdate","value"=>"Update"]);
	// 	echo $html;
?>
			</div>
</form>
</section>
    <!-- /.content -->