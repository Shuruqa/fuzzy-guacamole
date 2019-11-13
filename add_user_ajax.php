<?php ob_start(); 
session_start();
include("functions.php");
$func=new functions();

/*Admin=>0 , PM=>1 , TL=>2 , Dev=>3 User Types */
if(isset($_POST['page']) && ($_POST['page']=='username_search_page'))
{	
    extract($_POST);
	$table_data='';
	$res_data=array("table_data"=>"");
	if((isset($_SESSION['role']) && $_SESSION['role'] != "1" && $_SESSION['role'] != "2" && $_SESSION['role'] != "3" ))
	{
	$stmt= mysqli_query($func->dbo,"SELECT * FROM `users` as U JOIN employees as E on E.`EMP_ID`=U.EMP_ID WHERE U.`EMP_ID`='".$username_search."' or E.COMPANY='".$company_name_search."' or E.DESIGNATION='".$user_role_search."'");
	$hideme = 'display:none;';

	$inc=1;
    while($row = mysqli_fetch_assoc($stmt))
	{
		if($inc==1){
				
			$table_data.='<a type="button" href="#" class="btn btn-primary rounded" data-toggle="modal" data-target="#add_user" onclick="add_new_emp('."'".$row['EMP_ID']."'".','."'".$row['USER_NAME']."'".','."'".$row['USER_TYPE']."'".','."'".$row['PASSWORD']."'".','."'".$row['COMPANY']."'".')" name=add_more" id="add_more" class="btn btn-success"><i class="fa fa-plus"></i> Add User</a>';
			
			
		}
		if($row['USER_TYPE']==4)
		{
			$user_type='Project Coordinator';
			
		}
		if($row['USER_TYPE']==3)
		{
			$user_type='Developer';
			
		}
		if($row['USER_TYPE']==2)
		{
			$user_type='Team Lead';
			
		}
		if($row['USER_TYPE']==1)
		{
			$user_type='Project Manager';
			
		}
		if($row['USER_TYPE']==0)
		{
			$user_type='Admin';
			
		}
	

			$table_data.='<tr><td>'.$row['EMP_ID'].'</td><td>'.$row['FULL_NAME'].'</td><td>'.$row['EMAIL'].'</td><td>'.$row['COMPANY'].'</td><td>'.$user_type.'</td><td>'.$row['USER_NAME'].'</td><td>'.$row['DESIGNATION'].'</td><td class="text-right">
				<div class="dropdown">
					<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
						<ul class="dropdown-menu pull-right" id="deletebutton" style ="'.$hideme.'">
						<li><a href="javascript:void(0)" data-toggle="modal"  onclick="edit_new_emp('."'".$row['EMP_ID']."'".','."'".$row['USER_NAME']."'".','."'".$row['USER_TYPE']."'".','."'".$row['PASSWORD']."'".','."'".$row['COMPANY']."'".')" name="edit_user" id="edit_user"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
						<li><a href="javascript:void(0)" data-toggle="modal" onclick="delete_username('."'".$row['ID']."'".')" data-status=" userid" userid="'.$row['ID'].'" name="delete_username" id="'.$row['ID'].'" value="'.$row['ID'].'" class="removableBuilding"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li></ul>
												</div></td></tr>';
		$inc++;
		$res_data['table_data']=$table_data;
		
	
	}
	
	echo json_encode($res_data);

	}else{
		
		$hideme = '';
		echo 1;
	}

}
else if(isset($_POST['page']) && ($_POST['page']=='delete_username'))
{
	extract($_POST);
 
if((isset($_SESSION['role']) && $_SESSION['role'] != "1" && $_SESSION['role'] != "2" && $_SESSION['role'] != "3" ))
		{
			//echo "DELETE FROM `users` WHERE ID='".$userid."'";
	$stmt = mysqli_query($func->dbo, "DELETE FROM `users` WHERE ID='".$userid."'");
		
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



if(isset($_POST['page']) && ($_POST['page']=='create_user_page'))
{	
    extract($_POST);
	$data_all=$_REQUEST;

	if((isset($_SESSION['role']) && $_SESSION['role'] != 1 && $_SESSION['role'] != 2 && $_SESSION['role'] != 3 ))
		{
				if($emp_id!='')
				{
					$check_exits = mysqli_query($func->dbo,"SELECT * FROM `users` as U JOIN employees as E on E.`EMP_ID`=U.EMP_ID WHERE U.EMP_ID='".$emp_id."' "); 
					
					$check_exits1 = mysqli_query($func->dbo,"select * from `employees` WHERE `EMP_ID`='".$emp_id."' ");
					$rowcount= mysqli_num_rows($check_exits1);
					if($rowcount==1)
						{
							echo 'exist';
													   
					if($check_exits)
					{
						
						
						
						
						$row = mysqli_fetch_assoc($check_exits);
						if($row['ID']!='')
						{

							
						//	echo '<script>alert("record are already exits ");</script>';
							echo "UPDATE `users` SET `ID`='".$_POST['userid']."',`USER_NAME`='".$username."',`EMP_ID`='".$emp_id."',`PASSWORD`='".$password."',`USER_TYPE`='".$user_role."',`COMPANY`='".$company_name."', `CONFIRM_PASSWORD`='".$confirm_password."' WHERE ID='".$_POST['emp_id']."' "; 
							
							$stmt =mysqli_query($func->dbo, "UPDATE `users` SET `ID`='".$_POST['userid']."',`USER_NAME`='".$username."',`EMP_ID`='".$emp_id."',`PASSWORD`='".$password."',`USER_TYPE`='".$user_role."',`COMPANY`='".$company_name."', `CONFIRM_PASSWORD`='".$confirm_password."' WHERE EMP_ID='".$_POST['emp_id']."' AND ID='".$_POST['userid']."'");
							
								
								
					
								if($stmt)
								{
									
									echo '<script>alert("record are record are Edited");</script>';
									
								}
							
							
						} else {
							
							if($userid==''){
					
								$stmt = mysqli_query($func->dbo, "INSERT INTO `users` (`ID`, `USER_NAME`,`EMP_ID`, `PASSWORD`, `USER_TYPE`, `COMPANY`, `CONFIRM_PASSWORD`) VALUES ('".$_POST['userid']."', '".$username."', '".$emp_id."', '".$password."', '".$user_role."', '".$company_name."', '".$confirm_password."')");
					
									if($stmt)
									{
										echo 'notassigned';
										echo "<script type='text/javascript'>alert('record are Added')</script>";
									}	
							}
							
							
						}
						
				} 
		}else{
					
					echo 'nonexist';
				}
		
			}
		
		}else{
		echo 1;


	}
	
} 


if(isset($_REQUEST['page']) && ($_REQUEST['page']=='manage_users'))
{	
    extract($_REQUEST);
	$data_all=$_REQUEST;
	$table_data='';
	$res_data=array("table_data"=>"");
	
	if((isset($_SESSION['role']) && $_SESSION['role'] != "2" && $_SESSION['role'] != "3" ))
	{
		
		if($_REQUEST['start']>0){
			$count=$_REQUEST['start'];
		}else{
			$count=0;
		}
	
    $stmt = mysqli_query($func->dbo,"SELECT * FROM `users` as U JOIN employees as E on E.`EMP_ID`=U.EMP_ID ORDER BY `ID` LIMIT 10 OFFSET ".$_REQUEST['start']." "); 
	$hideme = '';
	}
	else 
	{
		$stmt = mysqli_query($func->dbo,"SELECT * FROM `users` as U JOIN employees as E on E.`EMP_ID`=U.EMP_ID where U.`EMP_ID`='".$_SESSION['username_admin']."' ORDER BY `ID` LIMIT 10 OFFSET ".$_REQUEST['start']." "); 
		$hideme = 'display:none;';
		
	}
	$data1=array();
	
	
	if(!$stmt)
	{
		
		$count_rows=0;
		$data1='';
	}
	else{
		 $stmt1 = mysqli_query($func->dbo,"SELECT COUNT(*) as COUNT FROM `users` ");
		 //while($fetch_rows = mysqli_fetch_assoc($stmt1));
		 $fetch_rows = mysqli_fetch_assoc($stmt1);
		 $count_rows= $fetch_rows['COUNT'];
		 //echo $count_rows;
		
		 

	$inc=1;
    while($row = mysqli_fetch_assoc($stmt))
	{
		$data=array();
	/*	if($count==0)
		 {
			$data[]=$inc;
		}
		else
		{
			$data[]=$inc+$count;

		}*/
		if($row['USER_TYPE']==4)
		{
			$user_type='Project Coordinator';
			
		}
			if($row['USER_TYPE']==3)
		{
			$user_type='Developer';
			
		}
		if($row['USER_TYPE']==2)
		{
			$user_type='Team Lead';
			
		}
		if($row['USER_TYPE']==1)
		{
			$user_type='Project Manager';
			
		}
		if($row['USER_TYPE']==0)
		{
			$user_type='Admin';
			
		}
		
			
			$data[]=$row['EMP_ID'];
			$data[]=$row['FULL_NAME'];
			$data[]=$row['EMAIL'];
			$data[]=$row['COMPANY'];
			$data[]=$user_type;
			$data[]=$row['USER_NAME'];
			$data[]=$row['DESIGNATION'];
		    $data[]='<tr><td class="text-right">
			<div class="dropdown">
					<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
						<ul class="dropdown-menu pull-right" id="deletebutton" style ="'.$hideme.'">
						<li><a href="javascript:void(0)" data-toggle="modal"  onclick="edit_new_emp('."'".$row['EMP_ID']."'".','."'".$row['USER_NAME']."'".','."'".$row['USER_TYPE']."'".','."'".$row['PASSWORD']."'".','."'".$row['COMPANY']."'".')" name="edit_user" id="edit_user"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
						<li><a href="javascript:void(0)" data-toggle="modal" onclick="delete_username('."'".$row['ID']."'".')" data-status="userid" userid="'.$row['ID'].'" name="delete_username" id="'.$row['ID'].'" value="'.$row['ID'].'" class="removableBuilding"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li></ul>
												</div></td></tr>';
		   $data1[]=$data;
		$inc++;
				 
		
	}
}
	$var1=array("draw"=>@$_REQUEST['draw'],"recordsTotal"=>$count_rows,"recordsFiltered"=>$count_rows,"data"=>$data1);
	
	echo json_encode($var1);
	
}



if(isset($_POST['page']) && ($_POST['page']=='search_username'))
{
	    extract($_POST);
		$data=array("username"=>'');

		if($emp_id!=''){
		
		$slt_username = mysqli_query($func->dbo,"SELECT * FROM `employees` where EMP_ID='".$emp_id."' ORDER BY `EMP_ID`");
		
		}
	
		$option=' ';
	    while($row = mysqli_fetch_assoc($slt_username))
		{
			$option.='<option  data-subtext="'.$row['FULL_NAME'].'" value="'.$row['FULL_NAME'].'">'.$row['FULL_NAME'].'=>'.$row["FULL_NAME"].'</option>';
		}
		
		$data['username']=$option;

		echo json_encode($data);
}


?>
