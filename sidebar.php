<?php
require_once("lib/component.php");


?>

<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">Project</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-first-page'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<!-- <li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-home'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
					
				</li> -->

	<?php
	
	echo nav_link_dropdown("#","Dashboard","bx bx-home");
	
	?>
	
	<?php

	// same work for new member tables
	
	// $option=[
	// 	["url"=>"create-user","value"=>"Create User","css"=>"bx bx-right-arrow-alt"],
	// 	["url"=>"create-role","value"=>"Manage Role","css"=>"bx bx-right-arrow-alt"],
	// 	["url"=>"manage-user","value"=>"Manage User","css"=>"bx bx-right-arrow-alt"]
	// ];

	// echo nav_link_dropdown("#","Management","bx bx-home",$option);
	
	
	//end members table-->
	?>

	  <?php
	
	//$option=[["url"=>"#","value"=>"Create Admin"],["url"=>"#","value"=>"Manage Admin"]];

	$option=[
		["url"=>"create-user","value"=>"Create User","css"=>"bx bx-right-arrow-alt"],
		["url"=>"create-role","value"=>"Manage Role","css"=>"bx bx-right-arrow-alt"],
		["url"=>"manage-user","value"=>"Manage User","css"=>"bx bx-right-arrow-alt"]
	];

	echo nav_link_dropdown("#","System","bx bx-home",$option);
	?>  

	<?php
	
	$option=[
		["url"=>"create-employee","value"=>"Create Employee","css"=>"bx bx-right-arrow-alt"],
		["url"=>"manage-department","value"=>"Manage Department","css"=>"bx bx-right-arrow-alt"],
		["url"=>"manage-position","value"=>"Manage Position","css"=>"bx bx-right-arrow-alt"],
		["url"=>"create-attendence","value"=>"Create Attendence","css"=>"bx bx-right-arrow-alt"]
		
	];

	echo nav_link_dropdown("#","HR","bx bx-home",$option);
	?>  

	<?php
	
	$option=[
		["url"=>"create-doctors","value"=>"Create Doctors","css"=>"bx bx-right-arrow-alt"],
		["url"=>"manage-doctors","value"=>"Manage Doctors","css"=>"bx bx-right-arrow-alt"],
	];
	
	echo nav_link_dropdown("#","Doctor","bx bx-home",$option);
	?>
	

	<?php
	
	$option=[
		["url"=>"create-patients","value"=>"Create Patient","css"=>"bx bx-right-arrow-alt"],
		["url"=>"manage-patients","value"=>"Manage Patient","css"=>"bx bx-right-arrow-alt"],
	];
	
	echo nav_link_dropdown("#","Patient","bx bx-home",$option);
	?>
	<?php
	
	$option=[
		["url"=>"create-patient_appoints","value"=>"Create Appoints","css"=>"bx bx-right-arrow-alt"],
		["url"=>"manage-patient_appoints","value"=>"Manage Appoints","css"=>"bx bx-right-arrow-alt"],
	];
	
	echo nav_link_dropdown("#","Patient_appointment","bx bx-home",$option);
	?>

	<?php
	$option=[
		["url"=>"create-pathologies","value"=>"Create Test","css"=>"bx bx-right-arrow-alt"],
		["url"=>"manage-pathologies","value"=>"Manage Test","css"=>"bx bx-right-arrow-alt"],
	];
		echo nav_link_dropdown("#","Pathology","bx bx-home",$option);
	?>
	<?php
	
	// $option=[
	// 	["url"=>"create-members","value"=>"Create Member","css"=>"bx bx-right-arrow-alt"],
	// 	["url"=>"manage-members","value"=>"Manage members","css"=>"bx bx-right-arrow-alt"],
	// 	// ["url"=>"create-borrower","value"=>"Create Borrower","css"=>"bx bx-right-arrow-alt"],
	// 	// ["url"=>"manage-borrower","value"=>"Manage Borrower","css"=>"bx bx-right-arrow-alt"],
	// 	//["url"=>"manage-position","value"=>"Manage Position","css"=>"bx bx-right-arrow-alt"],
	// 	//["url"=>"create-attendence","value"=>"Create Attendence","css"=>"bx bx-right-arrow-alt"]
		
	// ];

	// echo nav_link_dropdown("#","Members","bx bx-home",$option);
	?> 
	
	<?php
	
	// $option=[

	// 	["url"=>"create-borrower","value"=>"Create Borrower","css"=>"bx bx-right-arrow-alt"],
	// 	["url"=>"manage-borrower","value"=>"Manage Borrower","css"=>"bx bx-right-arrow-alt"],
	// ];
	
	// echo nav_link_dropdown("#","Borrower","bx bx-home",$option);
	?>
	

	<?php
	
	//$option=[["url"=>"#","value"=>"Create Admin","css"=>"bx bx-right-arrow-alt"],["url"=>"#","value"=>"Manage Admin","css"=>"bx bx-right-arrow-alt"]];

	//echo nav_dropdown($option);
	
	?>

				<!-- <li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-spa' ></i>
						</div>
						<div class="menu-title">Application</div>
					</a>
					<ul>
						<li> <a href="app-emailbox.html"><i class="bx bx-right-arrow-alt"></i>Email</a>
						</li>
						<li> <a href="app-chat-box.html"><i class="bx bx-right-arrow-alt"></i>Chat Box</a>
						</li>
						<li> <a href="app-file-manager.html"><i class="bx bx-right-arrow-alt"></i>File Manager</a>
						</li>
						<li> <a href="app-contact-list.html"><i class="bx bx-right-arrow-alt"></i>Contatcs</a>
						</li>
						<li> <a href="app-to-do.html"><i class="bx bx-right-arrow-alt"></i>Todo List</a>
						</li>
						<li> <a href="app-invoice.html"><i class="bx bx-right-arrow-alt"></i>Invoice</a>
						</li>
						<li> <a href="app-fullcalender.html"><i class="bx bx-right-arrow-alt"></i>Calendar</a>
						</li>
					</ul>
				</li> -->
				
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->