<?php

function nav_link($url,$value,$css="bx bx-home"){

            $html="<li class='nav-item'>";
            $html.="<a href='$url'>";
            $html.="<div class='parent-icon'><i class='$css'></i>";
            $html.="</div>";
            $html.="<div class='menu-title'>$value</div>";
            $html.="</a>";
            $html.="</li>";

            return $html;
}

function nav_link_dropdown($url,$value,$css="bx bx-right-arrow-alt", $options=array()){

    $html="<li class=''>";
    if(count($options)==0){
      $html.="<a href='$url'>";
    }
    
    if(count($options)){
        $html.="<a href='$url' class='has-arrow'>";
    }
    

    $html.="<div class='parent-icon'><i class='$css'></i>";
    $html.="</div>";
    $html.="<div class='menu-title'>$value</div>";
    $html.="</a>";
    $html.="</a>";
   
   if(count($options)){
       $html.=nav_dropdown($options);
   }
    $html.="</li>";
				
    return $html;
}

function nav_dropdown($options){

    $html="<ul class='nav nav-treeview'>";
    
        
        foreach($options as $option){

            $html.=nav_link($option["url"],$option["value"],$option["css"]);

    }

    $html.="</ul>";

    return $html;

}

function page_header($title,$breadcrumb){
    $html="";
    $html.="<section class='content-header'>";
    $html.="<div class='container-fluid'>";
    $html.="<div class='row mb-2'>";
    $html.="<div class='col-sm-9'>";
    $html.="<h1>$title</h1>";
    $html.="</div>";
    $html.="<div class='col-sm-3'>";
    $html.="<ol class='breadcrumb float-sm-right'>";
       foreach($breadcrumb as $link){
         $html.="<li class='breadcrumb-item' ><a href='{$link['url']}'>{$link['name']}</a></li>";            
       }
    $html.="</ol>";
    $html.="</div>";
    $html.="</div>";
    $html.="</div>";
    $html.="</section>";
    return $html;
  }

  function input_field($config){

    $config["required"]=isset($config["required"])?$config["required"]:"";
    $config["placeholder"]=isset($config["placeholder"])?$config["placeholder"]:"";
    $config["value"]=isset($config["value"])?$config["value"]:"";    
    $config["text"]=isset($config["text"])?$config["text"]:"";
    $config["type"]=isset($config["type"])?$config["type"]:""; 
    $config["label"]=isset($config["label"])?$config["label"]:"";

    $html="<div class='form-group row mb-3'>";
    $html.="<label for='txt{$config["name"]}' class='col-sm-2 col-form-label'>{$config["label"]}</label>";
    $html.="<div class='col-sm-10'>";
    $html.="<input type='{$config["type"]}' class='form-control' name='txt{$config["name"]}' id='txt{$config["name"]}' value='{$config["value"]}' text='{$config["text"]}' placeholder='{$config["placeholder"]}' {$config["required"]}>";
    $html.="</div>";
    $html.="</div>";

    return $html;

 }

 function input_button($config){
    $html="<input type='{$config["type"]}' value='{$config["value"]}' name='btn{$config["name"]}' class='btn btn-info' />";
    return $html;
 }

 function action_button($config){
    $config["url"]=isset($config["url"])?$config["url"]:"#";
    
    $config["class"]=isset($config["class"])?$config["class"]:"";
    $html="<form action='{$config["url"]}' method='post' style='float:left;margin-right:10px'>";
    $html.="<input type='hidden' name='txtId' value='{$config["id"]}' />";
    $html.="<input type='submit' class='btn btn-{$config["class"]}' name='btn{$config["name"]}' value='{$config["value"]}' />";
    $html.="</form>";
    return $html;
  }

  function input_field_radio($label,$options){
    $html="<div class='form-group row'>";
    $html.="<label class='col-sm-2 col-form-label'>$label</label>";
    $html.="<div class='col-sm-10'>";
    $html.= "<div class='form-check'>";
    foreach($options as $option){
    $html.= "<span class='p-3'><input type='radio' name='rdo{$option['name']}' id='rdo{$option['name']}' value='{$option['value']}'/> {$option['value']}</span>";
    }
    $html.="</div>";
    $html.="</div>";
    $html.="</div>";
  
    return $html;
  }
  
  function alert($title,$text,$icon,$class){

    $html="<div class='alert border-0 border-start border-5 border-{$class} alert-dismissible fade show py-2'>";
    $html.="<div class='d-flex align-items-center'>";
    $html.="<div class='font-35 text-{$class}'><i class='bx {$icon}'></i>";
    $html.="</div>";
    $html.="<div class='ms-3'>";
    $html.="<h6 class='mb-0 text-{$class}'>{$title}</h6>";
    $html.="<div>{$text}</div>";
    $html.="</div>";
    $html.="</div>";
    $html.="<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
    $html.="</div>";

    return $html;
  }

  function select_field($config){
    $config["value"]=isset($config["value"])?$config["value"]:""; 
    global $db; 
  
    $ucname=ucfirst($config["name"]);
    
    $result=$db->query("select id,name from {$config["table"]}");
    $html="<div class='form-group row'>";
    $html.="<label class='col-sm-2 col-form-label'>{$config["label"]}</label>";
    $html.="<div class='col-sm-10'>"; 
    $html.="<select name='{$config["name"]}' class='form-control'>";
    while(list($id,$name)=$result->fetch_row()){
     
      if($id==$config["value"]){
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
  

?>