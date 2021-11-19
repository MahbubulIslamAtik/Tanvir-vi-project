<?php
class Borrower{
	public $id;
	public $borrower_name;
	public $address;
	public $nid;
	public $mobile;
	public $gender;
	public $loan_type;
	public $duration_time;
	public $amount;

	function __construct($_id,$_borrower_name,$_address,$_nid,$_mobile,$_gender,$_loan_type,$_duration_time,$_amount){
		$this->id=$_id;
		$this->borrower_name=$_borrower_name;
		$this->address=$_address;
		$this->nid=$_nid;
		$this->mobile=$_mobile;
		$this->gender=$_gender;
		$this->loan_type=$_loan_type;
		$this->duration_time=$_duration_time;
		$this->amount=$_amount;
	}

	function save(){
		global $db;
		$db->query("insert into borrowers(borrower_name,address,nid,mobile,gender,loan_type,duration_time,amount)values('$this->borrower_name','$this->address','$this->nid','$this->mobile','$this->gender','$this->loan_type','$this->duration_time','$this->amount')");
		return $db->insert_id;
	}

	function update(){
		global $db;
		$db->query("update borrowers set borrower_name='$this->borrower_name',address='$this->address',nid='$this->nid',mobile='$this->mobile',gender='$this->gender',loan_type='$this->loan_type',duration_time='$this->duration_time',amount='$this->amount' where id='$this->id'");
	}

	static function delete($id){
		global $db;
		$db->query("delete from borrowers where id='$id'");
	}

	static function get_borrower($id){
		global $db;
		$result=$db->query("select borrower_name,address,nid,mobile,gender,loan_type,duration_time,amount from borrowers where id='$id'");
		list($borrower_name,$address,$nid,$mobile,$gender,$loan_type,$duration_time,$amount)=$result->fetch_row();
		$borrower=new Borrower($id,$borrower_name,$address,$nid,$mobile,$gender,$loan_type,$duration_time,$amount);
		return $borrower;
	}

	static function manage_borrowers(){
		global $db;
		$result=$db->query("select id,borrower_name,address,nid,mobile,gender,loan_type,duration_time,amount from borrowers ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Borrower_name</th><th>Address</th><th>Nid</th><th>Mobile</th><th>Gender</th><th>Loan_type</th><th>Duration_time</th><th>Amount</th><th>Action</th></tr>";
		while(list($id,$borrower_name,$address,$nid,$mobile,$gender,$loan_type,$duration_time,$amount)=$result->fetch_row()){
			$action_buttons="<div class='clearfix'>";
			$action_buttons.=action_button(["id"=>$id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"edit-borrower"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-borrower"]);
			$action_buttons.="</div>";
			$html.="<tr><td>$id</td><td>$borrower_name</td><td>$address</td><td>$nid</td><td>$mobile</td><td>$gender</td><td>$loan_type</td><td>$duration_time</td><td>$amount</td><td>$action_buttons</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_borrowers(){
		global $db;
		$result=$db->query("select id,borrower_name,address,nid,mobile,gender,loan_type,duration_time,amount from borrowers ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Borrower_name</th><th>Address</th><th>Nid</th><th>Mobile</th><th>Gender</th><th>Loan_type</th><th>Duration_time</th><th>Amount</th></tr>";
		while(list($id,$borrower_name,$address,$nid,$mobile,$gender,$loan_type,$duration_time,$amount)=$result->fetch_row()){
			$html.="<tr><td>$id</td><td>$borrower_name</td><td>$address</td><td>$nid</td><td>$mobile</td><td>$gender</td><td>$loan_type</td><td>$duration_time</td><td>$amount</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

}
?>