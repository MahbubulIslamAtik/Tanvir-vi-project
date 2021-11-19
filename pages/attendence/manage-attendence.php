
<?php        

if(isset($_POST["btnDelete"])){
  $id=$_POST["txtId"];
  Attendence::delete($id);

}

?>

<!-- Content Header (Page header) -->
<?php
$breadcrumb=[
  ["name"=>"Home","url"=>"#"],
  ["name"=>"Manage Attendence","url"=>"#"]
  
];     
echo page_header("Manage Attendence",$breadcrumb);
?>
<!-- Main content -->
<section class="content">

<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3  class="card-title"><a href="create-attendence" class="btn btn-primary">Create Attendence</a></h3>
    

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <div class="card-body">

  <?php
    echo Attendence::manage_attendences();
    ?>  
   


  </div>

  
  <!-- /.card-body -->
  <div class="card-footer">
    Footer
  </div>
  <!-- /.card-footer-->
</div>
<!-- /.card -->

</section>
<!-- /.content -->