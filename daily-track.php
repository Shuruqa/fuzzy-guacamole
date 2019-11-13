<!DOCTYPE html>
<html>
 <?php include('head.php'); ?> 
    <body>
	  <!-- Left side column. contains the logo and sidebar -->
	  <?php include('header.php'); ?> 
<!-- Content Wrapper. Contains page content -->
        <div class="main-wrapper">
            <div class="page-wrapper">
                <div class="content container-fluid">
				<div class="row">
						<div class="col-sm-4">
							<h4 class="page-title">Daily Tracking Report </h4>
						</div>
						<!--div class="col-sm-8 text-right m-b-20">
						<a href="#" onclick="add_new_task('.$row['PROJECT_ID'].')" class="btn btn-primary rounded pull-right" data-toggle="modal" data-target="#assignee"><i class="fa fa-plus"></i>Create Modal</a>
							<input type="hidden" id="pro_ids" value="" name="pro_ids">
						</div-->
					</div>
				<div class="row filter-row">
					 <form name="filter_all_daily_tasks" id="filter_all_daily_tasks" method="post" >
						<div class="col-sm-3 col-xs-6">  
							<div class="form-group form-focus">
								<label class="control-label">Employee Code</label>
								<input  autocomplete="off" id="emp_id" name="emp_id"  type="text" class="form-control floating" />
							</div>
						</div>
						<div class="col-sm-3 col-xs-6">  
							<div class="form-group form-focus">
								<label class="control-label">Project Code</label>
								<input autocomplete="off" id="pro_code" name="pro_code" type="text" class="form-control floating" />
							</div>
						</div>
						<div class="col-sm-3 col-xs-6"> 
							<div class="form-group form-focus select-focus">
								<label class="control-label">Task Status</label>
									<select class="select floating" id="task_status" name="task_status" style='display:inline-block' >
											    <option value="">Select Project Status</option>
												<option value="Under Progress">Under Progress</option>
												<option value="Pending">Pending</option>
												<option value="Expired">Expired</option>
											</select>
								
							</div>
						</div>
						<div class="col-sm-3 col-xs-6"> 
							<input type="submit" id="search_project" value="Search" name="search_project" value="Search" class="btn btn-success btn-block filter" />				
						</div>    
					</form>
                    </div>
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-table">
								<div class="panel-heading">
									<h3 class="panel-title">Daily Tracking Report</h3>
								</div>
								<div class="panel-body">
									<div class="table-responsive">
										<table id="tracking_datatable" class="table table-striped custom-table m-b-0">
											<thead>
												<tr>
													<th>SN</th>
													<th>EMP ID</th>
													<th>
														<select class="select floating" id='filterText' style='display:inline-block' name='filterText'>
															<option selected value="All"> Module</option>
															 <?php 
																$stmt = mysqli_query($func->dbo,"SELECT DISTINCT P.TASK_MODULE FROM `tasks` as P JOIN project_tasks as E on E.`TASK_ID`= P.`TASK_ID` where E.EMP_ID='".$_SESSION['username_admin']."'  ");	
																if ($stmt) 
																{
																	while($row = mysqli_fetch_assoc($stmt))
																		{
																		   echo '<option value="'.$row['TASK_MODULE'].'">'.$row["TASK_MODULE"].'</option>';
																		}
																}
																?>
														</select>
													</th>
													<th>
														<select class="select floating" id='filterPage' style='display:inline-block' name='filterPage'>
															<option selected value="All"> Page Name</option>
															<?php 
																$stmt = mysqli_query($func->dbo,"SELECT DISTINCT P.TASK_NAME FROM `tasks` as P JOIN project_tasks as E on E.`TASK_ID`= P.`TASK_ID` where E.EMP_ID='".$_SESSION['username_admin']."' ");	
																if ($stmt) 
																{
																	while($row = mysqli_fetch_assoc($stmt))
																		{
																		   echo '<option value="'.$row['TASK_NAME'].'">'.$row["TASK_NAME"].'</option>';
																		}
																}
																?>
														</select>
													</th>
													<th>
														<select class="select floating" id='filterProj' style='display:inline-block' name='filterProj'>
															<option selected value="All"> Project Name</option>
															<?php 
																$stmt = mysqli_query($func->dbo,"SELECT DISTINCT S.PROJECT_ID, P.PROJ_NAME FROM `tasks` AS S inner join project_tasks AS M on S.TASK_ID = M.TASK_ID AND S.PROJECT_ID = M.PROJECT_ID inner join projects AS P on P.PROJECT_ID=M.PROJECT_ID");	
																if ($stmt) 
																{
																	while($row = mysqli_fetch_assoc($stmt))
																		{
																		   echo '<option value="'.$row['PROJ_NAME'].'">'.$row["PROJ_NAME"].'</option>';
																		}
																}
																?>
														</select>
													</th>
													<th>
													<select class="select floating" id='filterDetail' style='display:inline-block' name='filterDetail'>
															<option selected value="All">Functionality Wise Details</option>
															<?php 
																$stmt = mysqli_query($func->dbo,"SELECT DISTINCT P.TASK_DES FROM `tasks` as P JOIN project_tasks as E on E.`TASK_ID`= P.`TASK_ID` where E.EMP_ID='".$_SESSION['username_admin']."'");	
																if ($stmt) 
																{
																	while($row = mysqli_fetch_assoc($stmt))
																		{
																		   echo '<option value="'.$row['TASK_DES'].'">'.$row["TASK_DES"].'</option>';
																		}
																}
																?>
														</select>
													</th>
													<th>
													<select class="select floating" id='filterPerson' style='display:inline-block' name='filterPerson'>
															<option selected value="All">Person</option>
															<?php 
																$stmt = mysqli_query($func->dbo,"SELECT DISTINCT D.EMP_ID, D.FULL_NAME from projects AS P inner join project_tasks AS M on P.PROJECT_ID = M.PROJECT_ID inner join employees AS D on D.EMP_ID = M.EMP_ID WHERE D.EMP_ID='".$_SESSION['username_admin']."' ");	
																if ($stmt) 
																{
																	while($row = mysqli_fetch_assoc($stmt))
																		{
																		   echo '<option value="'.$row['FULL_NAME'].'">'.$row["FULL_NAME"].'</option>';
																		}
																}
																?>
														</select>
													</th>
													<th>
														<select class="select floating" id='filterPurpose' style='display:inline-block' name='filterPurpose'>
															<option selected value="All">Purpose</option>
															<?php 
																$stmt = mysqli_query($func->dbo,"SELECT DISTINCT P.TASK_PURPOSE FROM `tasks` as P JOIN project_tasks as E on E.`TASK_ID`= P.`TASK_ID` where E.EMP_ID='".$_SESSION['username_admin']."' ");	
																if ($stmt) 
																{
																	while($row = mysqli_fetch_assoc($stmt))
																		{
																		   echo '<option value="'.$row['TASK_PURPOSE'].'">'.$row["TASK_PURPOSE"].'</option>';
																		}
																}
																?>
														</select>													
													</th>
													<th>Start Date</th>
													<th>Hours</th>
													<th>
													<select class="select floating" id='filterStatus' style='display:inline-block' name='filterStatus'>
															<option selected value="All">Status</option>
															<option value='Open'>Open</option>
															<option value='Close'>Close</option>
															<option value='All'>All</option>
													</select></th>
												</tr>
											</thead>
											<tbody id="all_daily_tasks"></tbody>
											<tbody id="show_no_record"></tbody>
											<button type="button" class="btn btn-success" id="export_to_excel" name="export">Export To Excel</button>
										</table>
									</div>
								</div>
								<div class="panel-footer">
								<input type="hidden" name="user_login" id="user_login" value="<?php echo $_SESSION['username_admin']; ?>" />
								<input type="hidden" name="regular_user_login" id="regular_user_login" value="<?php echo $_SESSION['username_enrollid']; ?>" />
								<input type="hidden" id="task_ids" name="task_ids" value="" />	
									<!--a href="invoices.html" class="text-primary">View All Expired Tasks</a-->
								</div>
							</div>
						</div>
						<!--div class="col-md-6">
							<div class="panel panel-table">
								<div class="panel-heading">
									<h3 class="panel-title">Payments</h3>
								</div>
								<div class="panel-body">
									<div class="table-responsive">	
										<table class="table table-striped custom-table m-b-0">
											<thead>
												<tr>
													<th>Invoice ID</th>
													<th>Client</th>
													<th>Payment Type</th>
													<th>Paid Date</th>
													<th>Paid Amount</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td><a href="invoice-view.html">#INV-0004</a></td>
													<td>
														<h2><a href="#">Barry Cuda</a></h2>
													</td>
													<td>Paypal</td>
													<td>11 Jun 2017</td>
													<td>$380</td>
												</tr>
												<tr>
													<td><a href="invoice-view.html">#INV-0005</a></td>
													<td>
														<h2><a href="#">Tressa Wexler</a></h2>
													</td>
													<td>Paypal</td>
													<td>21 Jul 2017</td>
													<td>$500</td>
												</tr>
												<tr>
													<td><a href="invoice-view.html">#INV-0006</a></td>
													<td>
														<h2><a href="#">Ruby Bartlett</a></h2>
													</td>
													<td>Paypal</td>
													<td>28 Aug 2017</td>
													<td>$60</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
								<div class="panel-footer">
									<a href="payments.html" class="text-primary">View all payments</a>
								</div>
							</div>
						</div-->
					</div>
					</div>
				<div  class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" style="z-index: 999999;" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content modal-md">
							<div class="modal-header">
								<h4 class="modal-title">Message</h4>
							</div>
							<div class="modal-body card-box">
								<div id="show_msg"></div>
								<div class="m-t-20"> <a href="#" class="btn btn-default" data-dismiss="modal">Ok</a>
								</div>
							</div>
						</div>
					</div>
				</div>
					</div>
				</div>
		<div class="sidebar-overlay" data-reff="#sidebar"></div>
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>
		<script type="text/javascript" src="js/jquery.slimscroll.js"></script>
		<script type="text/javascript" src="js/select2.min.js"></script>
		<script type="text/javascript" src="js/moment.min.js"></script>
		<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
		<script type="text/javascript" src="js/app.js"></script>
		<script src="js/jquery-confirm.min.js"></script>
<script>
$(document).ready(function(){
	
$(function() { 

		$(document).ajaxStart(function(){
		$("#wait").css("display", "block");
		});
		$(document).ajaxComplete(function(){
			$("#wait").css("display", "none");
		});
		
		$("#show_error").html("");
		$("#show_record").html("");
		$("#show_record1").html("");
		
		var user_login=$("#user_login").val();
		var task_id=$("#task_ids").val();
		var emp_id=$("#emp_id").val();
		var all_data=$("#filter_all_daily_tasks").serialize();
	
		var form_data="page=all_daily_tasks&task_ids="+task_id+"&user_login="+user_login;
		//alert(form_data);
		$.ajax({
			url:'view_task_ajax.php',
			type:'POST',
			data:form_data,
			async:true,
			cache: false,
			success: function(result){
			var res_data= jQuery.parseJSON(result);
			console.log(res_data.output);
			$("#all_daily_tasks").html(res_data.output);
			if(res_data.output==''){
				$("#show_no_record").html('<tr class="odd"><td valign="top" colspan="11" class="dataTables_empty">No data available in table</td></tr>');
						
				}
					
				}
			});
		
	});


$(document).on('submit','#filter_all_daily_tasks',function(e){

		e.preventDefault();
		$(document).ajaxStart(function(){
		$("#wait").css("display", "block");
		});
		$(document).ajaxComplete(function(){
			$("#wait").css("display", "none");
		});
		
		$("#show_error").html("");
		$("#show_record").html("");
		$("#show_record1").html("");
		
		var user_login=$("#user_login").val();
		var task_id=$("#task_ids").val();
		var emp_id=$("#emp_id").val();
		var pro_code=$("#pro_code").val();
		var task_status=$("#task_status").val();
		var all_data=$("#filter_all_daily_tasks").serialize();
	
	
		var form_data="page=filter_all_daily_tasks&emp_id="+emp_id+"&pro_code="+pro_code+"&task_status="+task_status;
		alert(form_data);
		$.ajax({
			url:'view_task_ajax.php',
			type:'POST',
			data:form_data,
			async:true,
			cache: false,
			success: function(result){
			var res_data= jQuery.parseJSON(result);
			/*if(res_data.output!=''){
				$("#all_daily_tasks").html(res_data.output);
				$("#all_daily_tasks").show();
				$("#show_no_record").hide();
			}
			if(res_data.output==''){
			$("#show_no_record").html('<tr class="odd"><td valign="top" colspan="10" class="dataTables_empty">No data available in table</td></tr>');
			$("#all_daily_tasks").hide();
			$("#show_no_record").show();
			}*/
			if(res_data.output!=''){
			$("#all_daily_tasks").html(res_data.output);
			$("#all_daily_tasks").show();
			$("#show_no_record").hide();
			}
			if(res_data.output==''){
				$("#show_no_record").html('<tr class="odd"><td valign="top" colspan="11">No Records Available</td></tr>');
				$("#show_no_record").show();
				$("#all_daily_tasks").hide();
				}
			
			
			
				
			}
		});
		
	});
	
		
$(document).on('change','#filterText',function(){
		var rex = new RegExp($('#filterText').val());
		//alert(rex);
		if(rex =="/All/"){clearFilter()}else{
			$('.content').hide();
			$('.content').filter(function() {
			return rex.test($(this).text());
			}).show();
	}
});
$(document).on('change','#filterPage',function(){
	var rex1 = new RegExp($('#filterPage').val());
	alert(rex1);
	if(rex1 =="/All/"){clearFilter()}else{
			$('.content').hide();
			$('.content').filter(function() {
			return rex1.test($(this).text());
			}).show();
	}
});
$(document).on('change','#filterProj',function(){
	var rex2 = new RegExp($('#filterProj').val());
	if(rex2 =="/All/"){clearFilter()}else{
			$('.content').hide();
			$('.content').filter(function() {
			return rex2.test($(this).text());
			}).show();
	}
});
$(document).on('change','#filterDetail',function(){
	var rex3 = new RegExp($('#filterDetail').val());
	if(rex3 =="/All/"){clearFilter()}else{
			$('.content').hide();
			$('.content').filter(function() {
			return rex3.test($(this).text());
			}).show();
	}
});
$(document).on('change','#filterPerson',function(){
	var rex4 = new RegExp($('#filterPerson').val());
	if(rex4 =="/All/"){clearFilter()}else{
			$('.content').hide();
			$('.content').filter(function() {
			return rex4.test($(this).text());
			}).show();
	}
});
$(document).on('change','#filterPurpose',function(){
	var rex5 = new RegExp($('#filterPurpose').val());
	if(rex5 =="/All/"){clearFilter()}else{
			$('.content').hide();
			$('.content').filter(function() {
			return rex5.test($(this).text());
			}).show();
	}
});
$(document).on('change','#filterStatus',function(){
	var rex6 = new RegExp($('#filterStatus').val());
	if(rex6 =="/All/"){clearFilter()}else{
			$('.content').hide();
			$('.content').filter(function() {
			return rex6.test($(this).text());
			}).show();
	}
});
	
	
	function clearFilter()
	{
		$('.filterText').val('');
		$('.filterPage').val('');
		$('.filterProj').val('');
		$('.filterDetail').val('');
		$('.filterPerson').val('');
		$('.filterPurpose').val('');
		$('.filterStatus').val('');
		$('.content').show();
	}
	
	
	
});
</script>
<script>
$(document).on('click','#export_to_excel',function(){
//	alert("This is working");
	var emp_id=$("#emp_id").val();
	if(emp_id=='')
	{
		alert("Please Enter Employee Code");
		$('#emp_id').focus();
		return false;
	}
/*	if($('#pro_code').val()=="")
	{
	alert("Please enter project code");
		$('#pro_code').focus();
		return false;
		}
		if($('#task_status').val()=="")
		{
			alert("Please Select task status ");
		$('#task_status').focus();
		return false;
		}
			*/
		
		 
		
	var user_login=$("#user_login").val();
	var task_id=$("#task_ids").val();
	var emp_id=$("#emp_id").val();
	var pro_code=$("#pro_code").val();
	var task_status=$("#task_status").val();
	
	
	var all_data=$("#filter_all_daily_tasks").serialize();
	
	var form_data="page=export_to_excel&"+all_data+"&emp_id="+emp_id+"&pro_code="+pro_code+"&task_status="+task_status;
	
	alert(form_data);

	$('#exampleModal1').modal('show'); 
	$("#show_msg").html("<p style='color:green'>Your request has been submit.<a href='request.php' target='_blank'>Click Here To Check.</a></p>");
	
	$.ajax({
		url:'daily-track-excel.php',
		type:'POST',
		data:form_data,
		success: function(result)
		{
			console.log(result);
			$('#exampleModal1').modal('show');
			$('#show_msg').html(result);
		}
	})
	
});

</script>
    </body>
</html>