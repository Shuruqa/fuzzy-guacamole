<?php 
ob_start(); 
session_start();
include("functions.php");
$func=new functions();

if(isset($_POST['page']) && ($_POST['page']=='all_employee_search_page'))
{	

    extract($_POST);
	$data_all=$_POST;
	$table_data='';
	$emp_id= $_SESSION['username_admin'];
	$res_data=array("table_data"=>"");
	if((isset($_SESSION['role']) && $_SESSION['role'] != 2 && $_SESSION['role'] != 3 ))
	{
	
		$stmt = mysqli_query($func->dbo,"SELECT * FROM `employees` "); 

	$inc=0;
	$totalItemPerLine = 4;
	$totalItem = 12;
    while($row = mysqli_fetch_assoc($stmt))
	{		
	
		$table_data.='<div class="col-md-4 col-sm-4 col-xs-6 col-lg-3">
						<div class="profile-widget">
							<div class="profile-img">
								<a href="#"><img class="avatar" src="images/user.jpg" alt=""></a>
							</div>
							<div class="dropdown profile-action">
								<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
								<ul class="dropdown-menu pull-right">
									<li><a href="javascript:void(0)" data-toggle="modal" onclick="edit_new_employee('.$row['EMP_ID'].','."'".$row['FULL_NAME']."'".','."'".$row['DESIGNATION']."'".','."'".$row['EMAIL']."'".','."'".$row['JOINING_DATE']."'".','."'".$row['PHONE']."'".','."'".$row['GENDER']."'".','."'".$row['COMPANY']."'".','."'".$row['COLLEGE_NAME']."'".','."'".$row['MAJOR_NAME']."'".','."'".$row['PRE_EMPLOYER']."'".','."'".$row['PRE_POSITION']."'".','."'".$row['SKILL']."'".')" name="edit_emp" id="edit_emp"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
									<li><a href="javascript:void(0)" data-toggle="modal" onclick="delete_employeenumber('.$row['EMP_ID'].')"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
								</ul>
							</div>
							<h4 class="user-name m-t-10 m-b-0 text-ellipsis"><a href="#">'.$row['FULL_NAME'].'</a></h4>
							<div class="small text-muted">'.$row['DESIGNATION'].'</div></div></div>';

		$inc++;
		$res_data['table_data']=$table_data;
		

		
	}
	echo json_encode($res_data);
	
	}else{
		
		echo "1";
	}
	
}

if(isset($_POST['page']) && ($_POST['page']=='employee_search_page'))
{	
    extract($_POST);
	$data_all=$_POST;
	$table_data='';
	$emp_id= $_SESSION['username_admin'];
	$res_data=array("table_data"=>"");
	if((isset($_SESSION['role']) && $_SESSION['role'] != "1" && $_SESSION['role'] != "2" && $_SESSION['role'] != "3" ))
	{
    $stmt = mysqli_query($func->dbo,"SELECT * FROM `employees` WHERE EMP_ID='".$empid_search."' OR FULL_NAME='".$empname_search."' OR DESIGNATION='".$designation_search."'"); 
	}else if((isset($_SESSION['role']) && $_SESSION['role'] == "1" ))
	{
		
	$stmt = mysqli_query($func->dbo,"SELECT * FROM `employees` WHERE EMP_ID='".$empid_search."' OR FULL_NAME='".$empname_search."' OR DESIGNATION='".$designation_search."'"); 
	
	}else{
	
	$stmt = mysqli_query($func->dbo,"SELECT * FROM `employees` WHERE EMP_ID='".$empid_search."' OR FULL_NAME='".$empname_search."' OR DESIGNATION='".$designation_search."'"); 	
		
	}
	$inc=0;
	$totalItemPerLine = 4;
	$totalItem = 12;
    while($row = mysqli_fetch_assoc($stmt))
	{		
			$data[]=$row['EMP_ID'];
			$data[]=$row['FULL_NAME'];
			$data[]=$row['DESIGNATION'];
			$data[]=$row['CREATED_BY'];
			$data[]=$row['EMAIL'];
			$data[]=$row['JOINING_DATE'];

		if($inc % $totalItemPerLine == 0)
		{
			$table_data.='<div class="row staff-grid-row">'; //open row
		 } 

		$table_data.='<div class="col-md-4 col-sm-4 col-xs-6 col-lg-3">
						<div class="profile-widget">
							<div class="profile-img">
								<a href="#"><img class="avatar" src="images/user.jpg" alt=""></a>
							</div>
							<div class="dropdown profile-action">
								<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
								<ul class="dropdown-menu pull-right">
									<li><a href="javascript:void(0)" data-toggle="modal" onclick="edit_new_employee('.$row['EMP_ID'].','."'".$row['FULL_NAME']."'".','."'".$row['DESIGNATION']."'".','."'".$row['EMAIL']."'".','."'".$row['JOINING_DATE']."'".','."'".$row['PHONE']."'".','."'".$row['GENDER']."'".','."'".$row['COMPANY']."'".','."'".$row['COLLEGE_NAME']."'".','."'".$row['MAJOR_NAME']."'".','."'".$row['PRE_EMPLOYER']."'".','."'".$row['PRE_POSITION']."'".','."'".$row['SKILL']."'".')" name="edit_emp" id="edit_emp"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
									<li><a href="javascript:void(0)" data-toggle="modal" onclick="delete_employeenumber('.$row['EMP_ID'].')"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
								</ul>
							</div>
							<h4 class="user-name m-t-10 m-b-0 text-ellipsis"><a href="#">'.$row['FULL_NAME'].'</a></h4>
							<div class="small text-muted">'.$row['DESIGNATION'].'</div></div></div>';

		 if($inc % $totalItemPerLine == ($totalItemPerLine-1))
		{ 
			$table_data.='</div></div>'; //close row

		}
			
		$inc++;
		$res_data['table_data']=$table_data;
		
		
		
	}
	echo json_encode($res_data);
	
	
	
}
if(isset($_POST['page']) && ($_POST['page']=='employee_search_list'))
{	
	extract($_POST);
	$hideme='';
	$table_data='';
	$inc=1;
	$res_data=array("table_data"=>"");
	
	if((isset($_SESSION['role']) && $_SESSION['role'] != "1" && $_SESSION['role'] != "2" && $_SESSION['role'] != "3" ))
	{

    $stmt = mysqli_query($func->dbo,"SELECT * FROM `employees` WHERE EMP_ID='".$empid_search."' OR FULL_NAME='".$empname_search."' OR DESIGNATION='".$designation_search."'"); 
	}
	else if((isset($_SESSION['role']) && $_SESSION['role'] == "1" ))
	{
		
	$stmt = mysqli_query($func->dbo,"SELECT * FROM `employees` WHERE EMP_ID='".$empid_search."' OR FULL_NAME='".$empname_search."' OR DESIGNATION='".$designation_search."'"); 
	
	}else{
	
	$stmt = mysqli_query($func->dbo,"SELECT * FROM `employees` WHERE EMP_ID='".$empid_search."' OR FULL_NAME='".$empname_search."' OR DESIGNATION='".$designation_search."'"); 	
		
	}
	
    while($row = mysqli_fetch_assoc($stmt))
	{		

		$table_data.='<tr><td><h2><a href="#">'.$inc.'</a></h2></td><td>'.$row['EMP_ID'].'</td><td>'.$row['FULL_NAME'].'</td><td>'.$row['DESIGNATION'].'</td><td>'.$row['COMPANY'].'</td>
		<td class="text-right">
					<div class="dropdown">
							<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-plus"></i></a>
								<ul class="dropdown-menu pull-right">
								<li style ="'.$hideme.'"><a href="javascript:void(0)" data-toggle="modal" onclick="edit_new_employee('.$row['EMP_ID'].','."'".$row['FULL_NAME']."'".','."'".$row['DESIGNATION']."'".','."'".$row['EMAIL']."'".','."'".$row['JOINING_DATE']."'".','."'".$row['PHONE']."'".','."'".$row['GENDER']."'".','."'".$row['COMPANY']."'".','."'".$row['COLLEGE_NAME']."'".','."'".$row['MAJOR_NAME']."'".','."'".$row['PRE_EMPLOYER']."'".','."'".$row['PRE_POSITION']."'".','."'".$row['SKILL']."'".')" name="edit_emp" id="edit_emp"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
								<li style ="'.$hideme.'"><a href="javascript:void(0)" data-toggle="modal" onclick="delete_employeenumber('.$row['EMP_ID'].')"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
								</ul>
								</div>
						</td></tr>';

		$inc++;
		$res_data['table_data']=$table_data;
	}
	
	echo json_encode($res_data);

}



else if(isset($_POST['page']) && ($_POST['page']=='delete_employeenumber'))
{
	extract($_POST);
	
	 if((isset($_SESSION['role']) && $_SESSION['role'] != 1 && $_SESSION['role'] != 2 && $_SESSION['role'] != 3 ))
		{
	
	$stmt = mysqli_query($func->dbo, "DELETE FROM `employees` WHERE EMP_ID='".$empnumber."'");
		 
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


if(isset($_POST['page']) && ($_POST['page']=='create_employee_page'))
{	
    extract($_POST);
	$data_all=$_POST;
	$joining_date = strtr($_REQUEST['joining_date'], '/', '-');
	$checkbox = $_POST['check_list'] ; 
	$sql_qry=mysqli_query($func->dbo,"select * from employees");
	$count= mysqli_num_rows($sql_qry);
	if($count >0)
	{
		$row=mysqli_fetch_assoc($sql_qry);
		//$checkbox=explode(',',$checkbox);
	}
	
	 if((isset($_SESSION['role']) && $_SESSION['role'] != 1 && $_SESSION['role'] != 2 && $_SESSION['role'] != 3 )){

				if($empnumber!='')
				{
					$checkbox=explode(',',$checkbox);

					$check_exits = mysqli_query($func->dbo,"select * from `employees`  WHERE `EMP_ID`='".$empnumber."' ");
													   
					if($check_exits)
					{	
						
						$checkbox = implode(",",$_POST['check_list']);
						$row = mysqli_fetch_assoc($check_exits);
						if($row['EMP_ID']!='')
						{	
							
							echo '<script>alert("record are already exits ");</script>';
							$stmt =mysqli_query($func->dbo, "UPDATE `employees` SET `EMP_ID`='".$empnumber."',`FULL_NAME`='".$fullname."',`DESIGNATION`='".$add_designation."',`CREATED_BY`='".$_SESSION['login_username']."',`EMAIL`='".$email."',`JOINING_DATE`='".date('Y-m-d H:i:s', strtotime($data_all['joining_date']))."',`PHONE`='".$phonenumber."', `GENDER`='".$add_gender."',`COMPANY`='".$company_name."',`COLLEGE_NAME`='".$college_name."',`MAJOR_NAME`='".$major_name."',`PRE_EMPLOYER`='".$prev_empr."',`PRE_POSITION`='".$pre_position."',`SKILL`='".$checkbox."' WHERE EMP_ID='".$_POST['empnumber']."' ");
					
						if($stmt)
						{
						  
							echo '<script>alert("record are record are Edited");</script>';
							
						}
											
						}
						else 
						{
							if($proid==''){
									
										$stmt = mysqli_query($func->dbo, "INSERT INTO `employees`(`EMP_ID`, `FULL_NAME`, `DESIGNATION`, `CREATED_BY`, `EMAIL`,`JOINING_DATE`, `PHONE`, `GENDER`,`COMPANY`, `COLLEGE_NAME`, `MAJOR_NAME`, `PRE_EMPLOYER`, `PRE_POSITION`, `SKILL`) VALUES ('".$empnumber."','".$fullname."','".$add_designation."','".$_SESSION['login_username']."','".$email."','".date('Y-m-d H:i:s', strtotime($data_all['joining_date']))."','".$phonenumber."', '".$add_gender."', '".$company_name."','".$college_name."','".$major_name."','".$prev_empr."','".$pre_position."','".$checkbox[$i]."')");
								
						if($stmt)
						{
							
							echo '<script>alert("record are Added");</script>';
							}
						//}
					}
				
				}
			}
		
		}
	}else{
		echo 1;
	}
}



?>
