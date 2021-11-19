<?php
class Patient_appoint{
	public $id;
	public $name;
	public $age;
	public $doctor_id;
	public $shift_time;
	public $appoint_date;

	function __construct($_id,$_name,$_age,$_doctor_id,$_shift_time,$_appoint_date){
		$this->id=$_id;
		$this->name=$_name;
		$this->age=$_age;
		$this->doctor_id=$_doctor_id;
		$this->shift_time=$_shift_time;
		$this->appoint_date=$_appoint_date;
	}

	function save(){
		global $db;
		$db->query("insert into patient_appoints(name,age,doctor_id,shift_time,appoint_date)values('$this->name','$this->age','$this->doctor_id','$this->shift_time','$this->appoint_date')");
		return $db->insert_id;
	}

	function update(){
		global $db;
		$db->query("update patient_appoints set name='$this->name',age='$this->age',doctor_id='$this->doctor_id',shift_time='$this->shift_time',appoint_date='$this->appoint_date' where id='$this->id'");
	}

	static function delete($id){
		global $db;
		$db->query("delete from patient_appoints where id='$id'");
	}

	static function get_patient_appoint($id){
		global $db;
		$result=$db->query("select name,age,doctor_id,shift_time,appoint_date from patient_appoints where id='$id'");
		list($name,$age,$doctor_id,$shift_time,$appoint_date)=$result->fetch_row();
		$patient_appoint=new Patient_appoint($id,$name,$age,$doctor_id,$shift_time,$appoint_date);
		return $patient_appoint;
	}

	static function manage_patient_appoints(){
		global $db;
		$result=$db->query("select id,name,age,doctor_id,shift_time,appoint_date from patient_appoints ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Name</th><th>Age</th><th>Doctor_id</th><th>Shift_time</th><th>Appoint_date</th><th>Action</th></tr>";
		while(list($id,$name,$age,$doctor_id,$shift_time,$appoint_date)=$result->fetch_row()){
			$action_buttons="<div class='clearfix'>";
			$action_buttons.=action_button(["id"=>$id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"edit-patient_appoint"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-patient_appoints"]);
			$action_buttons.="</div>";
			$html.="<tr><td>$id</td><td>$name</td><td>$age</td><td>$doctor_id</td><td>$shift_time</td><td>$appoint_date</td><td>$action_buttons</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_patient_appoints(){
		global $db;
		$result=$db->query("select id,name,age,doctor_id,shift_time,appoint_date from patient_appoints ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Name</th><th>Age</th><th>Doctor_id</th><th>Shift_time</th><th>Appoint_date</th></tr>";
		while(list($id,$name,$age,$doctor_id,$shift_time,$appoint_date)=$result->fetch_row()){
			$html.="<tr><td>$id</td><td>$name</td><td>$age</td><td>$doctor_id</td><td>$shift_time</td><td>$appoint_date</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

}
?>