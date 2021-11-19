<?php
class Doctor{
    public $id;
    public $name;
    public $email;
    public $phone;
    public $role;
    public $specialists;
    public $gender;
    public $hospital;
    public $created_at;

    function __construct($_id,$_name,$_email,$_phone,$_role,$_specialists,$_gender,$_hospital,$_created_at){

        $this->id=$_id;
        $this->name=$_name;
        $this->email=$_email;
        $this->phone=$_phone;
        $this->role=$_role;
        $this->specialists=$_specialists;
        $this->gender=$_gender;
        $this->hospital=$_hospital;
        $this->created_at=$_created_at;

    }

    function save(){
        global $db;
        $db->query("insert into doctors(name,email,phone,role,specialists,gender,hospital,created_at)values('$this->name','$this->email','$this->phone','$this->role','$this->specialists','$this->gender','$this->hospital','$this->created_at')");
        return $db->insert_id;
    }
    
    function update(){
        global $db;
        $db->query("update doctors set name='$this->name',email='$this->email',phone='$this->phone',role='$this->role',specialists='$this->specialists',gender='$this->gender','hospital'='$this->hospital',created_at='$this->created_at' where id='$this->id'");
    }

    static function delete($id){
        global $db;
        $db->query("delete from doctors where id='$id'");
    }
        
    static function get_doctor($id){
        global $db;
        $result=$db->query("select name,email,phone,role,specialists,gender,hospital,created_at from doctors where id='$id'");
        list($name,$email,$phone,$role,$specialists,$gender,$hospital,$created_at)=$result->fetch_row();
        $doctor=new Doctor($id,$name,$email,$phone,$role,$specialists,$gender,$hospital,$created_at);
        return $doctor;

    }

    static function manage_doctors(){
        global $db;
        $result=$db->query("select id,name,email,phone,role,specialists,gender,hospital,created_at from doctors");
        $html="<table class='table'>";
        $html.="<tr><th>Id</th><th>Name</th><th>Email</th><th>PHone</th><th>Role</th><th>Specialists</th><th>Gender</th><th>Hospital</th><th>Created_at</th><th>Action</th></tr>";
        while(list($id,$name,$email,$phone,$role,$specialists,$gender,$hospital,$created_at)=$result->fetch_row()){
            $action_buttons="<div class='clearfix'>";
            $action_buttons.=action_button(["id"=>$id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"edit-doctor"]);
            $action_buttons.=action_button(["id"=>$id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-doctors"]);
			$action_buttons.="</div>";
			$html.="<tr><td>$id</td><td>$name</td><td>$email</td><td>$phone</td><td>$role</td><td>$specialists</td><td>$gender</td><td>$hospital</td><td>$created_at</td><td>$action_buttons</td></tr>";
        }
        $html.="</table>";
        return $html;
    }

    static function get_doctors(){
		global $db;
		$result=$db->query("select id,name,email,phone,role,specialists,gender,hospital,created_at from doctors ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Name</th><th>Email</th><th>Phone</th><th>Role</th><th>Specialists</th><th>Gender</th><th>Hospital</th><th>Created_at</th></tr>";
		while(list($id,$name,$email,$phone,$role,$specialists,$gender,$hospital,$created_at)=$result->fetch_row()){
			$html.="<tr><td>$id</td><td>$name</td><td>$email</td><td>$phone</td><td>$role</td><td>$specialists</td><td>$gender</td><td>$hospital</td><td>$created_at</td></tr>";
		}
		$html.="</table>";
		return $html;
	}
}

?>