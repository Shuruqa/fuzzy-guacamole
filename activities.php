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
				<div class="row filter-row">
					 <form name="filter_expired_task" id="filter_expired_task" method="post" >
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
									<select class="select floating" id="filterText" name="filterText" style='display:inline-block' >
											    <option value="All">Select Project Status</option>
												<option value="Active">Active</option>
												<option value="Expired">Expired</option>
												<option value="In-Progress">In-Progress</option>
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
									<h3 class="panel-title">Expired Tasks</h3>
								</div>
								<div class="panel-body">
									<div class="table-responsive">
										<table id="expired_datatable" class="table table-striped custom-table m-b-0">
											<thead>
												<tr>
													<th>SN</th>
													<th>Emp Code</th>
													<th>Full Name </th>
													<th>Project ID</th>
													<th>Project Name</th>
													<th>Task Name</th>
													<th>Start Date</th>
													<th>Expired Date</th>
													<th>Status</th>
												</tr>
											</thead>
											<tbody id="expired_tasks"></tbody>
											<tbody id="show_no_record"></tbody>
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
						<div class="col-md-6" style="display:none;">
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
		var all_data=$("#filter_expired_task").serialize();
	
		var form_data="page=All_expired_tasks_notification&task_ids="+task_id+"&user_login="+user_login;
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
			$("#expired_tasks").html(res_data.output);
			if(res_data.output==''){
				$("#show_record1").html('<tr class="odd"><td valign="top" colspan="10" class="dataTables_empty">No data available in table</td></tr>');
						
				}
					
				}
			});
		
	});


$(document).on('submit','#filter_expired_task',function(e){
	
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
		var project_status_search=$("#project_status_search").val();
		var pro_code=$("#pro_code").val();
		var all_data=$("#filter_expired_task").serialize();
	
		var form_data="page=tasks_notification&emp_id="+emp_id+"&pro_code="+pro_code; //&task_ids="+task_id+"&user_login="+user_login+"
		
		$.ajax({
			url:'view_task_ajax.php',
			type:'POST',
			data:form_data,
			async:true,
			cache: false,
			success: function(result){
			var res_data= jQuery.parseJSON(result);
			$("#expired_tasks").html(res_data.output);
			$("#expired_tasks").show();
			$("#show_no_record").hide();
			if(res_data.output==''){
				$("#show_no_record").html('<tr class="odd"><td valign="top" colspan="10">No Records Available</td></tr>');
				$("#show_no_record").show();
				$("#expired_tasks").hide();
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
	function clearFilter()
	{
		$('.filterText').val('');
		$('.content').show();
	}
		

});
</script>
    </body>
</html>