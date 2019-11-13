<?php 

ob_start(); 
session_start();
include("functions.php");
$func=new functions();


if(isset($_REQUEST['page']) && ($_REQUEST['page']=='view_task_datatable'))
{	
    extract($_REQUEST);
	$data_all=$_REQUEST;
	
	if((isset($_SESSION['role']) && $_SESSION['role'] != "2" && $_SESSION['role'] != "3" ))
		{

	if($_REQUEST['start']>0){
		$count=$_REQUEST['start'];
	}else{
		$count=0;
	}

    $stmt = mysqli_query($func->dbo,"SELECT DISTINCT PROJECT_ID, PROJ_NAME, PROJECT_STATUS_CODE FROM `projects` LIMIT 10 OFFSET ".$_REQUEST['start']." "); 
	}
	else
	{

	 $stmt = mysqli_query($func->dbo,"SELECT DISTINCT P.PROJECT_ID, P.PROJ_NAME, P.PROJECT_STATUS_CODE FROM `projects` as P JOIN project_tasks as E on E.`PROJECT_ID`= P.`PROJECT_ID` where E.EMP_ID='".$_SESSION['username_admin']."' LIMIT 10 OFFSET ".$_REQUEST['start']." ");	
	
	}

	$data1=array();
	
	
	if(!$stmt)
	{
		
		$count_rows=0;
		$data1='';
	
	}else{

		 $stmt1 = mysqli_query($func->dbo,"SELECT COUNT(*) as COUNT FROM `projects`  ");
		 //while($fetch_rows = mysqli_fetch_assoc($stmt1));
		 $fetch_rows = mysqli_fetch_assoc($stmt1);
		 $count_rows= $fetch_rows['COUNT'];
	//	 echo $count_rows;
	
	
		
		 

	$inc=1;
    while($row = mysqli_fetch_assoc($stmt))
	{
		$data=array();
						
			
			$data[]='<td><h2><a href="project-view.php?pro_id='.$row["PROJECT_ID"].'">'.$row['PROJECT_ID'].'</a></h2></td>';
			$data[]=$row['PROJ_NAME'];
			$data[]=$row['PROJECT_STATUS_CODE'];
		    $data[]='<tr><td class="text-right">
			<div class="dropdown">
					<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-plus"></i></a>
						<ul class="dropdown-menu pull-right">
						<li><a href="tasks_details.php?pro_id='.$row["PROJECT_ID"].'" onclick="view_task_details('.$row['PROJECT_ID'].')" value="'.$row['PROJECT_ID'].'"><i class="fa fa-list-ul m-r-5"></i> Tasks List</a></li>
						</ul>
						</div>
				</td></tr>';
															
				
		   $data1[]=$data;
		   $inc++;
				 
		
	}
}
	$var1=array("draw"=>@$_REQUEST['draw'],"recordsTotal"=>$count_rows,"recordsFiltered"=>$count_rows,"data"=>$data1);
	
	echo json_encode($var1);

			
		}
		
		
/* To view and access  the team lead, and dev their own tasks only and shows fill progress only */
if(isset($_POST['page']) && ($_POST['page']=='all_task_datatable'))
{
		
		
	extract($_POST);
	$data_all=$_REQUEST;
	$table_data='';
	$res_data=array("table_data"=>"");
	
	
	$pro_id = $_REQUEST['pro_id'];
	
	if($_REQUEST['pro_id'] !='')
	{
		if ($_SESSION['role'] != 2 && $_SESSION['role']!=3) {	
				$hideme = 'display:none;';
				
				if($_REQUEST['start']>0){
						$count=$_REQUEST['start'];
					}else{
						$count=0;
					}
		echo "SELECT * FROM `tasks` where PROJECT_ID=".$_REQUEST['pro_id']." LIMIT 10 OFFSET ".$_REQUEST['start']."";
		$check_exits = mysqli_query($func->dbo,"SELECT * FROM `tasks` where PROJECT_ID=".$_REQUEST['pro_id']." LIMIT 10 OFFSET ".$_REQUEST['start']."");
		
		$data1=array();
		
		if(!$check_exits)
		{
			$count_rows=0;
			$data1='';
			
		}else{
			echo "SELECT COUNT(*) as COUNT FROM `tasks` where PROJECT_ID=".$_REQUEST['pro_id']." ";
			$stmt1=mysqli_query($func->dbo,"SELECT COUNT(*) as COUNT FROM `tasks` where PROJECT_ID=".$_REQUEST['pro_id']." ");
			$fetch_rows=mysqli_fetch_assoc($stmt1);
			$count_rows=$fetch_rows['COUNT'];
			echo $count_rows;
			
			
		
		
		$inc=1;
		while($row = mysqli_fetch_assoc($check_exits))
		{
			
		
			$data=array();

			$data[]=$row['PROJECT_ID'];
			$data[]=$row['TASK_NAME'];
			$data[]=$row['START_DATE'];
			$data[]=$row['COMPLETION_DATE'];
			$data[]=$row['TASK_STATUS'];
			$data[]='<td class="text-right">
				<div class="dropdown">
						<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-plus"></i></a>
							<ul class="dropdown-menu pull-right">
							<li><a href="javascript:void(0)" data-toggle="modal" onclick="add_assign_emp_task('.$row['TASK_ID'].','."'".$row['TASK_NAME']."'".','."'".$row['START_DATE']."'".','."'".$row['COMPLETION_DATE']."'".','.$row['PROJECT_ID'].','."'".$row['TASK_STATUS']."'".','."'".$row['TASK_DES']."'".')" value="'.$row['TASK_ID'].'" class="" task_id="'.$row['TASK_ID'].'" title="View Tasks" data-target="#view_assignee_task">
							<input type="hidden" name="task_id" id="task_id" value="'.$row['TASK_ID'].'" />
							<input type="hidden" name="pro_id" id="pro_id" value="'.$row['PROJECT_ID'].'" /><i class="fa fa-eye m-r-5"></i> View </a></li>
							<li><a href="javascript:void(0)" data-toggle="modal" onclick="assign_emp_task('.$row['TASK_ID'].')" value="'.$row['TASK_ID'].'" class="" task_id="'.$row['TASK_ID'].'" title="Add Assignee" data-target="#assign_pro"><i class="fa fa-plus-square-o m-r-5"></i> Assign To </a></li>
							<li><a href="javascript:void(0)" data-toggle="modal" onclick="delete_tasknumber('.$row['TASK_ID'].')" name="delete_tasknumber" id="delete_tasknumber"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
							

						</ul>
						</div>
				</td></tr>';
							
			
			$data1[]=$data;
			$inc++;
						
				}
		
	}
		
		
	}else if($_SESSION['role'] != 3){
		
		echo "SELECT * FROM `tasks` as P JOIN project_tasks as E on E.`TASK_ID`= P.`TASK_ID` where P.PROJECT_ID='".$_REQUEST['pro_id']."' AND E.EMP_ID='".$_SESSION['username_admin']."' LIMIT 10 OFFSET ".$_REQUEST['start']." ";
		$check_exits = mysqli_query($func->dbo,"SELECT * FROM `tasks` as P JOIN project_tasks as E on E.`TASK_ID`= P.`TASK_ID` where P.PROJECT_ID='".$_REQUEST['pro_id']."' AND E.EMP_ID='".$_SESSION['username_admin']."' LIMIT 10 OFFSET ".$_REQUEST['start']." ");

		$hideme = '';
		$data1=array();
		
		if(!$check_exits)
		{
			$count_rows=0;
			$data1='';
			
		}else{
			echo "SELECT COUNT(*) as COUNT FROM `tasks` as P JOIN project_tasks as E on E.`TASK_ID`= P.`TASK_ID` where P.PROJECT_ID='".$_REQUEST['pro_id']."' AND E.EMP_ID='".$_SESSION['username_admin']."' "; 
			$result= mysqli_query($func->dbo,"SELECT COUNT(*) as COUNT FROM `tasks` as P JOIN project_tasks as E on E.`TASK_ID`= P.`TASK_ID` where P.PROJECT_ID='".$_REQUEST['pro_id']."' AND E.EMP_ID='".$_SESSION['username_admin']."' ");
			$fetch_rows=mysqli_fetch_assoc($result);
			$count_rows=$fetch_rows['COUNT'];
			echo $count_rows;
		}
		
			while($row = mysqli_fetch_assoc($check_exits))
			{
			
		
				$data[]=$inc;
				$data[]=$row['PROJECT_ID'];
				$data[]=$row['TASK_NAME'];
				$data[]=$row['START_DATE'];
				$data[]=$row['COMPLETION_DATE'];
				$data[]=$row['TASK_STATUS'];
				$data[]='<td class="text-right">
					<div class="dropdown">
							<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-plus"></i></a>
								<ul class="dropdown-menu pull-right">
								<li><a href="javascript:void(0)" data-toggle="modal" onclick="add_assign_emp_task('.$row['TASK_ID'].','."'".$row['TASK_NAME']."'".','."'".$row['START_DATE']."'".','."'".$row['COMPLETION_DATE']."'".','.$row['PROJECT_ID'].','."'".$row['TASK_STATUS']."'".','."'".$row['TASK_DES']."'".')" value="'.$row['TASK_ID'].'" class="" task_id="'.$row['TASK_ID'].'" title="View Tasks" data-target="#view_assignee_task">
								<input type="hidden" name="task_id" id="task_id" value="'.$row['TASK_ID'].'" />
								<input type="hidden" name="pro_id" id="pro_id" value="'.$row['PROJECT_ID'].'" /><i class="fa fa-eye m-r-5"></i> View </a></li>
								<li><a href="javascript:void(0)" data-toggle="modal" onclick="assigned_emp_task_progress('.$row['TASK_ID'].','."'".$row['TASK_NAME']."'".','."'".$row['START_DATE']."'".','."'".$row['COMPLETION_DATE']."'".','.$row['PROJECT_ID'].','.$row['EMP_ID'].')" value="'.$row['TASK_ID'].'" class="" task_id="'.$row['TASK_ID'].'" title="Add Progress"  data-toggle="modal" data-target="#task_progress">
								<input type="hidden" name="task_id" id="task_id" value="'.$row['TASK_ID'].'" />
								<input  type="hidden"  id="empid_task_search" value="'.$row['EMP_ID'].'" name="empid_task_search">
								<input type="hidden" name="pro_id" id="pro_id" value="'.$row['PROJECT_ID'].'" /><i class="fa fa-spinner m-r-5"></i>Add Progress </a></li>	

								</ul>
								</div>
				</td></tr>';
	
					$inc++;
					$data1[]=$data;
						
				}
			}		
		
		}
		$var1=array("draw"=>@$_REQUEST['draw'],"recordsTotal"=>$count_rows,"recordsFiltered"=>$count_rows,"data"=>$data1);
		
		echo json_encode($var1);

		print_r($_POST);
		die();
	}
	
	/*To view all milestons of projects */
if(isset($_REQUEST['page']) && ($_REQUEST['page']=='view_milestone_page'))
{	
    extract($_REQUEST);
	$data_all=$_REQUEST;
	$hideme='';
	if((isset($_SESSION['role']) && $_SESSION['role'] != 2 && $_SESSION['role'] != 3 ))
		{

	if($_REQUEST['start']>0){
		$count=$_REQUEST['start'];
	}else{
		$count=0;
	}

    $stmt = mysqli_query($func->dbo,"SELECT* from milestone as P JOIN employees as E on E.`EMP_ID`= P.`EMP_ID` LIMIT 10 OFFSET ".$_REQUEST['start']." "); 
	}
	else
	{

	 $stmt = mysqli_query($func->dbo,"SELECT* from milestone as P JOIN employees as E on E.`EMP_ID`= P.`EMP_ID` where E.EMP_ID='".$_SESSION['username_admin']."' LIMIT 10 OFFSET ".$_REQUEST['start']." ");	
	
	}

	$data1=array();
	
	
	if(!$stmt)
	{
		
		$count_rows=0;
		$data1='';
	
	}else{

		 $stmt1 = mysqli_query($func->dbo,"SELECT COUNT(*) as COUNT FROM `milestone`  ");
		 //while($fetch_rows = mysqli_fetch_assoc($stmt1));
		 $fetch_rows = mysqli_fetch_assoc($stmt1);
		 $count_rows= $fetch_rows['COUNT'];
	//	 echo $count_rows;
	
	
		
		 

	$inc=1;
    while($row = mysqli_fetch_assoc($stmt))
	{
		$data=array();
						
			
			$data[]='<td><h2><a href="#">'.$row['MILESTONE_DES'].'</a></h2></td>';
			$data[]=$row['FULL_NAME'];
			$data[]=$row['MILESTONE_FLAG'];
			$data[]=$row['START_DATE'];
			$data[]=$row['END_DATE'];
		    $data[]='<tr><td class="text-right">
			<div class="dropdown">
					<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-plus"></i></a>
						<ul class="dropdown-menu pull-right">
						<li style ="'.$hideme.'"><a href="#" data-toggle="modal" data-target="#create_milestone" onclick="edit_milestone('.$row['MILESTONE_ID'].','.$row['EMP_ID'].','."'".$row['MILESTONE_FLAG']."'".','."'".$row['START_DATE']."'".','."'".$row['END_DATE']."'".','.$row['PROJECT_ID'].','."'".$row['MILESTONE_DES']."'".')" value="'.$row['MILESTONE_ID'].'" class="" milestone_ids="'.$row['MILESTONE_ID'].'" title="View Milestone" id="" name="">
						<input type="hidden" name="pro_id" id="pro_id" value="'.$row['PROJECT_ID'].'" /><i class="fa fa-eye m-r-5"></i> Edit </a></li>
						<li style ="'.$hideme.'"><a href="javascript:void(0)" data-toggle="modal" onclick="delete_milestone('.$row['MILESTONE_ID'].')" name="delete_milestone" id="delete_milestone"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
						</ul>
						</div>
				</td></tr>';
															
				
		   $data1[]=$data;
		   $inc++;
				 
		
	}
}
	$var1=array("draw"=>@$_REQUEST['draw'],"recordsTotal"=>$count_rows,"recordsFiltered"=>$count_rows,"data"=>$data1);
	
	echo json_encode($var1);

			
		}
	
	/*To view all milestons of projects */
if(isset($_REQUEST['page']) && ($_REQUEST['page']=='all_employee_page'))
{	
    extract($_REQUEST);
	$data_all=$_REQUEST;
	$hideme='';
	if((isset($_SESSION['role']) && $_SESSION['role'] != 2 && $_SESSION['role'] != 3 ))
	{

	if($_REQUEST['start']>0){
		$count=$_REQUEST['start'];
	}else{
		$count=0;
	}

    $stmt = mysqli_query($func->dbo,"SELECT * FROM `employees` LIMIT 10 OFFSET ".$_REQUEST['start']." "); 
	}

	$data1=array();
	
	
	if(!$stmt)
	{
		
		$count_rows=0;
		$data1='';
	
	}else{

		 $stmt1 = mysqli_query($func->dbo,"SELECT COUNT(*) as COUNT FROM `employees`  ");
		 $fetch_rows = mysqli_fetch_assoc($stmt1);
		 $count_rows= $fetch_rows['COUNT'];

			$inc=1;
			while($row = mysqli_fetch_assoc($stmt))
			{
				$data=array();
								
					
					$data[]='<td><h2><a href="#">'.$inc.'</a></h2></td>';
					$data[]=$row['EMP_ID'];
					$data[]=$row['FULL_NAME'];
					$data[]=$row['DESIGNATION'];
					$data[]=$row['COMPANY'];
					$data[]='<tr><td class="text-right">
					<div class="dropdown">
							<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-plus"></i></a>
								<ul class="dropdown-menu pull-right">
								<li style ="'.$hideme.'"><a href="javascript:void(0)" data-toggle="modal" onclick="edit_new_employee('.$row['EMP_ID'].','."'".$row['FULL_NAME']."'".','."'".$row['DESIGNATION']."'".','."'".$row['EMAIL']."'".','."'".$row['JOINING_DATE']."'".','."'".$row['PHONE']."'".','."'".$row['GENDER']."'".','."'".$row['COMPANY']."'".','."'".$row['COLLEGE_NAME']."'".','."'".$row['MAJOR_NAME']."'".','."'".$row['PRE_EMPLOYER']."'".','."'".$row['PRE_POSITION']."'".')" name="edit_emp" id="edit_emp"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
								<li style ="'.$hideme.'"><a href="javascript:void(0)" data-toggle="modal" onclick="delete_employeenumber('.$row['EMP_ID'].')"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
								</ul>
								</div>
						</td></tr>';
																	
						
				   $data1[]=$data;
				   $inc++;
				 
		
	}
}
	$var1=array("draw"=>@$_REQUEST['draw'],"recordsTotal"=>$count_rows,"recordsFiltered"=>$count_rows,"data"=>$data1);
	
	echo json_encode($var1);

			
		}
	



?>
	