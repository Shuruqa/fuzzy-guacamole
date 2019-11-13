
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
					<div class="row" id="">
						<div class="col-xs-8">
							<h4 class="page-title">Project Details</h4>
						</div>
						<div class="col-sm-4 text-right m-b-30">
							<form name="view_project_form" id="view_project_form" method="post" action="">
							<?php 
							$stmt = mysqli_query($func->dbo,"SELECT * FROM `projects` where`PROJECT_ID`=".$_REQUEST['pro_id']."");
					

							 $inc=1;
							 while($row = mysqli_fetch_assoc($stmt))
							 {
							echo '<a href="" onclick="edit_new_project('.$row['PROJECT_ID'].','."'".$row['PROJ_NAME']."'".','."'".$row['CLIENT_NAME']."'".','."'".$row['PROJECT_STATUS_CODE']."'".','.$row['EMP_ID'].','."'".$row['PRIORITY']."'".','."'".$row['START_DATE']."'".','."'".$row['CLOSED_DATE']."'".','."'".$row['COMPLETION_DATE']."'".','."'".$row['PRIORITY']."'".','."'".$row['EMP_ID_TEAM']."'".')"  class="btn btn-primary rounded" data-toggle="modal" data-target="#edit_project"><i class="fa fa-plus"></i> Edit Project</a>
							<input type="hidden" id="pro_ids" value="'.$_GET['pro_id'].'" name="pro_ids">';
							 }
							
							?>
						</div>
					</div>
					<div class="row">
				
						<div class="col-lg-9">
							<div class="panel" id="view_projects">
								
							</div>
							<!--input type="hidden" name="pro_id" id="pro_id" value="" /-->
							<input type="hidden" name="user_login" id="user_login" value="<?php echo $_SESSION['login_username']; ?>" />
							<input type="hidden" name="user_login_id" id="user_login_id" value="<?php echo $_SESSION['username_admin']; ?>" />
							<input  type="hidden"  id="pro_id" value="<?php echo $_GET['pro_id'];?>" name="pro_id">
						</form>
							<div class="panel">
								<div class="panel-body">
				                    <h5 class="panel-title m-b-20">Uploaded image files</h5>
									<div class="row">
										<div class="col-md-3 col-sm-6">
											<div class="thumbnail">
												<div class="thumb">
													<img src="images/placeholder.png" class="img-responsive" alt="">
												</div>
												<div class="caption text-center">
													 demo.png
												</div>
											</div>
										</div>
										<div class="col-md-3 col-sm-6">
											<div class="thumbnail">
												<div class="thumb">
													<img src="images/placeholder.png" class="img-responsive" alt="">
												</div>
												<div class="caption text-center">
													 demo.png
												</div>
											</div>
										</div>
										<div class="col-md-3 col-sm-6">
											<div class="thumbnail">
												<div class="thumb">
													<img src="images/placeholder.png" class="img-responsive" alt="">
												</div>
												<div class="caption text-center">
													 demo.png
												</div>
											</div>
										</div>
										<div class="col-md-3 col-sm-6">
											<div class="thumbnail">
												<div class="thumb">
													<img src="images/placeholder.png" class="img-responsive" alt="">
												</div>
												<div class="caption text-center">
													 demo.png
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="panel">
								<div class="panel-body">
									<h5 class="panel-title m-b-20">Uploaded files</h5>
									<ul class="files-list">
										<li>
											<div class="files-cont">
												<div class="file-type">
													<span class="files-icon"><i class="fa fa-file-pdf-o"></i></span>
												</div>
												<div class="files-info">
													<span class="file-name text-ellipsis"><a href="#">AHA Selfcare Mobile Application Test-Cases.xls</a></span>
													<span class="file-author"><a href="#">John Doe</a></span> <span class="file-date">May 31st at 6:53 PM</span>
													<div class="file-size">Size: 14.8Mb</div>
												</div>
												<ul class="files-action">
													<li class="dropdown">
														<a href="" class="dropdown-toggle btn btn-default btn-xs" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
														<ul class="dropdown-menu">
															<li><a href="javascript:void(0)">Download</a></li>
															<li><a href="#" data-toggle="modal" data-target="#share_files">Share</a></li>
															<li><a href="javascript:void(0)">Delete</a></li>
														</ul>
													</li>
												</ul>
											</div>
										</li>
										<li>
											<div class="files-cont">
												<div class="file-type">
													<span class="files-icon"><i class="fa fa-file-pdf-o"></i></span>
												</div>
												<div class="files-info">
													<span class="file-name text-ellipsis"><a href="#">AHA Selfcare Mobile Application Test-Cases.xls</a></span>
													<span class="file-author"><a href="#">Richard Miles</a></span> <span class="file-date">May 31st at 6:53 PM</span>
													<div class="file-size">Size: 14.8Mb</div>
												</div>
												<ul class="files-action">
													<li class="dropdown">
														<a href="" class="dropdown-toggle btn btn-default btn-xs" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
														<ul class="dropdown-menu">
															<li><a href="javascript:void(0)">Download</a></li>
															<li><a href="#" data-toggle="modal" data-target="#share_files">Share</a></li>
														</ul>
													</li>
												</ul>
											</div>
										</li>
									</ul>
								</div>
							</div>
							<div class="project-task">
								<div class="tabbable">
									<ul class="nav nav-tabs nav-tabs-top nav-justified m-b-0">
										<li class="active"><a href="#all_tasks" data-toggle="tab" aria-expanded="true">All Tasks</a></li>
										<li><a href="#pending_tasks" data-toggle="tab" aria-expanded="false">Pending Tasks</a></li>
										<li><a href="#completed_tasks" data-toggle="tab" aria-expanded="false">Completed Tasks</a></li>
									</ul>
									<div class="tab-content">
										<div class="tab-pane active" id="all_tasks">
											<div class="task-wrapper">
												<div class="task-list-container">
													<ul id="task-list">
														<li class="task">
															<div class="task-list-container">
														<form method="post" name="add_task_form" id="add_task_form" >
															 <input  type="hidden"  id="<?php echo $_GET['pro_id'];?>" value="<?php echo $_GET['pro_id'];?>" name="pro_id">
																<div class="task-list-body" id="show_record1">
																</div>
																 <div class="task-list-body" id="show_task_record">
																</div>
																<div class="task-list-footer">
																  <div class="new-task-wrapper">
																  <input type="hidden" name="user_login" id="user_login" value="<?php echo $_SESSION['username_admin']; ?>" />
																	<textarea type="text" id="new_task" name="new_task" placeholder="Enter new task here. . ."></textarea>
																	<span class="error-message hidden">You need to enter a task first</span> <input type="submit" value="Add Task" name="submit" id="submit" class="add-new-task-btn btn" id="add-task"/><span class="cancel-btn btn" id="close-task-panel">Close</span> </div>
																</div>
																 </form>
															  </div>
															</li>
														</ul>
												
													<div class="task-list-footer">
														<div class="new-task-wrapper">
															<textarea  id="new-task" placeholder="Enter new task here. . ."></textarea>
															<span class="error-message hidden">You need to enter a task first</span>
															<span class="add-new-task-btn btn" id="add-task">Add Task</span>
															<span class="cancel-btn btn" id="close-task-panel">Close</span>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane" id="pending_tasks"></div>
										<div class="tab-pane" id="completed_tasks"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="panel">
								<div class="panel-body">
									<h6 class="panel-title m-b-15">Project details</h6>
									<table class="table table-striped table-border">
										<tbody id="project_details_table">
											<!--tr>
												<td>Cost:</td>
												<td class="text-right">$1200</td>
											</tr>
											<tr>
												<td>Total Hours:</td>
												<td class="text-right">100 Hours</td>
											</tr>
											<tr>
												<td>Created:</td>
												<td class="text-right">25 Feb, 2017</td>
											</tr>
											<tr>
												<td>Deadline:</td>
												<td class="text-right">12 Nov, 2017</td>
											</tr>
											<tr>
												<td>Priority:</td>
												<td class="text-right">
													<div class="btn-group">
														<a href="#" class="label label-danger dropdown-toggle" data-toggle="dropdown">Highest <span class="caret"></span></a>
														<ul class="dropdown-menu dropdown-menu-right">
															<li><a href="#"><i class="fa fa-dot-circle-o text-danger"></i> Highest priority</a></li>
															<li><a href="#"><i class="fa fa-dot-circle-o text-info"></i> High priority</a></li>
															<li><a href="#"><i class="fa fa-dot-circle-o text-primary"></i> Normal priority</a></li>
															<li><a href="#"><i class="fa fa-dot-circle-o text-success"></i> Low priority</a></li>
														</ul>
													</div>
												</td>
											</tr>
											<tr>
												<td>Created by:</td>
												<td class="text-right"><a href="profile.html">Barry Cuda</a></td>
											</tr>
											<tr>
												<td>Status:</td>
												<td class="text-right">Working</td>
											</tr-->
										</tbody>
									</table>
									<p class="m-b-5">Progress <span class="text-success pull-right">40%</span></p>
									<div class="progress progress-xs m-b-0">
										<div class="progress-bar progress-bar-success" role="progressbar" data-toggle="tooltip" title="40%" style="width: 40%"></div>
									</div>
								</div>
							</div>
							<div class="panel project-user" id="project_users">
								<!--div class="panel-body">
									<h6 class="panel-title m-b-20">Assigned Leader <a class="pull-right btn btn-primary btn-xs" data-toggle="modal" data-target="#assign_leader"><i class="fa fa-plus"></i> Add</a></h6>
									<ul class="list-box">
										<li>
											<a href="profile.html">
												<div class="list-item">
													<div class="list-left">
														<span class="avatar">W</span>
													</div>
													<div class="list-body">
														<span class="message-author">Wilmer Deluna</span>
														<div class="clearfix"></div>
														<span class="message-content">Team Leader</span>
													</div>
												</div>
											</a>
										</li>
										<li>
											<a href="profile.html">
												<div class="list-item">
													<div class="list-left">
														<span class="avatar">L</span>
													</div>
													<div class="list-body">
														<span class="message-author">Lesley Grauer</span>
														<div class="clearfix"></div>
														<span class="message-content">Team Leader</span>
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
											<a href="profile.html">
												<div class="list-item">
													<div class="list-left">
														<span class="avatar">J</span>
													</div>
													<div class="list-body">
														<span class="message-author">John Doe</span>
														<div class="clearfix"></div>
														<span class="message-content">Web Designer</span>
													</div>
												</div>
											</a>
										</li>
										<li>
											<a href="profile.html">
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
										</li>
									</ul>
								</div-->
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
            </div>
			<div id="assign_leader" class="modal custom-modal fade center-modal" role="dialog">
		  <div class="modal-dialog">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<div class="modal-content">
					<form method="post" name="assignee_leader_form" id="assignee_leader_form" >
						<div class="modal-header">
							<h3 class="modal-title">Assign Leader to this project</h3>
						</div>
						<div class="modal-body">
							<div class="input-group m-b-30">
								<input type="hidden" name="user_login" id="user_login" value="<?php echo $_SESSION['username_admin']; ?>" />
								<input  required autocomplete="off" name="empid_search_leader" id="empid_search_leader" placeholder="Search to add a leader" class="form-control search-input input-lg" type="text">
								<span class="input-group-btn">
									<button type="submit" id="search_emp" value="Search" name="search_emp" value="Search" class="btn btn-primary btn-lg">Search</button>
								</span>
							</div>
							<div>
								<ul class="media-list media-list-linked chat-user-list" id="show_leader_record">
									<!--li class="media">
										<a href="#" class="media-link">
											<div class="media-left"><span class="avatar">R</span></div>
											<div class="media-body media-middle text-nowrap">
												<div class="user-name">Richard Miles</div>
												<span class="designation">Web Developer</span>
											</div>
										</a>
									</li>
									<li class="media">
										<a href="#" class="media-link">
											<div class="media-left"><span class="avatar">J</span></div>
											<div class="media-body media-middle text-nowrap">
												<div class="user-name">John Smith</div>
												<span class="designation">Android Developer</span>
											</div>
										</a>
									</li>
									<li class="media">
										<a href="#" class="media-link">
											<div class="media-left">
												<span class="avatar">
													<img src="images/user.jpg" alt="John Doe">
												</span>
											</div>
											<div class="media-body media-middle text-nowrap">
												<div class="user-name">Jeffery Lalor</div>
												<span class="designation">Team Leader</span>
											</div>
										</a>
									</li-->
								</ul>
							</div>
							<div class="m-t-50 text-center">
							  <input type="hidden" name="user_login" id="user_login" value="<?php echo $_SESSION['username_admin']; ?>" />
							  <input type="hidden" name="regular_user_login" id="regular_user_login" value="<?php echo $_SESSION['username_enrollid']; ?>" />
							  <!--input type="hidden" name="pro_id" id="pro_id" value="" /-->
							  <input  type="hidden"  id="pro_ids" value="<?php echo $_GET['pro_id'];?>" name="pro_ids">
							  <button type="submit" onclick="assign_to_leader()" class="btn btn-primary btn-lg">Add Leader</button> 
							</div>
						</div>
						</form>
					</div>
				</div>
			</div>
			<div id="assign_user" class="modal custom-modal fade center-modal" role="dialog">
		  <div class="modal-dialog">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<div class="modal-content">
			<form method="post" name="assignee_form" id="assignee_form" >
				<div class="modal-header">
				<h3 class="modal-title">Assign the user to this project</h3>
          </div>
          <div class="modal-body">
							<div class="input-group m-b-30">
								<input  required autocomplete="off" type="text" name="empid_search" id="empid_search" placeholder="Search a user to assign" class="form-control search-input input-lg">
								<input type="hidden" name="user_login" id="user_login" value="<?php echo $_SESSION['username_admin']; ?>" />
								<span class="input-group-btn">
									<button type="submit" id="search_emp" value="Search" name="search_emp" value="Search" class="btn btn-primary btn-lg">Search</button>
								</span>
							</div>
							<div>
          <div id="AssigneeModal" class="modal-body">
           
            <div>
              <ul class="media-list media-list-linked chat-user-list" id="show_record">
              </ul>
            </div>
            <div class="m-t-50 text-center">
              <input type="hidden" name="user_login" id="user_login" value="<?php echo $_SESSION['username_admin']; ?>" />
			  <input type="hidden" name="regular_user_login" id="regular_user_login" value="<?php echo $_SESSION['username_enrollid']; ?>" />
			  <input type="hidden" id="pro_ids" value="<?php echo $_GET['pro_id'];?>" name="pro_ids">
              <button type="submit" onclick="assign_to_emp1()" class="btn btn-primary btn-lg">Assign</button>
            </div>
          </div>
		  </form>
					</div>
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
							<form method="post" name="create_project_form" id="create_project_form" >
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Project Name</label>
											<input required autocomplete="off" type="text"  id="projname" name="projname" class="form-control" value="">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Client</label>
											<select class="select" name="client_name" id="client_name">
												<option value="">Global Technologies</option>
												<option value="1">Delta Infotech</option>
											</select>
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
											<label>Project ID</label>
											<input autocomplete="off" type="text" id="project_id" name="project_id" class="form-control" type="text">
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
												<option value="1">Construction</option>
												<option value="2">Computer Software Development</option>
												<option value="3">System Installation</option>
											</select>
										</div>
									</div>
									
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Add Project Leader</label>
											<input autocomplete="off" type="text" id="projleader" name="projleader"  class="form-control" type="text" placeholder="Enter Emp ID" maxlength="6">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Add Team</label>
											<input autocomplete="off" type="text" id="projteam" name="projteam"  class="form-control" type="text" placeholder="Enter Emp ID" maxlength="6">
										</div>
									</div>
									<div class="col-md-6">
											<label>Team Members</label>
											<div class="form-group">
											<div class="project-members">
										<?php 
										$stmt = mysqli_query($func->dbo,"SELECT * FROM `projects` ");
													$row = mysqli_fetch_assoc($stmt);
											if ($stmt) 
											{
												while($row=mysqli_fetch_assoc($stmt)){
											
										echo '
												<a href="#" data-toggle="tooltip" title="'.$row['EMP_ID'].'" >
													<img src="images/user.jpg" class="avatar" alt="'.$row['EMP_ID'].'" height="20" width="20">
												</a>
												
												<a href="#" data-toggle="tooltip" title="'.$row['EMP_ID_TEAM'].'">
													<img src="images/user.jpg" class="avatar" alt="'.$row['EMP_ID_TEAM'].'" height="20" width="20">
												</a>
												
												<span class="all-team">+2</span>
											</div>';
											}}?>
											<!--a href="#" data-toggle="tooltip" title="'.$row['EMP_ID'].'">
													<img src="images/user.jpg" class="avatar" alt="'.$row['PROJECT_ID'].'" height="20" width="20">
												</a>
												<a href="#" data-toggle="tooltip" title="'.$row['EMP_ID'].'">
													<img src="images/user.jpg" class="avatar" alt="'.$row['EMP_ID'].'" height="20" width="20">
												</a-->
												
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
								 <input type="hidden" id="pro_ids" value="<?php echo $_GET['pro_id'];?>" name="pro_ids">
									<button  type="submit" value="Add" name="submit" id="submit" class="btn btn-primary">Create Project</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
	<div id="assignee" class="modal custom-modal fade center-modal" role="dialog" > <!--this is to assign task to emp for this project-->
      <div class="modal-dialog">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="modal-content">
		<form method="post" name="task_assignee_form" id="task_assignee_form" >
        <div class="modal-header">
            <h3 class="modal-title">Assign to this task</h3>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Start Date</label>
                <div class="cal-icon">
                  <input required autocomplete="off" type="text" class="form-control datetimepicker" name="fromdate_assign" id="fromdate_assign"/>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>End Date</label>
                <div class="cal-icon">
                   <input required autocomplete="off" type="text" class="form-control datetimepicker" name="todate_assign" id="todate_assign"/>
                </div>
              </div>
            </div>
			<div class="col-md-3">
			 <!--div class="form-group">
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
			</div-->
			</div>
          </div>
          <div id="AssigneeModal" class="modal-body">
            <div class="input-group m-b-30">
               <input  required autocomplete="off" type="text" name="empid_search_task" id="empid_search_task" placeholder="Search to add" class="form-control search-input input-lg">
			   <input type="hidden" name="user_login" id="user_login" value="<?php echo $_SESSION['username_admin']; ?>" />
              <span class="input-group-btn">
               <button type="submit" id="search_emp_task" name="search_emp_task" value="Search" class="btn btn-primary btn-lg">Search</button>
              </span> </div>
            <div>
              <ul class="media-list media-list-linked chat-user-list" id="show_emp_record">
              </ul>
            </div>
            <div class="m-t-50 text-center">
              <input type="hidden" name="user_login" id="user_login" value="<?php echo $_SESSION['username_admin']; ?>" />
			  <input type="hidden" name="regular_user_login" id="regular_user_login" value="<?php echo $_SESSION['username_enrollid']; ?>" />
              <input type="hidden" name="task_ids" id="task_ids" value="" />
              <button type="submit" onclick="assign_task_to_emp()" class="btn btn-primary btn-lg">Assign</button> <!--onclick="assign_to_emp('.$row['TASK_ID'].')"-->
            </div>
          </div>
		  </form>
        </div>
      </div>
    </div>
</div>
		<div class="sidebar-overlay" data-reff="#sidebar"></div>
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/jquery.slimscroll.js"></script>
		<script type="text/javascript" src="js/select2.min.js"></script>
		<script type="text/javascript" src="js/moment.min.js"></script>
<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
		<script type="text/javascript" src="js/app.js"></script>
		<script type="text/template" id="task-template">
			<li class="task">
				<div class="task-container">
					<span class="task-action-btn task-check">
						<span class="action-circle large complete-btn" title="Mark Complete">
							<i class="material-icons">check</i>
						</span>
					</span>
					<span class="task-label" contenteditable="true"></span>
					<span class="task-action-btn task-btn-right">
						<span class="action-circle large" title="Assign">
							<i class="material-icons">person_add</i>
						</span>
						<span class="action-circle large delete-btn" title="Delete Task">
							<i class="material-icons">delete</i>
						</span>
					</span>
				</div>
			</li>
		</script>
	<script type="text/javascript" src="js/task.js"></script>
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
		
		var all_data=$("#projectname_search").serialize();
		var pro_id=$("#pro_id").val();
	
		var form_data="page=view_project_page&="+all_data+"&pro_id="+pro_id;
		$.ajax({
			url:'project_view_ajax.php',
			type:'POST',
			data:form_data,
			async:true,
			cache: false,
			success: function(result){
			var res_data= jQuery.parseJSON(result);
			$("#show_error").show();
			console.log(result);
			console.log(res_data.table_data);
			$("#view_projects").html(res_data.table_data);
					
					}
			});
		
	});

	
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
		
		var all_data=$("#project_details").serialize();
		var pro_id=$("#pro_id").val();

				
		var form_data="page=project_search_page&="+all_data+"&pro_id="+pro_id;
		$.ajax({
			url:'project_view_ajax.php',
			type:'POST',
			data:form_data,
			async:true,
			cache: false,
			success: function(result){
			var res_data= jQuery.parseJSON(result);
			$("#show_error").show();
			console.log(result);
			console.log(res_data.table_data);
			$("#project_details_table").html(res_data.table_data);
			
					}
			});
		
	});

	
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
		
		var all_data=$("#project_details").serialize();
		var pro_id=$("#pro_id").val();

				
		var form_data="page=project_users&="+all_data+"&pro_id="+pro_id;
		$.ajax({
			url:'project_view_ajax.php',
			type:'POST',
			data:form_data,
			async:true,
			cache: false,
			success: function(result){
			var res_data= jQuery.parseJSON(result);
			$("#show_error").show();
			console.log(result);
			console.log(res_data.table_data);
			$("#project_users").html(res_data.table_data);
			
					}
			});
		
	});

	
	
$(document).on('submit','#create_project_form',function(e){
		alert("it is working ");
	
	
		$("#pro_ids").val(pro_id);
		$("#project_id").val(project_id);
		$("#projname").val(projname);
		$("#client_name").val(client_name);
		$("#project_status").val(project_status);
		$("#projleader").val(projleader);
		$("#priority").val(priority);
		$("#start_date").val(start_date);
		$("#end_date").val(end_date);
		$("#completion_date").val(completion_date);
		  
	var projecttype=$("#project_type").val();	
	var projectstatus=$("#project_status").val();
	var projectid=$("#project_id").val();
	var proj_leader = $('#projleader').val();
	var proj_team = $('#projteam').val();
	var project_name = $('#projname').val();
    var pro_id1=$("#pro_ids").val();
	
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
				
				var data_all=$("#create_project_form").serialize();
				var form_data="page=edit_project_page&"+data_all+"&pro_id="+pro_id1;
				alert(form_data);
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
		
		}else {
			return false;
			
		}
	});

});

 function edit_new_project(project_id,projname,client_name,project_status,projleader,priority,start_date,end_date,completion_date)
    {
		var pro_id1=$("#pro_ids").val();
		//$("#edit_project").modal('show');
		alert(pro_id1);
		
		$("#pro_ids").val(pro_id1);
		$("#project_id").val(project_id);
		$("#projname").val(projname);
		$("#client_name").val(client_name);
		$("#project_status").val(project_status);
		$("#projleader").val(projleader);
		$("#priority").val(priority);
		$("#start_date").val(start_date);
		$("#end_date").val(end_date);
		$("#completion_date").val(completion_date);
		
		//$("#AssigneeModal").modal('show');
	
		
	
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
					$("#exampleModal")
					.modal("show")
					.on("shown.bs.modal", function () {
						window.setTimeout(function () {
							$("#exampleModal").modal("hide");
							location.reload(); 
						}, 2000);                 
					});
				}
				
			});
			}
		else {
			return false;
			
		}

		
   }

</script>
<script>
$(document).ready(function(){
	
$(function() {  
			
				$(document).ajaxStart(function(){
				$("#wait").css("display", "block");
				});
				$(document).ajaxComplete(function(){
					$("#wait").css("display", "none");
				});
				
				var user_login=$("#user_login").val();
				var empnumber=106069;
				var new_task=$("#new_task").val();
				var start_date=$("#start_date").val();
				var end_date=$("#end_date").val();
				var pro_id=$("#pro_id").val();
				$("#pro_id").val(pro_id);
				var form_data="page=task_search_page&user_login="+user_login+"&empnumber="+empnumber+"&new_task="+new_task+"&pro_id="+pro_id; //page=create_task_page&user_login=ADMIN&task_name=&user_login=ADMIN
				//alert(form_data);
				$.ajax({
					url:'project_view_ajax.php',
					type:'POST',
					data:form_data,
					async:true,
					cache: false,
					success: function(result){
						var res_data= jQuery.parseJSON(result);
						//console.log(res_data.table_data);
						$("#show_record1").html(res_data.table_data);

						

				}
		});
	});	
	
	
$(document).on('submit','#add_task_form',function(e){
		alert("it is working ");
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
				alert(form_data);
				$.ajax({
					url:'tasks_ajax1.php',
					type:'POST',
					data:form_data,
					async:true,
					cache: false,
					success: function(result){
						console.log(result);
						location.reload();
						alert("Task Has Been Created successfully");
						$("#exampleModal")
						.modal("show")
						.on("shown.bs.modal", function () {
							window.setTimeout(function () {
								$("#exampleModal").modal("hide");
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
				
				$("#pro_id").val(pro_id);
				$("#empid_search").val(empid_search);
				var data_all=$("#assignee_form").serialize();
				var user_login=$("#user_login").val();
				var form_data="page=search_to_emp&empid_search="+empid_search+"&user_login="+user_login;
				alert(form_data);
				$.ajax({
					url:'project_view_ajax.php',
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
							}, 2000);                 
						});


			}
		});
		
	});
	
	
$(document).on('submit','#assignee_leader_form',function(e){
       
				e.preventDefault();
				$(document).ajaxStart(function(){
				$("#wait").css("display", "block");
				});
				$(document).ajaxComplete(function(){
					$("#wait").css("display", "none");
				});
				
				var empid_search_leader=$("#empid_search_leader").val();
				var task_id1=$("#task_ids").val(task_id1);
				
				$("#pro_id").val(pro_id);
				$("#empid_search_leader").val(empid_search_leader);
				var data_all=$("#assignee_leader_form").serialize();
				var user_login=$("#user_login").val();
				var form_data="page=search_to_emp1&empid_search_leader="+empid_search_leader+"&user_login="+user_login;
				alert(form_data);
				$.ajax({
					url:'project_view_ajax.php',
					type:'POST',
					data:form_data,
					async:true,
					cache: false,
					success: function(result){
					var res_data= jQuery.parseJSON(result);
					//console.log(res_data.table_data);
					$("#show_leader_record").html(res_data.table_data).modal('show');
					$("#assignee")
						.modal("show")
						.on("shown.bs.modal", function () {
							window.setTimeout(function () {
								$("#assignee").modal("hide");
								location.reload(); 
							}, 2000);                 
						});


			}
		});
		
	});
	
	
$(document).on('submit','#task_assignee_form',function(e){
       
				e.preventDefault();
				$(document).ajaxStart(function(){
				$("#wait").css("display", "block");
				});
				$(document).ajaxComplete(function(){
					$("#wait").css("display", "none");
				});
				
				var empid_search_task =$("#empid_search_task ").val();
				var task_id1=$("#task_ids").val(task_id1);
				
				$("#pro_id").val(pro_id);
				$("#empid_search_task ").val(empid_search_task );
				var data_all=$("#task_assignee_form").serialize();
				var user_login=$("#user_login").val();
				var form_data="page=search_to_emp_task&empid_search_task="+empid_search_task+"&user_login="+user_login;
				alert(form_data);
				$.ajax({
					url:'project_view_ajax.php',
					type:'POST',
					data:form_data,
					async:true,
					cache: false,
					success: function(result){
					var res_data= jQuery.parseJSON(result);
					//console.log(res_data.table_data);
					$("#show_emp_record").html(res_data.table_data).modal('show');
					$("#assignee")
						.modal("show")
						.on("shown.bs.modal", function () {
							window.setTimeout(function () {
								$("#assignee").modal("hide");
								location.reload(); 
							}, 2000);                 
						});


			}
		});
		
	});
	
	 function assign_to_emp1()
  {
	alert("This is for assigning");
	var start_date=$("#fromdate_assign").val();
	var end_date=$("#todate_assign").val();
	var empid_search=$("#empid_search").val();
	var user_login=$("#user_login").val();
	var pro_id1=$("#pro_ids").val();
	var pronumber=$("#project_number").val();
	var data =$("#assignee_form").serialize();

	var form_data="page=assign_to_emp1&pro_id="+pro_id1+"&user_login="+user_login+"&empid_search="+empid_search;
	//alert(form_data);
		$.ajax({
			url:'project_view_ajax.php',
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
  
  
  	 function assign_to_leader()
  {
	alert("This is for assigning");
	var start_date=$("#fromdate_assign").val();
	var end_date=$("#todate_assign").val();
	var empid_search_leader=$("#empid_search_leader").val();
	var user_login=$("#user_login").val();
	var pro_id1=$("#pro_ids").val();
	var data =$("#assignee_leader_form").serialize();

	var form_data="page=assign_to_leader&pro_id="+pro_id1+"&user_login="+user_login+"&empid_search_leader="+empid_search_leader;
	alert(form_data);
		$.ajax({
			url:'project_view_ajax.php',
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
  
  
   function assign_task_to_emp()
  {
	alert("This is for assigning");
	var start_date=$("#fromdate_assign").val();
	var end_date=$("#todate_assign").val();
	var empid_search_task=$("#empid_search_task").val();
	var user_login=$("#user_login").val();
	var pro_id1=$("#pro_ids").val();
	var pronumber=$("#project_number").val();
	var data =$("#task_assignee_form").serialize();

	var form_data="page=assign_task_to_emp&pro_id="+pro_id1+"&user_login="+user_login+"&empid_search_task="+empid_search_task+"&start_date="+start_date+"&end_date="+end_date+"&pronumber="+pronumber;
	alert(form_data);
		$.ajax({
			url:'project_view_ajax.php',
			type:'POST',
			data:form_data,
			async:true,
			cache: false,
			success: function(result){
			console.log(result);
		/*	$("#exampleModal1")
			.modal("show")
			.on("shown.bs.modal", function () {
				window.setTimeout(function () {
					$("#exampleModal1").modal("hide");
					location.reload(); 
				}, 2000);                 
			});*/

				
	}
});
	  
	  
  }
  
  
  function add_assign_to_emp(task_id)
  {
	alert(task_id);
	$("#AssigneeModal").modal('show');
	$("#task_ids").val(task_id);
	
	
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
  
 
</script>
</body>
</html>