<?php 
ob_start(); 
session_start();
include("functions.php");
$func=new functions();
date_default_timezone_set('UTC');

	
	/* To view and access  the team lead, and dev their own tasks only and shows fill progress only */
	if(isset($_POST['page']) && ($_POST['page']=='view_task_page')){
		
		
	extract($_POST);
	$data_all=$_REQUEST;
	$table_data='';
	$res_data=array("table_data"=>"");
	$emp_id= $_SESSION['username_admin'];
	$pro_id= $_REQUEST['pro_id'];
	$inc=1;
	
	if($_REQUEST['pro_id'] !='')
	{
		if ($_SESSION['role'] != 2 && $_SESSION['role']!=3)
		{	
			
		$check_exits = mysqli_query($func->dbo,"SELECT * FROM `tasks` where PROJECT_ID=".$_REQUEST['pro_id']."");
		$hideme = '';
		
		}else{

		$check_exits = mysqli_query($func->dbo,"SELECT * FROM `tasks` as P JOIN project_tasks as E on E.`TASK_ID`= P.`TASK_ID` where P.PROJECT_ID='".$pro_id."' AND E.EMP_ID='".$emp_id."' ");
		$hideme = 'display:none;';

		}
		
		while($row = mysqli_fetch_assoc($check_exits))
		{
		
		$table_data.='<tr><td>'.$inc.'</td><td>'.$row['PROJECT_ID'].'</td><td>'.$row['TASK_NAME'].'</td><td>'.$row['START_DATE'].'</td><td>'.$row['COMPLETION_DATE'].'</td><td>'.$row['TASK_STATUS'].'</td><td class="text-right">
			<div class="dropdown">
				<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
						<ul class="dropdown-menu pull-right">
						<li style ="'.$hideme.'"><a href="javascript:void(0)" data-toggle="modal" data-target="#view_assignee_task" data-toggle="modal" onclick="add_assign_emp_task('.$row['TASK_ID'].','."'".$row['TASK_NAME']."'".','."'".$row['START_DATE']."'".','."'".$row['COMPLETION_DATE']."'".','.$row['PROJECT_ID'].','."'".$row['TASK_STATUS']."'".','."'".$row['TASK_DES']."'".')" value="'.$row['TASK_ID'].'" class="" task_id="'.$row['TASK_ID'].'" title="View Tasks" id="view_assignee" name="view_assignee">
						<input type="hidden" name="task_id" id="task_id" value="'.$row['TASK_ID'].'" />
						<input type="hidden" name="pro_id" id="pro_id" value="'.$row['PROJECT_ID'].'" /><i class="fa fa-eye m-r-5"></i> View </a></li>
						<li style ="'.$hideme.'"><a href="javascript:void(0)" data-toggle="modal" onclick="assign_emp_task('.$row['TASK_ID'].')" value="'.$row['TASK_ID'].'" class="" task_id="'.$row['TASK_ID'].'" title="Add Assignee" data-target="#assign_pro"><i class="fa fa-plus-square-o m-r-5"></i> Assign To </a></li>
						<li ><a href="javascript:void(0)" data-toggle="modal" onclick="assigned_emp_task_progress('.$row['TASK_ID'].','."'".$row['TASK_NAME']."'".','."'".$row['START_DATE']."'".','."'".$row['COMPLETION_DATE']."'".','.$row['PROJECT_ID'].','.$emp_id.')" value="'.$row['TASK_ID'].'" class="" task_id="'.$row['TASK_ID'].'" title="Add Progress"  data-toggle="modal" data-target="#task_progress">
						<input type="hidden" name="task_id" id="task_id" value="'.$row['TASK_ID'].'" />
						<input  type="hidden"  id="empid_task_search" value="'.$emp_id.'" name="empid_task_search">
						<input type="hidden" name="pro_id" id="pro_id" value="'.$row['PROJECT_ID'].'" /><i class="fa fa-spinner m-r-5"></i>Add Progress </a></li>	
						<li style ="'.$hideme.'"><a href="javascript:void(0)" data-toggle="modal" onclick="delete_tasknumber('.$row['TASK_ID'].')" name="delete_tasknumber" id="delete_tasknumber"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
						</ul>
						</div>
				</td></tr>';

					$inc++;
					$res_data['table_data']=$table_data;
						
				}
		
			}
			
		echo json_encode($res_data);

	}  
	
/*To delete task*/
	if(isset($_POST['page']) && ($_POST['page']=='delete_tasknumber'))
{
	extract($_POST);
if((isset($_SESSION['role']) && $_SESSION['role'] != "2" && $_SESSION['role'] != "3" ))
		{
	
	$stmt = mysqli_query($func->dbo, "DELETE FROM `tasks` WHERE TASK_ID='".$_POST['task_id']."' ");
		
        if ($stmt)
        {
             echo 0;
			
        }
		else
		{
		 echo "There Something wrong.";
		}
	}else
	{
		echo 1; 
		
		
	}
}


/*To Create a new task by Admin amd PM and Team lead only */
	if(isset($_POST['page']) && ($_POST['page']=='create_task_page'))
{

	extract($_POST);
	$data_all=$_POST;
	$start_date = strtr($_POST['start_date'], '/', '-');
	$end_date = strtr($_POST['end_date'], '/', '-');
	//print_r($_POST);
	
	if((isset($_SESSION['role']) && $_SESSION['role'] != "3" ))
		{

		
		if($empid_search!='')
				{
	
					$check_exits = mysqli_query($func->dbo,"SELECT * FROM `employees` WHERE EMP_ID='".$empid_search."' ");
													   
					if($check_exits)
					{
						$row = mysqli_fetch_assoc($check_exits);
						if($row['EMP_ID']!='')
						{	
					
					
							$stmt = mysqli_query($func->dbo,"UPDATE `tasks` SET `TASK_ID`='".$_POST['task_id']."',`TASK_STATUS`='".$task_status."',`TASK_DES`='".$task_description."',`START_DATE`='".date('Y-m-d', strtotime($start_date))."',`COMPLETION_DATE`='".date('Y-m-d', strtotime($end_date))."',`PROJECT_ID`='".$pronumber."',`EMP_ID`='".$empid_search."',`USER_NAME`='".$_SESSION["login_username"]."', `CREATED_BY`='".$_SESSION["username_admin"]."' WHERE `TASK_ID`='".$_POST['task_id']."' ");
							
							

					
								if($stmt)
								{
									echo 2; // insert ;
									echo "record is edited";
									
								}
			
						
		               }
				}
				
			 }
											  
		}else{
			echo 1; 

			
		}

}


//this is to select all task members */
if(isset($_POST['page']) && ($_POST['page']=='task_members'))
{	
	
	extract($_POST);
	$data_all=$_POST;
	$table_data='';
	$result_data=array("table_data"=>"");
	

	//here should be for the developers 
	$stmt = mysqli_query($func->dbo,"SELECT * FROM `project_tasks` as P JOIN employees as E on E.`EMP_ID`= P.`EMP_ID` where P.TASK_ID=".$_REQUEST['assign_task_id']." ");
	
		$inc=1;				
		while($row = mysqli_fetch_assoc($stmt))
			{


		$table_data.='<tr><td>'.$inc.'</td><td>'.$row['EMP_ID'].'</td><td>'.$row['FULL_NAME'].'</td><td>'.$row['DESIGNATION'].'</td><td><a a href="emp_task_details.php?empid_search='.$row["EMP_ID"].'" data-toggle="modal" onclick="view_details('.$row['ID'].')" name="view_details" id="view_details"><i class="fa fa-eye m-r-5"></i> View Progress</a></td></tr>';


		 $inc++; 
		 $result_data['table_data']=$table_data;
		 

		 
	 } 
		
	echo json_encode($result_data);
	

}


/* this is to assign developers to a task in project_task table */
if(isset($_POST['page']) && ($_POST['page']=='assign_emp_to_task'))
{

	extract($_POST);
	$data_all=$_POST;
	$assigned_date = strtr($_REQUEST['assigned_date'], '/', '-');
	//print_r($_POST);
	
	
	if((isset($_SESSION['role']) && $_SESSION['role'] != "3" ))
		{
		if($assign_task_id!='')
				{

				$check_exits = mysqli_query($func->dbo,"SELECT * FROM `employees` WHERE EMP_ID='".$empid_search."' ");
													   
					if($check_exits)
					{
						
							if($task_ids==''){
			 
						//echo "INSERT INTO `project_tasks`(`ID`, `EMP_ID`, `TASK_ID`, `PROJECT_ID`, `SUBMITTED_DATE` ) VALUES ('".$_POST['task_ids']."','".$empid_search."','".$assign_task_id."','".$_POST['pro_id']."', '".date('Y-m-d', strtotime($assigned_date))."')";
						$stmt= mysqli_query($func->dbo, "INSERT INTO `project_tasks`(`ID`, `EMP_ID`, `TASK_ID`, `PROJECT_ID`, `SUBMITTED_DATE` ) VALUES ('".$_POST['task_ids']."','".$empid_search."','".$assign_task_id."','".$_POST['pro_id']."', '".date('Y-m-d', strtotime($assigned_date))."')");
						
						
						
								if($stmt)
							{
								echo 2; // INSERT ;
								echo '<script>alert("record are  inserted");</script>';
								
							}
						}
	
				}
				
			
			}

		}else{
			echo 1; //wrong credentials
			
		}	 
											  

}

/* to search employees in (View Task) modal (i deleted this temprory ) */
if(isset($_POST['page']) && ($_POST['page']=='search_to_emp'))
{	
	
	extract($_POST);
	$data_all=$_POST;
	$table_data='<ul class="media-list media-list-linked chat-user-list" >';
	$res_data=array("table_data"=>"");
	$stmt = mysqli_query($func->dbo,"SELECT * FROM `employees` WHERE EMP_ID='".$empid_search."' "); 
	$inc=1;
    while($row = mysqli_fetch_assoc($stmt))
	{
			
		if($inc==1){
		
			$table_data.='
              <li class="media"> <a href="#" class="media-link">
                  <div class="media-left"><span class="avatar"> <img src="images/user.jpg"> </span>
				  </div>
                  <div class="media-body media-middle text-nowrap">
                    <div class="user-name">'.$row['FULL_NAME'].'</div>
                    <span class="designation">'.$row['DESIGNATION'].'</span> 
					<input type="hidden" name="task_id" id="task_id" value="" /></div>
                  </a> </li></ul>';
							
		$inc++;
		$res_data['table_data']=$table_data;
		
		}
	}
	
	echo json_encode($res_data);
}

/*to search the employees who needed to be assigned in (Assigned Employees) modal*/
if(isset($_POST['page']) && ($_POST['page']=='search_assigned_emp'))
{	
	
	extract($_POST);
	$data_all=$_POST;
	$table_data='';
	$res_data=array("table_data"=>"");
	$stmt = mysqli_query($func->dbo,"SELECT * FROM `employees` WHERE EMP_ID='".$empid_search."' "); 
	$inc=1;
    while($row = mysqli_fetch_assoc($stmt))
	{
			
		if($inc==1){
		
			 $table_data.='<tr><td>'.$inc.'</td><td>'.$row['EMP_ID'].'</td><td>'.$row['FULL_NAME'].'</td><td>'.$row['DESIGNATION'].'</td></tr>';
							
		$inc++;
		$res_data['table_data']=$table_data;
		
		}
	}
	
	echo json_encode($res_data);
}

//to create new task by Admin And PM Only*/
if(isset($_POST['page']) && ($_POST['page']=='assign_to_emp1'))
{

	extract($_POST);
	$data_all=$_POST;
	$start_date = strtr($_POST['start_date'], '/', '-');
	$end_date = strtr($_POST['end_date'], '/', '-');
	//print_r($_POST);
	
	if((isset($_SESSION['role']) && $_SESSION['role'] != "2" && $_SESSION['role'] != "3" ))
		{

					$check_exits = mysqli_query($func->dbo,"SELECT * FROM `tasks` WHERE TASK_ID='".$task_ids."' ");
													   
					if($check_exits)
					{
						$row = mysqli_fetch_assoc($check_exits);
						if($row['TASK_ID']!='')
						{	
							
							echo '<script>alert("record are already exits ");</script>';
					
							echo "UPDATE `tasks` SET `TASK_ID`='".$_POST['task_ids']."',`TASK_NAME`='".$new_task."',`TASK_STATUS`='".$task_status."',`TASK_DES`='".$task_description."',`START_DATE`='".date('Y-m-d', strtotime($start_date))."',`COMPLETION_DATE`='".date('Y-m-d', strtotime($end_date))."',`PROJECT_ID`='".$pro_id."',`EMP_ID`='".$empid_search."',`USER_NAME`='".$_SESSION["login_username"]."', `CREATED_BY`='".$_SESSION["username_admin"]."', `TASK_HRS`='".$task_hrs."',`TASK_MODULE`='".$task_module."',`TASK_PURPOSE`='".$task_purpose."' WHERE `TASK_ID`='".$_POST['task_ids']."' ";
							
							$stmt = mysqli_query($func->dbo,"UPDATE `tasks` SET `TASK_ID`='".$_POST['task_ids']."',`TASK_NAME`='".$new_task."',`TASK_STATUS`='".$task_status."',`TASK_DES`='".$task_description."',`START_DATE`='".date('Y-m-d', strtotime($start_date))."',`COMPLETION_DATE`='".date('Y-m-d', strtotime($end_date))."',`PROJECT_ID`='".$pro_id."',`USER_NAME`='".$_SESSION["login_username"]."', `CREATED_BY`='".$_SESSION["username_admin"]."',`TASK_HRS`='".$task_hrs."',`TASK_MODULE`='".$task_module."',`TASK_PURPOSE`='".$task_purpose."' WHERE `TASK_ID`='".$_POST['task_ids']."' ");
							//`EMP_ID`='".$empid_search."',
							
					
								if($stmt)
								{
									echo 2; // insert ;
									echo "record is edited";
									
								}
			
						
		               }else {
							//if($task_ids==''){

							echo "INSERT INTO `tasks`(`TASK_ID`, `TASK_NAME`, `TASK_STATUS`, `TASK_DES`, `START_DATE`, `COMPLETION_DATE`, `PROJECT_ID`, `USER_NAME`, `CREATED_BY`, `TASK_HRS`, `TASK_MODULE`, `TASK_PURPOSE`) VALUES ('".$_POST['task_ids']."','".$new_task."','".$task_status."','".$task_description."','".date('Y-m-d', strtotime($start_date))."','".date('Y-m-d', strtotime($end_date))."','".$pro_id."','".$_SESSION["login_username"]."','".$_SESSION["username_admin"]."', '".$task_hrs."', '".$task_module."', '".$task_purpose."')"; 
							
							$stmt = mysqli_query($func->dbo, "INSERT INTO `tasks`(`TASK_ID`, `TASK_NAME`, `TASK_STATUS`, `TASK_DES`, `START_DATE`, `COMPLETION_DATE`, `PROJECT_ID`, `USER_NAME`, `CREATED_BY`, `TASK_HRS`, `TASK_MODULE`, `TASK_PURPOSE`) VALUES ('".$_POST['task_ids']."','".$new_task."','".$task_status."','".$task_description."','".date('Y-m-d', strtotime($start_date))."','".date('Y-m-d', strtotime($end_date))."','".$pro_id."','".$_SESSION["login_username"]."','".$_SESSION["username_admin"]."','".$task_hrs."', '".$task_module."', '".$task_purpose."')");
					
								if($stmt)
								{
									echo 2; // insert ;
									echo '<script>alert("record are Added");</script>';
								}
						//}
						
					 }
				}
				
		
											  
		}else{
			echo 1; 
		
			
		} 

}

/*This is to update task information like extend compeletion date for Admin & PM*/
if(isset($_POST['page']) && ($_POST['page']=='update_task_info_page'))
{
	
	extract($_POST);
	$data_all=$_POST;
	$view_todate = strtr($_POST['view_todate'], '/', '-');
	//print_r($_POST);
	

	if((isset($_SESSION['role']) && $_SESSION['role'] != "2" && $_SESSION['role'] != "3" ))
		{

					$check_exits = mysqli_query($func->dbo,"SELECT * FROM `tasks` WHERE TASK_ID='".$task_ids."' ");
													   
					if($check_exits)
					{
						$row = mysqli_fetch_assoc($check_exits);
						if($row['TASK_ID']!='')
						{	
							
							
					
							echo "UPDATE `tasks` SET `TASK_ID`='".$_POST['task_ids']."',`TASK_STATUS`='".$view_task_status."',`COMPLETION_DATE`='".date('Y-m-d', strtotime($view_todate))."',`USER_NAME`='".$_SESSION["login_username"]."', `CREATED_BY`='".$_SESSION["username_admin"]."' WHERE `TASK_ID`='".$_POST['task_ids']."' ";
							
							$stmt = mysqli_query($func->dbo,"UPDATE `tasks` SET `TASK_ID`='".$_POST['task_ids']."',`TASK_STATUS`='".$view_task_status."',`COMPLETION_DATE`='".date('Y-m-d', strtotime($view_todate))."',`USER_NAME`='".$_SESSION["login_username"]."', `CREATED_BY`='".$_SESSION["username_admin"]."' WHERE `TASK_ID`='".$_POST['task_ids']."' ");
							
							
					
								if($stmt)
								{
									echo 2; // insert ;
									echo "record is edited";
									
								}
							}
					   }		
											  
			}else{
			echo 1; 
		} 
print_r($_POST);
die();
}

/* This is should have all task ids and its employees assigned */
if(isset($_POST['page']) && ($_POST['page']=='all_tasks'))
{	
	
	extract($_POST);
	$data_all=$_POST;
	$table_data='';
	$result_data=array("table_data"=>"");
	
	
	$stmt = mysqli_query($func->dbo,"SELECT * FROM `project_tasks` as P JOIN tasks as E on E.`TASK_ID`= P.`TASK_ID` where P.TASK_ID=".$_REQUEST['task_id']."  "); 

	
		$inc=1;				
		while($row = mysqli_fetch_assoc($stmt))
			{


		$table_data.='<tr><td>'.$inc.'</td><td>'.$row['EMP_ID'].'</td><td>'.$row['PROJECT_ID'].'</td><td>'.$row['TASK_NAME'].'</td><td>'.$row['TASK_DES'].'</td><td>'.$row['COMPLETION_DATE'].'</td><td>'.$row['TASK_STATUS'].'</td></tr>';


		 $inc++; 
		 $result_data['table_data']=$table_data;
		 

		 
	 } 
		
	echo json_encode($result_data);
	

}

/* To view the progress for the Admin and PM only & Add progress for the developers i moved it to=> (view_task_page)*/
if(isset($_POST['page']) && ($_POST['page']=='view_emp_task_page')){
		
		
	extract($_POST);
	$data_all=$_REQUEST;
	$table_data='';
	$res_data=array("table_data"=>"");
			

	$empid_search = $_REQUEST['empid_search'];
	
	if($_REQUEST['empid_search'] !='')
	{
		
		$check_exits = mysqli_query($func->dbo,"SELECT * FROM `project_tasks` as P JOIN tasks as E on E.`TASK_ID`= P.`TASK_ID` where P.EMP_ID=".$_REQUEST['empid_search']." "); 

			
		$inc=1;
		
		while($row = mysqli_fetch_assoc($check_exits))
		{
			
		
						
		$table_data.='<tr><td>'.$row['EMP_ID'].'</td><td>'.$row['PROJECT_ID'].'</td><td>'.$row['TASK_NAME'].'</td><td>'.$row['TASK_DES'].'</td><td>'.$row['START_DATE'].'</td><td class="text-right">
			<div class="dropdown">
					<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-plus"></i></a>
						<ul class="dropdown-menu pull-right">
						<li><a href="#" data-toggle="modal" onclick="view_task_progress1('.$row['TASK_ID'].','."'".$row['TASK_NAME']."'".','."'".$row['START_DATE']."'".','."'".$row['COMPLETION_DATE']."'".','.$row['PROJECT_ID'].','.$row['EMP_ID'].')" value="'.$row['TASK_ID'].'" class="" task_id="'.$row['TASK_ID'].'" title="View Progress"  data-toggle="modal" data-target="#view_task_progress">
						<input type="hidden" name="task_id" id="task_id" value="'.$row['TASK_ID'].'" />
						<input  type="hidden"  id="empid_search" value="'.$row['EMP_ID'].'" name="empid_search">
						<input type="hidden" name="pro_id" id="pro_id" value="'.$row['PROJECT_ID'].'" /><i class="fa fa-spinner m-r-5"></i> View Progress </a></li>
						
						
					

									</ul>
									</div>
				</td></tr>';
				
			}
			
				
								
			
					
								
						$inc++;
						$res_data['table_data']=$table_data;
			
					
			}else{
				echo 1;
			}
			
				


	
		echo json_encode($res_data);

		
	}

/* To view the progress for the Admin and PM only & Add progress for the developers i moved it to=> (view_project_page)*/
if(isset($_POST['page']) && ($_POST['page']=='view_emp_pro_page')){
		
		
	extract($_POST);
	$data_all=$_REQUEST;
	$table_data='';
	$res_data=array("table_data"=>"");
			
	
	$empid_search = $_REQUEST['empid_search'];
	
	if($_REQUEST['empid_search'] !='')
	{
		
		$check_exits = mysqli_query($func->dbo,"SELECT* from projects AS P inner join employeeproject AS EP on
		P.PROJECT_ID = EP.PROJECT_ID inner join employees AS E on 
		EP.EMP_ID = E.EMP_ID WHERE EP.EMP_ID=".$_REQUEST['empid_search']." "); 

		
		
		$inc=1;
		
		while($row = mysqli_fetch_assoc($check_exits))
		{
			
		
						
		$table_data.='<tr><td>'.$row['EMP_ID'].'</td><td>'.$row['PROJECT_ID'].'</td><td>'.$row['PROJ_NAME'].'</td><td>'.$row['PROJECT_STATUS_CODE'].'</td><td>'.$row['START_DATE'].'</td><td class="text-right">
			<div class="dropdown">
					<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-plus"></i></a>
						<ul class="dropdown-menu pull-right">
						<li><a href="#" data-toggle="modal" onclick="view_pro_progress1('.$row['PROJECT_ID'].','."'".$row['PROJ_NAME']."'".','."'".$row['START_DATE']."'".','."'".$row['COMPLETION_DATE']."'".','.$row['PROJECT_ID'].','.$row['EMP_ID'].')" value="'.$row['PROJECT_ID'].'" class="" pro_id="'.$row['PROJECT_ID'].'" title="View Progress"  data-toggle="modal" data-target="#create_pro_progress">
						<input type="hidden" name="pro_id" id="pro_id" value="'.$row['PROJECT_ID'].'" />
						<input  type="hidden"  id="empid_search" value="'.$row['EMP_ID'].'" name="empid_search">
						<input type="hidden" name="pro_id" id="pro_id" value="'.$row['PROJECT_ID'].'" /><i class="fa fa-spinner m-r-5"></i> View Progress </a></li>
						
						
					

									</ul>
									</div>
				</td></tr>';
				
			}	
								
			
					
								
						$inc++;
						$res_data['table_data']=$table_data;
						
				}


	
		echo json_encode($res_data);

		
	}


/* This is should have all task ids and its employees assigned  of Task Progress) modal */
if(isset($_POST['page']) && ($_POST['page']=='view_all_tasks_progress'))
{	
	
	extract($_POST);
	$data_all=$_POST;
	$table_data='';
	$result_data=array("table_data"=>"");
	$empid_search = $_REQUEST['empid_search'];
	

	$stmt = mysqli_query($func->dbo,"SELECT * FROM `task_progress` as P JOIN tasks as E on E.`TASK_ID`= P.`TASK_ID` where P.EMP_ID=".$_REQUEST['empid_search']." and P.TASK_ID=".$_REQUEST['task_ids']." ");
	
		$inc=1;				
		while($row = mysqli_fetch_assoc($stmt))
			{


		$table_data.='<tr><td>'.$inc.'</td><td>'.$row['TASK_NAME'].'</td><td>'.$row['TASK_COM'].'</td><td>'.$row['TASK_PROG'].'</td><td>'.$row['SUBMITTED_DATE'].'</td></tr>';


		 $inc++; 
		 $result_data['table_data']=$table_data;
		 

		 
	 } 
		
	echo json_encode($result_data);
	

}

	
/*To add the Task Progress by the team Lead, Develpers only modal id="task_progress"*/
if(isset($_POST['page']) && ($_POST['page']=='emp_task_progress'))
{	
	extract($_POST);
	$data_all=$_POST;
	$current_date=date('Y-m-d H:i:s');
	
	//print_r($_POST);
	

			
				$check_exits = mysqli_query($func->dbo,"SELECT * FROM `project_tasks` WHERE `EMP_ID`='".$empid_search."' ");

				
					if($check_exits)
					{
						$row = mysqli_fetch_assoc($check_exits);
						if($row['EMP_ID']!='')
						{	


						
							echo "INSERT INTO `task_progress`(`ID`, `EMP_ID`, `TASK_ID`, `PROJECT_ID`, `TASK_COM`, `TASK_PROG`, `SUBMITTED_DATE`) VALUES ('".$_POST['prog_ids']."','".$empid_search."','".$_POST['task_ids']."','".$proj_number_prog."','".$task_des_prog."','".$task_status_prog."','".$current_date."') ";
							
							$stmt= mysqli_query($func->dbo, "INSERT INTO `task_progress`(`ID`, `EMP_ID`, `TASK_ID`, `PROJECT_ID`, `TASK_COM`, `TASK_PROG`, `SUBMITTED_DATE`) VALUES ('".$_POST['prog_ids']."','".$empid_search."','".$_POST['task_ids']."','".$proj_number_prog."','".$task_des_prog."','".$task_status_prog."','".$current_date."') ");
							
							
							
					
						
								if($stmt)
							{
								echo 2; // INSERT ;
								echo '<script>alert("record are  inserted");</script>';
								
							}
			//			}
	
				}
				
			
	}
		
	
	
    print_r($_POST);
	die();
}


if(isset($_POST['page']) && ($_POST['page']=='All_expired_tasks_notification')){

	extract($_POST);
	$data_all=$_POST;
	$output='';
	$res_data=array("output"=>"");
	$current_date=date('Y-m-d H:i:s');
	//print_r($_POST);
	$inc=1;
	
	
	if((isset($_SESSION['role']) && $_SESSION['role'] != 2 && $_SESSION['role'] != 3 )){
					$result = mysqli_query($func->dbo,"SELECT D.EMP_ID, D.FULL_NAME, P.PROJECT_ID, P.PROJ_NAME, S.TASK_NAME, S.START_DATE, S.COMPLETION_DATE from tasks AS S inner 	join project_tasks AS M on S.TASK_ID = M.TASK_ID AND S.PROJECT_ID = M.PROJECT_ID 
					inner join projects AS P on P.PROJECT_ID= M.PROJECT_ID inner join employees AS D on 
					D.EMP_ID = M.EMP_ID ");
	}else{
		
					$result = mysqli_query($func->dbo,"SELECT D.EMP_ID, D.FULL_NAME, P.PROJECT_ID, P.PROJ_NAME, S.TASK_NAME, S.START_DATE, S.COMPLETION_DATE from tasks AS S inner join project_tasks AS M on S.TASK_ID = M.TASK_ID AND S.PROJECT_ID = M.PROJECT_ID 
					inner join projects AS P on P.PROJECT_ID= M.PROJECT_ID inner join employees AS D on 
					D.EMP_ID = M.EMP_ID WHERE D.EMP_ID='".$_SESSION['username_admin']."' ");
										
	}
	
	$inc=1;
	 while($row = mysqli_fetch_assoc($result))
		{
		
			
			
			if($current_date >= $row['COMPLETION_DATE']){
			
				$expiredate='Expired';	
				$color='label-danger-border';
				
			}else{
				
				$expiredate='Active';
				$color='label-success-border';
			}
			
		/*	if($row['COMPLETION_DATE'] == $current_date){
				
				$expiredate='In-Progress';	
				$color='label-warning-border';
				
			}*/

		   
		   $output.='<tr class="content"><td>'.$inc.'</td><td>'.$row['EMP_ID'].'</td><td>'.$row['FULL_NAME'].'</td><td>'.$row['PROJECT_ID'].'</td><td>'.$row['PROJ_NAME'].'</td><td>'.$row['TASK_NAME'].'</td><td>'.$row['START_DATE'].'</td><td>'.$row['COMPLETION_DATE'].'</td><td><span class="label '.$color.'" >'.$expiredate.'</span></td></tr>';
		
		$inc++;
		$res_data['output']=$output;

			

	}
		
echo json_encode($res_data);

}
	
if(isset($_POST['page']) && ($_POST['page']=='tasks_notification')){

	extract($_POST);
	$data_all=$_POST;
	$output='';
	$res_data=array("output"=>"");
	$current_date=date('Y-m-d H:i:s');
	//print_r($_POST);
	$inc=1;
	
	if((isset($_SESSION['role']) && $_SESSION['role'] != 2 && $_SESSION['role'] != 3 )){
									
						$result = mysqli_query($func->dbo,"SELECT D.EMP_ID, D.FULL_NAME, P.PROJECT_ID, P.PROJ_NAME, S.TASK_NAME, S.START_DATE, S.COMPLETION_DATE from tasks AS S inner join project_tasks AS M on S.TASK_ID = M.TASK_ID AND S.PROJECT_ID = M.PROJECT_ID 
						inner join projects AS P on P.PROJECT_ID= M.PROJECT_ID inner join employees AS D on 
						D.EMP_ID = M.EMP_ID WHERE (D.EMP_ID='".$emp_id."' OR M.PROJECT_ID='".$pro_code."') ");
									
	}else{
		
						$result = mysqli_query($func->dbo,"SELECT D.EMP_ID, D.FULL_NAME, P.PROJECT_ID, P.PROJ_NAME, S.TASK_NAME, S.START_DATE, S.COMPLETION_DATE from tasks AS S inner join project_tasks AS M on S.TASK_ID = M.TASK_ID AND S.PROJECT_ID = M.PROJECT_ID 
						inner join projects AS P on P.PROJECT_ID= M.PROJECT_ID inner join employees AS D on 
						D.EMP_ID = M.EMP_ID WHERE (D.EMP_ID='".$emp_id."' OR M.PROJECT_ID='".$pro_code."') AND D.EMP_ID='".$_SESSION['username_admin']."' ");
		
	}

 while($row = mysqli_fetch_assoc($result))
	{
		//if($inc==1){
			if($current_date >= $row['COMPLETION_DATE']){
			
				$expiredate='Expired';	
				$color='label-danger-border';
				
			}else{
				
				$expiredate='Active';
				$color='label-success-border';
			}
			
		/*	if($row['COMPLETION_DATE'] != $current_date ){
				
				$expiredate='In-Progress';	
				$color='label-warning-border';
				
			}*/

		   
		   $output.='<tr class="content"><td>'.$inc.'</td><td>'.$row['EMP_ID'].'</td><td>'.$row['FULL_NAME'].'</td><td>'.$row['PROJECT_ID'].'</td><td>'.$row['PROJ_NAME'].'</td><td>'.$row['TASK_NAME'].'</td><td>'.$row['START_DATE'].'</td><td>'.$row['COMPLETION_DATE'].'</td><td><span class="label '.$color.'">'.$expiredate.'</span></td></tr>';
		
		$inc++;
		$res_data['output']=$output;

			
		//}
		
	}
		
	
echo json_encode($res_data);

}

if(isset($_POST['page']) && ($_POST['page']=='view')){
//if(isset($_POST['view']) ){
//	print_r($_POST);
//	die();
	extract($_POST);
	$data_all=$_POST;
	$output = '';
	$current_date=date('Y-m-d');
	//echo $current_date;
	$minutes= date("m");
	$empid_search=$_SESSION["username_admin"];
	
	//if($_POST['view'] != ''){
		
     $update_query = mysqli_query($func->dbo,"UPDATE `tasks` SET `TASK_STATUS` = 'Expired' WHERE COMPLETION_DATE <='".$current_date."' ");
	//echo "UPDATE `tasks` SET `TASK_STATUS` = 'Expired' WHERE COMPLETION_DATE <='".$current_date."' ";
   
	//}
	if((isset($_SESSION['role']) && $_SESSION['role'] != 2 && $_SESSION['role'] != 3 )){

	$result= mysqli_query($func->dbo,"SELECT P.TASK_NAME, P.TASK_STATUS, P.COMPLETION_DATE FROM `tasks` as P JOIN project_tasks as E on E.`TASK_ID`= P.`TASK_ID` WHERE P.COMPLETION_DATE <='".$current_date."' AND E.EMP_ID='".$_SESSION['username_admin']."' ORDER BY E.TASK_ID DESC LIMIT 5"	); 


	
	}else{
	$result= mysqli_query($func->dbo,"SELECT P.TASK_NAME, P.TASK_STATUS, P.COMPLETION_DATE FROM `tasks` as P JOIN project_tasks as E on E.`TASK_ID`= P.`TASK_ID` WHERE P.COMPLETION_DATE <='".$current_date."' AND E.EMP_ID='".$_SESSION['username_admin']."' ORDER BY E.TASK_ID DESC LIMIT 5"	);

	}
	$count= mysqli_num_rows($result);
	if($count > 0)
	{
	while($row = mysqli_fetch_array($result))
	{
		if($current_date >= $row['COMPLETION_DATE']){
			
				$expiredate='Expired';	
				
			}else{
				
				$expiredate='Active';
			}
		

		//here the dropdown menu for notification html
		$output.='<li class="media notification-message">
					<a href="activities.php">
						<div class="media-left">
							<span class="avatar">
								<img alt="John Doe" src="images/user.jpg" class="img-responsive img-circle">
							</span>
						</div>
						<div class="media-body">
							<p class="m-0 noti-details"><span class="noti-title">'.$_SESSION['login_username'].'</span> task has been expired <span class="noti-title">'.$row['TASK_NAME'].'</span></p>
							<p class="m-0"><span class="notification-time">'.$minutes.' mins ago</span></p>
						</div>
					</a>
				</li>';
				

			}
		
	}else{
		$output .= '
		<li class="media notification-message">
					<a href="#" class="text-bold text-italic">Not Found</a>
				</li>';
	}
	
		$stid =mysqli_query($func->dbo,"SELECT P.TASK_NAME, P.TASK_STATUS, P.COMPLETION_DATE FROM `tasks` as P JOIN project_tasks as E on E.`TASK_ID`= P.`TASK_ID` WHERE P.COMPLETION_DATE <='".$current_date."' AND E.EMP_ID='".$empid_search."' AND P.TASK_STATUS='Expired' ");
		$count= mysqli_num_rows($stid);
	//	$count= $func->get_count_expired_tasks($empid_search);
		
		$data = array(
		   'notification' => $output,
		   'unseen_notification'  => $count
		);

	echo json_encode($data);

	
		}
		
		
if(isset($_POST['page']) && ($_POST['page']=='all_daily_tasks')){

	extract($_POST);
	$data_all=$_POST;
	$output='';
	$current_date=date('Y-m-d');
	$res_data=array("output"=>"");
	$inc=1;
	
	if((isset($_SESSION['role']) && $_SESSION['role'] != 2 && $_SESSION['role'] != 3 )){
									
		$result = mysqli_query($func->dbo,"SELECT D.EMP_ID, D.FULL_NAME, P.PROJECT_ID, P.PROJ_NAME, S.TASK_NAME, S.START_DATE, S.COMPLETION_DATE, S.TASK_DES, S.TASK_STATUS,  S.TASK_HRS, S.TASK_MODULE, S.TASK_PURPOSE from tasks AS S inner join project_tasks AS M on S.TASK_ID = M.TASK_ID AND S.PROJECT_ID = M.PROJECT_ID inner join projects AS P on P.PROJECT_ID=M.PROJECT_ID inner join employees AS D on D.EMP_ID = M.EMP_ID");
	
	}else{
		
		$result = mysqli_query($func->dbo,"SELECT D.EMP_ID, D.FULL_NAME, P.PROJECT_ID, P.PROJ_NAME, S.TASK_NAME, S.START_DATE, S.COMPLETION_DATE, S.TASK_DES, S.TASK_STATUS,  S.TASK_HRS, S.TASK_MODULE, S.TASK_PURPOSE from tasks AS S inner join project_tasks AS M on S.TASK_ID = M.TASK_ID AND S.PROJECT_ID = M.PROJECT_ID inner join projects AS P on P.PROJECT_ID=M.PROJECT_ID inner join employees AS D on D.EMP_ID = M.EMP_ID WHERE D.EMP_ID='".$_SESSION['username_admin']."' ");
		
	}
		
	
	

 while($row = mysqli_fetch_assoc($result))
	{
		//if($inc==1){
		
			
		if($row['TASK_STATUS'] == 'Expired'){
			
				$task_status='Closed';	
				$color='label-danger-border';
				
			}else{
				
				$task_status='Opened';
				$color='label-success-border';
			}
			
		 $output.='<tr class="content"><td>'.$inc.'</td><td>'.$row['EMP_ID'].'</td><!--td>'.$row['PROJECT_ID'].'</td--><td>'.$row['TASK_MODULE'].'</td><td>'.$row['TASK_NAME'].'</td><td>'.$row['PROJ_NAME'].'</td><td>'.$row['TASK_DES'].'</td><td>'.$row['FULL_NAME'].'</td><td>'.$row['TASK_PURPOSE'].'</td><td>'.date($row['START_DATE'], strtotime( "+1 day" )).'</td><!--td>'.$current_date.'</td--><td>'.$row['TASK_HRS'].'</td><td><span class="label '.$color.'">'.$task_status.'</span></td></tr>';
		 

		 
		
		
		$inc++;
		$res_data['output']=$output;
		
	}
		
	
echo json_encode($res_data);

	
}


/*To filter the task tracking system report*/
if(isset($_POST['page']) && ($_POST['page']=='filter_all_daily_tasks')){

	extract($_POST);
	$data_all=$_POST;
	$output='';
	$res_data=array("output"=>"");
	$current_date=date('Y-m-d');
	$inc=1;
	
	
	if((isset($_SESSION['role']) && $_SESSION['role'] != 2 && $_SESSION['role'] != 3 )){
									
						$result = mysqli_query($func->dbo,"SELECT D.EMP_ID, D.FULL_NAME, P.PROJECT_ID, P.PROJ_NAME, S.TASK_NAME, S.START_DATE, S.COMPLETION_DATE, S.TASK_DES, S.TASK_STATUS,  S.TASK_HRS, S.TASK_MODULE, S.TASK_PURPOSE from tasks AS S inner join project_tasks AS M on S.TASK_ID = M.TASK_ID AND S.PROJECT_ID = M.PROJECT_ID inner join projects AS P on P.PROJECT_ID=M.PROJECT_ID inner join employees AS D on D.EMP_ID = M.EMP_ID WHERE (D.EMP_ID='".$emp_id."' OR M.PROJECT_ID='".$pro_code."' AND S.TASK_STATUS='".$task_status."') ");
						
									
	}else{
		
						$result = mysqli_query($func->dbo,"SELECT D.EMP_ID, D.FULL_NAME, P.PROJECT_ID, P.PROJ_NAME, S.TASK_NAME, S.START_DATE, S.COMPLETION_DATE, S.TASK_DES, S.TASK_STATUS,  S.TASK_HRS, S.TASK_MODULE, S.TASK_PURPOSE from tasks AS S inner join project_tasks AS M on S.TASK_ID = M.TASK_ID AND S.PROJECT_ID = M.PROJECT_ID inner join projects AS P on P.PROJECT_ID=M.PROJECT_ID inner join employees AS D on D.EMP_ID = M.EMP_ID WHERE (D.EMP_ID='".$emp_id."' OR M.PROJECT_ID='".$pro_code."') AND S.TASK_STATUS='".$task_status."' AND D.EMP_ID='".$_SESSION['username_admin']."' ");
		
	}

 while($row = mysqli_fetch_assoc($result))
	{
		//if($inc==1){
	
			
			if($row['TASK_STATUS'] == 'Expired'){
			
				$task_status='Closed';	
				$color='label-danger-border';
				
			}else{
				
				$task_status='Open';
				$color='label-success-border';
			}
		   
		  $output.='<tr class="content"><td>'.$inc.'</td><td>'.$row['EMP_ID'].'</td><!--td>'.$row['PROJECT_ID'].'</td--><td>'.$row['TASK_MODULE'].'</td><td>'.$row['TASK_NAME'].'</td><td>'.$row['PROJ_NAME'].'</td><td>'.$row['TASK_DES'].'</td><td>'.$row['FULL_NAME'].'</td><td>'.$row['TASK_PURPOSE'].'</td><td>'.date($row['START_DATE'], strtotime( "+1 day" )).'</td><!--td>'.$current_date.'</td--><td>'.$row['TASK_HRS'].'</td><td><span class="label '.$color.'">'.$task_status.'</span></td></tr>';
		
		$inc++;
		$res_data['output']=$output;

			
		//}
		
	}
	//print_r($_POST);
	//die();
		
	
echo json_encode($res_data);

}

if(isset($_POST['page']) && ($_POST['page']=='view_milestone_page')){

	extract($_POST);
	$data_all=$_POST;
	$table_data='';
	$hideme='';
	$current_date=date('Y-m-d');
	$res_data=array("table_data"=>"");
	$inc=1;
	
	if((isset($_SESSION['role']) && $_SESSION['role'] != 2 && $_SESSION['role'] != 3 )){
									
		$result = mysqli_query($func->dbo,"SELECT* from milestone as P JOIN employees as E on E.`EMP_ID`= P.`EMP_ID`");
	
		
	}else{

		$result = mysqli_query($func->dbo,"SELECT* from milestone as P JOIN employees as E on E.`EMP_ID`= P.`EMP_ID` where E.EMP_ID='".$_SESSION['username_admin']."' ");
		$hideme = 'display:none;';

		}
	

 while($row = mysqli_fetch_assoc($result))
	{
		//if($inc==1){
		
			
		$table_data.='<tr><td><h2><a href="#">'.$row['MILESTONE_DES'].'</a></h2></td><td>'.$row['FULL_NAME'].'</td><td>'.$row['MILESTONE_FLAG'].'</td><td>'.$row['START_DATE'].'</td><td>'.$row['END_DATE'].'</td><td class="text-right">
			<div class="dropdown">
					<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-plus"></i></a>
						<ul class="dropdown-menu pull-right">
						<li style ="'.$hideme.'"><a href="#" data-toggle="modal" data-target="#create_milestone" onclick="edit_milestone('.$row['MILESTONE_ID'].','.$row['EMP_ID'].','."'".$row['MILESTONE_FLAG']."'".','."'".$row['START_DATE']."'".','."'".$row['END_DATE']."'".','.$row['PROJECT_ID'].','."'".$row['MILESTONE_DES']."'".')" value="'.$row['MILESTONE_ID'].'" class="" milestone_ids="'.$row['MILESTONE_ID'].'" title="View Milestone" id="" name="">
						<input type="hidden" name="pro_id" id="pro_id" value="'.$row['PROJECT_ID'].'" /><i class="fa fa-eye m-r-5"></i> Edit </a></li>
						<li style ="'.$hideme.'"><a href="javascript:void(0)" data-toggle="modal" onclick="delete_milestone('.$row['MILESTONE_ID'].')" name="delete_milestone" id="delete_milestone"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
						</ul>
						</div>
				</td></tr>
						</ul>';

		 
		
		
		$inc++;
		$res_data['table_data']=$table_data;

			
	

		
	}
		
	
echo json_encode($res_data);

	}


/*To delete milestone */
	if(isset($_POST['page']) && ($_POST['page']=='delete_milestone'))
{
	extract($_POST);
if((isset($_SESSION['role']) && $_SESSION['role'] != "2" && $_SESSION['role'] != "3" ))
		{
	
	$stmt = mysqli_query($func->dbo, "DELETE FROM `milestone` WHERE MILESTONE_ID='".$_POST['milestone_ids']."' ");
		
        if ($stmt)
        {
             echo 0;
			
        }
		else
		{
		 echo "There Something wrong.";
		}
	}else
	{
		echo 1; 
		
		
	}
}

/*create new milestone */
if(isset($_POST['page']) && ($_POST['page']=='add_milestones_page'))
{

	extract($_POST);
	$data_all=$_POST;
	$milestone_fromdate = strtr($_POST['milestone_fromdate'], '/', '-');
	$milestone_todate = strtr($_POST['milestone_todate'], '/', '-');
	//print_r($_POST);
	
	if((isset($_SESSION['role']) && $_SESSION['role'] != "2" && $_SESSION['role'] != "3" ))
		{

					$check_exits = mysqli_query($func->dbo,"SELECT * FROM `milestone` WHERE MILESTONE_ID='".$milestone_ids."' ");
													   
					if($check_exits)
					{
						$row = mysqli_fetch_assoc($check_exits);
						if($row['MILESTONE_ID']!='')
						{	
							
							echo '<script>alert("record are already exits ");</script>';

							echo "UPDATE `milestone` SET `MILESTONE_ID`='".$milestone_ids."',`MILESTONE_FLAG`='".$milestone_flag."',`EMP_ID`='".$emp_id."',`PROJECT_ID`='".$proj_id."',`START_DATE`='".date('Y-m-d', strtotime($milestone_fromdate))."',`END_DATE`='".date('Y-m-d', strtotime($milestone_todate))."',`MILESTONE_DES`='".$milestone_desc."' WHERE `MILESTONE_ID`='".$_POST['milestone_ids']."' ";
							
							$stmt = mysqli_query($func->dbo,"UPDATE `milestone` SET `MILESTONE_ID`='".$milestone_ids."',`MILESTONE_FLAG`='".$milestone_flag."',`EMP_ID`='".$emp_id."',`PROJECT_ID`='".$proj_id."',`START_DATE`='".date('Y-m-d', strtotime($milestone_fromdate))."',`END_DATE`='".date('Y-m-d', strtotime($milestone_todate))."',`MILESTONE_DES`='".$milestone_desc."' WHERE `MILESTONE_ID`='".$_POST['milestone_ids']."'");

							
					
								if($stmt)
								{
									echo 2; // insert ;
									echo "record is edited";
									
								}
			
						
		               }else {

							echo "INSERT INTO `milestone`(`MILESTONE_ID`, `MILESTONE_FLAG`, `EMP_ID`, `PROJECT_ID`, `START_DATE`, `END_DATE`, `MILESTONE_DES`) VALUES ('".$_POST['milestone_ids']."','".$milestone_flag."','".$emp_id."','".$proj_id."','".date('Y-m-d', strtotime($milestone_fromdate))."','".date('Y-m-d', strtotime($milestone_todate))."','".$milestone_desc."')"; 
							
							$stmt = mysqli_query($func->dbo, "INSERT INTO `milestone`(`MILESTONE_ID`, `MILESTONE_FLAG`, `EMP_ID`, `PROJECT_ID`, `START_DATE`, `END_DATE`, `MILESTONE_DES`) VALUES ('".$_POST['milestone_ids']."','".$milestone_flag."','".$emp_id."','".$proj_id."','".date('Y-m-d', strtotime($milestone_fromdate))."','".date('Y-m-d', strtotime($milestone_todate))."','".$milestone_desc."')");
					
								if($stmt)
								{

									echo '<script>alert("record are Added");</script>';
								}
						
					 }
				}
				
		
											  
		}else{
			echo 1; 
		
			
		} 

}

		
		
		
?>