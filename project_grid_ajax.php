<?php 
ob_start(); 
session_start();
include("functions.php");
$func=new functions();
date_default_timezone_set('UTC');
if(isset($_POST['page']) && ($_POST['page']=='all_search_page'))
{	
    extract($_POST);
	$data_all=$_REQUEST;
	$table_data='';
	$res_data=array("table_data"=>"");

	if((isset($_SESSION['role']) && $_SESSION['role'] != "2" && $_SESSION['role'] != "3" ))
	{	
		
		$check_exits = mysqli_query($func->dbo,"SELECT * FROM `projects` "); 
		
		
	}else if((isset($_SESSION['role']) && $_SESSION['role'] == "1" ))
	{
		
		$check_exits = mysqli_query($func->dbo,"SELECT * FROM `projects` as P JOIN employeeproject as E on E.`PROJECT_ID`= P.`PROJECT_ID` WHERE  E.EMP_ID='".$_SESSION['username_admin']."' ");	
		
	}else {
		
		 $check_exits = mysqli_query($func->dbo,"SELECT * FROM `projects` as P JOIN employeeproject as E on E.`PROJECT_ID`= P.`PROJECT_ID` WHERE  E.EMP_ID='".$_SESSION['username_admin']."' "); 
	}
	if($check_exits)
	{
		
		$inc=0;
		$totalItemPerLine = 1;
		$totalItem = 3;
		while($row = mysqli_fetch_assoc($check_exits))
		{
			
			if($inc % $totalItemPerLine == 0)
			{
				$table_data.=''; //OPEN ROW 
						
					}
			if ($_SESSION['role'] == 3) {	
						$hideme = 'display:none;';
					}else{
						$hideme = '';
					}						

		$table_data.='<div class="col-lg-3 col-sm-4">
							<div class="card-box project-box">
								<div class="dropdown profile-action">
									<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
									<ul class="dropdown-menu pull-right"  style ="'.$hideme.'">
										<li><a href="javascript:void(0)" data-toggle="modal" onclick="edit_new_project('.$row['PROJECT_ID'].','."'".$row['PROJ_NAME']."'".','."'".$row['CLIENT_NAME']."'".','."'".$row['PROJECT_STATUS_CODE']."'".','."'".$row['PROJECT_TYPE']."'".','."'".$row['PRIORITY']."'".','."'".$row['START_DATE']."'".','."'".$row['CLOSED_DATE']."'".','."'".$row['COMPLETION_DATE']."'".')" name="edit_project" id="edit_project"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
										<li><a href="javascript:void(0)" data-toggle="modal" onclick="add_assign_emp('.$row['PROJECT_ID'].','."'".$row['CREATION_DATE']."'".')" value="'.$row['PROJECT_ID'].'" class="" pro_id="'.$row['PROJECT_ID'].'"  title="Add Assignee" data-target="#assignee"><input type="hidden" id="pro_ids" name="pro_ids" value="" /><i class="fa fa-plus-square-o m-r-5"></i> Assign To </a></li>
										<li><a href="javascript:void(0)" data-toggle="modal" onclick="delete_project('.$row['PROJECT_ID'].')" name="delete_project" id="delete_project"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
									</ul>
								</div>
								<h4 class="project-title"><a href="index.php?pro_id='.$row["PROJECT_ID"].'">'.$row['PROJ_NAME'].'</a></h4>
								<small class="block text-ellipsis m-b-15">
									<span class="text-xs">1</span> <span class="text-muted">open tasks, </span>
									<span class="text-xs">9</span> <span class="text-muted">tasks completed</span>
								</small>
								<p class="text-muted">'.$row['DESCRIPTION'].'</p>
								<div class="pro-deadline m-b-15">
									<div class="sub-title">
										Deadline:
									</div>
									<div class="text-muted">'.$row['CLOSED_DATE'].'</div>
								</div>
								<div class="project-members m-b-15">
									<div>Project Leader :</div>
									<ul class="team-members">
										<li>
											<a href="#" data-toggle="tooltip" title=""><img src="images/user.jpg" alt=""></a>
										</li>
									</ul>
								</div>
								<div class="project-members m-b-15">
									<div>Team :</div>
									<ul class="team-members">
										<li>
											<a href="#" data-toggle="tooltip" title=""><img src="images/user.jpg" alt=""></a>
										</li>
									</ul>
								</div>
								<p class="m-b-5">Progress <span class="text-success pull-right">40%</span></p>
								<div class="progress progress-xs m-b-0">
									<div class="progress-bar progress-bar-success" role="progressbar" data-toggle="tooltip" title="40%" style="width: 40%"></div>
								</div>';
								
			if($inc % $totalItemPerLine == ($totalItemPerLine-1))
			{ 
				$table_data.='</div></div>'; //CLOSE ROW 
			}
								
								
		$inc++;
		$res_data['table_data']=$table_data;
			}
		}
		echo json_encode($res_data);

   
	
	}
	

if(isset($_POST['page']) && ($_POST['page']=='project_search_page'))
{	
    extract($_POST);
	$data_all=$_POST;
	$table_data='';
	$res_data=array("table_data"=>"");
	if((isset($_SESSION['role']) && $_SESSION['role'] != "1" && $_SESSION['role'] != "2" && $_SESSION['role'] != "3" ))
	{
		
    $stmt = mysqli_query($func->dbo,"SELECT * FROM `projects` WHERE PROJECT_ID='".$pronumber_search."' OR (PROJ_NAME='".$projectname_search."' AND PROJECT_STATUS_CODE='".$project_status_search."') "); 
	
	}else if((isset($_SESSION['role']) && $_SESSION['role'] == "1" )){
		
	 $stmt = mysqli_query($func->dbo,"SELECT * FROM `projects` WHERE `EMP_ID`='".$_SESSION['username_admin']."' AND PROJECT_ID='".$pronumber_search."' OR (PROJ_NAME='".$projectname_search."' AND PROJECT_STATUS_CODE='".$project_status_search."') "); 	
		
		
	}else{
	 
	 
	 $stmt = mysqli_query($func->dbo,"SELECT * FROM `projects` WHERE `EMP_ID`='".$_SESSION['username_admin']."' OR `EMP_ID_TEAM`='".$_SESSION['username_admin']."' OR `EMP_ID_DEV`='".$_SESSION['username_admin']."' OR `EMP_ID_DEV1`='".$_SESSION['username_admin']."' "); 
		
	}
	$inc=0;
	$totalItemPerLine = 1;
	$totalItem = 3;

    while($row = mysqli_fetch_assoc($stmt))
	{
		if($inc % $totalItemPerLine == 0)
		{
			$table_data.=''; //OPEN ROW 
					
				} 
		if ($_SESSION['role'] == 3) {	
		$hideme = 'display:none;';
			}else{
				$hideme = '';
			}	
			
		$table_data.='<div class="col-lg-3 col-sm-4">
							<div class="card-box project-box">
								<div class="dropdown profile-action">
									<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
									<ul class="dropdown-menu pull-right"  style ="'.$hideme.'">
										<li><a href="javascript:void(0)" data-toggle="modal" onclick="edit_new_project('.$row['PROJECT_ID'].','."'".$row['PROJ_NAME']."'".','."'".$row['CLIENT_NAME']."'".','."'".$row['PROJECT_STATUS_CODE']."'".','."'".$row['PROJECT_TYPE']."'".','."'".$row['PRIORITY']."'".','."'".$row['START_DATE']."'".','."'".$row['CLOSED_DATE']."'".','."'".$row['COMPLETION_DATE']."'".')" name="edit_project" id="edit_project"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
										<li><a href="javascript:void(0)" data-toggle="modal" onclick="add_assign_emp('.$row['PROJECT_ID'].','."'".$row['CREATION_DATE']."'".')" value="'.$row['PROJECT_ID'].'" class="" pro_id="'.$row['PROJECT_ID'].'"  title="Add Assignee" data-target="#assignee"><input type="hidden" id="pro_ids" name="pro_ids" value="" /><i class="fa fa-plus-square-o m-r-5"></i> Assign To </a></li>
										<li><a href="javascript:void(0)" data-toggle="modal" onclick="delete_project('.$row['PROJECT_ID'].')" name="delete_project" id="delete_project"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
									</ul>
								</div>
								<h4 class="project-title"><a href="index.php?pro_id='.$row["PROJECT_ID"].'">'.$row['PROJ_NAME'].'</a></h4>
								<small class="block text-ellipsis m-b-15">
									<span class="text-xs">1</span> <span class="text-muted">open tasks, </span>
									<span class="text-xs">9</span> <span class="text-muted">tasks completed</span>
								</small>
								<p class="text-muted">'.$row['DESCRIPTION'].'</p>
								<div class="pro-deadline m-b-15">
									<div class="sub-title">
										Deadline:
									</div>
									<div class="text-muted">'.$row['CLOSED_DATE'].'</div>
								</div>
								<div class="project-members m-b-15">
									<div>Project Leader :</div>
									<ul class="team-members">
										<li>
											<a href="#" data-toggle="tooltip" title=""><img src="images/user.jpg" alt=""></a>
										</li>
									</ul>
								</div>
								<div class="project-members m-b-15">
									<div>Team :</div>
									<ul class="team-members">
										<li>
											<a href="#" data-toggle="tooltip" title=""><img src="images/user.jpg" alt=""></a>
										</li>
									</ul>
								</div>
								<p class="m-b-5">Progress <span class="text-success pull-right">40%</span></p>
								<div class="progress progress-xs m-b-0">
									<div class="progress-bar progress-bar-success" role="progressbar" data-toggle="tooltip" title="40%" style="width: 40%"></div>
								</div>';
			if($inc % $totalItemPerLine == ($totalItemPerLine-1))
				{ 
					$table_data.='</div></div>'; //CLOSE ROW 

			}

		$inc++;
		$res_data['table_data']=$table_data;
		
		}

	
	echo json_encode($res_data);

}
else if(isset($_POST['page']) && ($_POST['page']=='delete_projectname'))
{
	extract($_POST);
	 if((isset($_SESSION['role']) && $_SESSION['role'] != "1" && $_SESSION['role'] != "2" && $_SESSION['role'] != "3" ))
		{
	
	$stmt = mysqli_query($func->dbo, "DELETE FROM `projects` WHERE PROJECT_ID='".$project_id."'");
		
        if ($stmt)
        {
             echo 0;
			
			
        }
		else
		{
		 echo "There Something wrong.";
		}
	
	}else{
		echo 1;
		
	}
		
}



if(isset($_POST['page']) && ($_POST['page']=='add_project_page'))
{	
    extract($_REQUEST);
	$data_all=$_REQUEST;
	

	$start_date = strtr($_REQUEST['start_date'], '/', '-');
	$end_date = strtr($_REQUEST['end_date'], '/', '-');
	$completion_date = strtr($_REQUEST['completion_date'], '/', '-');


	$current_date=date('Y-m-d H:i:s');

	if((isset($_SESSION['role']) && $_SESSION['role'] != "2" && $_SESSION['role'] != "3" ))
		{

				if($project_id!='')
				{

					$check_exits = mysqli_query($func->dbo,"select * from `projects`  WHERE `PROJECT_ID`='".$project_id."' ");
													   
					if($check_exits)
					{
						$row = mysqli_fetch_assoc($check_exits);
						if($row['PROJECT_ID']!='')
						{
							
							echo '<script>alert("record are already exits ");</script>';
							
							
							$stmt =mysqli_query($func->dbo, "UPDATE `projects` SET `PROJECT_ID`='".$project_id."',`PROJ_NAME`='".$projname."',`CREATION_DATE`='".$current_date."',`PROJECT_TYPE`='".$project_type."',`PROJECT_STATUS_CODE`='".$project_status."',`DESCRIPTION`='".$description."',`START_DATE`='".date('Y-m-d', strtotime($start_date))."',`COMPLETION_DATE`='".date('Y-m-d', strtotime($completion_date))."',`CLOSED_DATE`='".date('Y-m-d', strtotime($end_date))."',`CLIENT_NAME`='".$client_name."',`PRIORITY`='".$priority."',`EMP_ID`='".$projleader."',`EMP_ID_TEAM`='".$projteam."',`EMP_ID_DEV`='".$dev_id."',`EMP_ID_DEV1`='".$dev_id1."' , `USER_NAME`='".$_SESSION["login_username"]."', `CREATED_BY`='".$_SESSION["username_admin"]."' WHERE PROJECT_ID='".$_POST['project_id']."' ");
					
							if($stmt)
							{
								echo 2; // UPDATE ;
								echo '<script>alert("record are record are Edited");</script>';
								
							}
							
							
						}
						else 
						{
						//	if($proid==''){

					
					$stmt = mysqli_query($func->dbo, "INSERT INTO `projects`(`PROJECT_ID`, `PROJ_NAME`, `CREATION_DATE`, `PROJECT_TYPE`, `PROJECT_STATUS_CODE`, `DESCRIPTION`, `START_DATE`, `COMPLETION_DATE`, `CLOSED_DATE`,`CLIENT_NAME`, `PRIORITY`, `USER_NAME`, `CREATED_BY`) 
					VALUES ('".$project_id."','".$projname."','".$current_date."','".$project_type."','".$project_status."','".$description."','".date('Y-m-d', strtotime($start_date))."','".date('Y-m-d', strtotime($completion_date))."','".date('Y-m-d', strtotime($end_date))."','".$client_name."', '".$priority."', '".$_SESSION["login_username"]."','".$_SESSION["username_admin"]."')");
					
					if($stmt)
					{
					    echo 2; // insert ;
						echo '<script>alert("record are Added");</script>';
							}
					//	}
						
					 }
				}
				
			 }
		}else{
			echo 1;
			
		}
}

if(isset($_POST['page']) && ($_POST['page']=='search_emp_pro'))
{	
	
	extract($_POST);
	$data_all=$_POST;
	$table_data='';
	$result_data=array("table_data"=>"");
	
	
	$stmt = mysqli_query($func->dbo,"SELECT * FROM `employees` where EMP_ID='".$empid_pro_search."' ");
	//$stmt = mysqli_query($func->dbo, "SELECT * FROM `employeeproject` as P JOIN employees as E on E.`EMP_ID`= P.`EMP_ID` where E.EMP_ID='".$empid_pro_search."'");
	
	$inc=1;
	  while($row = mysqli_fetch_assoc($stmt))
		{
			
		if($inc==1){
			
	
				
		 $table_data.='<tr><td>'.$inc.'</td><td>'.$row['EMP_ID'].'</td><td>'.$row['FULL_NAME'].'</td><td>'.$row['DESIGNATION'].'</td></tr>';

							
		$inc++;
		$result_data['table_data']=$table_data;
		
		}
	}
	
	echo json_encode($result_data);
	
//    print_r($_POST);
//	die();
}


if(isset($_POST['page']) && ($_POST['page']=='project_members'))
{	
	
	extract($_POST);
	$data_all=$_POST;
	$table_data='';
	$result_data=array("table_data"=>"");
	

	
	//echo "SELECT * FROM `employeeproject` as P JOIN employees as E on E.`EMP_ID`= P.`EMP_ID` where P.PROJECT_ID=".$assign_pro_id." ";
	$stmt = mysqli_query($func->dbo,"SELECT * FROM `employeeproject` as P JOIN employees as E on E.`EMP_ID`= P.`EMP_ID` where P.PROJECT_ID=".$_REQUEST['assign_pro_id']." ");

	
		$inc=1;				
		while($row = mysqli_fetch_assoc($stmt))
			{


		$table_data.='<tr><td>'.$inc.'</td><td>'.$row['EMP_ID'].'</td><td>'.$row['FULL_NAME'].'</td><td>'.$row['DESIGNATION'].'</td></tr>';


		 $inc++; 
		 $result_data['table_data']=$table_data;
		 

		 
	 } 
		
	echo json_encode($result_data);
	

}

if(isset($_POST['page']) && ($_POST['page']=='assign_emp_to_pro'))
{

	extract($_POST);
	$data_all=$_POST;
	$assigned_date = strtr($_REQUEST['assigned_date'], '/', '-');
	//print_r($_POST);
	
	if((isset($_SESSION['role']) && $_SESSION['role'] != "3" ))
		{
		if($assign_pro_id!='')
				{

				$check_exits = mysqli_query($func->dbo,"SELECT * FROM `employees` WHERE EMP_ID='".$empid_pro_search."' ");
													   
					if($check_exits)
					{
						
							if($pro_ids==''){
			 
					//	echo "INSERT INTO `employeeproject`(`ID` `EMP_ID`, `PROJECT_ID`,  `ASSIGNED_DATE`) VALUES ('".$_POST['pro_ids']."', '".$empid_pro_search."','".$assign_pro_id."', '".date('Y-m-d', strtotime($assigned_date))."')";
						$stmt= mysqli_query($func->dbo, "INSERT INTO `employeeproject`(`ID`, `EMP_ID`, `PROJECT_ID`, `ASSIGNED_DATE`) VALUES ('".$_POST['pro_ids']."', '".$empid_pro_search."','".$assign_pro_id."', '".date('Y-m-d', strtotime($assigned_date))."')");
				
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





 

?>
