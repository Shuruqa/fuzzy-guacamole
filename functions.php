<?php
set_time_limit(0);
class functions{

public function __construct(){
	
	
$tns = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "users";

$this->dbo = mysqli_connect($tns, $db_username, $db_password, $dbname);



	
	}
/*This is the end of connection */
//function login($user_name,$password){
function login($user_id,$password){
			 extract($_POST);
			 $view= mysqli_query($this->dbo, "SELECT*  FROM `users` WHERE EMP_ID='".$user_id."' AND PASSWORD='".$password."' AND  (USER_TYPE=3 OR USER_TYPE=2 OR USER_TYPE=1 OR USER_TYPE=0)");
			 //$result=mysqli_query($conn,$view);
			 $rowcount= mysqli_num_rows($view);
			if($view)
			{

			   $num = mysqli_fetch_assoc($view);
			  
			  if($num['USER_NAME']!=''){
			 // if($rowcount == 1){
				 
			  $_SESSION['username_admin'] = $user_id;
			  $_SESSION['login_username'] = $num['USER_NAME'];
			  $_SESSION['password'] = $num['PASSWORD'];
			  $_SESSION['username_enrollid'] = $num['EMP_ID'];
			  $_SESSION['user_email'] = $num['EMAIL'];
			  $_SESSION['role'] = $num['USER_TYPE'];
			  $_SESSION['userid'] = $num['ID'];
			  
		
			  
			  
			  

			  
			  return 1;
			  }
			  else
			  {
				  return 0;
			  }
			  
			}
			else
			{
				return 0;
		}
	}
	
function get_emp_info($empid)
{
	$result = array();
	$stid =mysqli_query($this->dbo,"SELECT * FROM `employees` WHERE EMP_ID='".$empid."'");
       
        if ($stid) 
        {	
			while ($row = mysqli_fetch_assoc($stid))
			{
				array_push($result,$row);
			}

			   return $result;
        }
	//print_r($empid);
	//die();
}

	
	
	function get_count_expired_tasks($emp_id)
{
	$current_date=date('Y-m-d H:i:s');
	$result = array();
	
	$stid =mysqli_query($this->dbo,"SELECT P.TASK_NAME, P.TASK_STATUS, P.COMPLETION_DATE FROM `tasks` as P JOIN project_tasks as E on E.`TASK_ID`= P.`TASK_ID` WHERE P.COMPLETION_DATE <='".$current_date."' AND E.EMP_ID='".$emp_id."' AND P.TASK_STATUS='Expired' ");
	//$stid =mysqli_query($this->dbo,"SELECT P.TASK_NAME, P.TASK_STATUS, P.COMPLETION_DATE FROM `tasks` as P JOIN project_tasks as E on E.`TASK_ID`= P.`TASK_ID` WHERE P.COMPLETION_DATE <='".$current_date."' AND E.EMP_ID='".$emp_id."' AND (P.TASK_STATUS='Completed' OR P.TASK_STATUS='Under Progress' OR P.TASK_STATUS='Pending') ");
    
	 
	
	$count= mysqli_num_rows($stid);
	
	return $count;
}

function get_expired_tasks()
{
	$current_date=date('Y-m-d H:i:s');
	$result = array();
	
	$stid =mysqli_query($this->dbo,"SELECT* FROM `tasks` as P JOIN project_tasks as E on E.`TASK_ID`= P.`TASK_ID` WHERE P.COMPLETION_DATE <='".$current_date."' AND P.TASK_STATUS='Expired'");
    
	$count= mysqli_num_rows($stid);
	
	return $count;
}

function emp_project_tasks($pro_id,$emp_id)
{
	$result = array();

	$stid = mysqli_query($this->dbo,"SELECT * FROM `tasks` as P JOIN project_tasks as E on E.`TASK_ID`= P.`TASK_ID` where P.PROJECT_ID='".$pro_id."' AND E.EMP_ID='".$emp_id."' ");
	
	 if ($stid) 
        {	
			while ($row = mysqli_fetch_assoc($stid))
			{
				array_push($result,$row);
			}

			   return $result;
        }

}

//to count the no. of all projects
function count_project()
{
	$result = array();

	$stmt1 = mysqli_query($this->dbo,"SELECT COUNT(*) as COUNT FROM `projects`  ");
	
	 if ($stmt1) 
        {	
			 $fetch_rows = mysqli_fetch_assoc($stmt1);
			 $count_rows= $fetch_rows['COUNT'];

			   
        }
		
		return $count_rows;
}
//count the no. of all employees/ developers
function count_dev()
{
	$result = array();

	$stmt1 = mysqli_query($this->dbo,"SELECT COUNT(*) as COUNT FROM `employees`");
	
	 if ($stmt1) 
        {	
			 $fetch_rows = mysqli_fetch_assoc($stmt1);
			 $count_rows= $fetch_rows['COUNT'];

			   
        }
		
		return $count_rows;
}

//to count the number of tasks in all projects 
function count_project_tasks()
{
	$result = array();

	$stmt1 = mysqli_query($this->dbo,"SELECT COUNT(*) as COUNT FROM `project_tasks`");
		 //while($fetch_rows = mysqli_fetch_assoc($stmt1));
		// $fetch_rows = mysqli_fetch_assoc($stmt1);
	//	 $count_rows= $fetch_rows['COUNT'];
	//	 echo $count_rows;
	
	 if ($stmt1) 
        {	
			 $fetch_rows = mysqli_fetch_assoc($stmt1);
			 $count_rows= $fetch_rows['COUNT'];

			   
        }
		
		return $count_rows;
}

//to count the number of Completed/under progree/pending tasks for all projects
function count_milestone()
{
	$result = array();

	$stmt1 = mysqli_query($this->dbo,"SELECT COUNT(*) as COUNT FROM `milestone` ");
		 //while($fetch_rows = mysqli_fetch_assoc($stmt1));
		// $fetch_rows = mysqli_fetch_assoc($stmt1);
		// $count_rows= $fetch_rows['COUNT'];
	//	 echo $count_rows;
	
	 if ($stmt1) 
        {	
			 $fetch_rows = mysqli_fetch_assoc($stmt1);
			 $count_rows= $fetch_rows['COUNT'];

			   
        }
		
		return $count_rows;
}

//to count the no. of dev in each project
function count_pro($pro_id)
{
	$result = array();

	$stmt1 = mysqli_query($this->dbo,"SELECT COUNT(PROJECT_ID) as COUNT FROM `projects` where PROJECT_ID='".$pro_id."'");
	
	 if ($stmt1) 
        {	
			 $fetch_rows = mysqli_fetch_assoc($stmt1);
			 $count_rows= $fetch_rows['COUNT'];

			   
        }
		
		return $count_rows;
}

//to count the no. of dev in each project
function count_devs_pro($pro_id)
{
	$result = array();

	$stmt1 = mysqli_query($this->dbo,"SELECT COUNT(EMP_ID) as COUNT FROM `project_tasks` where PROJECT_ID='".$pro_id."'");
		 //while($fetch_rows = mysqli_fetch_assoc($stmt1));
		// $fetch_rows = mysqli_fetch_assoc($stmt1);
		// $count_rows= $fetch_rows['COUNT'];
	//	 echo $count_rows;
	
	 if ($stmt1) 
        {	
			 $fetch_rows = mysqli_fetch_assoc($stmt1);
			 $count_rows= $fetch_rows['COUNT'];

			   
        }
		
		return $count_rows;
}

//to count the number all of tasks of particular project
function count_task_pro($pro_id)
{
	$result = array();

	$stmt1 = mysqli_query($this->dbo,"SELECT COUNT(PROJECT_ID) as COUNT FROM `project_tasks` where PROJECT_ID='".$pro_id."'");
	
	 if ($stmt1) 
        {	
			 $fetch_rows = mysqli_fetch_assoc($stmt1);
			 $count_rows= $fetch_rows['COUNT'];

			   
        }
		
		return $count_rows;
}

//to count the number of milestone in each projects
function count_pro_milestone($pro_id)
{
	$result = array();

	$stmt1 = mysqli_query($this->dbo,"SELECT COUNT(*) as COUNT FROM `milestone` where PROJECT_ID='".$pro_id."'");
	
	 if ($stmt1) 
        {	
			 $fetch_rows = mysqli_fetch_assoc($stmt1);
			 $count_rows= $fetch_rows['COUNT'];

			   
        }
		
		return $count_rows;
}


//to count the number of Completed/under progree/pending tasks for particular project
function count_task_status($pro_id)
{
	$result = array();

		$stmt1 = mysqli_query($this->dbo,"SELECT TASK_PROG ,TASK_ID FROM `task_progress` ORDER BY TASK_ID");
	
	$data = array();
	
	while ($row = mysqli_fetch_assoc($stmt1)){
	  $data[] = $row;
	}
		

		$myArr = array('All_data'=>$data);
		$myJSON = json_encode($myArr);

		echo $myJSON;
	
}

//to find the launch date of particular project
function launch_pro_date($pro_id)
{
	$result = array();

		$stmt1 = mysqli_query($this->dbo,"SELECT COMPLETION_DATE FROM `projects` WHERE `PROJECT_ID`='".$pro_id."'");
	
	 if ($stmt1) 
        {	
			 $fetch_rows = mysqli_fetch_assoc($stmt1);
			 $count_rows= $fetch_rows['COMPLETION_DATE'];


			   
        }
		
		return $count_rows;
	
}	 

//to count the number all of tasks of particular project
function count_pro_module($pro_id)
{
	$result = array();

	$stmt1 = mysqli_query($this->dbo,"SELECT COUNT(DISTINCT TASK_MODULE) as COUNT FROM `tasks` where PROJECT_ID='".$pro_id."'");
	
	 if ($stmt1) 
        {	
			 $fetch_rows = mysqli_fetch_assoc($stmt1);
			 $count_rows= $fetch_rows['COUNT'];

			   
        }
		
		return $count_rows;
}

//to count the number all of tasks of particular project
function count_status($pro_id)
{
		
		$stmt1 = mysqli_query($this->dbo,"
				SELECT 
					SUM(IF(TASK_PROG = 'Completed', 1, 0)) as Completed,
					SUM(IF(TASK_PROG = 'Under Progress', 1, 0)) as Under_Progress,
					SUM(IF(TASK_PROG = 'Pending', 1, 0)) as Pending
				FROM `task_progress`
				WHERE PROJECT_ID='".$pro_id."'");

			 
			$data = array();
			
		//	while ($row = mysqli_fetch_assoc($stmt1)){
			 $row = mysqli_fetch_assoc($stmt1);
			 $completed= $row['Completed'];
			 $underprogress= $row['Under_Progress'];
			 $pending= $row['Pending'];
			 

				//		}
					
			
		$myArr = array('Completed'=>$completed,'Under_Progress'=>$underprogress,'Pending'=>$pending);
		//$myJSON = json_encode($myArr);

        
			return $myArr;
	
}

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}	
	?>