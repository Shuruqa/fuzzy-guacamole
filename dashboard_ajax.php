<?php 
ob_start(); 
session_start();
include("functions.php");
$func=new functions();
date_default_timezone_set('UTC');


if(isset($_POST['page']) && ($_POST['page']=='display_main_dashboard')){
	
			extract($_POST);
			$data_all=$_REQUEST;
			$emp_id= $_SESSION['username_admin'];

	
			$all_project=$func->count_project();
			$all_dev=$func->count_dev();
			$project_tasks= $func->count_project_tasks();
			$proj_milestone=$func->count_milestone();

			
			$myArr = array('Total_Projects'=>$all_project,'Total_Employees'=>$all_dev,'Total_Tasks'=>$project_tasks,'Total_Milestones'=>$proj_milestone);
			$myJSON = json_encode($myArr);

            echo $myJSON;
}
if(isset($_POST['page']) && ($_POST['page']=='display_main2_dashboard')){
	
			extract($_POST);
			$data_all=$_REQUEST;
			$emp_id= $_SESSION['username_admin'];
			$pro_id= $_REQUEST['pro_id'];
	
			$single_project=$func->count_pro($pro_id);
			$devs_pro=$func->count_devs_pro($pro_id);
			$tasks_pro=$func->count_task_pro($pro_id);
			$milestone_pro=$func->count_pro_milestone($pro_id);
			$launch_date=$func->launch_pro_date($pro_id);
			$module_pro=$func->count_pro_module($pro_id);

			
			$myArr = array('Project_Modules'=>$module_pro,'Project_developers'=>$devs_pro,'Project_tasks'=>$tasks_pro,'Project_Launch_Date'=>$launch_date);
			$myJSON = json_encode($myArr);

            echo $myJSON;

}

if(isset($_POST['page']) && ($_POST['page']=='display_task_status_dashboard')){
	
			extract($_POST);
			$data_all=$_REQUEST;
			$emp_id= $_SESSION['username_admin'];
			$pro_id= $_REQUEST['pro_id'];
			$data = array();

			$stmt1 = mysqli_query($func->dbo,"
				SELECT 
					SUM(IF(TASK_STATUS = 'Completed', 1, 0)) as Completed,
					SUM(IF(TASK_STATUS = 'Under Progress', 1, 0)) as Under_Progress,
					SUM(IF(TASK_STATUS = 'Pending', 1, 0)) as Pending,
					SUM(IF(TASK_STATUS = 'Expired', 1, 0)) as Expired
				FROM `tasks`
				WHERE PROJECT_ID='".$pro_id."'");

			 $row = mysqli_fetch_assoc($stmt1);
			 $completed= $row['Completed'];
			 $underprogress= $row['Under_Progress'];
			 $pending= $row['Pending'];
			 $expired= $row['Expired'];
			 

					
			
		$myArr = array('Completed'=>$completed,'Under_Progress'=>$underprogress,'Pending'=>$pending,'Expired'=>$expired);
		$myJSON = json_encode($myArr);

		echo $myJSON;
			
}

if(isset($_POST['page']) && ($_POST['page']=='display_dev_task_status')){
	
			extract($_POST);
			$data_all=$_REQUEST;
			$emp_id= $_SESSION['username_admin'];
			$pro_id= $_REQUEST['pro_id'];
			$data = array();
	if((isset($_SESSION['role']) && $_SESSION['role'] != 2 && $_SESSION['role'] != 3 )){
		
			$stmt1 = mysqli_query($func->dbo,"
				SELECT 
					SUM(IF(TASK_PROG = 'Completed', 1, 0)) as Completed,
					SUM(IF(TASK_PROG = 'Under Progress', 1, 0)) as Under_Progress,
					SUM(IF(TASK_PROG = 'Pending', 1, 0)) as Pending
				FROM `task_progress`
				WHERE PROJECT_ID='".$pro_id."' ");
		}else{
			
			$stmt1 = mysqli_query($func->dbo,"
				SELECT 
					SUM(IF(TASK_PROG = 'Completed', 1, 0)) as Completed,
					SUM(IF(TASK_PROG = 'Under Progress', 1, 0)) as Under_Progress,
					SUM(IF(TASK_PROG = 'Pending', 1, 0)) as Pending
				FROM `task_progress`
				WHERE PROJECT_ID='".$pro_id."' And EMP_ID='".$emp_id."'");
		}	


			 $row = mysqli_fetch_assoc($stmt1);
			 $completed= $row['Completed'];
			 $underprogress= $row['Under_Progress'];
			 $pending= $row['Pending'];
			 

		$myArr = array('Completed'=>$completed,'Under_Progress'=>$underprogress,'Pending'=>$pending);
		$myJSON = json_encode($myArr);

		echo $myJSON;
			
}

if(isset($_POST['page']) && ($_POST['page']=='test')){
	
		extract($_POST);
		$data_all=$_REQUEST;
		$emp_id= $_SESSION['username_admin'];
		$pro_id= $_REQUEST['pro_id'];
		$data = array();

		$stmt1 = mysqli_query($func->dbo,"
			SELECT 
				SUM(IF(TASK_PROG = 'Completed', 1, 0)) as Completed,
				SUM(IF(TASK_PROG = 'Under Progress', 1, 0)) as Under_Progress,
				SUM(IF(TASK_PROG = 'Pending', 1, 0)) as Pending
			FROM `task_progress`
			WHERE PROJECT_ID='".$pro_id."' And EMP_ID='".$emp_id."'");

		 $row = mysqli_fetch_assoc($stmt1);
		 $completed= $row['Completed'];
		 $underprogress= $row['Under_Progress'];
		 $pending= $row['Pending'];
			 

		$myArr = array('Completed'=>$completed,'Under_Progress'=>$underprogress,'Pending'=>$pending);
		$myJSON = json_encode($myArr);

		echo $myJSON;
			
}

if(isset($_POST['page']) && ($_POST['page']=='Tasks_progress_dashboard')){
	
			extract($_POST);
			$data_all=$_REQUEST;
			$emp_id= $_SESSION['username_admin'];
			$pro_id= $_REQUEST['pro_id'];
			$data = array();

			$stmt1 = mysqli_query($func->dbo,"
				SELECT COUNT(task_progress.TASK_ID) As Count
				FROM tasks
				Inner JOIN task_progress
					ON tasks.TASK_ID = task_progress.TASK_ID
                    where TASK_PROG='Completed'
				GROUP BY tasks.TASK_ID");

			if($stmt1){
				
				while($row=mysqli_fetch_assoc($stmt1))
				{
					$data[]=$row['Count'];
				
				}
				
			}

		$myJSON = json_encode($data);
		echo $myJSON;
		
			
}

if(isset($_POST['page']) && ($_POST['page']=='view_modules_dashboard')){

	$table_data='';
	$pro_id= $_REQUEST['pro_id'];
	$res_data=array("table_data"=>"");
	$inc=1;

	if((isset($_SESSION['role']) && $_SESSION['role'] != 2 && $_SESSION['role'] != 3 )){
									
		$result = mysqli_query($func->dbo,"SELECT DISTINCT D.EMP_ID, D.FULL_NAME, P.PROJECT_ID, P.PROJ_NAME, S.TASK_NAME, S.START_DATE, S.COMPLETION_DATE, S.TASK_DES, S.TASK_STATUS,  S.TASK_HRS, S.TASK_MODULE, S.TASK_PURPOSE from tasks AS S inner join project_tasks AS M on S.TASK_ID = M.TASK_ID AND S.PROJECT_ID = M.PROJECT_ID inner join projects AS P on P.PROJECT_ID=M.PROJECT_ID inner join employees AS D on D.EMP_ID = M.EMP_ID where M.PROJECT_ID='".$pro_id."'");

	}else{

		$result = mysqli_query($func->dbo,"SELECT DISTINCT D.EMP_ID, D.FULL_NAME, P.PROJECT_ID, P.PROJ_NAME, S.TASK_NAME, S.START_DATE, S.COMPLETION_DATE, S.TASK_DES, S.TASK_STATUS,  S.TASK_HRS, S.TASK_MODULE, S.TASK_PURPOSE from tasks AS S inner join project_tasks AS M on S.TASK_ID = M.TASK_ID AND S.PROJECT_ID = M.PROJECT_ID inner join projects AS P on P.PROJECT_ID=M.PROJECT_ID inner join  employees AS D on D.EMP_ID = M.EMP_ID where M.PROJECT_ID='".$pro_id."' AND D.EMP_ID='".$_SESSION['username_admin']."' ");

	}
		 while($row = mysqli_fetch_assoc($result))
			{
				if($row['TASK_STATUS'] == 'Expired'){
					
						$color='label label-danger-border';
						
					}else if($row['TASK_STATUS']== 'Completed'){
						
						$color='label label-success-border';
					}
					else
					{
						$color='label label-warning-border';
					}
				
							$table_data.='<tr><td><a href="#">'.$inc.'</a></td><td><h2><a href="#">'.$row['TASK_MODULE'].'</a></h2></td><td>'.$row['TASK_NAME'].'</td><td>'.$row['FULL_NAME'].'</td><td>'.$row['START_DATE'].'</td><td>'.$row['COMPLETION_DATE'].'</td><td><span class="'.$color.'">'.$row['TASK_STATUS'].'</span></td></tr>';

								$inc++;
								$res_data['table_data']=$table_data;
			
			}
					echo json_encode($res_data);

		}
if(isset($_POST['page']) && ($_POST['page']=='display_employee_profile')){
	
		extract($_POST);
		$data_all=$_REQUEST;
		$user_login= $_SESSION['username_admin'];
		$table_data='';
		$res_data=array("table_data"=>"");
		$result = array();

		
		$stmt1 = mysqli_query($func->dbo,"SELECT*  FROM `employees` where EMP_ID='".$user_login."'");
	
	 if ($stmt1) 
        {	
			$fetch_rows = mysqli_fetch_assoc($stmt1);
			$employeename= $fetch_rows['FULL_NAME'];
			$employeeid= $fetch_rows['EMP_ID'];
			$jobtitle= $fetch_rows['DESIGNATION'];
			$emailid= $fetch_rows['EMAIL'];
			$birthdate= $fetch_rows['JOINING_DATE'];
			$gendertype= $fetch_rows['GENDER'];
			$phonenum= $fetch_rows['PHONE'];
			$compname= $fetch_rows['COMPANY'];
			$collegename= $fetch_rows['COLLEGE_NAME'];
			$majorname= $fetch_rows['MAJOR_NAME'];
			$prevempr= $fetch_rows['PRE_EMPLOYER'];
			$preposition= $fetch_rows['PRE_POSITION'];
			$checkbox= $fetch_rows['SKILL'];
	
			}

		$myArr = array('employee_name'=>$employeename,'employee_id'=>$employeeid,'designation'=>$jobtitle,'phone_num'=>$phonenum,'email_id'=>$emailid,'birthday'=>$birthdate,'address'=>$compname,'gender_type'=>$gendertype,'college_name'=>$collegename,'major_name'=>$majorname,'prev_empr'=>$prevempr,'pre_position'=>$preposition,'checkbox'=>$checkbox);
		$myJSON = json_encode($myArr);

        
		echo $myJSON;
}

if(isset($_POST['page']) && ($_POST['page']=='display_employee_skills')){
	
		extract($_POST);
		$data_all=$_REQUEST;
		$emp_id= $_SESSION['username_admin'];
		$skills_list='';
		$result_data=array("skills_list"=>"");
		$result = array();

		$stmt1 = mysqli_query($func->dbo,"SELECT*  FROM `employees` WHERE EMP_ID='".$emp_id."'");
		
		
	 if ($stmt1) 
        {	
			$fetch_rows = mysqli_fetch_assoc($stmt1);
			$checkbox= $fetch_rows['SKILL'];
			$skills = explode(',',$checkbox);
			foreach($skills as $key => $skill)
			{
				$skills_list .= '<span id="skill1">'.$skill.'</span>';
			}
			
			$result_data['skills_list']=$skills_list;

			   
        }
		
		//$myArr = explode(',',$checkbox);
		echo json_encode($result_data);
		

        
		//echo $myJSON;
}


/*if(isset($_POST['page']) && ($_POST['page']=='profile_button')){

 $stmt = mysqli_query($func->dbo,"SELECT * FROM `employees`  where`EMP_ID`=".$_SESSION['username_admin']."");
	 $inc=1;
	 $emp_id=$_SESSION['username_admin'];
	 while($row = mysqli_fetch_assoc($stmt))
	 {
		 
	  $table_data.= '<a href="edit-profile.php?emp_id='.$emp_id.'" onclick="edit_emp_profile('.$row['EMP_ID'].','."'".$row['FIRST_NAME']."'".','."'".$row['LAST_NAME']."'".','."'".$row['CREATED_BY']."'".','."'".$row['S_DATE']."'".','."'".$row['C_DATE']."'".','."'".$row['PHONE']."'".','."'".$row['GENDER']."'".','."'".$row['ADDRESS']."'".','."'".$row['COLLEGE_NAME']."'".','."'".$row['MAJOR_NAME']."'".','."'".$row['PRE_EMPLOYER']."'".','."'".$row['PRE_POSITION']."'".','."'".$row['BIRTH_DATE']."'".','."'".$row['STATE']."'".','."'".$row['COUNTRY']."'".','."'".$row['PIN_CODE']."'".','."'".$row['DEGREE_NAME']."'".','."'".$row['GRADE']."'".','."'".$row['PRE_LOCATION']."'".','."'".$row['F_PERIOD']."'".','."'".$row['T_PERIOD']."'".')" class="btn btn-primary rounded"><i class="fa fa-plus"></i>Edit Profile</a>';
	 }


}*/

?>