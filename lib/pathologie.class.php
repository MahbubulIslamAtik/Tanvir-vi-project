<?php
class Pathologie{
	public $id;
	public $name;
	public $price;

	function __construct($_id,$_name,$_price){
		$this->id=$_id;
		$this->name=$_name;
		$this->price=$_price;
	}

	function save(){
		global $db;
		$db->query("insert into pathologies(name,price)values('$this->name','$this->price')");
		return $db->insert_id;
	}

	function update(){
		global $db;
		$db->query("update pathologies set name='$this->name',price='$this->price' where id='$this->id'");
	}

	static function delete($id){
		global $db;
		$db->query("delete from pathologies where id='$id'");
	}

	static function get_pathologie($id){
		global $db;
		$result=$db->query("select name,price from pathologies where id='$id'");
		list($name,$price)=$result->fetch_row();
		$pathologie=new Pathologie($id,$name,$price);
		return $pathologie;
	}

	static function manage_pathologies(){
		global $db;
		$result=$db->query("select id,name,price from pathologies ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Name</th><th>Price</th><th>Action</th></tr>";
		while(list($id,$name,$price)=$result->fetch_row()){
			$action_buttons="<div class='clearfix'>";
			$action_buttons.=action_button(["id"=>$id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"edit-pathologie"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-pathologies"]);
			$action_buttons.="</div>";
			$html.="<tr><td>$id</td><td>$name</td><td>$price</td><td>$action_buttons</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_pathologies(){
		global $db;
		$result=$db->query("select id,name,price from pathologies ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Name</th><th>Price</th></tr>";
		while(list($id,$name,$price)=$result->fetch_row()){
			$html.="<tr><td>$id</td><td>$name</td><td>$price</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

}
?>