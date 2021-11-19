<?php
class Patient{
	public $id;
	public $name;
	public $age;
	public $gender;
	public $problem;
	public $doctor_id;

	function __construct($_id,$_name,$_age,$_gender,$_problem,$_doctor_id){
		$this->id=$_id;
		$this->name=$_name;
		$this->age=$_age;
		$this->gender=$_gender;
		$this->problem=$_problem;
		$this->doctor_id=$_doctor_id;
	}

	function save(){
		global $db;
		$db->query("insert into patients(name,age,gender,problem,doctor_id)values('$this->name','$this->age','$this->gender','$this->problem','$this->doctor_id')");
		return $db->insert_id;
	}

	function update(){
		global $db;
		$db->query("update patients set name='$this->name',age='$this->age',gender='$this->gender',problem='$this->problem',doctor_id='$this->doctor_id' where id='$this->id'");
	}

	static function delete($id){
		global $db;
		$db->query("delete from patients where id='$id'");
	}

	static function get_patient($id){
		global $db;
		$result=$db->query("select name,age,gender,problem,doctor_id from patients where id='$id'");
		list($name,$age,$gender,$problem,$doctor_id)=$result->fetch_row();
		$patient=new Patient($id,$name,$age,$gender,$problem,$doctor_id);
		return $patient;
	}

	static function manage_patients(){
		global $db;
		$result=$db->query("select id,name,age,gender,problem,doctor_id from patients ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Name</th><th>Age</th><th>Gender</th><th>Problem</th><th>Doctor_id</th><th>Action</th></tr>";
		while(list($id,$name,$age,$gender,$problem,$doctor_id)=$result->fetch_row()){
			$action_buttons="<div class='clearfix'>";
			$action_buttons.=action_button(["id"=>$id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"edit-patient"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-patients"]);
			$action_buttons.="</div>";
			$html.="<tr><td>$id</td><td>$name</td><td>$age</td><td>$gender</td><td>$problem</td><td>$doctor_id</td><td>$action_buttons</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_patients(){
		global $db;
		$result=$db->query("select id,name,age,gender,problem,doctor_id from patients ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Name</th><th>Age</th><th>Gender</th><th>Problem</th><th>Doctor_id</th></tr>";
		while(list($id,$name,$age,$gender,$problem,$doctor_id)=$result->fetch_row()){
			$html.="<tr><td>$id</td><td>$name</td><td>$age</td><td>$gender</td><td>$problem</td><td>$doctor_id</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

}
?>