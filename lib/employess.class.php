<?php

class Employees{

    public $id;
    public $emp_name;
    public $department_id;
    public $position_id;
    public $pre_address;
    public $per_address;
    public $nid_no;
    public $mobile;
    public $gender;
    public $joining_date;
    
    public $email;


public function __construct($_id,$ename,$department_id,$position,$pre_add,$per_add,$nid,$mob,$gender,$join,$email){

    $this->id=null?"":$_id;
    $this->emp_name=$ename;
    $this->department_id=$department_id;
    $this->position_id=$position;
    $this->pre_address=$pre_add;
    $this->per_address=$per_add;
    $this->nid_no=$nid;
    $this->mobile=$mob;
    $this->gender=$gender;
    $this->joining_date=$join;
    
    $this->email=$email;

}

public function save(){
    global $db;
    $db->query("insert into employees(id,emp_name,department_id,position_id,pre_address,per_address,nid_no,mobile,gender,joining_date,email) values('$this->id','$this->emp_name','$this->department_id','$this->position_id','$this->pre_address','$this->per_address','$this->nid_no','$this->mobile','$this->gender','$this->joining_date','$this->email')");

    return $db->insert_id;
}

public function update(){ 

    global $db;
    $db->query("update employees set emp_name='$this->emp_name',department_id='$this->department_id',position_id='$this->position_id',pre_address='$this->pre_address',per_address='$this->per_address',nid_no='$this->nid_no',mobile='$this->mobile',gender='$this->gender',joining_date='$this->joining_date',email='$this->email' where id='$this->id'");
   
    echo "Success";

   }

public static function delete($id){
    global $db;
    $db->query("delete from employees where id='$id'");
    echo "Deleted";
  }

  public static function get_employee($id){
    global $db;
    $result=$db->query("select id, emp_name,department_id,position_id,pre_address,per_address,nid_no,mobile,gender,joining_date,email from employees where id ='$id'");
    
    list($id,$emp_name,$department_id,$position_id,$pre_address,$per_address,$nid_no,$mobile,$gender,$joining,$email)=$result->fetch_row();
    $employee=new Employees($id,$emp_name,$department_id,$position_id,$pre_address,$per_address,$nid_no,$mobile,$gender,$joining,$email);
    return $employee;
   
}

static function get_employees(){
    global $db;

    $result=$db->query("select e.id, e.emp_name,e.gender,p.name,d.name,e.email,e.pre_address,e.mobile,e.joining_date from employees e, positions p, departments d where d.id=e.department_id and p.id=e.position_id order by e.id");

    $html="<table class='table table-hover'>";
    $html.="<tr><td>ID</td><td>Employee Name</td><td>Gender</td><td>Position</td><td>Department</td><td>Email</td><td>Present Address</td><td>Mobile</td><td>Joining Date</td><td>Action</td></tr>";

    while(list($id,$emp_name,$gender, $position, $department,$email,$pre_address,$mobile, $joining)=$result->fetch_row()){

        $action_button="<div class='clearfix'>";
        $action_button.=action_button(["id"=>$id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"edit-employee"]);
        $action_button.=action_button(["id"=>$id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-employee"]);
        $action_button.="</div>";

        $html.="<tr><td>$id</td><td>$emp_name</td><td>$gender</td><td>$position</td><td>$department</td><td>$email</td><td>$pre_address</td><td>$mobile</td><td>$joining</td><td>$action_button</td></tr>";

    }
    $html.="</tabel>";

    return $html;
}


static function html_select_employees($_id=""){
    global $db;
    $result=$db->query("select id,emp_name from employees");

    $html="<div class='form-group row mb-3'>";
      $html.="<label class='col-sm-2 col-form-label'>Employees</label>";
      $html.="<div class='col-sm-10'>";
          $html.="<select name='cmbEmployees' class='form-control'>";

          //$html.="<option selected disabled></option>";
          while(list($id,$name)=$result->fetch_row()){

            if($_id==$id){
             $html.="<option value='$id' >$name</option>";
            }else{
              $html.="<option value='$id'>$name</option>";
            }

          }
          $html.="</select>";
      $html.="</div>";
    $html.="</div>";
    return $html;

}


}



?>