
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
							<h4 class="page-title">Projects</h4>
						</div>
						<div class="col-sm-8 text-right m-b-20">
							<a href="#" class="btn btn-primary rounded pull-right" data-toggle="modal" data-target="#create_project"><i class="fa fa-plus"></i> Create Project</a>
							<div class="view-icons">
								<a href="projects.php" class="grid-view btn btn-link"><i class="fa fa-th"></i></a>
								<a href="project-list.php" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a>
							</div>
						</div>
					</div>
					<div class="row filter-row">
					 <form name="search_byprojename" id="search_byprojename" method="post" >
						<div class="col-sm-3 col-xs-6">  
							<div class="form-group form-focus">
								<label class="control-label">Project ID</label>
								<input autocomplete="off" id="pronumber_search" name="pronumber_search"  type="text" class="form-control floating" />
							</div>
						</div>
						<div class="col-sm-3 col-xs-6">  
							<div class="form-group form-focus">
								<label class="control-label">Project Name</label>
								<input autocomplete="off" id="projectname_search" name="projectname_search" type="text" class="form-control floating" />
							</div>
						</div>
						<div class="col-sm-3 col-xs-6"> 
							<div class="form-group form-focus select-focus">
								<label class="control-label">Project Status</label>
									<select class="select floating" id="project_status_search" name="project_status_search">
											    <option value="">Select Project Status</option>
												<option value="Under Progress">Under Progress</option>
												<option value="Pending">Pending</option>
												<option value="Submitted">Submitted</option>
												<option value="Declined">Declined</option>
											</select>
								
							</div>
						</div>
						<div class="col-sm-3 col-xs-6"> 
							<input type="submit" id="search_project" value="Search" name="search_project" value="Search" class="btn btn-success btn-block" />				
						</div>    
					</form>
                    </div>
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table id="taskstable123" class="table table-striped custom-table datatable">
									<thead>
										<tr>
											<th>PROJECT ID</th>
											<th>PROJECT NAME </th>
											<th>CREATED BY</th>
											<th>PROJECT TYPE</th>
											<th>PROJECT STATUS</th>
											<th>START DATE</th>
											<th>CLOSED DATE</th>
											<th>COMPLETION DATE</th>
											<th>PRIORITY</th>
											<th class="text-right">ACTION</th>
								
										</tr>
									</thead>
									<tbody id="show_record"></tbody>
									<tbody id="show_all_record"></tbody>
									<tbody id="show_no_record"></tbody>
									<tbody id="show_error"></tbody>
									
									
								</table>
							</div>
						</div>
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
            
    <div id="create_project" class="modal custom-modal fade" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="modal-content modal-lg">
          <div class="modal-header">
            <h4 class="modal-title">Create Project</h4>
          </div>
          <div class="modal-body">
 <form method="post" name="create_project_form" id="create_project_form" >
								<div class="row">
								<div class="col-md-6">
										<div class="form-group">
											<label>Project ID</label>
											<input autocomplete="off" type="text" id="project_id" name="project_id" class="form-control" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Project Name</label>
											<input autocomplete="off" type="text"  id="projname" name="projname" class="form-control" value="">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
									  <div class="form-group">
										<label>Start Date</label>
										<div class="cal-icon">
										  <input required autocomplete="off" type="text" class="form-control datetimepicker" name="start_date" id="start_date" /></div>
										</div>
									  </div>
									<div class="col-md-6">
										<div class="form-group" >
											<label>End Date</label>
											<div class="cal-icon">
											<input required autocomplete="off" type="text" class="form-control datetimepicker" style="" name="end_date" id="end_date" /></div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label> Completion Date </label>
											<div class="cal-icon">
											<input required autocomplete="off" type="text" class="form-control datetimepicker" name="completion_date" id="completion_date"/></div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Priority</label>
											<select class="select" id="priority" name="priority">
												<option value='High'>High</option>
												<option value="Medium">Medium</option>
												<option value="Low">Low</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Client</label>
											<select class="select" name="client_name" id="client_name">
												<option value="">Global Technologies</option>
												<option value="1">Delta Infotech</option>
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Project Status</label>
											<select class="select" id="project_status" name="project_status">
											    <option value="">Select Project Status</option>
												<option value="Under Progress">Under Progress</option>
												<option value="Pending">Pending</option>
												<option value="Submitted">Submitted</option>
												<option value="Declined">Declined</option>
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Project Type</label>
											<select class="select" id="project_type" name="project_type">
												<option value="">Select Project Type</option>
												<option value="1">Mobile Development</option>
												<option value="2">Computer Software Development</option>
												<option value="3">System Installation</option>
											</select>
										</div>
									</div>
									
								</div>
								<div class="form-group">
									<label>Description</label>
									<textarea rows="4" cols="5" id="description" name="description" class="form-control summernote" placeholder="Enter your message here"></textarea>
								</div>
								<!--div class="form-group">
									<label>Upload Files</label>
									<input class="form-control" type="file">
								</div-->
								<div class="m-t-20 text-center">
									<input type="hidden"  id="proid" name="proid" value="" />
									<button  type="submit" value="Add" name="submit" id="submit" class="btn btn-primary">Create Project</button>
								</div>
							</form>
          </div>
        </div>
      </div>
    </div>
	<div id="assignee" class="modal custom-modal fade" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="modal-content modal-lg">
          <div class="modal-header">
            <h4 class="modal-title">Assign to this Project</h4>
          </div>
          <div class="modal-body">
		  <form method="post" name="assignee_form" id="assignee_form" >
				<div class="row">
				<div class="col-md-6">
						<div class="form-group">
							<label>Project ID <span class="text-danger">*</span></label>
							<input readonly autocomplete="off" type="text" id="assign_pro_id" name="assign_pro_id" class="form-control" type="text">
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
               <input  required autocomplete="off" type="text" name="empid_pro_search" id="empid_pro_search" placeholder="Enter Employee ID to add" class="form-control search-input input-lg">
			   <input type="hidden" name="user_login" id="user_login" value="<?php echo $_SESSION['username_admin']; ?>" />
              <span class="input-group-btn">
               <button type="submit" id="search_emp" value="Search" name="search_emp" value="Search" class="btn btn-primary btn-lg">Search</button>
              </span> </div>
              <table class="table table-striped custom-table datatable">
					<thead>
						<tr>
							<th>SN. </th>
							<th>EMPLOYEE NUMBER </th>
							<th>NAME </th>
							<th>DESIGNATION </th>
						</tr>
					</thead>
					<tbody id="show_assigned_members"></tbody>
					<tbody id="show_error_pro"></tbody>
			 </table>
		 <div>
		   <div id="show_msg_assigned"></div>
		  <table class="table table-striped custom-table ">
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
	
$(document).on('submit','#search_byprojename',function(e){
	
				e.preventDefault();
				$(document).ajaxStart(function(){
				$("#wait").css("display", "block");
				});
				$(document).ajaxComplete(function(){
					$("#wait").css("display", "none");
				});
				
				
				var projectname_search=$("#projectname_search").val();
				var pronumber_search=$("#pronumber_search").val();
				var project_status_search=$("#project_status_search").val();

				
			if(pronumber_search=='') {
				$.alert({
					title: 'Alert!',
					content: "Please Project number should not be empty.",
				});
					$("#pronumber_search").focus();
					return false;
				  }
				  
				var form_data="page=project_search_page&projectname_search="+projectname_search+"&pronumber_search="+pronumber_search+"&project_status_search="+project_status_search;
				
				$.ajax({
					url:'project_list_ajax.php',
					type:'POST',
					data:form_data,
					async:true,
					cache: false,
					success: function(result){
					var res_data= jQuery.parseJSON(result);
					if(res_data.table_data!=''){
						$("#show_record").html(res_data.table_data);
						$("#show_record").show();
						$("#show_no_record").hide();
					}
					if(res_data.table_data==''){
					$("#show_no_record").html('<tr class="odd"><td valign="top" colspan="10" class="dataTables_empty">No data available in table</td></tr>');
					$("#show_record").hide();
					$("#show_no_record").show();
					}
					

				}
			});
		
	});

	
	
$(document).on('submit','#create_project_form',function(e){

	var projecttype=$("#project_type").val();	
	var projectstatus=$("#project_status").val();
	var projectid=$("#project_id").val();
	var proj_leader = $('#projleader').val();
	var proj_team = $('#projteam').val();
	var devid=$("#dev_id").val();
	var devid1=$("dev_id1").val();
	var project_name = $('#projname').val();
	var emp_datalist=$("#emp_datalist").val();
	var team_emp_datalist=$("#team_emp_datalist").val();
	var dev_emp_datalist=$("#dev_emp_datalist").val();
	var dev_emp_datalist1=$("#dev_emp_datalist1").val();
	
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
		  	
	if(devid=='') {
		$.alert({
			title: 'Alert!',
			content: "Please Developer ID should not be empty.",
		});
			$("#dev_id").focus();
			return false;
		  }
	if(/^[a-zA-Z0-9- ]*$/.test(devid) == false) {
		 $.alert({
			title: 'Alert!',
			content: "Please Developer ID contains illegal characters.",
		});
		return false;
	}
	
	if(devid1=='') {
		$.alert({
			title: 'Alert!',
			content: "Please 2nd Developer ID should not be empty.",
		});
			$("#dev_id1").focus();
			return false;
		  }
	if(/^[a-zA-Z0-9- ]*$/.test(devid1) == false) {
		 $.alert({
			title: 'Alert!',
			content: "Please 2nd Developer ID contains illegal characters.",
		});
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
				
				
				
				var data_all=$("#create_project_form").serialize();
				var form_data="page=add_project_page&"+data_all;
				//alert(form_data);
				$.ajax({
					url:'project_list_ajax.php',
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
					$("#exampleModal1")
								.modal("show")
								.on("shown.bs.modal", function () {
								$("#show_msg").html("<p>Process has bees Done successfully.</p>");
									window.setTimeout(function () {
										$("#exampleModal1").modal("hide");
										location.reload(); 
									}, 4000);                 
								});
							
					}
					
			}
		});
		
		}else {
			return false;
			
		}
	});
	
	
$(document).on('submit','#assignee_form',function(e){
       
		e.preventDefault();
		$(document).ajaxStart(function(){
		$("#wait").css("display", "block");
		});
		$(document).ajaxComplete(function(){
			$("#wait").css("display", "none");
		});
		
		var empid_pro_search=$("#empid_pro_search").val();

		
		$("#empid_pro_search").val(empid_pro_search);
		var assign_pro_id=$("#assign_pro_id").val();
		var empid_pro_search=$("#empid_pro_search").val();
		var form_data="page=search_emp_pro&empid_pro_search="+empid_pro_search+"&assign_pro_id="+assign_pro_id;
		//alert(form_data);
		$.ajax({
			url:'project_list_ajax.php',
			type:'POST',
			data:form_data,
			async:true,
			cache: false,
			success: function(result){
			var result_data= jQuery.parseJSON(result);
			if(result_data.table_data==1){
		   $("#show_assigned_members").html('<div><tr class="odd"><td valign="top" colspan="10" class="dataTables_empty">No data available in table</td></tr></div>').modal('show');
						
					}else{
						
			console.log(result_data.table_data);
			$("#show_assigned_members").html(result_data.table_data).modal('show');
					}
					
					
			}
			
		});
		
	});

});

 	 function assign_emp_to_pro()
  {
	  
	  var conf=confirm("Are You Sure Want to Assign Employee?");
		if(conf==true)
		{        

	//var pro_id1=$("#pro_ids").val();
	var assign_pro_id=$("#assign_pro_id").val();
	var data_all=$("#assignee_form").serialize();
	var assigned_date=$("#assigned_date").val();
	var empid_pro_search=$("#empid_pro_search").val();
	
		if(empid_pro_search=='') {
		$.alert({
			title: 'Alert!',
			content: "Please Enter Employee Codes First.",
		});
			$("#empid_pro_search").focus();
			return false;
		  }

	var form_data="page=assign_emp_to_pro&"+data_all+"&assigned_date="+assigned_date;
	
		$.ajax({
			url:'project_list_ajax.php',
			type:'POST',
			data:form_data,
			async:true,
			cache: false,
			success: function(result){
				console.log(result);
				if(result==2){			
			$("#exampleModal1")
			.modal("show")
			.on("shown.bs.modal", function () {
			$("#show_msg").html("<p>Employee has bees assigned successfully.</p>");
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
	  }else {
			return false;
			
		}
	  
  }
  
    function add_assign_emp(assign_pro_id,assigned_date)
  {
	
	$("#assign_pro_id").val(assign_pro_id);
	$("#assigned_date").val(assigned_date);
	//$("#AssigneeModal").modal('show');
	
	
		
	var assign_pro_id=$("#assign_pro_id").val();
	var empid_pro_search=$("#empid_pro_search").val();
	var empid_search=$("#empid_search").val();
	var assigned_date=$("#assigned_date").val();
	var data_all=$("#assignee_form").serialize();
	var form_data="page=project_members&="+data_all+"&assign_pro_id="+assign_pro_id+"&empid_pro_search="+empid_pro_search;
	
	$.ajax({
		url:'project_list_ajax.php',
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

 function edit_new_project(project_id,projname,client_name,project_status,project_type, priority,start_date,end_date,completion_date)
    {
		$("#create_project").modal('show');
		$("#project_id").val(project_id);
		$("#projname").val(projname);
		$("#client_name").val(client_name);
		$("#project_status").val(project_status);
		$("#project_type").val(project_type);
		$("#priority").val(priority);
		$("#start_date").val(start_date);
		$("#end_date").val(end_date);
		$("#completion_date").val(completion_date);
		


		
   }
   function delete_project(project_id)
    {
		var conf=confirm("Are you sure want to delete this!.");
		if(conf==true)
		{    
		$("#project_id").val(project_id);
		
		   var form_data="page=delete_projectname&project_id="+project_id;
			$.ajax({
				url:'project_list_ajax.php',
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
						$("#show_msg").html("<p>This Project Has been Deleted</p>");
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
   


</script>
<script>
$(document).ready(function(e) {
	
	var table = $('#taskstable123').DataTable();
	table.destroy();
	var pronumber_search=$("#pronumber_search").val();
	$('#taskstable123').DataTable({
		"processing": true,
		"bLengthChange": false,
		//"scrollX": true,
		//"scrollY": 200,
		"searching":false,
        "serverSide": true,
		"ajax": {
			"url": "project_list_ajax.php",
			"data": function ( d ) 
			{
			d.page="manage_projects";
			d.pronumber_search=$('#pronumber_search').val();
			}

		}

	});


});
</script>
    </body>
</html>