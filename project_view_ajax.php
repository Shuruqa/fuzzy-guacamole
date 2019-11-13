<?php 
ob_start(); 
session_start();
include("functions.php");
$func=new functions();
date_default_timezone_set('UTC');
if(isset($_POST['page']) && ($_POST['page']=='view_project_page'))
{	
    extract($_POST);
	$data_all=$_REQUEST;
	$table_data='';
	$res_data=array("table_data"=>"");
	
	$pro_id = $_REQUEST['pro_id'];
	
	if($_REQUEST['pro_id'] !='')
	{

		$check_exits = mysqli_query($func->dbo,"SELECT * FROM `projects` where PROJECT_ID=".$_REQUEST['pro_id']." "); 
		
		
		$inc=0;
		
		while($row = mysqli_fetch_assoc($check_exits))
		{
			
		
						
		$table_data.='<div class="panel-body">
									<div class="project-title">
										<h5 class="panel-title">'.$row['PROJ_NAME'].'</h5>
										<small class="block text-ellipsis m-b-15"><span class="text-xs">2</span> <span class="text-muted">open tasks, </span><span class="text-xs">5</span> <span class="text-muted">tasks completed</span></small>
									</div>
									<p>'.$row['DESCRIPTION'].'</p>
									
								</div>';
								
			
								
								
						$inc++;
						$res_data['table_data']=$table_data;
						
				}
}
	
		echo json_encode($res_data);

		
	}
	
		

if(isset($_POST['page']) && ($_POST['page']=='project_search_page'))
{	
    extract($_POST);
	$data_all=$_REQUEST;
	$table_data='';
	$res_data=array("table_data"=>"");
	$pro_id = $_REQUEST['pro_id'];
	
	if($_REQUEST['pro_id'] !='')
	{
    $stmt = mysqli_query($func->dbo,"SELECT * FROM `projects` WHERE PROJECT_ID=".$_REQUEST['pro_id']." "); 
	$inc=0;
	
	while($row = mysqli_fetch_assoc($stmt))
			{
		$table_data.='	<tr>
						<td>Project Name:</td>
						<td class="text-right">'.$row['PROJ_NAME'].'</td>
					</tr>
					<tr>
						<td>Client Name:</td>
						<td class="text-right">'.$row['CLIENT_NAME'].'</td>
					</tr>
					<tr>
						<td>Created:</td>
						<td class="text-right">'.$row['START_DATE'].'</td>
					</tr>
					<tr>
						<td>Deadline:</td>
						<td class="text-right">'.$row['CLOSED_DATE'].'</td>
					</tr>
					<tr>
						<td>Priority:</td>
						<td class="text-right">
							<div class="btn-group">
								<a href="#" class="label label-danger dropdown-toggle" data-toggle="dropdown">'.$row['PRIORITY'].'<!--span class="caret"--></span></a>
								<!--ul class="dropdown-menu dropdown-menu-right">
									<li><a href="#"><i class="fa fa-dot-circle-o text-danger"></i> Highest priority</a></li>
									<li><a href="#"><i class="fa fa-dot-circle-o text-info"></i> High priority</a></li>
									<li><a href="#"><i class="fa fa-dot-circle-o text-primary"></i> Normal priority</a></li>
									<li><a href="#"><i class="fa fa-dot-circle-o text-success"></i> Low priority</a></li>
								</ul-->
							</div>
						</td>
					</tr>
					<tr>
						<td>Created by:</td>
						<td class="text-right"><a href="profile.php">'.$row['CREATED_BY'].'</a></td>
					</tr>
					<tr>
						<td>Status:</td>
						<td class="text-right">'.$row['PROJECT_STATUS_CODE'].'</td>
					</tr>';


		$inc++;
		$res_data['table_data']=$table_data;
		
		}
	}

	
	echo json_encode($res_data);

			
//	print_r($_POST);
//	die();
}

if(isset($_POST['page']) && ($_POST['page']=='project_users'))
{	
    extract($_POST);
	$data_all=$_REQUEST;
	$table_data='';
	$res_data=array("table_data"=>"");
	$pro_id = $_REQUEST['pro_id'];
	
	if($_REQUEST['pro_id'] !='')
	{
    $stmt = mysqli_query($func->dbo,"SELECT * FROM `projects` WHERE PROJECT_ID=".$_REQUEST['pro_id']." "); 
	$inc=0;
	while($row = mysqli_fetch_assoc($stmt))
			{
		$table_data.='<div class="panel-body">
		<h6 class="panel-title m-b-20">Assigned Leader <a class="pull-right btn btn-primary btn-xs" data-toggle="modal" data-target="#assign_leader"><i class="fa fa-plus"></i> Add</a></h6>
		<ul class="list-box">
			<li>
				<a href="profile.php">
					<div class="list-item">
						<div class="list-left">
							<span class="avatar">W</span>
						</div>
						<div class="list-body">
							<span class="message-author">Project Leader</span>
							<div class="clearfix"></div>
							<span class="message-content">'.$row['EMP_ID'].'</span>
						</div>
					</div>
				</a>
			</li>
		</ul>
	</div>
	<div class="panel-heading">
		<h6 class="panel-title">Assigned users <a class="pull-right btn btn-primary btn-xs" data-toggle="modal" data-target="#assign_user"><i class="fa fa-plus"></i> Add</a></h6>
	</div>
	<div class="panel-body">
		<ul class="list-box">
			<li>
				<a href="profile.php">
					<div class="list-item">
						<div class="list-left">
							<span class="avatar">J</span>
						</div>
						<div class="list-body">
							<span class="message-author">Team Leader</span>
							<div class="clearfix"></div>
							<span class="message-content">'.$row['EMP_ID_TEAM'].'</span>
						</div>
					</div>
				</a>
			</li>
			<!--li>
				<a href="profile.php">
					<div class="list-item">
						<div class="list-left">
							<span class="avatar">V</span>
						</div>
						<div class="list-body">
							<span class="message-author">Richard Miles</span>
							<div class="clearfix"></div>
							<span class="message-content">Web Developer</span>
						</div>
					</div>
				</a>
			</li-->
		</ul>
								</div>';


		$inc++;
		$res_data['table_data']=$table_data;
		
		}
	}

	
	echo json_encode($res_data);

			

}
else if(isset($_POST['page']) && ($_POST['page']=='delete_projectname'))
{
	extract($_POST);
	
	$stmt = mysqli_query($func->dbo, "DELETE FROM `projects` WHERE PROJECT_ID='".$project_id."'");
		
        if ($stmt)
        {
             echo "Username has been deleted successfully.";
			 header('location:project-list.php');
			
        }
		else
		{
		 echo "There Something wrong.";
		}
		
}


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
if(isset($_POST['page']) && ($_POST['page']=='search_to_emp1'))
{	
	
	extract($_POST);
	$data_all=$_POST;
	$table_data='<ul class="media-list media-list-linked chat-user-list" >';
	$res_data=array("table_data"=>"");
	$stmt = mysqli_query($func->dbo,"SELECT * FROM `employees` WHERE EMP_ID='".$empid_search_leader."' "); 
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

if(isset($_POST['page']) && ($_POST['page']=='search_to_emp_task'))
{	
	
	extract($_POST);
	$data_all=$_POST;
	$table_data='<ul class="media-list media-list-linked chat-user-list" >';
	$res_data=array("table_data"=>"");
	$stmt = mysqli_query($func->dbo,"SELECT * FROM `employees` WHERE EMP_ID='".$empid_search_task."' "); 
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

if(isset($_POST['page']) && ($_POST['page']=='assign_to_emp1'))
{

	extract($_POST);
	$data_all=$_POST;
	//print_r($_POST);

		
		if($empid_search!='')
				{
	
					$check_exits = mysqli_query($func->dbo,"SELECT * FROM `employees` WHERE EMP_ID='".$empid_search."' ");
													   
					if($check_exits)
					{
						$row = mysqli_fetch_assoc($check_exits);
						if($row['EMP_ID']!='')
						{	
					
					
							$stmt = mysqli_query($func->dbo,"UPDATE `projects` SET `PROJECT_ID`='".$_POST['pro_id']."',`EMP_ID_TEAM`='".$empid_search."' where `PROJECT_ID`='".$_POST['pro_id']."' ");
							echo "UPDATE `projects` SET `PROJECT_ID`='".$_POST['pro_id']."',`EMP_ID_TEAM`='".$empid_search."' where `PROJECT_ID`='".$_POST['pro_id']."' ";
							
					
								if($stmt)
								{
									echo 2; // insert ;
									
								}
			
						
		               }
				}
				
			 }
											  

}

if(isset($_POST['page']) && ($_POST['page']=='assign_to_leader'))
{

	extract($_POST);
	$data_all=$_POST;
	//print_r($_POST);

		
		if($empid_search_leader!='')
				{
	
					$check_exits = mysqli_query($func->dbo,"SELECT * FROM `employees` WHERE EMP_ID='".$empid_search_leader."' ");
													   
					if($check_exits)
					{
						$row = mysqli_fetch_assoc($check_exits);
						if($row['EMP_ID']!='')
						{	
					
					
							$stmt = mysqli_query($func->dbo,"UPDATE `projects` SET `PROJECT_ID`='".$_POST['pro_id']."',`EMP_ID`='".$empid_search_leader."' where `PROJECT_ID`='".$_POST['pro_id']."' ");
							echo "UPDATE `projects` SET `PROJECT_ID`='".$_POST['pro_id']."',`EMP_ID`='".$empid_search_leader."' where `PROJECT_ID`='".$_POST['pro_id']."' ";
							
					
								if($stmt)
								{
									echo 2; // insert ;
									
								}
			
						
		               }
				}
				
			 }
											  
			
	//print_r($_POST);
	//die();
}


if(isset($_POST['page']) && ($_POST['page']=='assign_task_to_emp'))
{

	extract($_POST);
	$data_all=$_POST;
	//print_r($_POST);

		
		if($empid_search_task!='')
				{
	
					$check_exits = mysqli_query($func->dbo,"SELECT * FROM `employees` WHERE EMP_ID='".$empid_search_task."' ");
													   
					if($check_exits)
					{
						$row = mysqli_fetch_assoc($check_exits);
						if($row['EMP_ID']!='')
						{	
					
					
							$stmt = mysqli_query($func->dbo,"UPDATE `projects` SET `PROJECT_ID`='".$_POST['pro_id']."',`EMP_ID`='".$empid_search_task."' where `PROJECT_ID`='".$_POST['pro_id']."' ");
							echo "UPDATE `projects` SET `PROJECT_ID`='".$_POST['pro_id']."',`EMP_ID`='".$empid_search_task."' where `PROJECT_ID`='".$_POST['pro_id']."' ";
							
					
								if($stmt)
								{
									echo 2; // insert ;
									
								}
			
						
		               }
				}
				
			 }
											  
			
	//print_r($_POST);
	//die();
}

if(isset($_POST['page']) && ($_POST['page']=='task_search_page'))
{	
   
	 extract($_POST);
	 $data_all=$_POST;
	 $table_data='';
	 $res_data=array("table_data"=>"");
	 $pro_id = $_REQUEST['pro_id'];
	

	if($_POST['pro_id'] !='')
	{
		
	$stmt = mysqli_query($func->dbo,"SELECT * FROM `tasks` as P JOIN tasks as T on P.`TASK_ID`=T.TASK_ID AND P.`PROJECT_ID`=".$_REQUEST['pro_id']."");
		

	 $inc=1;
     while($row = mysqli_fetch_assoc($stmt))
	 {
		 
		
		
		
			$table_data.=' <ul id="task-list"><li class="task">
                              <div class="task-container"> <span class="task-action-btn task-check"> <span class="action-circle large complete-btn" title="Mark Complete"> <i class="material-icons">check</i> </span> </span> <span class="task-label" contenteditable="true">'.$row['TASK_NAME'].'</span> <span class="task-action-btn task-btn-right"> <span class="action-circle large" title="Assign"> <a href="" onclick="add_assign_to_emp('.$row['TASK_ID'].')" value="'.$row['TASK_ID'].'" class="" task_id="'.$row['TASK_ID'].'" title="Add Assignee" data-toggle="modal" data-target="#assignee">
							  <input type="hidden" name="task_id" id="task_id" value="'.$row['TASK_ID'].'" />
							  <input type="hidden" name="pro_id" id="pro_id" value="'.$row['PROJECT_ID'].'" /><i class="material-icons">person_add</i></a> </span> <span class="action-circle large" title="Delete Task"> <i onclick="delete_tasknumber('.$row['TASK_ID'].')" id="1" class="material-icons">delete</i> </span> </span> </div>
                            </li>';
					
					
					
											
					$inc++;
					$res_data['table_data']=$table_data;
				
		
			
		}
	
	echo json_encode($res_data);
	}
													 	
}

if(isset($_POST['page']) && ($_POST['page']=='edit_project_page'))
{	
    extract($_REQUEST);
	$data_all=$_REQUEST;
	$pro_id = $_REQUEST['pro_id'];

	$start_date = strtr($_REQUEST['start_date'], '/', '-');
	$end_date = strtr($_REQUEST['end_date'], '/', '-');
	$completion_date = strtr($_REQUEST['completion_date'], '/', '-');

	$current_date=date('Y-m-d H:i:s');
	
	print_r($_POST);

				if($_REQUEST['pro_id']!='')
				{

					$check_exits = mysqli_query($func->dbo,"select * from `projects`  WHERE `PROJECT_ID`=".$_REQUEST['pro_id']." ");
													   
					if($check_exits)
					{
						$row = mysqli_fetch_assoc($check_exits);
						if($row['PROJECT_ID']!='')
						{
							echo 1; // already exits;
							echo '<script>alert("record are already exits ");</script>';
							
							
							$stmt =mysqli_query($func->dbo, "UPDATE `projects` SET `PROJECT_ID`='".$project_id."',`PROJ_NAME`='".$projname."',`CREATION_DATE`='".$current_date."',`CREATED_BY`='".$_SESSION["username_admin"]."',`PROJECT_TYPE`='".$project_type."',`PROJECT_STATUS_CODE`='".$project_status."',`DESCRIPTION`='".$description."',`START_DATE`='".date('Y-m-d', strtotime($start_date))."',`COMPLETION_DATE`='".$date('Y-m-d', strtotime($completion_date))."',`CLOSED_DATE`='".date('Y-m-d', strtotime($end_date))."',`EMP_ID`='".$projleader."',`CLIENT_NAME`='".$client_name."', `PRIORITY`='".$priority."', `EMP_ID_TEAM`='".$projteam."' WHERE PROJECT_ID='".$_POST['project_id']."' ");
					
							if($stmt)
							{
								echo 2; // UPDATE ;
								echo '<script>alert("record are record are Edited");</script>';
								
							}
							
							
						}
						else 
						{
							//if($proid==''){

					
					$stmt = mysqli_query($func->dbo, "INSERT INTO `projects`(`PROJECT_ID`, `PROJ_NAME`, `CREATION_DATE`, `CREATED_BY`, `PROJECT_TYPE`, `PROJECT_STATUS_CODE`, `DESCRIPTION`, `START_DATE`, `COMPLETION_DATE`, `CLOSED_DATE`, `EMP_ID`,`CLIENT_NAME`, `PRIORITY`, `EMP_ID_TEAM`)
					VALUES ('".$project_id."','".$projname."','".$current_date."','".$_SESSION["username_admin"]."','".$project_type."','".$project_status."','".$description."','".date('Y-m-d', strtotime($start_date))."','".date('Y-m-d', strtotime($completion_date))."','".date('Y-m-d', strtotime($end_date))."','".$projleader."','".$client_name."', '".$priority."', '".$projteam."')");
					
					if($stmt)
					{
					    echo 2; // insert ;
						echo '<script>alert("record are Added");</script>';
					}
				//}
				
		     }
		}
		
     }
}





?>
