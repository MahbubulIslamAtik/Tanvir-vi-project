<?php

if(isset($_POST["btnEdit"])){
    $id=$_POST["txtId"];     
    $position=Position::get_position($id);
}

?>
<?php

if(isset($_POST["btnUpdate"])){

  $id=$_POST["txtId"];
  $positionname=$_POST["txtPosition"];

  $position=new Position(null,$positionname);

  if($position->update()){
    echo "Success";
  }else{
    echo "fail to save";
  }
  
  echo "<script>window.location='manage-position'</script>";
}


?>


<!-- Content Header (Page header) -->
 <?php
    $breadcrumb=[
      ["name"=>"Home","url"=>"#"],
      ["name"=>"Update Position","url"=>"#"]
      
    ];     
   echo page_header("Update Position",$breadcrumb);
 ?>
  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
      <h3  class="card-title"><a href="manage-position" class="btn btn-primary">Manage Position</a></h3>

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

      <form action="edit-position" class="form-horizontal" method="post">
              <div class="card-body">
                 <?php
                
                 
                
                echo input_field(["label"=>"","name"=>"Id","type"=>"hidden","value"=>isset($position->id)?$position->id:""]);
                
                echo input_field(["label"=>"Position Name","name"=>"Position","type"=>"text","placeholder"=>"Enter Position Name","required"=>"required","value"=>isset($position->name)?$position->name:"" ]);                  

              
                 
                 ?>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" name="btnUpdate" class="btn btn-info">Update Position</button>
                <button type="reset" name="btnClear" class="btn btn-default float-right">Clear</button>
              </div>
              <!-- /.card-footer -->
        </form>


      </div>

      <div class="card-body">
        
        
         
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