<?php 
ob_start(); session_start();
//set_time_limit(0);
//print_r($_SESSION);
if(!isset($_SESSION['username_admin']))
{
	header('location:login.php');
}
include("functions.php");
$func=new functions(); 
 ?>
 
 <div class="header">
          <div class="header-left">
                    <a href="index.php" class="logo logo-big">
						<img src="images/logo.png" width="99" height="32" alt="">
					</a>
					<a href="index.php" class="logo logo-small">
						<img src="images/logo.png" width="55" height="32" alt="">
					</a>
                </div>
				<a id="toggle_btn" href="javascript:void(0);"><i class="la la-bars"></i></a>
                <div class="page-title-box pull-left">
					<h3>PMS Technologies</h3>
                </div>
				<a id="mobile_btn" class="mobile_btn pull-left" href="#sidebar"><i class="fa fa-bars" aria-hidden="true"></i></a>
		  <ul class="nav navbar-nav navbar-right user-menu pull-right">
					<li class="dropdown hidden-xs">
						<a href="#" class="dropdown-toggle notify" data-toggle="dropdown"><i class="fa fa-bell-o"></i> <span class="badge bg-danger pull-right count"></span></a>
						<div class="dropdown-menu notifications">
							<div class="topnav-dropdown-header">
								<span>Notifications</span>
							</div>
							<div class="drop-scroll">
								<ul class="media-list" id="notification_list" ></ul>
							</div>
							<div class="topnav-dropdown-footer">
								<a href="activities.php">View all Notifications</a>
							</div>
							 <input type="hidden" name="view" id="view" value="" />
						</div>
					</li>
					<li class="dropdown hidden-xs">
						<a href="javascript:;" id="open_msg_box" class="hasnotifications"><i class="fa fa-comment-o"></i> <span class="badge bg-purple pull-right">8</span></a>
					</li>	
					<li class="dropdown">
						<a href="profile.php" class="dropdown-toggle user-link" data-toggle="dropdown" title="Admin">
							<span class="user-img"><img class="img-circle" src="images/user.jpg" width="40" alt="Admin">
							<span class="status online"></span></span>
							<span><?php echo $_SESSION['login_username']; ?></span>
							<i class="caret"></i>
						</a>
						<ul class="dropdown-menu">
							<li><a href="profile.php">My Profile</a></li>
							<li><a href="edit-profile.php">Edit Profile</a></li>
							<li><a href="settings.php">Settings</a></li>
							<li><a href="Logout.php">Logout</a></li>
						</ul>
					</li>
				</ul>
		  <div class="dropdown mobile-user-menu pull-right">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
					<ul class="dropdown-menu pull-right">
						<li><a href="profile.php">My Profile</a></li>
						<li><a href="edit-profile.php">Edit Profile</a></li>
						<li><a href="settings.php">Settings</a></li>
						<li><a href="Logout.php">Logout</a></li>
					</ul>
				</div>
            </div>
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
					  <li> 
								<a href="index.php"><i class="la la-dashboard"></i> <span>Dashboard</span></a>
							</li>
					  <li class="submenu">
								<a href="#" class="noti-dot"><i class="la la-user"></i> <span> Employees</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="employees.php">All Employees</a></li>
									<li><a href="holidays.php">Holidays</a></li>
									<li><a href="#">Leave Requests <span class="badge bg-primary pull-right">1</span></a></li>
									<li><a href="#">Attendance</a></li>
									<li><a href="departments.php">Departments</a></li>
									<li><a href="designations.php">Designations</a></li>
								</ul>
							</li>
					  <li> 
								<a href="clients.php"><i class="la la-users"></i> <span>Clients</span></a>
							</li>
					  <li> 
								<a href="project-list.php"><i class="la la-rocket"></i> <span>Projects</span></a>
							</li>
					  <li class="submenu"> 
								<a href="view_task.php"><i class="la la-tasks"></i> <span>Tasks</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
								<li><a href="view_task.php"> All Tasks</a></li>
								<li><a href="daily-track.php">Daily Tracking Report</a></li>
								</ul>
							</li>
					  <li class="submenu">
								<a href="#"><i class="la la-clock-o"></i> <span> Milestone</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="milestone.php">Milestone List</a></li>
									<li><a href="video-call.php">Video Call</a></li>
									<li><a href="incoming-call.php">Incoming Call</a></li>
								</ul>
							</li>
					  <li> 
								<a href="contacts.php"><i class="la la-book"></i> <span>Contacts</span></a>
							</li>
					  <li> 
								<a href="leads.php"><i class="la la-user-secret"></i> <span>Leads</span></a>
							</li>
					  <li class="submenu">
								<a href="#"><i class="la la-files-o"></i> <span> Accounts </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="estimates.php">Estimates</a></li>
									<li><a href="invoices.php">Invoices</a></li>
									<li><a href="payments.php">Payments</a></li>
									<li><a href="expenses.php">Expenses</a></li>
									<li><a href="provident-fund.php">Provident Fund</a></li>
									<li><a href="taxes.php">Taxes</a></li>
								</ul>
							</li>
					  <li class="submenu">
								<a href="#"><i class="la la-money"></i> <span> Payroll </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="salary.php"> Employee Salary </a></li>
									<li><a href="salary-view.php"> Payslip </a></li>
								</ul>
							</li>
					  <li> 
								<a href="worksheet.php"><i class="la la-phone"></i> <span>Timing Sheet</span></a>
							</li>
					  <li class="submenu">
								<a href="#"><i class="la la-building"></i> <span> Jobs </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="jobs.php"> Manage Jobs </a></li>
									<li><a href="job-applicants.php"> Applied Candidates </a></li>
								</ul>
							</li>
					  <li> 
								<a href="tickets.php"><i class="la la-ticket"></i> <span>Tickets</span></a>
							</li>
					  <li> 
								<a href="events.php"><i class="la la-calendar"></i> <span>Events</span></a>
							</li>
					  <li> 
								<a href="index.php"><i class="la la-at"></i> <span>Email</span></a>
							</li>
					  <li> 
								<a href="chat.php"><i class="la la-comments"></i> <span>Chat</span> <span class="badge bg-primary pull-right">5</span></a>
						</li>
					  <li> 
						<a href="assets.php"><i class="la la-object-ungroup"></i> <span>Assets</span></a>
						</li>
					  <li> 
						<a href="activities.php"><i class="la la-bell"></i> <span>Activities</span></a>
						</li>
					  <li> 
						<a href="users.php"><i class="la la-user-plus"></i> <span>Users</span></a>
					  </li>
					  <li class="submenu">
						<a href="#"><i class="la la-pie-chart"></i> <span> Reports </span> <span class="menu-arrow"></span></a>
						<ul style="display: none;">
							<li><a href="expense-reports.php"> Expense Report </a></li>
							<li><a href="invoice-reports.php"> Invoice Report </a></li>
						</ul>
					</li>
					<li> 
						<a href="settings.php"><i class="la la-cog"></i> <span>Settings</span></a>
					</li>
					  <li class="submenu" style="display:none;">
								<a href="#"><i class="la la-columns"></i> <span> Pages </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="login.php"> Login </a></li>
									<li><a href="register.php"> Register </a></li>
									<li><a href="forgot-password.php"> Forgot Password </a></li>
									<li><a href="profile.php"> Profile </a></li>
								</ul>
							</li>
					  <li class="submenu" style="display:none;">
								<a href="javascript:void(0);"><i class="la la-share-alt"></i> <span>Multi Level</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li class="submenu">
										<a href="javascript:void(0);"> <span>Level 1</span> <span class="menu-arrow"></span></a>
										<ul style="display: none;">
											<li><a href="javascript:void(0);"><span>Level 2</span></a></li>
											<li class="submenu">
												<a href="javascript:void(0);"> <span> Level 2</span> <span class="menu-arrow"></span></a>
												<ul style="display: none;">
													<li><a href="javascript:void(0);">Level 3</a></li>
													<li><a href="javascript:void(0);">Level 3</a></li>
												</ul>
											</li>
											<li><a href="javascript:void(0);"> <span>Level 2</span></a></li>
										</ul>
									</li>
									<li>
										<a href="javascript:void(0);"> <span>Level 1</span></a>
									</li>
								</ul>
							</li>
						</ul>
					</div>
                </div>
            </div>

<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script>

$(document).ready(function(){
 
 function load_unseen_notification()
 {
	 
	var view=$("#view").val();
	
	var form_data="page=view&view="+view;
	//alert(form_data);
	  $.ajax({
	   url:"view_task_ajax.php",
	   type:"POST",
	   data:form_data,
	  // data:{view:view},
	   dataType:"json",
	   async:true,
	   cache: false,
	   success:function(data)
	   {
		$('#notification_list').html(data.notification);
		if(data.unseen_notification > 0)
		{
		 $('.count').html(data.unseen_notification);
		} 
		
	   }
	  });
	 }
 
 //load_unseen_notification();
 function edit_emp_profile(empid,first_name,last_name,birth_date,gender_type,start_date,end_date,phone_num,comp_address,collegename,major_name,prev_empr,pre_position,state,country,pin_code,degree,grade,pre_location,fperiod,tperiod)
    { 
alert(empid);
		var empid=$("#user_login").val();
		$("#empid").val(empid);
		$("#first_name").val(first_name);
		$("#last_name").val(last_name);
		$("#birth_date").val(birth_date);
		$("#gender_type").val(gender_type);
		$("#start_date").val(start_date);
		$("#end_date").val(end_date);
		$("#phone_num").val(phone_num);
		$("#comp_address").val(comp_address);
		$("#collegename").val(collegename);
		$("#major_name").val(major_name);
		$("#prev_empr").val(prev_empr);
		$("#pre_position").val(pre_position);
		$("#state").val(state);
		$("#country").val(country);
		$("#pin_code").val(pin_code);
		$("#degree").val(degree);
		$("#pre_location").val(pre_location);
		$("#fperiod").val(fperiod);
		$("#tperiod").val(tperiod);


		
   }

 $(document).on('click', '.notify', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });
 
setInterval(function(){
 load_unseen_notification();;
}, 50000);

 

 
});

</script>