<?php
class Attendence{
	public $id;
	public $employee_id;
	public $department_id;
	public $in_time;
	public $out_time;
	public $date;
	

	function __construct($_id,$_employee_id,$_department_id,$_in_time,$_out_time,$_date){
		$this->id=$_id;
		$this->employee_id=$_employee_id;
		$this->department_id=$_department_id;
		$this->in_time=$_in_time;
		$this->out_time=$_out_time;
		$this->date=$_date;
		
	}

	function save(){
		global $db;
		$db->query("insert into attendences(employee_id,department_id,in_time,out_time,date)values('$this->employee_id','$this->department_id','$this->in_time','$this->out_time','$this->date')");
		return $db->insert_id;
	}

	function update(){
		global $db;
		$db->query("update attendences set employee_id='$this->employee_id',department_id='$this->department_id',in_time='$this->in_time',out_time='$this->out_time',date='$this->date', where id='$this->id'");
		return $db->insert_id;
	}

	static function delete($id){
		global $db;
		$db->query("delete from attendences where id='$id'");
	}

	static function get_attendence($id){
		global $db;
		$result=$db->query("select employee_id,department_id,in_time,out_time,date from attendences where id='$id'");
		list($employee_id,$department_id,$in_time,$out_time,$date)=$result->fetch_row();
		$attendence=new Attendence($id,$employee_id,$department_id,$in_time,$out_time,$date);
		return $attendence;
	}

	static function manage_attendences(){
		global $db;
		$result=$db->query("select a.id,e.emp_name,d.name,a.in_time,a.out_time,a.date from attendences a,employees e, departments d where a.employee_id=e.id and a.department_id=d.id order by id");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Employee_id</th><th>Department_id</th><th>In_time</th><th>Out_time</th><th>Date</th><th>Admin</th></tr>";
		while(list($id,$employee_id,$department_id,$in_time,$out_time,$date)=$result->fetch_row()){
			$action_buttons="<div class='clearfix'>";
			$action_buttons.=action_button(["id"=>$id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"edit-attendence"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-attendence"]);
			$action_buttons.="</div>";
			$html.="<tr><td>$id</td><td>$employee_id</td><td>$department_id</td><td>$in_time</td><td>$out_time</td><td>$date</td><td>$action_buttons</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	// static function get_attendences(){
	// 	global $db;
	// 	$result=$db->query("select id,employee_id,department_id,in_time,out_time,date from attendences ");
	// 	$html="<table class='table'>";
	// 	$html.="<tr><th>Id</th><th>Employee_id</th><th>Department_id</th><th>In_time</th><th>Out_time</th><th>Date</th><th>Action</th></tr>";
	// 	while(list($id,$employee_id,$department_id,$in_time,$out_time,$date)=$result->fetch_row()){
	// 		$html.="<tr><td>$id</td><td>$employee_id</td><td>$department_id</td><td>$in_time</td><td>$out_time</td><td>$date</td></tr>";
	// 	}
	// 	$html.="</table>";
	// 	return $html;
	// }

}
?>




<?php

// class attendences{

//     public $id;
//     public $emp_name;
//     public $department_id;
//     public $intime;
//     public $outtime;
//     public $date;
   
    
   


// public function __construct($_id,$ename,$department_id,$intime,$outtime,$date){

//     $this->id=null?"":$_id;
//     $this->emp_name=$ename;
//     $this->department_id=$department_id;
//     $this->intime=$intime;
//     $this->outtime=$outtime;
//     $this->date=$date;
    
    

// }

// public function save(){
//     global $db;
//     $db->query("insert into attendences(id,emp_name,department_id,intime,outtime,date) values('$this->id','$this->emp_name','$this->department_id','$this->intime','$this->outtime','$this->date')");

//     return $db->insert_id;
// }

// public function update(){ 

//     global $db;
//     $db->query("update attendences set emp_name='$this->emp_name',department_id='$this->department_id', intime='$this->intime',outtime='$this->outtime',date='$this->date'where id='$this->id'");
   
//     echo "Success";

//    }

// public static function delete($id){
//     global $db;
//     $db->query("delete from attendences where id='$id'");
//     echo "Deleted";
//   }

//   public static function get_attendence($id){
//     global $db;
//     $result=$db->query("select id, emp_name,department_id,intime,outtime,date where id ='$id'");
    
//     list($id,$emp_name,$department_id,$intime,$outtime,$date)=$result->fetch_row();
//     $employee=new attendences($id,$emp_name,$department_id,$intime,$outtime,$date);
//     return $employee;
   
// }

// static function get_attendences(){
//     global $db;

//     $result=$db->query("select a.id, a.emp_name,d.name,a.from employees e, positions p, departments d where d.id=e.department_id and p.id=e.position_id order by e.id");

//     $html="<table class='table table-hover'>";
//     $html.="<tr><td>ID</td><td>Employee Name</td><td>Department</td><td>In-Time</td><td>Out-Time</td><td>Date</td><td>Action</td></tr>";

//     while(list($id,$emp_name,$gender, $position, $department,$email,$pre_address,$mobile, $joining)=$result->fetch_row()){

//         $action_button="<div class='clearfix'>";
//         $action_button.=action_button(["id"=>$id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"edit-employee"]);
//         $action_button.=action_button(["id"=>$id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-employee"]);
//         $action_button.="</div>";

//         $html.="<tr><td>$id</td><td>$emp_name</td><td>$gender</td><td>$position</td><td>$department</td><td>$email</td><td>$pre_address</td><td>$mobile</td><td>$joining</td><td>$action_button</td></tr>";

//     }
//     $html.="</tabel>";

//     return $html;
// }

// }

?>