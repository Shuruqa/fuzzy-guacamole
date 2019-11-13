
<!DOCTYPE html>
<html>
  <?php include('head.php'); ?> 
    <body>
	  <!-- Left side column. contains the logo and sidebar -->
	  <?php include('header.php'); ?> 
	    <link rel="stylesheet" href="css/jquery-confirm.min.css">
<!-- Content Wrapper. Contains page content -->
      <div class="main-wrapper">
            <div class="page-wrapper">
                <div class="content container-fluid">
					<div class="row">
						<!--div class="col-sm-4">
							<h4 class="page-title">Employee Task </h4>
						</div>
						<div class="col-sm-8 text-right m-b-20">
							<!--a href="#" class="btn btn-primary rounded pull-right" data-toggle="modal" data-target="#create_task_progress"><i class="fa fa-plus"></i> Create Progress</a>
						</div-->
					</div>
					<div class="row">
					 <form method="post" name="employee_table_form" id="employee_table_form" >
				<div class="col-md-6">
					<div class="panel panel-table">
						<div class="panel-heading">
							<h3 class="panel-title">Employee Projects</h3>
						</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table id="projecttable" class="table table-striped custom-table m-b-0">
									<thead>
										<tr>
											<th>EMPLOYEE ID</th>
											<th>PROJECT ID</th>
											<th>PROJECT NAME </th>
											<th>PROJECT STATUS </th>
											<th>START DATE</th>
											<th class="text-right"> ACTION </th>
								
										</tr>
									</thead>
									<tbody id="view_emp_projects"></tbody>
									<tbody id="show_no_record1"></tbody>
									<tbody id="show_error"></tbody>
								</table>
							</div>
						</div>
							<div class="panel-footer">
						  <input type="hidden" name="user_login" id="user_login" value="<?php echo $_SESSION['username_admin']; ?>" />
						  <input type="hidden" name="regular_user_login" id="regular_user_login" value="<?php echo $_SESSION['username_enrollid']; ?>" />
							<input  type="hidden"  id="empid_search" value="<?php echo $_GET['empid_search'];?>" name="empid_search">
						</div>
					</div>						
				</div>
				<div class="col-md-6">
					<div class="panel panel-table">
								<div class="panel-heading">
									<h3 class="panel-title">Employee Tasks</h3>
								</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table id="tasktable" class="table table-striped custom-table m-b-0">
									<thead>
										<tr>
											<th>EMPLOYEE ID</th>
											<th>PROJECT NAME</th>
											<th>TASK NAME </th>
											<th>TASK DESCRIPTION </th>
											<th>SUBMITTED DATE</th>
											<th class="text-right"> ACTION </th>
								
										</tr>
									</thead>
									<tbody id="view_emp_tasks"></tbody>
									<tbody id="show_no_record"></tbody>
									<tbody id="show_error"></tbody>	
								</table>
							</div>
						</div>
							<div class="panel-footer">
						  <input type="hidden" name="user_login" id="user_login" value="<?php echo $_SESSION['username_admin']; ?>" />
						  <input type="hidden" name="regular_user_login" id="regular_user_login" value="<?php echo $_SESSION['username_enrollid']; ?>" />
						  <input  type="hidden"  id="empid_search" value="<?php echo $_GET['empid_search'];?>" name="empid_search">
						</div>
					</div>						
				</div>
				</form>
					</div>
                </div>
				<div class="notification-box">
					<div class="msg-sidebar notifications msg-noti">
						<div class="topnav-dropdown-header">
							<span>Messages</span>
						</div>
						<div class="drop-scroll msg-list-scroll">
							<ul class="list-box">
								<li>
									<a href="chat.html">
										<div class="list-item">
											<div class="list-left">
												<span class="avatar">R</span>
											</div>
											<div class="list-body">
												<span class="message-author">Richard Miles </span>
												<span class="message-time">12:28 AM</span>
												<div class="clearfix"></div>
												<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="chat.html">
										<div class="list-item new-message">
											<div class="list-left">
												<span class="avatar">J</span>
											</div>
											<div class="list-body">
												<span class="message-author">John Doe</span>
												<span class="message-time">1 Aug</span>
												<div class="clearfix"></div>
												<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="chat.html">
										<div class="list-item">
											<div class="list-left">
												<span class="avatar">T</span>
											</div>
											<div class="list-body">
												<span class="message-author"> Tarah Shropshire </span>
												<span class="message-time">12:28 AM</span>
												<div class="clearfix"></div>
												<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="chat.html">
										<div class="list-item">
											<div class="list-left">
												<span class="avatar">M</span>
											</div>
											<div class="list-body">
												<span class="message-author">Mike Litorus</span>
												<span class="message-time">12:28 AM</span>
												<div class="clearfix"></div>
												<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="chat.html">
										<div class="list-item">
											<div class="list-left">
												<span class="avatar">C</span>
											</div>
											<div class="list-body">
												<span class="message-author"> Catherine Manseau </span>
												<span class="message-time">12:28 AM</span>
												<div class="clearfix"></div>
												<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="chat.html">
										<div class="list-item">
											<div class="list-left">
												<span class="avatar">D</span>
											</div>
											<div class="list-body">
												<span class="message-author"> Domenic Houston </span>
												<span class="message-time">12:28 AM</span>
												<div class="clearfix"></div>
												<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="chat.html">
										<div class="list-item">
											<div class="list-left">
												<span class="avatar">B</span>
											</div>
											<div class="list-body">
												<span class="message-author"> Buster Wigton </span>
												<span class="message-time">12:28 AM</span>
												<div class="clearfix"></div>
												<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="chat.html">
										<div class="list-item">
											<div class="list-left">
												<span class="avatar">R</span>
											</div>
											<div class="list-body">
												<span class="message-author"> Rolland Webber </span>
												<span class="message-time">12:28 AM</span>
												<div class="clearfix"></div>
												<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="chat.html">
										<div class="list-item">
											<div class="list-left">
												<span class="avatar">C</span>
											</div>
											<div class="list-body">
												<span class="message-author"> Claire Mapes </span>
												<span class="message-time">12:28 AM</span>
												<div class="clearfix"></div>
												<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="chat.html">
										<div class="list-item">
											<div class="list-left">
												<span class="avatar">M</span>
											</div>
											<div class="list-body">
												<span class="message-author">Melita Faucher</span>
												<span class="message-time">12:28 AM</span>
												<div class="clearfix"></div>
												<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="chat.html">
										<div class="list-item">
											<div class="list-left">
												<span class="avatar">J</span>
											</div>
											<div class="list-body">
												<span class="message-author">Jeffery Lalor</span>
												<span class="message-time">12:28 AM</span>
												<div class="clearfix"></div>
												<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="chat.html">
										<div class="list-item">
											<div class="list-left">
												<span class="avatar">L</span>
											</div>
											<div class="list-body">
												<span class="message-author">Loren Gatlin</span>
												<span class="message-time">12:28 AM</span>
												<div class="clearfix"></div>
												<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="chat.html">
										<div class="list-item">
											<div class="list-left">
												<span class="avatar">T</span>
											</div>
											<div class="list-body">
												<span class="message-author">Tarah Shropshire</span>
												<span class="message-time">12:28 AM</span>
												<div class="clearfix"></div>
												<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
											</div>
										</div>
									</a>
								</li>
							</ul>
						</div>
						<div class="topnav-dropdown-footer">
							<a href="chat.html">See all messages</a>
						</div>
					</div>
				</div>
				<!---This is for Admin only to view progress-->
 <div id="view_task_progress" class="modal custom-modal fade" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="modal-content modal-lg">
		 <form method="post" name="create_task_progress" id="create_task_progress" >
          <div class="modal-header">
            <h4 class="modal-title">Task Progress</h4>
          </div>
          <div class="modal-body">
		<div id="AssigneeModal" class="modal-body">
			<div>
				<table class="table table-striped custom-table datatable">
					<thead>
							<tr>
							<th>SN. </th>
							<th>TASK NAME </th>
							<th>DESCRIPTION   </th>
							<th>TASK PROGRESS  </th>
							<th>SUBMITTED DATE  </th>
							</tr>
						</thead>
						<tbody id="emp_tasks_progress"></tbody>
						<tbody id="no_record"></tbody>
					</table>
				</div>
            <div class="m-t-50 text-center">
				 <input type="hidden" name="user_login" id="user_login" value="<?php echo $_SESSION['username_admin']; ?>" />
				 <input type="hidden" name="regular_user_login" id="regular_user_login" value="<?php echo $_SESSION['username_enrollid']; ?>" />
				 <input type="hidden" id="prog_ids" name="prog_ids" value="" />
				 <input type="hidden" id="task_ids" name="task_ids" value="" />	
            </div>
				</form>
				</div>
				 </div>
          </div>
        </div>
      </div>
	<!--This is to should be changeed into something unique id="task_progress" ---->  
     <!--div class="modal custom-modal fade" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="modal-content modal-lg">
		 <form method="post" name="task_form_progress" id="task_form_progress" >
          <div class="modal-header">
            <h4 class="modal-title">Task Progress</h4>
          </div>
          <div class="modal-body">
				<div class="row">
				 <div class="col-md-3">
				  <div class="form-group">
					<label>Task Name</label>
					  <input autocomplete="off" readonly  type="text" class="form-control" name="task_name_prog" id="task_name_prog"/>
				  </div>
				</div>
				<div class="col-md-3">
						 <div class="form-group">
							<label>Project Number <span class="text-danger">*</span></label>
							 <input autocomplete="off" readonly type="text" class="form-control" name="proj_number_prog" id="proj_number_prog"/>
						</div>
						</div>
				<div class="col-md-3">
						 <div class="form-group">
							<label>Employee Number <span class="text-danger">*</span></label>
							 <input autocomplete="off" readonly type="text" class="form-control" name="empid_search" id="empid_search"/>
						</div>
						</div>
					</div>
					<div class="row">
					 <div class="col-md-3">
					  <div class="form-group">
						<label>Start Date</label>
						<div class="cal-icon">
						  <input autocomplete="off" readonly type="text" class="form-control datetimepicker" name="fromdate_assign_prog" id="fromdate_assign_prog"/>
						</div>
					  </div>
					</div>
						<div class="col-md-3">
						  <div class="form-group">
							<label>End Date</label>
							<div class="cal-icon">
							   <input  autocomplete="off" readonly type="text" class="form-control datetimepicker" name="todate_assign_prog" id="todate_assign_prog"/>
							</div>
						  </div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Status</label>
								<select class="select" id="task_status_prog" name="task_status_prog">
								<option value=''>Select Status</option>
									<option value='Under Progress'>Under Progress</option>
									<option value="Pending">Pending</option>
									<option value="Completed">Completed</option>
									<option value="Expired">Expired</option>
								</select>
							</div>
							</div>
					</div>
				<div class="form-group">
					<label> Task Description</label>
					<textarea rows="4" cols="5" id="task_des_prog" name="task_des_prog" class="form-control summernote" placeholder="Enter your task here"></textarea>
				</div>
					
		<div id="AssigneeModal" class="modal-body">
		<div>
		  <table class="table table-striped custom-table datatable">
						<thead>
							<tr>
							<th>SN. </th>
							<th>TASK NAME </th>
							<th>DESCRIPTION   </th>
							<th>TASK PROGRESS  </th>
							<th>SUBMITTED DATE  </th>
							</tr>
						</thead>
						<tbody id="tasks_progress"></tbody>
						<tbody id="no_record"></tbody>
					</table>
					</div>
            <div class="m-t-50 text-center">
				 <input type="hidden" name="user_login" id="user_login" value="<?php echo $_SESSION['username_admin']; ?>" />
				 <input type="hidden" name="regular_user_login" id="regular_user_login" value="<?php echo $_SESSION['username_enrollid']; ?>" />
				 <input type="hidden" id="prog_ids" name="prog_ids" value="" />
				 <input type="hidden" id="task_ids" name="task_ids" value="" />	
				  <button type="submit" onclick="emp_task_progress1()" class="btn btn-primary btn-lg">Submit</button> 
            </div>
				</form>
				</div>
				 </div>
          </div>
        </div>
      </div-->
			<div id="edit_project" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<div class="modal-content modal-lg">
						<div class="modal-header">
							<h4 class="modal-title">Edit Project</h4>
						</div>
						<div class="modal-body">
							<form>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Project Name</label>
											<input class="form-control" value="School Guru" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Client</label>
											<select class="select">
												<option>Global Technologies</option>
												<option>Delta Infotech</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Start Date</label>
											<div class="cal-icon"><input class="form-control datetimepicker" type="text"></div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>End Date</label>
											<div class="cal-icon"><input class="form-control datetimepicker" style="" type="text"></div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label>Rate</label>
											<input placeholder="$50" class="form-control" value="$5000" type="text">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>&nbsp;</label>
											<select class="select">
												<option>Hourly</option>
												<option selected>Fixed</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Priority</label>
											<select class="select">
												<option selected>High</option>
												<option>Medium</option>
												<option>Low</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Add Project Leader</label>
											<input class="form-control" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Team Leader</label>
											<div class="project-members">
												<a href="#" data-toggle="tooltip" title="Jeffery Lalor">
													<img src="images/user.jpg" class="avatar" alt="Jeffery Lalor" height="20" width="20">
												</a>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Add Team</label>
											<input class="form-control" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Team Members</label>
											<div class="project-members">
												<a href="#" data-toggle="tooltip" title="John Doe">
													<img src="images/user.jpg" class="avatar" alt="John Doe" height="20" width="20">
												</a>
												<a href="#" data-toggle="tooltip" title="Richard Miles">
													<img src="images/user.jpg" class="avatar" alt="Richard Miles" height="20" width="20">
												</a>
												<a href="#" data-toggle="tooltip" title="John Smith">
													<img src="images/user.jpg" class="avatar" alt="John Smith" height="20" width="20">
												</a>
												<a href="#" data-toggle="tooltip" title="Mike Litorus">
													<img src="images/user.jpg" class="avatar" alt="Mike Litorus" height="20" width="20">
												</a>
												<span class="all-team">+2</span>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label>Description</label>
									<textarea rows="4" cols="5" class="form-control" placeholder="Enter your message here"></textarea>
								</div>
								<div class="form-group">
									<label>Upload Files</label>
									<input class="form-control" type="file">
								</div>
								<div class="m-t-20 text-center">
									<button class="btn btn-primary">Save Changes</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" style="z-index: 999999;" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
		<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" style="z-index: 999999;" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content modal-md">
						<div class="modal-header">
							<h4 class="modal-title">Message</h4>
						</div>
						<div class="modal-body card-box">
							
							<div class="m-t-20"> <a href="#" class="btn btn-default" data-dismiss="modal">Ok</a>
							</div>
							<p>Are you sure want to delete this?</p>
					<div class="m-t-20"> <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
						<button type="submit" id="submit_confirm" class="btn btn-danger">Delete</button>
					</div>
						</div>
					</div>
				</div>
				</div>
		<div class="modal fade" id="ErrorModal1" tabindex="-1" role="dialog" style="z-index: 999999;" aria-labelledby="ErrorModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content modal-md">
				<div class="modal-header">
					<h4 class="modal-title">Error</h4>
				</div>
				<div class="modal-body card-box">
					<div id="error_notif"></div>
					<div class="m-t-20"> <a href="#" class="btn btn-default" data-dismiss="modal">Ok</a>
					</div>
				</div>
			</div>
			</div>
			</div>
	<div class="modal fade" id="confirm_delete" tabindex="-1" role="dialog" style="z-index: 999999;" aria-labelledby="ErrorModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content modal-md">
				<div class="modal-header">
					<h4 class="modal-title">Delete Project</h4>
				</div>
				<div class="modal-body card-box">
					<p>Are you sure want to delete this?</p>
					<div class="m-t-20"> <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
						<button type="submit" id="submitconfirm" class="btn btn-danger">Delete</button>
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


//this jquery for the employee assigned tasks 
$(function() { 
		$(document).ajaxStart(function(){
		$("#wait").css("display", "block");
		});
		$(document).ajaxComplete(function(){
			$("#wait").css("display", "none");
		});

		
		var all_data=$("#employee_table_form").serialize();
		var empid_search=$("#empid_search").val();

	
		var form_data="page=view_emp_task_page&"+all_data+"&empid_search="+empid_search;
	//	alert(form_data);
		$.ajax({
			url:'view_task_ajax.php',
			type:'POST',
			data:form_data,
			async:true,
			cache: false,
			success: function(result){
			var res_data= jQuery.parseJSON(result);
			console.log(res_data.table_data);
			$("#view_emp_tasks").html(res_data.table_data);
			if(res_data.table_data==1){
				$("#show_no_record").html('<tr class="odd"><td valign="top" colspan="10" class="dataTables_empty">No data available in table</td></tr>');
						
					}

			
				}
					
			});
		
	});
	
//this jquery for employees assigned projects 
$(function() { 
		$(document).ajaxStart(function(){
		$("#wait").css("display", "block");
		});
		$(document).ajaxComplete(function(){
			$("#wait").css("display", "none");
		});


		var empid_search=$("#empid_search").val();
		var all_data=$("#employee_table_form").serialize();
		
		var form_data="page=view_emp_pro_page&"+all_data+"&empid_search="+empid_search;
	//	alert(form_data);
		$.ajax({
			url:'view_task_ajax.php',
			type:'POST',
			data:form_data,
			async:true,
			cache: false,
			success: function(result){
			var res_data= jQuery.parseJSON(result);
			console.log(res_data.table_data);
			$("#view_emp_projects").html(res_data.table_data);
			if(res_data.table_data==''){
				$("#show_no_record1").html('<tr class="odd"><td valign="top" colspan="10" class="dataTables_empty">No data available in table</td></tr>');
						
					}
					
				}
			});
		
	});
	
	
});


 
//to view the task progress 
 function view_task_progress1(task_id,task_name_prog,fromdate_assign_prog,todate_assign_prog,proj_number_prog,empid_search)
  {
	alert(task_id);
	$("#task_ids").val(task_id);
	$("#task_name_prog").val(task_name_prog);
	$("#fromdate_assign_prog").val(fromdate_assign_prog);
	$("#todate_assign_prog").val(todate_assign_prog);
	$("#proj_number_prog").val(proj_number_prog);
	$("#empid_search").val(empid_search);
	
	
	var task_id=$("#task_ids").val();
	var proj_number_prog =$("#proj_number_prog ").val();
	var empid_search=$("#empid_search").val();
	var form_data="page=view_all_tasks_progress&task_ids="+task_id+"&empid_search="+empid_search;
	alert(form_data);
	$.ajax({
		url:'view_task_ajax.php',
		type:'POST',
		data:form_data,
		async:true,
		cache: false,
		success: function(result){
		var result_data= jQuery.parseJSON(result);	
		console.log(result_data.table_data);
		$("#emp_tasks_progress").html(result_data.table_data).modal('show');
			if(result_data.table_data==''){
			$("#no_record").html('<tr class="odd"><td valign="top" colspan="10" class="dataTables_empty">No data available in table</td></tr>');
						
					}
				
					
					
			}
			
		});
	
  }
  
  //to view the project progress 
 function view_pro_progress(task_id,task_name_prog,fromdate_assign_prog,todate_assign_prog,proj_number_prog,empid_search)
  {
		alert(task_id);
	//$("#task_progress").modal('show');
	$("#task_ids").val(task_id);
	$("#task_name_prog").val(task_name_prog);
	$("#fromdate_assign_prog").val(fromdate_assign_prog);
	$("#todate_assign_prog").val(todate_assign_prog);
	$("#proj_number_prog").val(proj_number_prog);
	$("#empid_search").val(empid_search);
	
	
	var task_id=$("#task_ids").val();
	var proj_number_prog =$("#proj_number_prog ").val();
	var empid_search=$("#empid_search").val();
	var form_data="page=view_all_tasks_progress&task_ids="+task_id+"&empid_search="+empid_search+"&proj_number_prog="+proj_number_prog;
	alert(form_data);
	$.ajax({
		url:'view_task_ajax.php',
		type:'POST',
		data:form_data,
		async:true,
		cache: false,
		success: function(result){
		var result_data= jQuery.parseJSON(result);	
		console.log(result_data.table_data);
	//	$("#tasks_progress").html(result_data.table_data).modal('show');
		$("#emp_tasks_progress").html(result_data.table_data).modal('show');
			if(result_data.table_data==''){
			$("#no_record").html('<tr class="odd"><td valign="top" colspan="10" class="dataTables_empty">No data available in table</td></tr>');
						
					}
				
					
					
			}
			
		});
	
  }

 
    //to let the user write the task progress to view all user task progress 
 function assigned_emp_task_progress(task_id,task_name_prog,fromdate_assign_prog,todate_assign_prog,proj_number_prog,empid_search)
  {
	alert(task_id);
	//$("#task_progress").modal('show');
	$("#task_ids").val(task_id);
	$("#task_name_prog").val(task_name_prog);
	$("#fromdate_assign_prog").val(fromdate_assign_prog);
	$("#todate_assign_prog").val(todate_assign_prog);
	$("#proj_number_prog").val(proj_number_prog);
	$("#empid_search").val(empid_search);
	
	
	var task_id=$("#task_ids").val();
	var proj_number_prog =$("#proj_number_prog ").val();
	var empid_search=$("#empid_search").val();
	var form_data="page=view_all_tasks_progress&task_ids="+task_id+"&empid_search="+empid_search+"&proj_number_prog="+proj_number_prog;
	alert(form_data);
	$.ajax({
		url:'view_task_ajax.php',
		type:'POST',
		data:form_data,
		async:true,
		cache: false,
		success: function(result){
		var result_data= jQuery.parseJSON(result);	
		console.log(result_data.table_data);
	//	$("#tasks_progress").html(result_data.table_data).modal('show');
		$("#emp_tasks_progress").html(result_data.table_data).modal('show');
			if(result_data.table_data==''){
			$("#no_record").html('<tr class="odd"><td valign="top" colspan="10" class="dataTables_empty">No data available in table</td></tr>');
						
				}
				
					
					
			}
			
		});
	
  }

  
 /* function emp_task_progress1()
  {
	  alert("This shit is working!");
	  var task_name_prog=$("#task_name_prog").val();
	  var proj_number_prog=$("#proj_number_prog").val();
	  var empid_search=$("#empid_search").val();
	  var fromdate_assign_prog=$("#fromdate_assign_prog").val();
	  var todate_assign_prog=$("#todate_assign_prog").val();
	  var task_status_prog=$("#task_status_prog").val();
	  var task_des_prog=$("#task_des_prog").val();
	  var task_id1=$("#task_ids").val();
	  var user_login=$("#user_login").val();
	  var prog_id1=$("#prog_ids").val();
	  
	  if(task_status_prog=='') {
		$.alert({
			title: 'Alert!',
			content: "Please task status should not be empty.",
		});
			$("#task_status_prog").focus();
			return false;
		  }
	
	  
	  var data_form="page=emp_task_progress&task_name_prog="+task_name_prog+"&proj_number_prog="+proj_number_prog+"&empid_search="+empid_search+"&fromdate_assign_prog="+fromdate_assign_prog+"&todate_assign_prog="+todate_assign_prog+"&task_status_prog="+task_status_prog+"&task_des_prog="+task_des_prog+"&task_ids="+task_id1+"&user_login="+user_login+"&prog_ids="+prog_id1;
	  alert(data_form);
	  
	  $.ajax({
		  url:'view_task_ajax.php',
		  type:'POST',
		  data:data_form,
		  async:true,
		  catch: false,
		  success: function(result){
			  console.log(result);
			  if(result!=''){
					console.log(result);
					location.reload();
					$("#exampleModal1")
					.modal("show")
					.on("shown.bs.modal", function () {
						$("#show_msg").html("<p>Process has been done successfully.</p>"); 
						window.setTimeout(function () {
							$("#exampleModal1").modal("hide");
							location.reload(); 
						}, 4000);                 
					});
				}
			  
			  
		  }
		  
	  });
	  

	}
*/

function view_pro_progress1(){
	$("#create_pro_progress").modal('show');
	
	
}

   
  function view_task_details(assign_pro_id){
	alert(assign_pro_id);
	$("#assign_pro_id").val(assign_pro_id);
	$("#assigned_date").val(assigned_date);
	
}

  
 
</script>
</body>
</html>