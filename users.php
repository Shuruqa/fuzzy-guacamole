
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
						<div class="col-xs-4">
							<h4 class="page-title">Users</h4>
						</div>
						<div class="col-xs-8 text-right m-b-30">
							<a href="#" class="btn btn-primary rounded" data-toggle="modal" data-target="#add_user"><i class="fa fa-plus"></i> Add User</a>
						</div>
					</div>
					<div class="row filter-row">
					<form name="search_byusername" id="search_byusername" method="post" style="">
						<div class="col-sm-3 col-xs-6">  
							<div class="form-group form-focus">
								<label class="control-label">Employee ID</label>
								<input autocomplete="off" id="username_search" name="username_search" type="text" class="form-control floating" />
							</div>
						</div>
						<div class="col-sm-3 col-xs-6"> 
							<div class="form-group form-focus select-focus">
								<label class="control-label">Company</label>
								<select class="select floating" name="company_name_search" id="company_name_search"> 
									<option value="">Select Company</option>
									<option value="Sendan Company">Sendan Company</option>
									<option value=">Global Technologies">Global Technologies</option>
									<option value="Delta Infotech">Delta Infotech</option>
								</select>
							</div>
						</div>
						<div class="col-sm-3 col-xs-6"> 
							<div class="form-group form-focus select-focus">
								<label class="control-label">Designetion</label>
								<select class="select floating" name="user_role_search" id="user_role_search"> 
									<option value="">Select Roll</option>
									<option value="Web Developer">Web Developer</option>
									<option value="Web Designer">Web Designer</option>
									<option value="Android Developer">Android Developer</option>
									<option value="Ios Developer">Ios Developer</option>
								</select>
							</div>
						</div>
						<div class="col-sm-3 col-xs-6">  
							<input type="submit" id="search_user" value="Search" name="search_user" value="Search" class="btn btn-success btn-block" />							
						</div>
					</form>						
                    </div>
					<div class="row" >
						<div class="col-md-12">
							<div class="table-responsive">
								<table id="taskstable123" class="table table-striped custom-table datatable">
									<thead>
										<tr>
											<th>ID </th>
											<th>Full Name</th>
											<th>Email</th>
											<th>Company</th>
											<th> User Type </th>
											<th>Username</th>
											<th>Designetion</th>
											<th class="text-right">Action</th>
										</tr>
									</thead>
										<tbody id="show_record"></tbody>
										<tbody id="show_no_record"></tbody>
										<tbody><p class="error_msg"></p></tbody>
									
								</table>
							</div>
						</div>
					
					</div>
					<!--here we will show the records -->
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
			<div id="add_user" class="modal custom-modal fade" role="dialog">
		  <div class="modal-dialog">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<div class="modal-content modal-lg">
						<div class="modal-header">
							<h4 class="modal-title">Add User</h4>
						</div>
						<div class="modal-body">
							<form method="post" name="add_user_form" id="add_user_form" class="m-b-30">
							
								<div class="row"><p class="error_msg"></p></div>
								<div class="row">
									<!--div class="col-md-6">
										<div class="form-group">
											<label class="control-label">First Name <span class="text-danger">*</span></label>
											<input autocomplete="off" type="text"  id="first_name" name="first_name" class="form-control" size="20" maxlength="20">
										</div>
									</div-->
									<!--div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Last Name</label>
											<input autocomplete="off" type="text" id="last_name" name="last_name" class="form-control" size="30" maxlength="40">
										</div>
									</div-->
									<div class="col-md-6">  
										<div class="form-group">
											<label class="control-label">Employee ID <span class="text-danger">*</span></label>
											<input  autocomplete="off" type="text" list="emp_datalist" id="emp_id" name="emp_id" value="" class="form-control floating custom-select-sm" maxlength="6"/>
											<datalist autocomplete="off" id="emp_datalist" name="emp_datalist">
											 <?php 
											$stmt = mysqli_query($func->dbo,"SELECT * FROM `employees` ");
													
											if ($stmt) 
											{
												while($row = mysqli_fetch_assoc($stmt))
													{
													   echo '<option  data-subtext="'.$row['EMP_ID'].'" value="'.$row['EMP_ID'].'">'.$row['EMP_ID'].'=>'.$row["FULL_NAME"].'</option>';
													}
											}
											?>
											
											</datalist>
										</div>
								   </div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Username <span class="text-danger">*</span></label>
											<input autocomplete="off" type="text" list="username_datalist" id="username" name="username" class="form-control" size="30" maxlength="40" value="">
											<datalist autocomplete="off" id="username_datalist" name="username_datalist">
											 <?php 
											$stmt = mysqli_query($func->dbo,"SELECT * FROM `employees` ");
													
											if ($stmt) 
											{
												while($row = mysqli_fetch_assoc($stmt))
													{
													   echo '<option  data-subtext="'.$row['FULL_NAME'].'" value="'.$row['FULL_NAME'].'">'.$row['FULL_NAME'].'=>'.$row["FULL_NAME"].'</option>';
													}
											}
											?>
											
											</datalist>
										</div>
									</div>
									
									<!--div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Email <span class="text-danger">*</span></label>
											<input autocomplete="off" type="text" id="email" name="email" class="form-control" >
										</div>
									</div-->
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Password</label>
											<input autocomplete="off" type="password" id="password" name="password" class="form-control"  size="30" maxlength="40">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Confirm Password</label>
											<input  autocomplete="off" type="password" id="confirm_password" name="confirm_password" class="form-control"  size="30" maxlength="40">
										</div>
									</div>
									<!--div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Phone </label>
											<input autocomplete="off" type="text" id="phone" name="phone" class="form-control" maxlength="10">
										</div>
									</div-->
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Role</label>
											<select class="select" name="user_role" id="user_role">
												<option value="">Select Role</option>
												<option value="0">Admin</option>
												<option value="1">Project Manager</option>
												<option value="2">Team Lead </option>
												<option value="3">Developer </option>
											</select>
										</div>
									</div>
									<!--div class="col-md-3">
										<div class="form-group">
											<label class="control-label">Designetion</label>
											<select class="select" name="designetion_name" id="designetion_name">
												<option value="">Select Designetion</option>
												<option value="Web Developer">Web Developer</option>
												<option value="Web Designer">Web Designer</option>
												<option value="Android Developer">Android Developer</option>
												<option value="Ios Developer">Ios Developer</option>
											</select>
										</div>
									</div-->
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Company</label>
											<select class="select" name="company_name" id="company_name">
												<option value="">Select Company</option>
												<option value="Sendan Company">Sendan Company</option>
												<option value=">Global Technologies">Global Technologies</option>
												<option value="Delta Infotech">Delta Infotech</option>
											</select>
										</div>
									</div>
									
								</div>
								<div class="table-responsive m-t-15">
									<!--table class="table table-striped custom-table">
										<!--thead>
											<tr>
												<th>Module Permission</th>
												<th class="text-center">Read</th>
												<th class="text-center">Write</th>
												<th class="text-center">Create</th>
												<th class="text-center">Delete</th>
												<th class="text-center">Import</th>
												<th class="text-center">Export</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Employee</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
											</tr>
											<tr>
												<td>Holidays</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
											</tr>
											<tr>
												<td>Leave Request</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
											</tr>
											<tr>
												<td>Events</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
											</tr>
										</tbody>
									</table-->
								</div>
								<!--input type="hidden"  id="userid" name="userid" value="" /-->
								<div class="m-t-20 text-center">
								<input type="hidden"  id="userid" name="userid" value="" />
								<button  type="submit" value="Add" name="submit" id="submit" class="btn btn-primary">Create User</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div id="edit_user" class="modal custom-modal fade" role="dialog">
		  <div class="modal-dialog">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<div class="modal-content modal-lg">
						<div class="modal-header">
							<h4 class="modal-title">Edit User</h4>
						</div>
						<div class="modal-body">
							<form method="post"  class="m-b-30">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">First Name <span class="text-danger">*</span></label>
											<input class="form-control" value="" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Last Name</label>
											<input class="form-control" value="" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Username <span class="text-danger">*</span></label>
											<input type="test" id="" class="form-control" value="" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Email <span class="text-danger">*</span></label>
											<input class="form-control" value="" type="email">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Password</label>
											<input class="form-control" type="password">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Confirm Password</label>
											<input class="form-control" type="password">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Phone </label>
											<input class="form-control" value="9876543210" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Role</label>
											<select class="select">
												<option>Admin</option>
												<option>Client</option>
												<option selected>Employee</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Company</label>
											<select class="select">
												<option>Global Technologies</option>
												<option>Delta Infotech</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">  
										<div class="form-group">
											<label class="control-label">Employee ID <span class="text-danger">*</span></label>
											<input type="text" value="" class="form-control floating">
										</div>
								   </div>
								</div>
								<div class="table-responsive m-t-15">
									<!--table class="table table-striped custom-table">
									</table-->
								</div>
								<div class="m-t-20 text-center">
									<button class="btn btn-primary">Edit User</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="amountRooms"></div>
			<div id="confirmDelete" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog">
				<form method="post" id="delete_form" name="delete_form" action="" />
					<div class="modal-content modal-md">
						<div class="modal-header">
							<h4 class="modal-title">Delete Project</h4>
						</div>
						<div class="modal-body card-box">
							<p>Are you sure want to delete this?<span class="nameToDelete"></span></p>
							<div class="m-t-20"> <a href="#" class="btn btn-default" data-dismiss="modal" id="dismiss_btn" >Close</a>
								<button type="submit" class="btn btn-danger deleteBuildingConfirm" >Delete</button>
								<input type="hidden" name="emp_ids" id="emp_ids" value="" />
								<input type="hidden" id="userids" value="" name="userids" />
							</div>
						</div>
					</div>
					</form>
				</div>
			</div>
			<div  class="modal fade" id="exampleModal" tabindex="-1" role="dialog" style="z-index: 999999;" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content modal-md">
						<div class="modal-header">
							<h4 class="modal-title">Delete Project</h4>
						</div>
						<div class="modal-body card-box">
						
							<p>This User Has been Deleted</p>
							<div class="m-t-20"> <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
								<!--button type="submit" onclick="delete_project(project_id);" class="btn btn-danger">Delete</button-->
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
					<div class="m-t-20"> <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
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
							<div class="m-t-20"> <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
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


$(document).on('submit','#search_byusername',function(e){
       
		e.preventDefault();
		$(document).ajaxStart(function(){
		$("#wait").css("display", "block");
		});
		$(document).ajaxComplete(function(){
			$("#wait").css("display", "none");
		});
	

		var username_search=$("#username_search").val();
		var company_name_search=$("#company_name_search").val();
		var user_role_search=$("#user_role_search").val();
		
		

		var form_data="page=username_search_page&username_search="+username_search+"&company_name_search="+company_name_search+"&user_role_search="+user_role_search;
		$.ajax({
			url:'add_user_ajax.php',
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
			console.log(res_data.table_data);
			}
			if(res_data.table_data==''){ 
			$("#show_no_record").html('<div><tr class="odd"><td valign="top" colspan="10" class="dataTables_empty">No data available in table</td></tr></div>');
			$("#show_no_record").show();
			$("#show_record").hide();
				}				
										
			}
		});

});

	
	
$(document).on('submit','#add_user_form',function(e){
		var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		var phoneno_regex = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
		var email_address=$("#email").val();
		var phone_number=$("#phone").val();
		var fname=$('#first_name').val();
		var emp_datalist=$("#emp_datalist").val();
		var username_datalist=$("#username_datalist").val();

	var user_name = $('#username').val();
	if(user_name=='') {
		$.alert({
			title: 'Alert!',
			content: "Please Username should not be empty.",
		});
			$("#username").focus();
			return false;
		  }
		  
	if(/^[a-zA-Z0-9- ]*$/.test(user_name) == false) {
		$.alert({
			title: 'Alert!',
			content: "Username contains illegal characters.",
		});
		return false;
	}
				
	
	var password=$("#password").val();
	if(password=='') {
		$.alert({
			title: 'Alert!',
			content: "Please password should not be empty.",
		});
			$("#password").focus();
			return false;
		  }
		  
	var conf_password=$("#confirm_password").val();	
		  if(conf_password=='') {
			  $.alert({
			title: 'Alert!',
			content: "Please Confirm Password should not be empty.",
		});
			$("#confirm_password").focus();
			return false;
		  }

     if( $("#confirm_password").val() != $("#password").val()){
		 $.alert({
			title: 'Alert!',
			content: "Please Password values do not match.",
		});
               return false; 
     }
	 
	 var empid=$("#emp_id").val();	
		  if(empid=='') {
			  $.alert({
			title: 'Alert!',
			content: "Please Employee number should not be empty.",
		});
			$("#emp_id").focus();
			return false;
		  }
		  
		   var companyname=$("#company_name").val();	
		  if(companyname=='') {
			  $.alert({
			title: 'Alert!',
			content: "Please Comapny Name should not be empty.",
		});
			$("#company_name").focus();
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
				
				var empid = $('#emp_id').val(); 
				var userid = $('#userid').val();
				var data_all=$("#add_user_form").serialize();
				var form_data="page=create_user_page&"+data_all+"&userid="+userid;
				alert(form_data);
				$.ajax({
					url:'add_user_ajax.php',
					type:'POST',
					data:form_data,
					async:true,
					cache: false,
					success: function(result){
						console.log(result);
						if(result=='nonexist')
						{
							var empid = $('#emp_id').val();
								  if(result=='nonexist') {
									  $.alert({
									title: 'Alert!',
									content: "Employee Number is not exist in the system",
								});
									$("#emp_id").focus();
									return false;
								  }
								
							
						}
						
						else{
							$("#exampleModal1")
							.modal("show")
							.on("shown.bs.modal", function () {
								$("#show_msg").html("<p>User Has been Created</p>");
								 window.setTimeout(function () {
									$("#exampleModal1").modal("hide");
									location.reload(); 
								},4000);                 
							});
							
						}
						if(result==1){
							console.log(result);
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
	});
	
	
	
$(document).on('change','#emp_id',function(){
	   $(document).ajaxStart(function(){
		$("#wait").css("display", "block");
		});
		$(document).ajaxComplete(function(){
			$("#wait").css("display", "none");
		}); 
	   var emp_id=$('#emp_id').val();
	   var username_datalist=$("#username_datalist").val();
	   var end = this.value;
	   //alert( this.value );
	   var form_data="page=search_username&emp_id="+emp_id;
		$.ajax({
			url:'add_user_ajax.php',
			type:'POST',
			data:form_data,
			async:true,
			cache: false,
			success: function(result){
			var id = result[0];              
			var vname = result[1];          
				//console.log(result);
				var result_data= jQuery.parseJSON(result);
				console.log(result_data.username);
				$("#username_datalist").html(result_data.username);
				//$("#username").html(result_data.username).modal('show');


				
			}
		});
	   
	   
	});


	
});

function add_new_emp(emp_id,username,user_role,email,first_name,last_name,phone,designetion_name)
    {
	    $('#emp_id').val('');
		$("#edit_user").modal('show');
	    $("#username").val(username);
		$("#email").val(email);
		$("#user_role").val(user_role);
		$("#first_name").val(first_name);
		$("#last_name").val(last_name);
		$("#phone").val(phone);
		$("#designetion_name").val(designetion_name);
   }
 function edit_new_emp(emp_id,username,user_role,password,company_name)
    {
		$("#emp_id").val(emp_id);
		//$("#userid").val(userid);
		$("#add_user").modal('show');
		$("#username").val(username);
		$("#user_role").val(user_role);
		$("#company_name").val(company_name);
		$("#password").val(password);
		
		

		
   }
   
  /* function delete_username(userid,emp_id,username,user_role,password,company_name)
   {
	    $("#emp_id").val(emp_id);
		$("#userid").val(userid);
		$("#confirmDelete").modal('show');
		$("#username").val(username);
		$("#user_role").val(user_role);
		$("#company_name").val(company_name);
		$("#password").val(password);
		alert(userid);
   }*/
   
  /* function delete_username()
   {
	    $("#emp_id").val(emp_id);
		//$("#userid").val(userid);
		$("#confirmDelete").modal('show');
		$("#username").val(username);
		$("#user_role").val(user_role);
		$("#company_name").val(company_name);
		$("#password").val(password);
		var userid=$("#userid").val(userid);
		var all_data=$("#delete_form").serialize();
		
		var form_data="page=delete_username&"+all_data+"&userid="+userid;
		alert(form_data);
			$.ajax({
				url:'add_user_ajax.php',
				type:'POST',
				data:form_data,
				async:true,
				cache: false,
				success: function(result){
					console.log(result);
					
	
				}
			});
   }*/


    
 function delete_username(userid) {
	    alert(userid);
		$("#emp_id").val(emp_id);
		$("#userid").val(userid);
		
		$("#username").val(username);
		$("#user_role").val(user_role);
		$("#company_name").val(company_name);
		$("#password").val(password);
		var emp_id=$("#emp_id").val();
		var userid=$("#userid").val();
		var username=$("#username").val();
		
		var conf=confirm("Are you sure want to delete this!.");
		if(conf==true)
		{
		var form_data="page=delete_username&userid="+userid;
		   alert(form_data);
			$.ajax({
				url:'add_user_ajax.php',
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
						$("#show_msg").html("<p>This User Has been Deleted</p>");
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
			
		}else {
			return false;
			
		}

  }







</script>
<script>
$(document).ready(function(e) {
	
	var table = $('#taskstable123').DataTable();
	table.destroy();
	var username_search=$("#username_search").val();
	$('#taskstable123').DataTable({
		"processing": true,
		"bLengthChange": false,
		//"scrollX": true,
		//"scrollY": 200,
		"searching":false,
        "serverSide": true,
		"ajax": {
			"url": "add_user_ajax.php",
			"data": function ( d ) 
			{
			d.page="manage_users";
			d.username_search=$('#username_search').val();
			
			}

		}

	});
	
	


});
</script>
    </body>
</html>