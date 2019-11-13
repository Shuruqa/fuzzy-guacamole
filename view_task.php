
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
							<h4 class="page-title">List of Projects</h4>
						</div>
						<div class="col-sm-8 text-right m-b-20" style="display:none;">
							<a href="#" class="btn btn-primary rounded pull-right" data-toggle="modal" data-target="#create_task"><i class="fa fa-plus"></i> Create Task</a>
							<div class="view-icons">
								<a href="projects.php" class="grid-view btn btn-link"><i class="fa fa-th"></i></a>
								<a href="project-list.php" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a>
							</div>
						</div>
					</div>
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
							<input type="submit" id="search_project" value="Search" name="search_project" value="Search" class="btn btn-success btn-block" />						
						</div>
					</form>						
                    </div>
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table id="pro_task_list" class="table table-striped custom-table">
									<thead>
										<tr>
											<th>PROJECT ID</th>
											<th>PROJECT NAME </th>
											<th>PROJECT STATUS</th>
											<th class="text-right">TASKS LISTS</th>
										</tr>
									</thead>
									<tbody id="show_error"></tbody>
								</table>
								<input type="hidden" name="start" id="start" value="0" />
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
			</div><!--This is the end of page-wrapper-->
    <div id="create_task" class="modal custom-modal fade" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="modal-content modal-lg">
          <div class="modal-header">
            <h4 class="modal-title">Add New Task</h4>
          </div>
	   <div class="modal-body">
		<form method="post" name="add_task_form" id="add_task_form" >
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
						<label>Project Number <span class="text-danger">*</span></label>
						<select id="project_number" name="project_number" class="select">
							<option value="">Select Number</option>
							 <?php 
											
							$stmt = mysqli_query($func->dbo,"SELECT * FROM `projects` ");
									
							if ($stmt) 
							{
								while($row = mysqli_fetch_assoc($stmt))
									{
									   echo '<option  data-subtext="'.$row['PROJECT_ID'].'" value="'.$row['PROJECT_ID'].'">'.$row['PROJECT_NUMBER'].'=>'.$row["PROJ_NAME"].'</option>';
									}
							}
							?>
							
						</select>
					</div>
					</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Status</label>
						<select class="select" id="task_status" name="task_status">
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
				<textarea rows="4" cols="5" id="task_description" name="task_description" class="form-control summernote" placeholder="Enter your task here"></textarea>
			</div>
			<div id="AssigneeModal1" class="modal-body">
				<div class="input-group m-b-30">
					<input  required autocomplete="off" type="text" name="empid_search" id="empid_search" placeholder="Search Employee ID to assign" class="form-control search-input input-lg">
					<input type="hidden" name="user_login" id="user_login" value="<?php echo $_SESSION['username_admin']; ?>" />
					<span class="input-group-btn">
						<button type="submit" id="search_emp" value="Search" name="search_emp" value="Search" class="btn btn-primary btn-lg">Search</button>
					</span> 
				</div>
			<div>
			<ul class="media-list media-list-linked chat-user-list" id="show_record"> </ul>
			</div>
				<div>
				  <table class="table table-striped custom-table ">
								<thead>
									<tr>
										<th>SN. </th>
										<th>EMPLOYEE ID </th>
										<th>PROJECT ID </th>
										<th>TASK NAME  </th>
										<th>TASK DESCRIPTION  </th>
										<th>SUBMITTED DATE  </th>
										<th>STATUS </th>
									</tr>
								</thead>
								<!--tbody id="assigned_tasks"></tbody-->
					</table>
				</div>
					<div class="m-t-20 text-center">
					<input type="hidden" name="user_login" id="user_login" value="<?php echo $_SESSION['username_admin']; ?>" />
					<input type="hidden" name="regular_user_login" id="regular_user_login" value="<?php echo $_SESSION['username_enrollid']; ?>" />
					<input type="hidden" name="task_ids" id="task_ids" value="" />
					<button type="submit" onclick="assign_to_emp1()" class="btn btn-primary btn-lg">Assign</button> 
					</div>
				</form>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	<div id="assignee" class="modal custom-modal fade" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="modal-content modal-lg">
          <div class="modal-header">
            <h4 class="modal-title">Task List of Project </h4>
          </div>
          <div class="modal-body">
		  <form method="post" name="assignee_form_pro" id="assignee_form_pro" >
					<div class="row">
					<div class="col-md-6">
							<div class="form-group">
								<label>Project ID</label>
								<input autocomplete="off" type="text" id="assign_pro_id" name="assign_pro_id" class="form-control" type="text">
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
            <!--div class="input-group m-b-30">
               <input  required autocomplete="off" type="text" name="empid_pro_search" id="empid_pro_search" placeholder="Enter Employee ID to add" class="form-control search-input input-lg">
			   <input type="hidden" name="user_login" id="user_login" value="<?php echo $_SESSION['username_admin']; ?>" />
              <span class="input-group-btn">
               <button type="submit" id="search_emp" value="Search" name="search_emp" value="Search" class="btn btn-primary btn-lg">Search</button>
              </span> </div-->
          <!--  <div > 
              <table class="table table-striped custom-table datatable">
						<thead>
							<tr>
								<th>SN. </th>
								<th>TASK NUMBER </th>
								<th>TASK NAME  </th>
								<th>TASK STATUS </th>
								<th>ACTION </th>
							</tr>
						</thead>
						<tbody id="show_assigned_members"></tbody>
						<tbody id="show_error_pro"></tbody>
					</table>
             
         <!--   </div>-->
		 <div>
		   <div id="show_msg_assigned"></div>
		  <table class="table table-striped custom-table ">
						<thead>
							<tr>
								<th>SN. </th>
								<th>TASK NAME  </th>
								<th>START DATE  </th>
								<th>END DATE  </th>
								<th>TASK STATUS </th>
								<th>ACTION </th>
							</tr>
						</thead>
						<tbody id="search_assigned_members"></tbody>
					</table>
			</div>
            <div class="m-t-50 text-center">
              <input type="hidden" name="user_login" id="user_login" value="<?php echo $_SESSION['username_admin']; ?>" />
			  <input type="hidden" name="regular_user_login" id="regular_user_login" value="<?php echo $_SESSION['username_enrollid']; ?>" />
				<input type="hidden" id="pro_ids" name="pro_ids" value="" />	
              <button type="submit" onclick="assign_emp_to_pro()" class="btn btn-primary btn-lg">Assign</button> 
            </div>
          </div>
				</form>
          </div>
        </div>
      </div>
	  
	  <!--this is to assign task to employee & search --->
	<div id="assignee" class="modal custom-modal fade center-modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="modal-content">
		<form method="post" name="assignee_form" id="assignee_form" >
        <div class="modal-header">
            <h3 class="modal-title">Assign to this task</h3>
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
				<label>Project Number <span class="text-danger">*</span></label>
				<select id="project_number" name="project_number" class="select">
					<option value="">Select Number</option>
					 <?php 
									
					$stmt = mysqli_query($func->dbo,"SELECT * FROM `projects` ");
							
					if ($stmt) 
					{
						while($row = mysqli_fetch_assoc($stmt))
							{
							   echo '<option  data-subtext="'.$row['PROJECT_ID'].'" value="'.$row['PROJECT_ID'].'">'.$row['PROJECT_NUMBER'].'=>'.$row["PROJ_NAME"].'</option>';
							}
					}
					?>
					
				</select>
			</div>
			</div>
			<div class="col-md-3">
			<div class="form-group">
				<label>Status</label>
				<select class="select" id="task_status" name="task_status">
				<option value=''>Select Status</option>
					<option value='Under Progress'>Under Progress</option>
					<option value="Pending">Pending</option>
					<option value="Completed">Completed</option>
					<option value="Expired">Expired</option>
				</select>
			</div>
			</div>
			<div class="form-group">
				<label> Task Description</label>
				<textarea rows="4" cols="5" id="task_description" name="task_description" class="form-control summernote" placeholder="Enter your task here"></textarea>
          </div>
          <div id="AssigneeModal" class="modal-body">
            <div class="input-group m-b-30">
               <input  required autocomplete="off" type="text" name="empid_search" id="empid_search" placeholder="Search Employee ID to assign" class="form-control search-input input-lg">
			   <input type="hidden" name="user_login" id="user_login" value="<?php echo $_SESSION['username_admin']; ?>" />
              <span class="input-group-btn">
               <button type="submit" id="search_emp" value="Search" name="search_emp" value="Search" class="btn btn-primary btn-lg">Search</button>
              </span> </div>
            <div>
              <ul class="media-list media-list-linked chat-user-list" id="show_record">
              </ul>
            </div>
			 <div>
		  <table class="table table-striped custom-table ">
						<thead>
							<tr>
								<th>SN. </th>
								<th>EMPLOYEE ID </th>
								<th>PROJECT ID </th>
								<th>TASK NAME  </th>
								<th>TASK DESCRIPTION  </th>
								<th>SUBMITTED DATE  </th>
								<th>STATUS </th>
							</tr>
						</thead>
						<tbody id="assigned_tasks"></tbody>
					</table>
			</div>
            <div class="m-t-50 text-center">
              <input type="hidden" name="user_login" id="user_login" value="<?php echo $_SESSION['username_admin']; ?>" />
			  <input type="hidden" name="regular_user_login" id="regular_user_login" value="<?php echo $_SESSION['username_enrollid']; ?>" />
              <input type="hidden" name="task_ids" id="task_ids" value="" />
              <button type="submit" onclick="assign_to_emp1()" class="btn btn-primary btn-lg">Assign</button> <!--onclick="assign_to_emp('.$row['TASK_ID'].')"-->
            </div>
          </div>
		  </form>
        </div>
      </div>
    </div>
	</div>
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

/*$(function() { 
     
		$(document).ajaxStart(function(){
		$("#wait").css("display", "block");
			});
		$(document).ajaxComplete(function(){
		$("#wait").css("display", "none");
		});
				

		var user_login=$("#user_login").val();
		var user_login_id=$("#user_login_id").val();
		var pro_id=$("#pro_id").val();
		var form_data="page=proj_list_page&user_login="+user_login+"&user_login_id="+user_login_id;
		//alert(form_data);
		$.ajax({
			url:'view_task_ajax.php',
			type:'POST',
			data:form_data,
			async:true,
			cache: false,
			success: function(result){
			var res_data= jQuery.parseJSON(result);
			console.log(res_data.table_data);
			$("#show_record").html(res_data.table_data);

				}
		});
	
});
	
*/

	$(document).on('submit','#add_task_form',function(e){

	var conf=confirm("Are you sure want to add it!.");
	if(conf==true)
	{        
			e.preventDefault();
			$(document).ajaxStart(function(){
			$("#wait").css("display", "block");
			});
			$(document).ajaxComplete(function(){
				$("#wait").css("display", "none");
			});
			
			var data_all=$("#add_task_form").serialize();
			var user_login=$("#user_login").val();
			var pro_id=$("#pro_id").val();
			var form_data="page=create_task_page&"+data_all+"&user_login="+user_login+"&pro_id="+pro_id;
			$.ajax({
				url:'tasks_ajax1.php',
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
					}else {
					$("#exampleModal")
					.modal("show")
					.on("shown.bs.modal", function () {
						$("#show_msg").html("<p>Process has been done successfully.</p>"); 
						window.setTimeout(function () {
							$("#exampleModal").modal("hide");
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
	});		
	
});



$(document).on('submit','#assignee_form',function(e){
       
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
				
				$("#task_id").val(task_id);
				$("#empid_search").val(empid_search);
				var data_all=$("#assignee_form").serialize();
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
					$("#show_record").html(res_data.table_data).modal('show');
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
	
	
	//assign this task to employee
	 function assign_to_emp1()
  {
	  
	  $("#show_msg").html("");
	  $("#show_msg1").html("");
	
	var start_date=$("#fromdate_assign").val();
	var end_date=$("#todate_assign").val();
	var empid_search=$("#empid_search").val();
	var user_login=$("#user_login").val();
	var task_id1=$("#task_ids").val();
	var pronumber=$("#project_number").val();
	var task_status=$("#task_status").val();
	var task_description=$("#task_description").val();
	var data =$("#assignee_form").serialize();
	
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

	var form_data="page=assign_to_emp1&task_id="+task_id1+"&user_login="+user_login+"&start_date="+start_date+"&end_date="+end_date+"&empid_search="+empid_search+"&pronumber="+pronumber+"&task_status="+task_status+"&task_description="+task_description;
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
				} else{		
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
  
  //to assign to this project 
  function add_assign_emp_pro(assign_pro_id,assign_projleader,assign_projteam,assign_dev_id,assign_dev_id1,assigned_date)
  {
//	alert(assign_pro_id);
	$("#assign_pro_id").val(assign_pro_id);
	$("#assign_projleader").val(assign_projleader);
	$("#assign_projteam").val(assign_projteam);
	$("#assign_dev_id").val(assign_dev_id);
	$("#assign_dev_id1").val(assign_dev_id1);
	$("#assigned_date").val(assigned_date);
	//$("#AssigneeModal").modal('show');
	
		
	var assign_pro_id=$("#assign_pro_id").val();
	var empid_pro_search=$("#empid_pro_search").val();
	var assigned_date=$("#assigned_date").val();
	var data_all=$("#assignee_form_pro").serialize();
	var form_data="page=project_members&="+data_all+"&assign_pro_id="+assign_pro_id+"&empid_pro_search="+empid_pro_search;
//	alert(form_data);
	$.ajax({
		url:'view_task_ajax.php',
		type:'POST',
		data:form_data,
		async:true,
		cache: false,
		success: function(result){
		var result_data= jQuery.parseJSON(result);	
		console.log(result_data.table_data);
		$("#search_assigned_members").html(result_data.table_data).modal('show');
				
					
					
			}
			
		});
	
  }

  //to assign this task 
  function add_assign_emp_task(task_id,fromdate_assign,todate_assign,project_number,task_status,task_description)
  {
	//alert(task_id);
	$("#AssigneeModal1").modal('show');
	$("#task_ids").val(task_id);
	$("#fromdate_assign").val(fromdate_assign);
	$("#todate_assign").val(todate_assign);
	$("#project_number").val(project_number);
	$("#task_status").val(task_status);
	$("#task_description").val(task_description);
	
	var task_id=$("#task_ids").val();
	var empid_search=$("#empid_search").val();
	var data_all=$("#assignee_form_task").serialize();
	var form_data="page=all_tasks&="+data_all+"&task_id="+task_id+"&empid_search="+empid_search;
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
		$("#assigned_tasks").html(result_data.table_data).modal('show');
				
					
					
			}
			
		});
	
  }


   function delete_tasknumber(task_id)
    {	
		$("#task_ids").val(task_id);
		var conf=confirm("Are you sure want to Delete Task?");
		if(conf==true)
		{        

		 var task_id1=$("#task_ids").val();
		 var form_data="page=delete_tasknumber&task_id="+task_id1;
			$.ajax({
				url:'tasks_ajax1.php',
				type:'POST',
				data:form_data,
				async:true,
				cache: false,
				success: function(result){
					//console.log(result);
						window.setTimeout(function () {
							$("#exampleModal").modal("hide");
							location.reload(); 
						}, 2000);                 

					
					
					
					
				}
			});
			}
		
		else {
			return false;
			
		}

		
   }
   
  function view_task_details(assign_pro_id){
	//alert(assign_pro_id);
	$("#assign_pro_id").val(assign_pro_id);
	$("#assigned_date").val(assigned_date);
	

	
	
}
  
 
</script>
<script>
$(document).ready(function(){
/*	
$(document).on('submit','#create_task_form',function(e){
	
	var projecttype=$("#project_type").val();	
	var projectstatus=$("#project_status").val();
	var projectid=$("#project_id").val();
	var proj_leader = $('#projleader').val();
	var proj_team = $('#projteam').val();
	var project_name = $('#projname').val();
	
	
	if(projectid=='') {
		$.alert({
			title: 'Alert!',
			content: "Please Project id should not be empty.",
		});
			$("#project_id").focus();
			return false;
		  }

	
	if(/^[a-zA-Z0-9- ]*$/.test(project_name) == false) {
	 $.alert({
		title: 'Alert!',
		content: "Please Project name contains illegal characters.",
	});
		return false;
	}
	
	if(proj_leader=='') {
		$.alert({
			title: 'Alert!',
			content: "Please Project leader should not be empty.",
		});
			$("#projteam").focus();
			return false;
		  }
		  
	if(/^[a-zA-Z0-9- ]*$/.test(proj_leader) == false) {
		 $.alert({
			title: 'Alert!',
			content: "Please Project leader contains illegal characters.",
		});
		return false;
	}	
	
		  
	if(proj_team=='') {
		$.alert({
			title: 'Alert!',
			content: "Please Project team should not be empty.",
		});
			$("#projteam").focus();
			return false;
		  }
	if(/^[a-zA-Z0-9- ]*$/.test(proj_team) == false) {
		 $.alert({
			title: 'Alert!',
			content: "Please Project id contains illegal characters.",
		});
		return false;
	}
	
	if(projectstatus=='') {
		$.alert({
			title: 'Alert!',
			content: "Please Project status should not be empty.",
		});
			$("#project_status").focus();
			return false;
		  }
		  
		 
		 if(projecttype=='') {
		$.alert({
			title: 'Alert!',
			content: "Please Project type should not be empty.",
		});
			$("#project_type").focus();
			return false;
		  }
		var conf=confirm("Are you sure want to add it!.");
		if(conf==true)
		{        
				e.preventDefault();
				$(document).ajaxStart(function(){
				$("#wait").css("display", "block");
				});
				$(document).ajaxComplete(function(){
					$("#wait").css("display", "none");
				});
				
				$("#show_msg").html("<p>Process has been added successfully</p>");
				var data_all=$("#create_task_form").serialize();
				var form_data="page=add_project_page&"+data_all;
				$.ajax({
					url:'project_list_ajax.php',
					type:'POST',
					data:form_data,
					async:true,
					cache: false,
					success: function(result){
						console.log(result);
						$("#exampleModal1")
								.modal("show")
								.on("shown.bs.modal", function () {
									window.setTimeout(function () {
										$("#exampleModal1").modal("hide");
										location.reload(); 
									}, 2000);                 
								});
					
						}
				
	});
		
		}
		else {
			return false;
			
		}
	});	
	
$(function() {  
			
	$(document).ajaxStart(function(){
	$("#wait").css("display", "block");
	});
	$(document).ajaxComplete(function(){
		$("#wait").css("display", "none");
	});
	
	var user_login=$("#user_login").val();
	var regular_user_login=$("#regular_user_login").val();
	var end_date=$("#end_date").val();
	var task_id=$("#task_id").val();
	var pro_id=$("#pro_id").val();
	
	$("#pro_id").val(pro_id);
	var form_data="page=select_projects&user_login="+user_login+"&regular_user_login="+regular_user_login+"&task_id="+task_id+"&pro_id="+pro_id;
	$.ajax({
		url:'tasks_ajax1.php',
		type:'POST',
		data:form_data,
		async:true,
		cache: false,
		success: function(result){
			var res_data= jQuery.parseJSON(result);
			//console.log(res_data.table_data);
			$("#show_projects").html(res_data.table_data);
			
						

				}
		});
	});		*/

});

function add_to_project(pro_id){
	//alert(pro_id);
	$("#create_task").modal('show');
	$("#pro_id").val(pro_id);
	

	
	
}
</script>
<script>
$(document).ready(function(e) {
	
	var table = $('#pro_task_list').DataTable();
	table.destroy();
	$('#pro_task_list').DataTable({
		"processing": true,
		"bLengthChange": false,
		//"scrollX": true,
		//"scrollY": 200,
		"searching":false,
		"serverSide": true,
		"fixedColumns": true,
		//"bPaginate": false,
		"bFilter": false,
		"bInfo": false,
		"bAutoWidth": false,
		"bSortClasses": false,
		"displayLength":10,
		'columnDefs': [
		 {
			  "targets": 3,
			  "className": "text-right",
		 }],
		"ajax": {
			"url": "datatables.php",
			"data": function ( d ) 
			{
			d.page="view_task_datatable";
			
			}

		}

	});
	
	


});
</script>
</body>
</html>