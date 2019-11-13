
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
				 <form name="view_task_form" id="view_task_form" method="post" >
					<div class="row">
						<div class="col-sm-4">
							<h4 class="page-title">Task List of Project</h4>
						</div>
						<div class="col-sm-8 text-right m-b-20">
						<?php 
							$stmt = mysqli_query($func->dbo,"SELECT * FROM `projects` where`PROJECT_ID`=".$_REQUEST['pro_id']."");
							 $inc=1;
							 while($row = mysqli_fetch_assoc($stmt))
							 {
							echo '<a href="#" onclick="add_new_task('.$row['PROJECT_ID'].')" class="btn btn-primary rounded pull-right" data-toggle="modal" data-target="#assignee"><i class="fa fa-plus"></i>Create Task</a>
							<input type="hidden" id="pro_ids" value="'.$_GET['pro_id'].'" name="pro_ids">';
							 }?>
						</div>
					</div>
				 </form>
					<div class="row filter-row" style="display:none;">
						 <form name="search_byempnumber" id="search_byempnumber" method="post" >
							<div class="col-sm-3 col-xs-6">  
								<div class="form-group form-focus">
									<label class="control-label">Employee Code</label>
									<input autocomplete="off" class="form-control" type="text" name="empid_search" id="empid_search" /> 
								</div>
							</div>
							<div class="col-sm-3 col-xs-6">  
								<div class="form-group form-focus">
									<label class="control-label">Employee Name</label>
									<input autocomplete="off" class="form-control" type="text" name="empname_search" id="empname_search" />
								</div>
							</div>
							<div class="col-sm-3 col-xs-6"> 
								<div class="form-group form-focus select-focus">
									<label class="control-label">Designation</label>
									<select class="select floating" name="designation_search" id="designation_search"> 
										<option value="">Select Designation</option>
										<option value="Web Developer">Web Developer</option>
										<option value="Web Designer">Web Designer</option>
										<option value="Android Developer">Android Developer</option>
										<option value="Ios Developer">Ios Developer</option>
									</select>
								</div>
							</div>
							<div class="col-sm-3 col-xs-6"> 
								<input type="hidden" name="user_login" id="user_login" value="<?php echo $_SESSION['username_admin']; ?>" />
								<input type="hidden" name="user_login_id" id="user_login_id" value="<?php echo $_SESSION['username_admin']; ?>" />
								<input type="submit" id="" value="" name="" class="btn btn-success btn-block" />						
							</div>
						</form>						
                    </div>
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table id="tasks_list_datatable" class="table table-striped custom-table">
									<thead>
										<tr>
											<tr>
											<th>SN. </th>
											<th>PROJECT ID </th>
											<th>TASK NAME  </th>
											<th>START DATE  </th>
											<th>END DATE </th>
											<th>STATUS </th>
											<th class="text-right">ACTION </th>
										</tr>
									</thead>
									<tbody id="view_tasks"></tbody>
									<tbody id="show_record1"></tbody>
									<input type="hidden" name="user_login" id="user_login" value="<?php echo $_SESSION['username_admin']; ?>" />
									<input type="hidden" name="regular_user_login" id="regular_user_login" value="<?php echo $_SESSION['username_enrollid']; ?>" />
									<input  type="hidden"  id="pro_id" value="<?php echo $_GET['pro_id'];?>" name="pro_id">
								</table>
							</div>		
						</div>
					</div>
				</div>
				<div class="notification-box" style="display:none;">
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
				<div id="wait" style="display:none;width:69px;height:89px; position:absolute;top:20%;left:42%;padding:2px; z-index:9999;"><img src='images/loader.gif' width="100" height="100" /></div>
				
            </div><!--This is the end of page-wrapper-->
			
	 <!---This is the end of the page & main wrapper-->
	<div id="assign_pro" class="modal custom-modal fade" role="dialog">
      <div class="modal-dialog">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
			<div class="modal-content modal-lg">
				<div class="modal-header">
					<h4 class="modal-title">Assigned Employees</h4>
				</div>
				<div class="modal-body">
					<form method="post" name="assignee_form_emp" id="assignee_form_emp" >
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Task ID</label>
								<input readonly autocomplete="off" type="text" id="assign_task_id" name="assign_task_id" class="form-control" type="text"/>
							</div>
						</div>
						<div class="col-md-6">
						  <div class="form-group">
							<label>Assigned Date</label>
							<div class="cal-icon">
							  <input required autocomplete="off" type="text" class="form-control datetimepicker" name="assigned_date" id="assigned_date" /></div>
							</div>
						</div>
					</div>
				</div>
				<div id="AssigneeModal" class="modal-body">
					<div class="input-group m-b-30">
						<input autocomplete="off" type="text" name="empid_search" id="empid_search" placeholder="Enter Employee ID to add" class="form-control search-input input-lg">
						<input type="hidden" name="user_login" id="user_login" value="<?php echo $_SESSION['username_admin']; ?>" />
						<span class="input-group-btn">
							<button type="submit" id="search_emp_task" name="search_emp_task" value="Search" class="btn btn-primary btn-lg">Search</button>
						</span> 
					</div>
				<div> 
					<table id="table1" class="table table-striped custom-table">
						<thead>
							<tr>
								<th>SN. </th>
								<th>EMPLOYEE NUMBER </th>
								<th>NAME </th>
								<th>DESIGNATION </th>

							</tr>
						</thead>
						<tbody id="show_assigned_members"></tbody>
						<tbody id="no_record3"></tbody>
						
					</table>
				</div>
				<div>
					<table class="table table-striped custom-table">
						<thead>
							<tr>
								<th>SN. </th>
								<th>EMPLOYEE NUMBER </th>
								<th>NAME </th>
								<th>DESIGNATION </th>
								<th>ACTION</th>
							</tr>
						</thead>
						<tbody id="search_assigned_members"></tbody>
						<tbody id="no_record"></tbody>
					</table>
				</div>
					<div class="m-t-50 text-center">
							<input type="hidden" name="user_login" id="user_login" value="<?php echo $_SESSION['username_admin']; ?>" />
							<input type="hidden" name="regular_user_login" id="regular_user_login" value="<?php echo $_SESSION['username_enrollid']; ?>" />
							<input type="hidden" id="task_ids" name="task_ids" value="" />	
							<input  type="hidden"  id="pro_id" value="<?php echo $_GET['pro_id'];?>" name="pro_id">
						  <button type="submit" onclick="assign_emp_to_task()" class="btn btn-primary btn-lg">Assign</button> 
					</div>
				</div>
				</form>
			</div>
        </div>
	</div>
<!--This is for the create task module -->            
<div id="assignee" class="modal custom-modal fade" role="dialog">
      <div class="modal-dialog">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="modal-content modal-lg">
          <div class="modal-header">
            <h4 class="modal-title">Create Task</h4>
          </div>
          <div class="modal-body">
		<form method="post" name="task_assignee_form" id="task_assignee_form" >
								<div class="row">
								<div class="col-md-3">
									 <div class="form-group">
										<label>Project Number <span class="text-danger">*</span></label>
										 <input readonly autocomplete="off" type="text" class="form-control" name="project_number" id="project_number"/>
									</div>
								</div>
								 <div class="col-md-3">
								  <div class="form-group">
									<label>Task Name</label>
									  <input autocomplete="off" type="text" class="form-control" name="new_task" id="new_task" list="tasksname"/>
									  <datalist  autocomplete="off" id="tasksname" name="tasksname" >
										<option value="Camp Master">Camp Master</option>
										<option value="Room Category Master">Room Category Master</option>
									  </datalist>
								  </div>
								</div>
								 <div class="col-md-3">
								  <div class="form-group">
									<label>Module Name </label>
										<input autocomplete="off" type="text" class="form-control" name="task_module" id="task_module" list="task_module_list"/>
										<datalist  autocomplete="off" id="task_module_list" name="task_module_list" >
											<option value=''>Select Module</option>
											<option value='HRMS'>HRMS</option>
											<option value="PROJECT">PROJECT</option>
											<option value="FINANCE">FINANCE</option>
											<option value="ADMIN">ADMIN</option>
											<option value="ACCOMMODATION">ACCOMMODATION</option>
										</datalist>
								  </div>
								</div>
								 <div class="col-md-3">
								  <div class="form-group">
									<label>Purpose </label>
										<input autocomplete="off" type="text" class="form-control" name="task_purpose" id="task_purpose" list="task_purpose_list"/>
										<datalist  autocomplete="off" id="task_purpose_list" name="task_purpose_list" >
											<option value=''>Select Purpose </option>
												<option value='Development'>Development </option>
												<option value="Documentation">Documentation</option>
												<option value="Process Documentation">Process Documentation</option>
										</datalist>
								  </div>
								</div>
								</div>
								<div class="row">
								 <div class="col-md-3">
								  <div class="form-group">
									<label>Start Date</label>
									<div class="cal-icon">
									  <input autocomplete="off" type="text" class="form-control datetimepicker" name="fromdate_assign" id="fromdate_assign"/>
									</div>
								  </div>
								</div>
									<div class="col-md-3">
									  <div class="form-group">
										<label>End Date</label>
										<div class="cal-icon">
										   <input  autocomplete="off" type="text" class="form-control datetimepicker" name="todate_assign" id="todate_assign"/>
										</div>
									  </div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Status</label>
											<select class="select" id="task_status" name="task_status">
											<option value=''>Select Status</option>
												<option value='Under Progress'>Under Progress</option>
												<!--option value="Pending">Pending</option>
												<option value="Completed">Completed</option-->
											</select>
										</div>
										</div>
										<div class="col-md-3">
										<div class="form-group">
											<label>Hours</label>
												 <input autocomplete="off" type="text" class="form-control" name="task_hrs" id="task_hrs" maxlength="4"/>
										</div>
										</div>
								</div>
								<div class="form-group">
									<label> Task Description</label>
									<textarea rows="4" cols="5" id="task_description" name="task_description" class="form-control summernote" placeholder="Enter your task here"></textarea>
								</div>
						 <div id="AssigneeModal1" class="modal-body">
							<!--div class="input-group m-b-30">
								<input  required autocomplete="off" type="text" name="empid_search" id="empid_search" placeholder="Search Employee ID to assign" class="form-control search-input input-lg">
								<input type="hidden" name="user_login" id="user_login" value="<?php echo $_SESSION['username_admin']; ?>" />
							<span class="input-group-btn">
								<button type="submit" id="search_emp" value="Search" name="search_emp" value="Search" class="btn btn-primary btn-lg">Search</button>
							</span> </div>
						<div>
						<ul class="media-list media-list-linked chat-user-list" id="assigned_employees"> </ul>
						</div-->
					<div>
					<!--div class="table-responsive">
					  <table class="table table-striped custom-table datatable">
									<thead>
										<tr>
											<th>SN. </th>
											<th>EMPLOYEE ID </th>
											<th>PROJECT ID  </th>
											<th>TASK NAME  </th>
											<th>TASK DESCRIPTION  </th>
											<th>SUBMITTED DATE  </th>
											<th>STATUS </th>
										</tr>
									</thead>
									<tbody id="assigned_tasks"></tbody>
								</table>
								</div-->
							</div>
								<div class="m-t-20 text-center">
								<input type="hidden" name="user_login" id="user_login" value="<?php echo $_SESSION['username_admin']; ?>" />
								<input type="hidden" name="regular_user_login" id="regular_user_login" value="<?php echo $_SESSION['username_enrollid']; ?>" />
								<input type="hidden" id="task_ids" name="task_ids" value="" />	
								<input  type="hidden"  id="pro_id" value="<?php echo $_GET['pro_id'];?>" name="pro_id">
								<button type="submit" onclick="assign_to_emp1()" class="btn btn-primary btn-lg">Create</button> 
								</div>
							</form>
			</div>
          </div>
        </div>
      </div>
    </div>
	
	<div class="modal custom-modal fade" id="view_assignee_task" role="dialog">
      <div class="modal-dialog">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="modal-content modal-lg">
          <div class="modal-header">
            <h4 class="modal-title">View Task</h4>
          </div>
          <div class="modal-body">
		<form method="post" name="update_task_form" id="update_task_form" >
			<div class="row">
			 <div class="col-md-6">
			  <div class="form-group">
				<label>Task Name</label>
				  <input autocomplete="off" readonly type="text" class="form-control" name="view_new_task" id="view_new_task"/>
			  </div>
			</div>
			<div class="col-md-6">
					 <div class="form-group">
						<label>Project Number <span class="text-danger">*</span></label>
						 <input autocomplete="off" readonly type="text" class="form-control" name="view_project_number" id="view_project_number"/>
					</div>
					</div>
			 <div class="col-md-3">
			  <div class="form-group">
				<label>Start Date</label>
				<div class="cal-icon">
				  <input autocomplete="off" readonly type="text" class="form-control datetimepicker" name="view_fromdate" id="view_fromdate"/>
				</div>
			  </div>
			</div>
				<div class="col-md-3">
				  <div class="form-group">
					<label>End Date</label>
					<div class="cal-icon">
					   <input required autocomplete="off" type="text" class="form-control datetimepicker" name="view_todate" id="view_todate"/>
					</div>
				  </div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Status</label>
						<!--input autocomplete="off" readonly type="text" class="form-control" name="view_task_status" id="view_task_status"/-->
						<select required class="select" id="view_task_status" name="view_task_status">
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
				<textarea readonly rows="4" cols="5" id="view_task_desc" name="view_task_desc" class="form-control summernote" placeholder="Enter your task here"></textarea>
			</div>
				<div id="AssigneeModal3" class="modal-body">
					 <!--div id="ViewAssigneeModal1" class="modal-body"-->
						<!--div class="input-group m-b-30">
							<input  required autocomplete="off" type="text" name="empid_search" id="empid_search" placeholder="Search Employee ID to assign" class="form-control search-input input-lg">
							<input type="hidden" name="user_login" id="user_login" value="<?php echo $_SESSION['username_admin']; ?>" />
						<span class="input-group-btn">
							<button type="submit" id="search_emp" value="Search" name="search_emp" value="Search" class="btn btn-primary btn-lg">Search</button>
						</span> </div>
					<div>
					<ul class="media-list media-list-linked chat-user-list" id="assigned_employees"> </ul>
					</div-->
				<div>
					<div class="table-responsive">
					  <table class="table table-striped custom-table">
									<thead>
										<tr>
											<th>SN. </th>
											<th>EMPLOYEE ID </th>
											<th>PROJECT ID  </th>
											<th>TASK NAME  </th>
											<th>TASK DESCRIPTION  </th>
											<th>SUBMITTED DATE  </th>
											<th>STATUS </th>
										</tr>
									</thead>
									<tbody id="assigned_tasks1"></tbody>
									<tbody id="no_record1"></tbody>
								</table>
								</div>
							</div>
					<div class="m-t-20 text-center">
					<input type="hidden" name="user_login" id="user_login" value="<?php echo $_SESSION['username_admin']; ?>" />
					<input type="hidden" name="regular_user_login" id="regular_user_login" value="<?php echo $_SESSION['username_enrollid']; ?>" />
					<input type="hidden" id="updated_task_id" name="updated_task_id" value="" />	
					<input  type="hidden"  id="pro_id" value="<?php echo $_GET['pro_id'];?>" name="pro_id">
					<button type="submit" onclick="update_task_info()" class="btn btn-primary btn-lg">Update</button> 
					</div>
				</form>
			</div>
          </div>
        </div>
      </div>
    </div>
	<!---Here i should change the id of modal -->
	<div id="task_progress" class="modal custom-modal fade" role="dialog">
      <div class="modal-dialog">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="modal-content modal-lg">
          <div class="modal-header">
            <h4 class="modal-title">Task Progress</h4>
          </div>
          <div class="modal-body">
		   <form method="post" name="task_form_progress" id="task_form_progress" >
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
							 <input required autocomplete="off" readonly type="text" class="form-control" name="proj_number_prog" id="proj_number_prog"/>
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
								<label>Status  <span class="text-danger">*</span></label>
								<select  class="select" id="task_status_prog" name="task_status_prog">
								<option value=''>Select Status</option>
									<option value='Under Progress'>Under Progress</option>
									<option value="Pending">Pending</option>
									<option value="Completed">Completed</option>
								</select>
							</div>
							</div>
					</div>
				<div class="form-group">
					<label> Task Description</label>
					<textarea required  rows="4" cols="5" id="task_des_prog" name="task_des_prog" class="form-control summernote" placeholder="Enter your task here"></textarea>
				</div>
					
		<div id="AssigneeModal1" class="modal-body">
		<div>
			<div class="table-responsive">
			<table class="table table-striped custom-table">
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
					<tbody id="no_record2"></tbody>
				</table>
			</div>
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
		<div  class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" style="z-index: 999999;" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
</div><!--This is the end of the main-wrapper-->
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
		
		var all_data=$("#view_task_form").serialize();
		var pro_id=$("#pro_id").val();
	
		var form_data="page=view_task_page&="+all_data+"&pro_id="+pro_id;
		$.ajax({
			url:'view_task_ajax.php',
			type:'POST',
			data:form_data,
			async:true,
			cache: false,
			success: function(result){
			var res_data= jQuery.parseJSON(result);
			$("#show_error").show();
			console.log(result);
			console.log(res_data.table_data);
			$("#view_tasks").html(res_data.table_data);
			if(res_data.table_data==''){
					$("#show_record1").html('<tr class="odd"><td valign="top" colspan="10" class="dataTables_empty">No data available in table</td></tr>');
						
					}
					
					}
			});
		
	});



//to search the employee in task view modal
$(document).on('submit','#task_assignee_form',function(e){
       
				e.preventDefault();
				$(document).ajaxStart(function(){
				$("#wait").css("display", "block");
				});
				$(document).ajaxComplete(function(){
					$("#wait").css("display", "none");
				});
				
				var empid_search=$("#empid_search").val();

				/*if(task_status_search=='')
				{
					alert("Please Enter Project Name First.");
					$("#task_status_search").focus();
					return false;
				}*/
				
				$("#task_ids").val(task_id);
				$("#empid_search").val(empid_search);
				var data_all=$("#task_assignee_form").serialize();
				var user_login=$("#user_login").val();
				var form_data="page=search_to_emp&empid_search="+empid_search+"&user_login="+user_login;
				$.ajax({
					url:'view_task_ajax.php',
					type:'POST',
					data:form_data,
					async:true,
					cache: false,
					success: function(result){
					var res_data= jQuery.parseJSON(result);
					//console.log(res_data.table_data);
					$("#assigned_employees").html(res_data.table_data).modal('show');
					$("#assignee")
						.modal("show")
						.on("shown.bs.modal", function () {
							window.setTimeout(function () {
								$("#assignee").modal("hide");
								location.reload(); 
							}, 4000);                 
						});


			}
		});
		
	});
	
	//to search the employee in assigned to modal 
$(document).on('submit','#assignee_form_emp',function(e){
       
	e.preventDefault();
	$(document).ajaxStart(function(){
	$("#wait").css("display", "block");
	});
	$(document).ajaxComplete(function(){
		$("#wait").css("display", "none");
	});
				
				var empid_task_search=$("#empid_task_search").val();

				/*if(task_status_search=='')
				{
					alert("Please Enter Project Name First.");
					$("#task_status_search").focus();
					return false;
				}*/
				
				$("#task_id").val(task_id);
				$("#empid_task_search").val(empid_task_search);
				var data_all=$("#assignee_form_emp").serialize();
				var empid_search=$("#empid_search").val();
				var user_login=$("#user_login").val();
				var form_data="page=search_assigned_emp&empid_search="+empid_search+"&user_login="+user_login;

				$.ajax({
					url:'view_task_ajax.php',
					type:'POST',
					data:form_data,
					async:true,
					cache: false,
					success: function(result){
					var res_data= jQuery.parseJSON(result);
					if(res_data.table_data!= '')
					{
					console.log(res_data.table_data);
					$("#show_assigned_members").html(res_data.table_data).modal('show');
					$("#no_record3").show();
					}
					if(res_data.table_data== '') {
						$("#no_record3").html('<tr class="odd"><td valign="top" colspan="10" class="dataTables_empty">No data available in table</td></tr>');
						
					}

			}
		});
		
	});
	
});

  function add_new_task(project_number){
	  $("#project_number").val(project_number);
	  var pro_id1=$("#pro_ids").val();

  }
  
//assign this task to employee
	 function assign_to_emp1()
  {
	  
	var projectnumber=$("#project_number").val();
	var new_task =$("#new_task ").val();
	var start_date=$("#fromdate_assign").val();
	var end_date=$("#todate_assign").val();
	var user_login=$("#user_login").val();
	var task_id1=$("#task_ids").val();
	var pronumber=$("#project_number").val();
	var task_status=$("#task_status").val();
	var task_description=$("#task_description").val();
	var task_hrs=$("#task_hrs").val();
	var task_module=$("#task_module").val();
	var task_purpose=$("#task_purpose").val();
	var user_login=$("#user_login").val();
	var pro_id=$("#pro_id").val();
	var all_data =$("#task_assignee_form").serialize();
	
	
	if(projectnumber=='') {
		$.alert({
			title: 'Alert!',
			content: "Please project Id should not be empty.",
		});
			$("#new_task").focus();
			return false;
		  }
		  
	if(/^[a-zA-Z0-9- ]*$/.test(projectnumber) == false) {
	 $.alert({
		title: 'Alert!',
		content: "Please project Id contains illegal characters.",
	});
		return false;
	}
		  
	
	if(new_task=='') {
		$.alert({
			title: 'Alert!',
			content: "Please task name should not be empty.",
		});
			$("#new_task").focus();
			return false;
		  }
		  
	if(/^[a-zA-Z0-9- ]*$/.test(new_task) == false) {
	 $.alert({
		title: 'Alert!',
		content: "Please Task Name contains illegal characters.",
	});
		return false;
	}
	
	if(task_status=='') {
		$.alert({
			title: 'Alert!',
			content: "Please task status should not be empty.",
		});
			$("#task_status").focus();
			return false;
		  }
		  
	if(start_date=='') {
		$.alert({
			title: 'Alert!',
			content: "Please choose start date.",
		});
			$("#fromdate_assign").focus();
			return false;
		  }
		  
	if(end_date=='') {
		$.alert({
			title: 'Alert!',
			content: "Please choose end date.",
		});
			$("#todate_assign").focus();
			return false;
		  }
		  
	if(task_description=='') {
		$.alert({
			title: 'Alert!',
			content: "Please task description should not be empty.",
		});
			$("#task_description").focus();
			return false;
		  }
	if(/^[a-zA-Z0-9- ]*$/.test(task_description) == false) {
	 $.alert({
		title: 'Alert!',
		content: "Please task description contains illegal characters.",
	});
		return false;
	}
	
	var form_data="page=assign_to_emp1&="+all_data+"&new_task="+new_task +"&task_ids="+task_id1+"&user_login="+user_login+"&start_date="+start_date+"&end_date="+end_date+"&pro_id="+pro_id+"&task_hrs="+task_hrs+"&task_module="+task_module+"&task_purpose="+task_purpose;
		$.ajax({
			url:'view_task_ajax.php',
			type:'POST',
			data:form_data,
			async:true,
			cache: false,
			success: function(result){
				console.log(result);
				 if(result==1){
					 
				$("#ErrorModal1")
			.modal("show")
			.on("shown.bs.modal", function () {
			$("#error_notif").html("<p>You used wrong credentials.</p>");
				window.setTimeout(function () {
					$("#ErrorModal1").modal("hide");
					location.reload(); 
				}, 4000); 
                        
			});	
				}else{
				console.log(result);			
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
  
  
	
	//assign this task to employee
	 function assign_emp_to_task()
  {
	  
	  $("#show_msg").html("");
	  $("#show_msg1").html("");
	
	var assigned_date=$("#assigned_date").val();
	var assign_task_id=$("#assign_task_id").val();
	var empid_search=$("#empid_search").val();
	var task_id1=$("#task_ids").val();
	var user_login=$("#user_login").val();
	var pro_id=$("#pro_id").val();
	var data =$("#assignee_form_emp").serialize();
	
		if(assign_task_id=='') {
		$.alert({
			title: 'Alert!',
			content: "Please task id should not be empty.",
		});
			$("#assign_task_id").focus();
			return false;
		  }
		  
	if(/^[a-zA-Z0-9- ]*$/.test(assign_task_id) == false) {
	 $.alert({
		title: 'Alert!',
		content: "Please task id contains illegal characters.",
	});
		return false;
	}
		  
	if(assigned_date=='') {
		$.alert({
			title: 'Alert!',
			content: "Please task assigned date should not be empty.",
		});
			$("#assigned_date").focus();
			return false;
		  }
		  
	if(empid_search =='')
	{
		$.alert({
			title: 'Alert!',
			content: "Please choose the assigned employee.",
			
		});
		$("#empid_search").focus;
		return false;
	}
	
		  
	var form_data="page=assign_emp_to_task&task_ids="+task_id1+"&assign_task_id="+assign_task_id+"&user_login="+user_login+"&assigned_date="+assigned_date+"&empid_search="+empid_search+"&pro_id="+pro_id;
	alert(form_data);
		$.ajax({
			url:'view_task_ajax.php',
			type:'POST',
			data:form_data,
			async:true,
			cache: false,
			success: function(result){
				console.log(result);
				if(result!=''){
				console.log(result);			
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
				 if(result==1){
					 
				$("#ErrorModal1")
			.modal("show")
			.on("shown.bs.modal", function () {
			$("#error_notif").html("<p>You used wrong credentials.</p>");
				window.setTimeout(function () {
					$("#ErrorModal1").modal("hide");
					location.reload(); 
				}, 4000); 
                        
			});	
				} 
			
	
				
	}
});
	  
	  
  }
  
    function emp_task_progress1()
  {
	 
	  
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
	  var all_data=$("#task_form_progress").val();
	  
	  if(task_status_prog=='') {
		$.alert({
			title: 'Alert!',
			content: "Please task status should not be empty.",
		});
			$("#task_status_prog").focus();
			return false;
		  }
	
	  
	  var data_form="page=emp_task_progress&task_name_prog="+task_name_prog+"&proj_number_prog="+proj_number_prog+"&empid_search="+empid_search+"&fromdate_assign_prog="+fromdate_assign_prog+"&todate_assign_prog="+todate_assign_prog+"&task_status_prog="+task_status_prog+"&task_des_prog="+task_des_prog+"&task_ids="+task_id1+"&user_login="+user_login+"&prog_ids="+prog_id1;
	  
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
  
  //to list all assigned developers in this task //herre will lead to emp_task 
  function assign_emp_task(assign_task_id)
  {
	//alert(assign_task_id);
	$("#assign_task_id").val(assign_task_id);
	$("#assigned_date").val(assigned_date);
	//$("#AssigneeModal").modal('show');
	
		
	var assign_task_id=$("#assign_task_id").val();
	var empid_search=$("#empid_search").val();
	var assigned_date=$("#assigned_date").val();
	var data_all=$("#assignee_form_emp").serialize();
	var form_data="page=task_members&="+data_all+"&assign_task_id="+assign_task_id+"&empid_search="+empid_search;
	//alert(form_data);
	$.ajax({
		url:'view_task_ajax.php',
		type:'POST',
		data:form_data,
		async:true,
		cache: false,
		success: function(result){
		var result_data= jQuery.parseJSON(result);	
		console.log(result_data.table_data);
		$("#search_assigned_members").html(result_data.table_data).modal('show'); //this is for already assign developer for task
		if(result_data.table_data==''){
		$("#no_record").html('<tr class="odd"><td valign="top" colspan="10" class="dataTables_empty">No data available in table</td></tr>');
						
					}
				
					
					
			}
			
		});
	
  }
  
  //to view only the task details
   function view_assign_emp_task(task_id,view_new_task,view_fromdate,view_todate,view_project_number,view_task_status,view_task_desc)
  {
	//alert(task_id);
	$("#task_ids").val(task_id);
	$("#view_new_task").val(view_new_task);
	$("#view_fromdate").val(view_fromdate);
	$("#view_todate").val(view_todate);
	$("#view_project_number").val(view_project_number);
	$("#view_task_status").val(view_task_status);
	$("#view_task_desc").val(view_task_desc);

	
	var task_id=$("#task_ids").val();
	var data_all=$("#update_task_form").serialize();
	var form_data="page=all_tasks&="+data_all+"&task_id="+task_id;
	//alert(form_data);

	
  }
  
  function update_task_info()
  {
	
	var view_new_task=$("#view_new_task").val();
	var view_fromdate=$("#view_fromdate").val();
	var view_todate=$("#view_todate").val();
	var view_project_number=$("#view_project_number").val();
	var view_task_desc=$("#view_task_desc").val();
	var view_task_status=$("#view_task_status").val();
	var task_id=$("#task_ids").val();
	var data_all=$("#update_task_form").serialize();
	
	if(view_task_status=='') {
		$.alert({
			title: 'Alert!',
			content: "Please task status should not be empty.",
		});
			$("#view_task_status").focus();
			return false;
		  }
		  
	if(view_todate=='') {
		$.alert({
			title: 'Alert!',
			content: "Please choose end date.",
		});
			$("#view_todate").focus();
			return false;
		  }
		  
	var form_data="page=update_task_info_page&task_ids="+task_id+"&view_todate="+view_todate+"&view_task_status="+view_task_status;
	//alert(form_data);
	$.ajax({
		url:'view_task_ajax.php',
		type:'POST',
		data:form_data,
		async:true,
		cache: false,
		success: function(result){
		console.log(result);
	/*	if(result!=''){
				console.log(result);			
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
				 if(result==1){
				$("#ErrorModal1")
			.modal("show")
			.on("shown.bs.modal", function () {
			$("#error_notif").html("<p>You used wrong credentials.</p>");
				window.setTimeout(function () {
					$("#ErrorModal1").modal("hide");
					location.reload(); 
				}, 4000); 
                        
			});	
				}*/
					
					
			}
			
		});
	
  }
 


  //to assign this task 
  function add_assign_emp_task(task_id,view_new_task,view_fromdate,view_todate,view_project_number,view_task_status,view_task_desc)
  {
		
	//$("#ViewAssigneeModal1").modal('show');
	//$("#view_assignee_task").modal('show');
	$("#task_ids").val(task_id);
	$("#view_new_task").val(view_new_task);
	$("#view_fromdate").val(view_fromdate);
	$("#view_todate").val(view_todate);
	$("#view_project_number").val(view_project_number);
	$("#view_task_status").val(view_task_status);
	$("#view_task_desc").val(view_task_desc);
	
	var task_id=$("#task_ids").val();
	var data_all=$("#task_assignee_form").serialize();
	var form_data="page=all_tasks&="+data_all+"&task_id="+task_id;

	$.ajax({
		url:'view_task_ajax.php',
		type:'POST',
		data:form_data,
		async:true,
		cache: false,
		success: function(result){
		var result_data= jQuery.parseJSON(result);	
		console.log(result_data.table_data);
		$("#assigned_tasks1").html(result_data.table_data).modal('show');
		if(result_data.table_data==''){
			$("#no_record1").html('<tr class="odd"><td valign="top" colspan="10" class="dataTables_empty">No data available in table</td></tr>');
						
					}
					
					
			}
			
		});
	
  }


   //This is to view all Submitted Task Progress 
 function assigned_emp_task_progress(task_id,task_name_prog,fromdate_assign_prog,todate_assign_prog,proj_number_prog,empid_search)
  {
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
	
	$("#no_record").html('<tr class="odd"><td valign="top" colspan="10" class="dataTables_empty">No data available in table</td></tr>');
	$.ajax({
		url:'view_task_ajax.php',
		type:'POST',
		data:form_data,
		async:true,
		cache: false,
		success: function(result){
		var result_data= jQuery.parseJSON(result);	
		console.log(result_data.table_data);
		$("#tasks_progress").html(result_data.table_data).modal('show');
		$("#no_record").show();
		if(result_data.table_data==''){
		$("#no_record2").html('<tr class="odd"><td valign="top" colspan="10" class="dataTables_empty">No data available in table</td></tr>');
						
					}
				
					
					
			}
			
		});
	
  }


//this is to delete the task
   function delete_tasknumber(task_id)
    {	
		$("#task_ids").val(task_id);
		var conf=confirm("Are you sure want to Delete Task?");
		if(conf==true)
		{        

		 var task_id1=$("#task_ids").val();
		 var form_data="page=delete_tasknumber&task_id="+task_id1;
			$.ajax({
				url:'view_task_ajax.php',
				type:'POST',
				data:form_data,
				async:true,
				cache: false,
				success: function(result){
					console.log(result);
					if(result==0){
					$("#exampleModal1")
					.modal("show")
					.on("shown.bs.modal", function () {
						$("#show_msg").html("<p>This Task Has been Deleted</p>");
						 window.setTimeout(function () {
							$("#exampleModal1").modal("hide");
							location.reload(); 
						},4000);                 
					});
				
				} else if(result==1){
					 
					$("#ErrorModal1")
					.modal("show")
					.on("shown.bs.modal", function () {
					$("#error_notif").html("<p>You used wrong credentials.</p>");
						window.setTimeout(function () {
							$("#ErrorModal1").modal("hide");
							location.reload(); 
						}, 4000); 
                        
					});	
					
					}
					
					
					
					
				}
			});
			}
		
		else {
			return false;
			
		}

		
   }
     function view_task_details(assign_pro_id){
	alert(assign_pro_id);
	$("#assign_pro_id").val(assign_pro_id);
	$("#assigned_date").val(assigned_date);
	
}
  
 
</script>
</body>
</html>