 <?php
     if (isset($_GET["page"])){

        $page=$_GET["page"];

            if($page=="home"){
                include("pages/user/default.php");
            }elseif($page=="create-user"){
                include("pages/user/create_user.php");
            }elseif($page=="create-role"){
                include("pages/role/create_role.php");
            }elseif($page=="manage-user"){
                include("pages/user/manage_user.php");
            }elseif($page=="edit-user"){
                include("pages/user/edit_user.php");
            //}elseif($page=="manage-employee"){
            //     include("pages/user/manage-employee.php");
            }elseif($page=="departments"){
                include("pages/user/departments.class.php");
            }
            
            elseif($page=="create-position"){
                include("pages/position/create-position.php");
            }elseif($page=="manage-position"){
                include("pages/position/manage-position.php");
            }elseif($page=="edit-position"){
                include("pages/position/edit-position.php");
            }
            
            elseif($page=="create-department"){
                include("pages/department/create-department.php");
            }elseif($page=="manage-department"){
                include("pages/department/manage-department.php");
            }elseif($page=="edit-department"){
                include("pages/department/edit-department.php");
            }
            
            elseif($page=="create-employee"){
                include("pages/employee/create-employee.php");
            }elseif($page=="manage-employee"){
                include("pages/employee/manage-employee.php");
            }elseif($page=="edit-employee"){
                include("pages/employee/edit-employee.php");
            }
            
            elseif($page=="create-attendence"){
                include("pages/attendence/create-attendence.php");
            }elseif($page=="manage-attendence"){
                include("pages/attendence/manage-attendence.php");
            }elseif($page=="edit-attendence"){
                include("pages/attendence/edit-attendence.php");
            }
                // ----- DOCTORS------
            elseif($page=="create-doctors"){
                include("pages/doctor/create_doctor.php");
            }elseif($page=="manage-doctors"){
                include("pages/doctor/manage_doctor.php");
            }elseif($page=="edit-doctor"){
                include("pages/doctor/update_doctor.php");
            }
            elseif($page=="create-patients"){
                include("pages/patient/create_patient.php");
            }elseif($page=="manage-patients"){
                include("pages/patient/manage_patient.php");
            }elseif($page=="edit-patient"){
                include("pages/patient/update_patient.php");
            }
            
            elseif($page=="create-patient_appoints"){
                include("pages/patient_appoint/create_patient_appoint.php");
            }elseif($page=="manage-patient_appoints"){
                include("pages/patient_appoint/manage_patient_appoint.php");
            }elseif($page=="edit-patient_appoint"){
                include("pages/patient_appoint/update_patient_appoint.php");
            }

            elseif($page=="create-pathologies"){
                include("pages/pathologie/create_pathologie.php");
            }elseif($page=="manage-pathologies"){
                include("pages/pathologie/manage_pathologie.php");
            }

            elseif($page=="create-members"){
                include("pages/member/create_member.php");
            }elseif($page=="manage-members"){
                include("pages/member/manage_member.php");
            }elseif($page=="update-members"){
                include("pages/member/update_member.php");
            }
            
            elseif($page=="create-borrower"){
                include("pages/borrower/borrower/create_borrower.php");
            }elseif($page=="manage-borrower"){
                include("pages/borrower/borrower/manage_borrower.php");
            }elseif($page=="edit-borrower"){
                include("pages/borrower/borrower/update_borrower.php");
            }
                
     }
    
?> 