<?php
class Member{
	public $id;
	public $employee_name;
	public $member_name;
	public $occupation;
	public $mobile;
	public $nid_no;
	public $address;
	public $guardian_name;
	public $guardian_mobile;
	public $nominee;
	public $nominee_mobile;
	public $nominee_relation;
	public $refernce_by;
	public $refernce_mobile;

	function __construct($_id,$_employee_name,$_member_name,$_occupation,$_mobile,$_nid_no,$_address,$_guardian_name,$_guardian_mobile,$_nominee,$_nominee_mobile,$_nominee_relation,$_refernce_by,$_refernce_mobile){
		$this->id=$_id;
		$this->employee_name=$_employee_name;
		$this->member_name=$_member_name;
		$this->occupation=$_occupation;
		$this->mobile=$_mobile;
		$this->nid_no=$_nid_no;
		$this->address=$_address;
		$this->guardian_name=$_guardian_name;
		$this->guardian_mobile=$_guardian_mobile;
		$this->nominee=$_nominee;
		$this->nominee_mobile=$_nominee_mobile;
		$this->nominee_relation=$_nominee_relation;
		$this->refernce_by=$_refernce_by;
		$this->refernce_mobile=$_refernce_mobile;
	}

	function save($file=""){
		global $db;
		$db->query("insert into members(employee_name,member_name,occupation,mobile,nid_no,address,guardian_name,guardian_mobile,nominee,nominee_mobile,nominee_relation,refernce_by,refernce_mobile)values('$this->employee_name','$this->member_name','$this->occupation','$this->mobile','$this->nid_no','$this->address','$this->guardian_name','$this->guardian_mobile','$this->nominee','$this->nominee_mobile','$this->nominee_relation','$this->refernce_by','$this->refernce_mobile')");

		if(is_array($file)){
            $ext=pathinfo($file["name"],PATHINFO_EXTENSION);

            $type=$file["type"];
            $size=$file["size"]/1024;


            if($type=="image/png" || $type=="image/jpeg"){
              if($size<=200){
            move_uploaded_file($file["tmp_name"],"assets/images/member/{$db->insert_id}.{$ext}");
            }else{
              return -2;
            }
          }
          else{
            return -1;
          }
          }

		return $db->insert_id;
	}

	function update(){
		global $db;
		$db->query("update members set employee_name='$this->employee_name',member_name='$this->member_name',occupation='$this->occupation',mobile='$this->mobile',nid_no='$this->nid_no',address='$this->address',guardian_name='$this->guardian_name',guardian_mobile='$this->guardian_mobile',nominee='$this->nominee',nominee_mobile='$this->nominee_mobile',nominee_relation='$this->nominee_relation',refernce_by='$this->refernce_by',refernce_mobile='$this->refernce_mobile' where id='$this->id'");
	}

	static function delete($id){
		global $db;
		$db->query("delete from members where id='$id'");

		if(file_exists("assets/images/upload/".$id.".jpg")){
			unlink("assets/images/upload/".$id.".jpg");
		}elseif(file_exists("assets/images/upload/".$id.".png")){
			unlink("assets/images/upload/".$id.".png");
		}
	}

	static function get_member($id){
		global $db;
		$result=$db->query("select employee_name,member_name,occupation,mobile,nid_no,address,guardian_name,guardian_mobile,nominee,nominee_mobile,nominee_relation,refernce_by,refernce_mobile from members where id='$id'");
		list($employee_name,$member_name,$occupation,$mobile,$nid_no,$address,$guardian_name,$guardian_mobile,$nominee,$nominee_mobile,$nominee_relation,$refernce_by,$refernce_mobile)=$result->fetch_row();
		$member=new Member($id,$employee_name,$member_name,$occupation,$mobile,$nid_no,$address,$guardian_name,$guardian_mobile,$nominee,$nominee_mobile,$nominee_relation,$refernce_by,$refernce_mobile);
		return $member;
	}

	static function manage_members(){
		global $db;
		$result=$db->query("select m.id,e.emp_name,m.member_name,m.occupation,m.mobile,m.nid_no,m.address,m.nominee,m.nominee_mobile,m.nominee_relation,m.refernce_by,m.refernce_mobile from members m,employees e where e.id=m.employee_name");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Employee_name</th><th>Member_name</th><th>Occupation</th><th>Mobile</th><th>Nid_no</th><th>Address</th><th>Nominee</th><th>Nominee_mobile</th><th>Nominee_relation</th><th>Refernce_by</th><th>Refernce_mobile</th><th>Action</th></tr>";
		while(list($id,$emp_name,$member_name,$occupation,$mobile,$nid_no,$address,$nominee,$nominee_mobile,$nominee_relation,$refernce_by,$refernce_mobile)=$result->fetch_row()){
			$action_buttons="<div class='clearfix'>";
			$action_buttons.=action_button(["id"=>$id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"update-members"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-members"]);
			$action_buttons.="</div>";
			$html.="<tr><td>$id</td><td>$emp_name</td><td>$member_name</td><td>$occupation</td><td>$mobile</td><td>$nid_no</td><td>$address</td><td>$nominee</td><td>$nominee_mobile</td><td>$nominee_relation</td><td>$refernce_by</td><td>$refernce_mobile</td><td>$action_buttons</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_members(){
		global $db;
		$result=$db->query("select id,employee_name,member_name,occupation,mobile,nid_no,address,guardian_name,guardian_mobile,nominee,nominee_mobile,nominee_relation,refernce_by,refernce_mobile from members ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Employee_name</th><th>Member_name</th><th>Occupation</th><th>Mobile</th><th>Nid_no</th><th>Address</th><th>Guardian_name</th><th>Guardian_mobile</th><th>Nominee</th><th>Nominee_mobile</th><th>Nominee_relation</th><th>Refernce_by</th><th>Refernce_mobile</th></tr>";
		while(list($id,$employee_name,$member_name,$occupation,$mobile,$nid_no,$address,$guardian_name,$guardian_mobile,$nominee,$nominee_mobile,$nominee_relation,$refernce_by,$refernce_mobile)=$result->fetch_row()){
			$html.="<tr><td>$id</td><td>$employee_name</td><td>$member_name</td><td>$occupation</td><td>$mobile</td><td>$nid_no</td><td>$address</td><td>$guardian_name</td><td>$guardian_mobile</td><td>$nominee</td><td>$nominee_mobile</td><td>$nominee_relation</td><td>$refernce_by</td><td>$refernce_mobile</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	public function __toString(){
		return "Employee:".$this->employee_name.", Member:".$this->member_name;
	}
}
?>