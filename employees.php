
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
							<h4 class="page-title">Employee</h4>
						</div>
						<div class="col-xs-8 text-right m-b-20">
							<a href="#" class="btn btn-primary rounded pull-right" data-toggle="modal" data-target="#add_employee"><i class="fa fa-plus"></i> Add Employee</a>
							<div class="view-icons">
								<a href="employees.php" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>
								<a href="employees-list.php" class="list-view btn btn-link"><i class="fa fa-bars"></i></a>
							</div>
						</div>
					</div>
					<div class="row filter-row">
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
					<div class="row staff-grid-row" id="show_record" style="display:none;" ></div>
					<div class="row staff-grid-row" id="show_no_record" ></div>

					<!--this is the end of the grid -->

				</div>
				<div id="wait" style="display:none;width:69px;height:89px; position:absolute;top:20%;left:42%;padding:2px; z-index:9999;"><img src='images/loader.gif' width="100" height="100" /></div>
			</div><!--The page-wraper-->
			<div id="add_employee" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<div class="modal-content modal-lg">
						<div class="modal-header">
							<h4 class="modal-title">Add Employee</h4>
						</div>
						<div class="modal-body">
							<form method="post" name="create_employee_form" id="create_employee_form" class="m-b-30">
								<div class="row">
									<div class="col-sm-6">  
										<div class="form-group">
											<label class="control-label">Employee ID <span class="text-danger">*</span></label>
											<input autocomplete="off" list="emp_datalist" class="form-control" type="text" name="empnumber" id="empnumber" maxlength="6">
											<datalist  autocomplete="off" id="emp_datalist" name="emp_datalist">
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
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Full Name <span class="text-danger">*</span></label>
											<input autocomplete="off" class="form-control" type="text" name="fullname" id="fullname" >
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Email <span class="text-danger">*</span></label>
											<input autocomplete="off" class="form-control" type="text" name="email" id="email">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Gender <span class="text-danger"></span></label>
											<select class="select" name="add_gender" id="add_gender">
												<option value="">Select Gender</option>
												<option value="Female">Female</option>
												<option value="Male">Male</option>
											</select>
										</div>
									</div>
									<div class="col-sm-6">  
										<div class="form-group">
											<label class="control-label">Joining Date <span class="text-danger">*</span></label>
											<div class="cal-icon"><input autocomplete="off" type="text" name="joining_date" id="joining_date" placeholder="Select Joining Date" class="form-control datetimepicker" /></div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Phone </label>
											<input autocomplete="off" class="form-control" type="text" name="phonenumber" id="phonenumber" maxlength="10">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Company</label>
											<select class="select" name="company_name" id="company_name" >
												<option value="">Select Company</option>
												<option value="Sendan Company">Sendan Company</option>
												<option value="Global Technologies">Global Technologies</option>
												<option value="Delta Infotech">Delta Infotech</option>
											</select>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Designation</label>
											<select class="select" name="add_designation" id="add_designation">
											<option value="">Select Designation</option>
												<option value="Web Developer">Web Developer</option>
												<option value="Web Designer">Web Designer</option>
												<option value="SEO Analyst">SEO Analyst</option>
											</select>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label class="control-label">College Name</label>
											<input autocomplete="off" class="form-control" type="text" name="college_name" id="college_name">
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label class="control-label">Major Name</label>
												<input autocomplete="off" class="form-control" type="text" name="major_name" id="major_name">
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label class="control-label">Previous Employer</label>
												<input autocomplete="off" class="form-control" type="text" name="prev_empr" id="prev_empr">
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label class="control-label">Previous Position</label>
												<input autocomplete="off" class="form-control" type="text" name="pre_position" id="pre_position">
										</div>
									</div>
								</div>
								<div class="table-responsive m-t-15" style="">
									<table class="table table-striped custom-table">
										<thead>
											<tr>
												<th>Skiils</th>
												<th class="text-center">Yes</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>IOS</td>
												<td class="text-center">
													<input class="myCheckbox" type="checkbox" name="check_list[]" value="IOS">
												</td>
											</tr>
											<tr>
												<td>Android</td>
												<td class="text-center">
													<input class="myCheckbox" type="checkbox" name="check_list[]" value="Android">
												</td>
											</tr>
											<tr>
												<td>Html</td>
												<td class="text-center">
													<input class="myCheckbox" type="checkbox" name="check_list[]" value="HTML">
												</td>
											</tr>
											<tr>
												<td>CSS</td>
												<td class="text-center">
													<input class="myCheckbox" type="checkbox" name="check_list[]" value="CSS">
												</td>
											</tr>
											<tr>
												<td>Codignitor</td>
												<td class="text-center">
													<input class="myCheckbox" type="checkbox" name="check_list[]" value="Codignitor">
												</td>
											</tr>
											<tr>
												<td>PHP</td>
												<td class="text-center">
													<input class="myCheckbox" type="checkbox" name="check_list[]" value="PHP">
												</td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="m-t-20 text-center">
									<input type="hidden"  id="proid" name="proid" value="" />
									<button  type="submit" value="Add" name="submit" id="submit" class="btn btn-primary">Create Employee</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div id="edit_employee" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<div class="modal-content modal-lg">
						<div class="modal-header">
							<h4 class="modal-title">Edit Employee</h4>
						</div>
						<div class="modal-body">
							<form method="post" name="edit_employee_form" id="create_project_form" class="m-b-30">
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Full Name <span class="text-danger">*</span></label>
											<input class="form-control" value="John" type="text">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Username <span class="text-danger">*</span></label>
											<input class="form-control" value="johndoe" type="text">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Email <span class="text-danger">*</span></label>
											<input class="form-control" value="johndoe@example.com" type="email">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Password</label>
											<input class="form-control" value="johndoe" type="password">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Confirm Password</label>
											<input class="form-control" value="johndoe" type="password">
										</div>
									</div>
									<div class="col-sm-6">  
										<div class="form-group">
											<label class="control-label">Employee ID <span class="text-danger">*</span></label>
											<input type="text" value="FT-0001" readonly="" class="form-control floating">
										</div>
									</div>
									<div class="col-sm-6">  
										<div class="form-group">
											<label class="control-label">Joining Date <span class="text-danger">*</span></label>
											<div class="cal-icon"><input class="form-control datetimepicker" type="text"></div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Phone </label>
											<input class="form-control" value="9876543210" type="text">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Company</label>
											<select class="select">
												<option>Global Technologies</option>
												<option>Delta Infotech</option>
												<option selected>International Software Inc</option>
											</select>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Designation</label>
											<select class="select">
												<option>Web Developer</option>
												<option>Web Designer</option>
												<option>SEO Analyst</option>
											</select>
										</div>
									</div>
								</div>
								<div class="table-responsive m-t-15">
									<table class="table table-striped custom-table">
										<thead>
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
												<td>Holidays</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input type="checkbox">
												</td>
												<td class="text-center">
													<input type="checkbox">
												</td>
												<td class="text-center">
													<input type="checkbox">
												</td>
												<td class="text-center">
													<input type="checkbox">
												</td>
												<td class="text-center">
													<input type="checkbox">
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
													<input type="checkbox">
												</td>
												<td class="text-center">
													<input type="checkbox">
												</td>
												<td class="text-center">
													<input type="checkbox">
												</td>
											</tr>
											<tr>
												<td>Clients</td>
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
													<input type="checkbox">
												</td>
												<td class="text-center">
													<input type="checkbox">
												</td>
												<td class="text-center">
													<input type="checkbox">
												</td>
											</tr>
											<tr>
												<td>Projects</td>
												<td class="text-center">
													<input checked="" type="checkbox">
												</td>
												<td class="text-center">
													<input type="checkbox">
												</td>
												<td class="text-center">
													<input type="checkbox">
												</td>
												<td class="text-center">
													<input type="checkbox">
												</td>
												<td class="text-center">
													<input type="checkbox">
												</td>
												<td class="text-center">
													<input type="checkbox">
												</td>
											</tr>
											<tr>
												<td>Tasks</td>
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
													<input type="checkbox">
												</td>
												<td class="text-center">
													<input type="checkbox">
												</td>
											</tr>
											<tr>
												<td>Chats</td>
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
													<input type="checkbox">
												</td>
												<td class="text-center">
													<input type="checkbox">
												</td>
											</tr>
											<tr>
												<td>Assets</td>
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
													<input type="checkbox">
												</td>
												<td class="text-center">
													<input type="checkbox">
												</td>
											</tr>
											<tr>
												<td>Timing Sheets</td>
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
													<input type="checkbox">
												</td>
												<td class="text-center">
													<input type="checkbox">
												</td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="m-t-20 text-center">
									<button class="btn btn-primary">Save Changes</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" style="z-index: 999999;" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content modal-md">
						<div class="modal-header">
							<h4 class="modal-title">Delete Employee</h4>
						</div>
						<form>
							<div class="modal-body card-box">
								<p><p>This Employee Has been Deleted</p></p>
								<div class="m-t-20"> <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
									<button type="submit" onclick="delete_employeenumber(empnumber)" class="btn btn-danger">Delete</button>
								</div>
							</div>
						</form>
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
			<div  class="modal fade" id="ErrorModal1" tabindex="-1" role="dialog" style="z-index: 999999;" aria-labelledby="ErrorModalLabel" aria-hidden="true">
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
		</div>
		<div class="sidebar-overlay" data-reff="#sidebar"></div>
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/jquery.slimscroll.js"></script>
		<script type="text/javascript" src="js/select2.min.js"></script>
		<script type="text/javascript" src="js/moment.min.js"></script>
		<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
		<script type="text/javascript" src="js/app.js"></script>
		<script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>
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
	$("#show_no_record").html("");
				  
	
	var emp_id=$("#user_login").val();
	var user_login_id=$("#user_login_id").val();
	
	var form_data="page=all_employee_search_page&user_login="+emp_id+"&user_login_id="+user_login_id;
	$.ajax({
		url:'employees_ajax.php',
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
	
$(document).on('submit','#search_byempnumber',function(e){

	e.preventDefault();
	$(document).ajaxStart(function(){
	$("#wait").css("display", "block");
	});
	$(document).ajaxComplete(function(){
		$("#wait").css("display", "none");
	});
	  
	var empid_search=$("#empid_search").val();
	var empname_search=$("#empname_search").val();
	var designation_search=$("#designation_search").val();
	var task_status_search=$("#empid_search").val();
	
	
	if(task_status_search=='')
	{
		$.alert({
			title: 'Alert!',
			content: "Please Enter Employee Code First.",
		});
			$("#task_status_search").focus();
			return false;
		  
		
	}
	var form_data="page=employee_search_page&empid_search="+empid_search+"&empname_search="+empname_search+"&designation_search="+designation_search;
	$.ajax({
		url:'employees_ajax.php',
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

	
	
$(document).on('submit','#create_employee_form',function(e){

		var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		var phoneno_regex = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
		var input_regex=/^[a-zA-Z0-9- ]*$/;
		var email_address=$("#email").val();
		var phone_number=$("#phonenumber").val();
		var fullname=$('#fullname').val();
		var empid=$("#empnumber").val();
		var checkbox=$('#check_list');	
	
	  if(empid=='') {
		  $.alert({
		title: 'Alert!',
		content: "Please Employee Code should not be empty.",
	});
		$("#empnumber").focus();
		return false;
	  }
		     
	if(fullname=='') {
		$.alert({
			title: 'Alert!',
			content: "Please Full name should not be empty.",
		});
			$("#fullname").focus();
			return false;
		  }
		  
	if(/^[a-zA-Z0-9- ]*$/.test(fullname) == false) {
		$.alert({
			title: 'Alert!',
			content: "Please Full name contains illegal characters.",
		});
		$("#fullname").focus();
		return false;
	}
			
	if(email_address=='') {
	$.alert({
		title: 'Alert!',
		content: "Please enter email address.",
			});
		$("#email").focus();
		return false;
	  }
		  
	if(!regex.test(email_address)) {
		$.alert({
		title: 'Alert!',
		content: "Please email address should be valid",
	});
			$("#email").focus();
			return false;
		  }
	
	if(phone_number=='') {
		$.alert({
			title: 'Alert!',
			content: "Please Phone Number should not be empty.",
		});
			$("#phonenumber").focus();
			return false;
		  }
		  
   if(!phoneno_regex.test(phone_number)) {
	   $.alert({
			title: 'Alert!',
			content: "Please Phone Number should be valid.",
		});
	$("#phonenumber").focus();
	return false;
	}
	 
	 var add_designation=$("#add_designation").val();	
		  if(add_designation=='') {
			  $.alert({
			title: 'Alert!',
			content: "Please Employee designetion should not be empty.",
		});
			$("#add_designation").focus();
			return false;
		  }

		  
	  var joining_date=$("#joining_date").val();	
	  if(joining_date=='') {
		  $.alert({
		title: 'Alert!',
		content: "Please Joining Date should not be empty.",
	});
		$("#joining_date").focus();
		return false;
	  }
		  
	   var company_name=$("#company_name").val();	
	  if(company_name=='') {
		  $.alert({
		title: 'Alert!',
		content: "Please Company name should not be empty.",
	});
		$("#company_name").focus();
		return false;
	  }
	  
  var collegename=$("#college_name").val();	
	  if(collegename=='') {
		  $.alert({
		title: 'Alert!',
		content: "Please College name should not be empty.",
	});
		$("#college_name").focus();
		return false;
	  }
	
	if(input_regex.test(collegename) == false) {
		$.alert({
			title: 'Alert!',
			content: "Please College name contains illegal characters.",
		});
		$("#college_name").focus();
		return false;
	}
		  
   var majorname=$("#major_name").val();	
	  if(majorname=='') {
		  $.alert({
		title: 'Alert!',
		content: "Please Major name should not be empty.",
	});
		$("#major_name").focus();
		return false;
	  }
		  
	if(input_regex.test(majorname) == false) {
		$.alert({
			title: 'Alert!',
			content: "Please Major name contains illegal characters.",
		});
		$("#major_name").focus();
		return false;
	}
		  
   var prevempr=$("#prev_empr").val();	
	  if(prevempr=='') {
		  $.alert({
		title: 'Alert!',
		content: "Please Previous Employer name should not be empty.",
	});
		$("#prev_empr").focus();
		return false;
	  }
		  
	if(input_regex.test(prevempr) == false) {
		$.alert({
			title: 'Alert!',
			content: "Please Previous Employer name contains illegal characters.",
		});
		$("#prev_empr").focus();
		return false;
	}	  
   var prepos=$("#pre_position").val();	
	  if(prepos=='') {
		  $.alert({
		title: 'Alert!',
		content: "Please Previous Position name should not be empty.",
	});
		$("#pre_position").focus();
		return false;
	  }
		  
	if(input_regex.test(prepos) == false) {
		$.alert({
			title: 'Alert!',
			content: "Please Previous Position name contains illegal characters.",
		});
		$("#pre_position").focus();
		return false;
	}
   
	
	   if($('input[class^="myCheckbox"]:checked' ).length === 0) {
		     $.alert({
		title: 'Alert!',
		content: "Please select one skill at least.",
	});
    
	  return false;
    
   }

			$("#show_msg").html("<p>Process has been Successfully Done</p>");
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
				var searchIDs = $("#find-table input:checkbox:checked").map(function(){
				  return $(this).val();
				}).get(); 
				console.log(searchIDs);
				var data_all=$("#create_employee_form").serialize();
				var joining_date=$("#joining_date").val();
				var form_data="page=create_employee_page&"+data_all+"&joining_date="+joining_date;
				alert(form_data);
				$.ajax({
					url:'employees_ajax.php',
					type:'POST',
					data:form_data,
					async:true,
					cache: false,
					success: function(result){
						console.log(result);
						if(result!=''){
					$("#exampleModal1")
						.modal("show")
						.on("shown.bs.modal", function () {
						$("#show_msg").html("<p>Process has bees Done successfully.</p>");
							window.setTimeout(function () {
								$("#exampleModal1").modal("hide");
								location.reload(); 
							}, 4000);                 
						});
					
					}else if(result==1){
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

});


 function edit_new_employee(empnumber,fullname,add_designation,email,joining_date,phonenumber,add_gender,company_name,college_name,major_name,prev_empr,pre_position,check_list)
    { 
	
		$("#empnumber").val(empnumber);
		$("#add_employee").modal('show');
		$("#fullname").val(fullname);
		$("#add_designation").val(add_designation);
		$("#add_gender").val(add_gender);
		$("#email").val(email);
		$("#joining_date").val(joining_date);
		$("#phonenumber").val(phonenumber);
		$("#company_name").val(company_name);
		$("#college_name").val(college_name);
		$("#major_name").val(major_name);
		$("#prev_empr").val(prev_empr);
		$("#pre_position").val(pre_position);
	/*	$( "input[type='checkbox']" ).prop({
		  disabled: true
		});*/
		
		


      
          
		

   }
   function delete_employeenumber(empnumber)
    {
		var conf=confirm("Are you sure want to delete this!.");
		if(conf==true)
		{  

		var empnumber=$("#empnumber").val();
	    var form_data="page=delete_employeenumber&empnumber="+empnumber;
			$.ajax({
				url:'employees_ajax.php',
				type:'POST',
				data:form_data,
				async:true,
				cache: false,
				success: function(result){
					console.log(result);
					if(result==1 || result==0){
					$("#ErrorModal1")
					.modal("show")
					.on("shown.bs.modal", function () {
					$("#error_notif").html("<p>Employee Record Can't be deleted.</p>");
						window.setTimeout(function () {
							$("#ErrorModal1").modal("hide");
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
</body>
</html>