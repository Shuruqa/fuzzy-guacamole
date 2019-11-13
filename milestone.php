
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
						<div class="col-sm-4">
							<h4 class="page-title">All Milestones</h4>
						</div>
						<div class="col-sm-8 text-right m-b-20">
							<a href="#" class="btn btn-primary rounded pull-right" data-toggle="modal" data-target="#create_milestone"><i class="fa fa-plus"></i> Create Milestone</a>
							<div class="view-icons">
								<a href="milestone.php" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a>
							</div>
						</div>
					</div>
					<div class="row filter-row" style="display:none;">
						<div class="col-sm-3 col-xs-6">  
							<div class="form-group form-focus">
								<label class="control-label">Project Name</label>
								<input type="text" class="form-control floating" />
							</div>
						</div>
						<div class="col-sm-3 col-xs-6">  
							<div class="form-group form-focus">
								<label class="control-label">Employee Name</label>
								<input type="text" class="form-control floating" />
							</div>
						</div>
						<div class="col-sm-3 col-xs-6"> 
							<div class="form-group form-focus select-focus">
								<label class="control-label">Role</label>
								<select class="select floating"> 
									<option value="">Select Roll</option>
									<option value="">Web Developer</option>
									<option value="1">Web Designer</option>
									<option value="1">Android Developer</option>
									<option value="1">Ios Developer</option>
								</select>
							</div>
						</div>
						<div class="col-sm-3 col-xs-6">  
							<a href="#" class="btn btn-success btn-block"> Search </a>  
						</div>     
                    </div>
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table id="milestone_table" class="table table-striped custom-table datatable">
									<thead>
										<tr>
											<th>Milestone</th>
											<th>Owner </th>
											<th>Milestone Flag</th>
											<th>Start Date</th>
											<th>End Date</th>
											<th class="text-right">Action</th>
										</tr>
									</thead>
									<tbody id="show_milestones"></tbody>
									<tbody id="no_records"></tbody>
								</table>
							</div>
						</div>
					</div>
                </div>
			</div>
        </div>
			<div id="create_milestone" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<div class="modal-content modal-lg">
						<div class="modal-header">
							<h4 class="modal-title">New Milestone</h4>
						</div>
						<div class="modal-body">
							<form method="post" id="create_milestone_form" name="create_milestone_form" >
								<div class="row">
								<div class="col-md-3">
										<div class="form-group">
											<label>Who is responsiable?</label>
											<input autocomplete="off" type="text" list="emp_datalist" id="emp_id" name="emp_id" value="" class="form-control floating custom-select-sm" maxlength="6">
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
									<div class="col-md-3">
										<div class="form-group">
											<label>Milestone flag</label>
											<select class="select" id="milestone_flag" name="milestone_flag">
												<option value="">Select value</option>
												<option value="Internal">Internal</option>
												<option value="External">External</option>
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Project ID</label>
											<select class="select" id="proj_id" name="proj_id">
												<option value="">Select value</option>
												<?php 
											$stmt = mysqli_query($func->dbo,"SELECT * FROM `projects` ");
													
											if ($stmt) 
											{
												while($row = mysqli_fetch_assoc($stmt))
													{
													   echo '<option  data-subtext="'.$row['PROJECT_ID'].'" value="'.$row['PROJECT_ID'].'">'.$row['PROJECT_ID'].'=>'.$row["PROJ_NAME"].'</option>';
													}
											}
											?>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label>Start Date</label>
											<div class="cal-icon">
											<input autocomplete="off" type="text" class="form-control datetimepicker" name="milestone_fromdate" id="milestone_fromdate"/>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>End Date</label>
											<div class="cal-icon">
										   <input  autocomplete="off" type="text" class="form-control datetimepicker" name="milestone_todate" id="milestone_todate"/>
										</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label>Milestone</label>
									<textarea rows="4" cols="5" id="milestone_desc" name="milestone_desc" class="form-control summernote" placeholder="Enter your message here"></textarea>
								</div>
								<div class="m-t-20 text-center">
									<input type="hidden" name="user_login" id="user_login" value="<?php echo $_SESSION['username_admin']; ?>" />
									<input type="hidden" name="regular_user_login" id="regular_user_login" value="<?php echo $_SESSION['username_enrollid']; ?>" />
									<input type="hidden" name="milestone_ids" id="milestone_ids" value="" />
									<input type="hidden" name="pro_ids" id="pro_ids" value="" />
									<button type="submit" id="submit" name="submit" value="Add" class="btn btn-primary">Save Milestone</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div id="edit_milestone" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<div class="modal-content modal-lg">
						<div class="modal-header">
							<h4 class="modal-title">Edit Milestone</h4>
						</div>
						<div class="modal-body">
							<form method="post" id="edit_milestone_form" name="edit_milestone_form">
								<div class="row">
								<div class="col-md-3">
										<div class="form-group">
											<label>Who is responsiable?</label>
											<input autocomplete="off" type="text" list="emp_datalist" id="emp_id" name="emp_id" value="" class="form-control floating custom-select-sm" maxlength="6">
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
									<div class="col-md-3">
										<div class="form-group">
											<label>Milestone flag</label>
											<select class="select" id="milestone_flag" name="milestone_flag">
												<option value="">Select value</option>
												<option value="Internal">Internal</option>
												<option value="External">External</option>
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Project ID</label>
											<select class="select" id="proj_id" name="proj_id">
												<option value="">Select value</option>
												<?php 
											$stmt = mysqli_query($func->dbo,"SELECT * FROM `projects` ");
													
											if ($stmt) 
											{
												while($row = mysqli_fetch_assoc($stmt))
													{
													   echo '<option  data-subtext="'.$row['PROJECT_ID'].'" value="'.$row['PROJECT_ID'].'">'.$row['PROJECT_ID'].'=>'.$row["PROJ_NAME"].'</option>';
													}
											}
											?>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label>Start Date</label>
											<div class="cal-icon">
									  <input autocomplete="off" type="text" class="form-control datetimepicker" name="milestone_fromdate" id="milestone_fromdate"/>
									</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>End Date</label>
											<div class="cal-icon">
										   <input  autocomplete="off" type="text" class="form-control datetimepicker" name="milestone_todate" id="milestone_todate"/>
										</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label>Milestone</label>
									<textarea rows="4" cols="5" id="milestone_desc" name="milestone_desc" class="form-control summernote" placeholder="Enter your message here"></textarea>
								</div>
								<div class="m-t-20 text-center">
									<input type="hidden" name="user_login" id="user_login" value="<?php echo $_SESSION['username_admin']; ?>" />
									<input type="hidden" name="regular_user_login" id="regular_user_login" value="<?php echo $_SESSION['username_enrollid']; ?>" />
									<input type="hidden" name="milestone_ids" id="milestone_ids" value="" />
									<input type="hidden" name="pro_ids" id="pro_ids" value="" />
									<button type="submit" id="submit" name="submit" value="Add" class="btn btn-primary">Save Milestone</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div id="delete_project" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content modal-md">
						<div class="modal-header">
							<h4 class="modal-title">Delete Project</h4>
						</div>
						<div class="modal-body card-box">
							<p>Are you sure want to delete this?</p>
							<div class="m-t-20"> <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
								<button type="submit" class="btn btn-danger">Delete</button>
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
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>
		<script type="text/javascript" src="js/jquery.slimscroll.js"></script>
		<script type="text/javascript" src="js/select2.min.js"></script>
		<script type="text/javascript" src="js/moment.min.js"></script>
		<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
		<script type="text/javascript" src="js/app.js"></script>
		<script src="js/jquery-confirm.min.js"></script><script>
$(document).ready(function(){

//to create the milestones for project
$(document).on('submit','#create_milestone_form',function(e){
       
	var milestone_flag=$("#milestone_flag").val();	
	var emp_id=$("#emp_id").val();
	var proj_id=$("#proj_id").val();
	var milestone_fromdate=$("#milestone_fromdate").val();
	var milestone_todate = $('#milestone_todate').val();
	var milestone_desc = $('#milestone_desc').val();
	
	if(milestone_flag=='') {
		$.alert({
			title: 'Alert!',
			content: "Please milestone flag should not be empty.",
		});
			$("#milestone_flag").focus();
			return false;
		  }
	
	
	if(emp_id=='') {
		$.alert({
			title: 'Alert!',
			content: "Please Employee ID should not be empty.",
		});
			$("#emp_id").focus();
			return false;
		  }
		  
	
	if(/^[a-zA-Z0-9- ]*$/.test(emp_id) == false) {
	 $.alert({
		title: 'Alert!',
		content: "Please Employee ID contains illegal characters.",
	});
		$("#emp_id").focus();
		return false;
	}
	
	if(milestone_fromdate=='') {
		$.alert({
			title: 'Alert!',
			content: "Please Start Date not be empty.",
		});
			$("#milestone_fromdate").focus();
			return false;
		  }
		  
		  
	if(milestone_todate=='') {
		$.alert({
			title: 'Alert!',
			content: "Please End Date should not be empty.",
		});
			$("#milestone_todate").focus();
			return false;
		  }
	
	
	if(milestone_desc=='') {
		$.alert({
			title: 'Alert!',
			content: "Please Milestone Description should not be empty.",
		});
			$("#milestone_desc").focus();
			return false;
		  }
		  
	if(/^[a-zA-Z0-9- ]*$/.test(milestone_desc) == false) {
		 $.alert({
			title: 'Alert!',
			content: "Please Milestone Description contains illegal characters.",
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
				
				
				
				var data_all=$("#create_milestone_form").serialize();
				var form_data="page=add_milestones_page&"+data_all;
				alert(form_data);
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
	

});

  

   //This is to edit all milestone in project 
 function edit_milestone(milestone_ids,emp_id,milestone_flag,milestone_fromdate,milestone_todate,proj_id,milestone_desc)
  {
	
	$("#milestone_ids").val(milestone_ids);
	$("#emp_id").val(emp_id);
	$("#milestone_flag").val(milestone_flag);
	$("#milestone_fromdate").val(milestone_fromdate);
	$("#milestone_todate").val(milestone_todate);
	$("#proj_id").val(proj_id);
	$("#milestone_desc").val(milestone_desc);

	
	var milestone_id=$("#milestone_ids").val();
	var proj_id =$("#proj_id ").val();
	var form_data="page=add_milestones_page&milestone_ids="+milestone_id+"&proj_id="+proj_id;

	
  }


//this is to delete the task
   function delete_milestone(milestone_ids)
    {	
		$("#milestone_ids").val(milestone_ids);
		var conf=confirm("Are you sure want to Delete Task?");
		if(conf==true)
		{        

		 var milestone_id1=$("#milestone_ids").val();
		 var form_data="page=delete_milestone&milestone_ids="+milestone_id1;
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
</script>
<script>
$(document).ready(function(e) {
	
	var table = $('#milestone_table').DataTable();
	table.destroy();
	$('#milestone_table').DataTable({
		"processing": true,
		"bLengthChange": false,
		//"scrollX": true,
		//"scrollY": 200,
		"searching":false,
        "serverSide": true,
		'columnDefs': [
		 {
			  "targets": 5,
			  "className": "text-right",
		 }],
		"ajax": {
			"url": "datatables.php",
			"data": function ( d ) 
			{
			d.page="view_milestone_page";
			
			}

		}

	});
	
	


});
</script>
    </body>
</html>