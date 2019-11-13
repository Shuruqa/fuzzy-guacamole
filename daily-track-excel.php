<?php 
ob_start(); session_start();
include("functions.php");
$func=new functions();
if(isset($_POST['page']) && ($_POST['page']=='export_to_excel'))
{
	
$data_all=$_POST;
$where="";
$count=0;
$current_date=date('Y-m-d');
$emp_data=array();
$emp_id=$data_all['emp_id'];
$pro_code=$data_all['pro_code'];
$task_status=$data_all['task_status'];
	
	
	$sele_categories=mysqli_query($func->dbo,"SELECT D.EMP_ID, D.FULL_NAME, P.PROJECT_ID, P.PROJ_NAME, S.TASK_NAME, S.START_DATE, S.COMPLETION_DATE, S.TASK_DES, S.TASK_STATUS,  S.TASK_HRS, S.TASK_MODULE, S.TASK_PURPOSE, S.USER_NAME from tasks AS S inner join project_tasks AS M on S.TASK_ID = M.TASK_ID AND S.PROJECT_ID = M.PROJECT_ID inner join projects AS P on P.PROJECT_ID=M.PROJECT_ID inner join employees AS D on D.EMP_ID = M.EMP_ID WHERE (D.EMP_ID='".$emp_id."' OR M.PROJECT_ID='".$pro_code."' OR S.TASK_STATUS='".$task_status."') ");
	
    
	$n=1;
	
				
				$filename = "uploads/daily_track_excel_report_".strtotime("now").'.csv';	
				$file_status=2; // 2 means processing
				$page='Download Daily Tracking System report';
				//$file_track=$func->FileTrack($file_status,$filename,$page,$download_by);


				$fp = fopen($filename, "w");
				$comma = "";
				
				$seperator= 'EMP ID,Project ID,Module,Page Name,Project Name,Functionality Wise Details,Person,Purpose,Date,Current Date,Hours,Status,Created by,';
				$seperator .= "\n";
				fputs($fp, $seperator);
	while ($row = mysqli_fetch_assoc($sele_categories))
	{
	$data=array();
	 if( $count==0)
	{
		 $data[]=$n;
	}
	else{
		$data[]=$n+$count;
	}
	
	if($row['TASK_STATUS'] == 'Expired'){
			
				$task_status='Closed';	
				
			}else{
				
				$task_status='Opened';
			}
	
	
			 $seperator = "";
			 $comma = "";
			 $seperator .=$row['EMP_ID'].",".$row['PROJECT_ID'].",".$row['TASK_MODULE'].",".$row['TASK_NAME'].",".$row['PROJ_NAME'].",".$row['TASK_DES'].",".$row['FULL_NAME'].",".$row['TASK_PURPOSE'].",".$row['START_DATE'].",".$current_date.",".$row['TASK_HRS'].",".$task_status.",".$row['USER_NAME'];				
			 $seperator .= "\n";
			 fputs($fp, $seperator);
	 $n++;
	
	
	
	}
	
	fclose($fp);
				
			echo "You can download excel file <a href='".$filename."'>here</a>";	 
}




?>