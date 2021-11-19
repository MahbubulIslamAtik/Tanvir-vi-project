
<?php

if(isset($_POST["btnCreate"])){

  $positionname=$_POST["txtPosition"];

  $position=new Position(null,$positionname);

  if($position->save()){
    echo "Success";
  }else{
    echo "fail to save";
  }
  

}


?>


<!-- Content Header (Page header) -->
 <?php
    $breadcrumb=[
      ["name"=>"Home","url"=>"#"],
      ["name"=>"Manage Position","url"=>"#"]
      
    ];     
   echo page_header("Manage Position",$breadcrumb);
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

      <form action="create-position" class="form-horizontal" method="post">
              <div class="card-body">
                 <?php
                
                 
                
                  
                 echo input_field(["label"=>"Position Name","name"=>"Position","type"=>"text","placeholder"=>"Enter Position Name","required"=>"required" ]);                  

              
                 
                 ?>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" name="btnCreate" class="btn btn-info">Create Position</button>
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