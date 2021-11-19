<?php
  
  class Position{       

     public $id;
     public $name;

     function __construct($_id,$_name){
       $this->id=$_id;
       $this->name=$_name;

     }


     function save(){
       global $db;         
       $db->query("insert into positions(name)values('$this->name')");
       return $db->insert_id; 

       
     }

     public function update(){ 

      global $db;
      $db->query("update position set name='$this->name' where id='$this->id'");
     
      echo "Success";
  
     }

     public static function delete($id){
      global $db;
      $db->query("delete from positions where id='$id'");
      echo "Deleted";
    }


     static function html_select_positions($_id=""){
          global $db;
          $result=$db->query("select id,name from positions");

          $html="<div class='form-group row mb-3'>";
            $html.="<label class='col-sm-2 col-form-label'>Position</label>";
            $html.="<div class='col-sm-10'>";
                $html.="<select name='cmbPosition' class='form-control'>";
                $html.="<option selected disabled></option>";
                while(list($id,$name)=$result->fetch_row()){

                  if($_id==$id){
                   $html.="<option value='$id' selected>$name</option>";
                  }else{
                    $html.="<option value='$id'>$name</option>";
                  }

                }
                $html.="</select>";
            $html.="</div>";
          $html.="</div>";
          return $html;

      }
 
 
 
      static function get_positions(){
        global $db;      
        $result=$db->query("select id,name from positions");      
        $html="<table class='table table-hover '>";
        $html.="<tr><td>Id</td><td>Name</td><td>Action</td></tr>";
        while(list($id,$name)=$result->fetch_row()){   
    
          $action_buttons=action_button(["id"=>$id, "class"=>"primary","name"=>"Edit","value"=>"Edit","url"=>"edit-position"]);
          $action_buttons.=action_button(["id"=>$id,"class"=>"danger","name"=>"Delete","value"=>"Delete"]);
    
          $html.="<tr><td>$id</td><td>$name</td><td>$action_buttons</td></tr>";
        }
        $html.="</table>";
      
        return $html;
      
      }

      public static function get_position($id){
        global $db;
        $result=$db->query("select id,name from positions where id='$id'");
        
        list($id,$name)=$result->fetch_row();
        $position=new Position($id,$name);
        return $position;
       
    }
 
    
    
    
    }

?>