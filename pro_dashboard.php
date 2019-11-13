

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
					<div class="row" id="view_dashbord">
						<div class="col-md-6 col-sm-6 col-lg-3">
							<div class="dash-widget clearfix card-box">
								<span class="dash-widget-icon"><i class="fa fa-cubes" aria-hidden="true"></i></span>
								<div class="dash-widget-info">
									<h3 id="Project_Modules"></h3>
									<span><a href="modules.php?pro_id=<?php echo $_GET['pro_id'];?>" style="text-decoration:none;color:#000000;">Modules</a></span>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-lg-3">
							<div class="dash-widget clearfix card-box">
								<span class="dash-widget-icon"><i class="fa fa-usd" aria-hidden="true"></i></span>
								<div class="dash-widget-info">
									<h3 id="Project_Launch_Date"></h3>
									<span><a href="#" style="text-decoration:none;color:#000000;">Launch Date</a></span>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-lg-3">
							<div class="dash-widget clearfix card-box">
								<span class="dash-widget-icon"><i class="fa fa-diamond"></i></span>
								<div class="dash-widget-info">
									<h3 id="Project_tasks"></h3>
									<span><a href="tasks_details.php?pro_id=<?php echo $_GET['pro_id'];?>" style="text-decoration:none;color:#000000;">Tasks</a></span>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-lg-3">
							<div class="dash-widget clearfix card-box">
								<span class="dash-widget-icon"><i class="fa fa-user" aria-hidden="true"></i></span>
								<div class="dash-widget-info">
									<h3 id="Project_developers"></h3>
									<span><a href="employees.php" style="text-decoration:none;color:#000000;">Employees</a></span>
								</div>
							</div>
						</div>
						 <input type="hidden" name="user_login" id="user_login" value="<?php echo $_SESSION['username_admin']; ?>" />
						 <input type="hidden" name="regular_user_login" id="regular_user_login" value="<?php echo $_SESSION['username_enrollid']; ?>" />
						<input  type="hidden"  id="pro_id" value="<?php echo $_GET['pro_id'];?>" name="pro_id">
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-6 text-center">
									<div class="card-box">
										<h3 class="card-title">Project Management System</h3>
										<div class="contain1"><canvas id="bar-charts"></canvas></div>
									</div>
								</div>
								<div class="col-md-6 text-center">
									<div class="card-box">
										<h3 class="card-title">Overall Project Status</h3>
										<div class="contain2"><canvas id="pie-charts" width="600" height="300"></canvas></div>
									</div>
								</div>
								<div class="col-md-6 text-center" style="">
									<div class="card-box">
										<h3 class="card-title">Overall Tasks Status</h3>
										<div class="contain3"><canvas  id="line-charts"></canvas></div>
									</div>
								</div>
								<div class="col-md-6 text-center">
									<div class="card-box">
										<h3 class="card-title">Developer Tasks Status</h3>
										<div class="contain4"><canvas id="area-charts" width="600" height="300"></canvas></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6" >
							<div class="panel panel-table">
								<div class="panel-heading">
									<h3 class="panel-title">Module</h3>
								</div>
								<div class="panel-body" >
									<div class="table-responsive">	
										<table  class="table table-striped custom-table m-b-0">
											<thead>
												<tr>
													<th>No.</th>
													<th>Module Name</th>
													<th>Page Name</th>
													<th>Developer Name</th>
													<th>Start Date</th>
													<th>End Date</th>
													<th>Page Status</th>
												</tr>
											</thead>
											<tbody id="modules_tables"></tbody>
											<tbody id="show_no_record"></tbody>
										</table>
									</div>
								</div>
								<div class="panel-footer">
									<a href="modules.php?pro_id=<?php echo $_GET['pro_id'];?>" class="show-all">View all modules</a>
								</div>
							</div>
						</div>
						<div class="col-md-6 text-center" style="">
							<div class="card-box">
								<h3 class="card-title">Tasks Completion Graph </h3>
								<div class="contain3"><canvas  id="test-chart" width="600" height="300"></canvas></div>
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
					<div class="row" style="display:none;">
						<div class="col-md-6">
							<div class="panel panel-table">
								<div class="panel-heading">
									<h3 class="panel-title">Clients</h3>
								</div>
								<div class="panel-body">
									<div class="table-responsive">
										<table class="table table-striped custom-table m-b-0">
											<thead>
												<tr>
													<th style="min-width:200px;">Name</th>
													<th>Email</th>
													<th>Status</th>
													<th class="text-right">Action</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td style="min-width:200px;">
														<a href="#" class="avatar">B</a>
														<h2><a href="client-profile.html">Barry Cuda <span>CEO</span></a></h2>
													</td>
													<td>barrycuda@example.com</td>
													<td>
														<div class="dropdown action-label">
															<a class="btn btn-white btn-sm rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-dot-circle-o text-success"></i> Active <i class="caret"></i>
															</a>
															<ul class="dropdown-menu pull-right">
																<li><a href="#"><i class="fa fa-dot-circle-o text-success"></i> Active</a></li>
																<li><a href="#"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a></li>
															</ul>
														</div>
													</td>
													<td class="text-right">
														<div class="dropdown">
															<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
															<ul class="dropdown-menu pull-right">
																<li><a href="#" title="Edit"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
																<li><a href="#" title="Delete"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
															</ul>
														</div>
													</td>
												</tr>
												<tr>
													<td>
														<a class="avatar">T</a>
														<h2><a href="client-profile.html">Tressa Wexler <span>Manager</span></a></h2>
													</td>
													<td>tressawexler@example.com</td>
													<td>
														<div class="dropdown action-label">
															<a class="btn btn-white btn-sm rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-dot-circle-o text-danger"></i> Inactive <i class="caret"></i>
															</a>
															<ul class="dropdown-menu pull-right">
																<li><a href="#"><i class="fa fa-dot-circle-o text-success"></i> Active</a></li>
																<li><a href="#"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a></li>
															</ul>
														</div>
													</td>
													<td class="text-right">
														<div class="dropdown">
															<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
															<ul class="dropdown-menu pull-right">
																<li><a href="#" title="Edit"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
																<li><a href="#" title="Delete"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
															</ul>
														</div>
													</td>
												</tr>
												<tr>
													<td>
														<a href="client-profile.html" class="avatar">R</a>
														<h2><a href="client-profile.html">Ruby Bartlett <span>CEO</span></a></h2>
													</td>
													<td>rubybartlett@example.com</td>
													<td>
														<div class="dropdown action-label">
															<a class="btn btn-white btn-sm rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-dot-circle-o text-danger"></i> Inactive <i class="caret"></i>
															</a>
															<ul class="dropdown-menu pull-right">
																<li><a href="#"><i class="fa fa-dot-circle-o text-success"></i> Active</a></li>
																<li><a href="#"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a></li>
															</ul>
														</div>
													</td>
													<td class="text-right">
														<div class="dropdown">
															<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
															<ul class="dropdown-menu pull-right">
																<li><a href="#" title="Edit"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
																<li><a href="#" title="Delete"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
															</ul>
														</div>
													</td>
												</tr>
												<tr>
													<td>
														<a href="client-profile.html" class="avatar">M</a>
														<h2><a href="client-profile.html"> Misty Tison <span>CEO</span></a></h2>
													</td>
													<td>mistytison@example.com</td>
													<td>
														<div class="dropdown action-label">
															<a class="btn btn-white btn-sm rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-dot-circle-o text-success"></i> Active <i class="caret"></i>
															</a>
															<ul class="dropdown-menu pull-right">
																<li><a href="#"><i class="fa fa-dot-circle-o text-success"></i> Active</a></li>
																<li><a href="#"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a></li>
															</ul>
														</div>
													</td>
													<td class="text-right">
														<div class="dropdown">
															<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
															<ul class="dropdown-menu pull-right">
																<li><a href="#" title="Edit"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
																<li><a href="#" title="Delete"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
															</ul>
														</div>
													</td>
												</tr>
												<tr>
													<td>
														<a href="client-profile.html" class="avatar">D</a>
														<h2><a href="client-profile.html"> Daniel Deacon <span>CEO</span></a></h2>
													</td>
													<td>danieldeacon@example.com</td>
													<td>
														<div class="dropdown action-label">
															<a class="btn btn-white btn-sm rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-dot-circle-o text-danger"></i> Inactive <i class="caret"></i>
															</a>
															<ul class="dropdown-menu pull-right">
																<li><a href="#"><i class="fa fa-dot-circle-o text-success"></i> Active</a></li>
																<li><a href="#"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a></li>
															</ul>
														</div>
													</td>
													<td class="text-right">
														<div class="dropdown">
															<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
															<ul class="dropdown-menu pull-right">
																<li><a href="#" title="Edit"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
																<li><a href="#" title="Delete"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
															</ul>
														</div>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
								<div class="panel-footer">
									<a href="clients.html" class="text-primary">View all clients</a>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="panel panel-table">
								<div class="panel-heading">
									<h3 class="panel-title">Recent Projects</h3>
								</div>
								<div class="panel-body">
									<div class="table-responsive">
										<table class="table table-striped custom-table m-b-0">
											<thead>
												<tr>
													<th class="col-md-3">Project Name </th>
													<th class="col-md-3">Progress</th>
													<th class="text-right col-md-1">Action</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>
														<h2><a href="project-view.html">Food and Drinks</a></h2>
														<small class="block text-ellipsis">
															<span class="text-xs">1</span> <span class="text-muted">open tasks, </span>
															<span class="text-xs">9</span> <span class="text-muted">tasks completed</span>
														</small>
													</td>
													<td>
														<div class="progress progress-xs progress-striped">
															<div class="progress-bar bg-success" role="progressbar" data-toggle="tooltip" title="65%" style="width: 65%"></div>
														</div>
													</td>
													<td class="text-right">
														<div class="dropdown">
															<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
															<ul class="dropdown-menu pull-right">
																<li><a href="#" title="Edit"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
																<li><a href="#" title="Delete"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
															</ul>
														</div>
													</td>
												</tr>
												<tr>
													<td>
														<h2><a href="project-view.html">School Guru</a></h2>
														<small class="block text-ellipsis">
															<span class="text-xs">2</span> <span class="text-muted">open tasks, </span>
															<span class="text-xs">5</span> <span class="text-muted">tasks completed</span>
														</small>
													</td>
													<td>
														<div class="progress progress-xs progress-striped">
															<div class="progress-bar bg-success" role="progressbar" data-toggle="tooltip" title="15%" style="width: 15%"></div>
														</div>
													</td>
													<td class="text-right">
														<div class="dropdown">
															<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
															<ul class="dropdown-menu pull-right">
																<li><a href="#" title="Edit"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
																<li><a href="#" title="Delete"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
															</ul>
														</div>
													</td>
												</tr>
												<tr>
													<td>
														<h2><a href="project-view.html">Penabook</a></h2>
														<small class="block text-ellipsis">
															<span class="text-xs">3</span> <span class="text-muted">open tasks, </span>
															<span class="text-xs">3</span> <span class="text-muted">tasks completed</span>
														</small>
													</td>
													<td>
														<div class="progress progress-xs progress-striped">
															<div class="progress-bar bg-success" role="progressbar" data-toggle="tooltip" title="49%" style="width: 49%"></div>
														</div>
													</td>
													<td class="text-right">
														<div class="dropdown">
															<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
															<ul class="dropdown-menu pull-right">
																<li><a href="#" title="Edit"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
																<li><a href="#" title="Delete"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
															</ul>
														</div>
													</td>
												</tr>
												<tr>
													<td>
														<h2><a href="project-view.html">Harvey Clinic</a></h2>
														<small class="block text-ellipsis">
															<span class="text-xs">12</span> <span class="text-muted">open tasks, </span>
															<span class="text-xs">4</span> <span class="text-muted">tasks completed</span>
														</small>
													</td>
													<td>
														<div class="progress progress-xs progress-striped">
															<div class="progress-bar bg-success" role="progressbar" data-toggle="tooltip" title="88%" style="width: 88%"></div>
														</div>
													</td>
													<td class="text-right">
														<div class="dropdown">
															<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
															<ul class="dropdown-menu pull-right">
																<li><a href="#" title="Edit"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
																<li><a href="#" title="Delete"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
															</ul>
														</div>
													</td>
												</tr>
												<tr>
													<td>
														<h2><a href="project-view.html">The Gigs</a></h2>
														<small class="block text-ellipsis">
															<span class="text-xs">7</span> <span class="text-muted">open tasks, </span>
															<span class="text-xs">14</span> <span class="text-muted">tasks completed</span>
														</small>
													</td>
													<td>
														<div class="progress progress-xs progress-striped">
															<div class="progress-bar bg-success" role="progressbar" data-toggle="tooltip" title="100%" style="width: 100%"></div>
														</div>
													</td>
													<td class="text-right">
														<div class="dropdown">
															<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
															<ul class="dropdown-menu pull-right">
																<li><a href="#" title="Edit"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
																<li><a href="#" title="Delete"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
															</ul>
														</div>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
								<div class="panel-footer">
									<a href="projects.php" class="text-primary">View all projects</a>
								</div>
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
        </div>
		<div class="sidebar-overlay" data-reff="#sidebar"></div>
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/jquery.slimscroll.js"></script>
		<script type="text/javascript" src="js/morris.min.js"></script>
		<script type="text/javascript" src="js/raphael-min.js"></script>
		<script type="text/javascript" src="js/app.js"></script>
		<script type="text/javascript" src="js/chart.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	var pro_id=$("#pro_id").val();
	$.ajax({
		url:'dashboard_ajax.php',
		type:'post',
		data:'page=view_modules_dashboard&pro_id='+pro_id,
		cache:false,
		success:function(result)
		{
			var res_data=jQuery.parseJSON(result);
			console.log(res_data.table_data);
			if(res_data.table_data!='')
			{
				$("#modules_tables").html(res_data.table_data);
				$("table > tbody > tr").hide().slice(3).show();
				$("table > tbody > tr").show().slice(3).hide();
				
			}
			if(res_data.table_data==''){
				$("#show_no_record").html('<tr class="odd"><td valign="top" colspan="10">No Records Available</td></tr>');
				$("#show_no_record").show();
				$("#modules_tables").hide();
				}
		}
		
	});
	

	$(".show-all").on("click", function() {
	  $("tbody > tr", $(this).prev()).show();
	});
});
$(document).ready(function() {
		
		$(document).ajaxStart(function(){
		$("#wait").css("display", "block");
		});
		$(document).ajaxComplete(function(){
			$("#wait").css("display", "none");
		});
			var pro_id=$("#pro_id").val();
			$.ajax({
			url:'dashboard_ajax.php',
			type:'post',
			data:'page=display_main2_dashboard&pro_id='+pro_id,
			cache: false,
			success:function(result)
			{
				console.log(result);
				var res_data= jQuery.parseJSON(result);
				$("#Project_Modules").html(res_data.Project_Modules);
				$('#Project_developers').html(res_data.Project_developers);
				$('#Project_tasks').html(res_data.Project_tasks);
				$('#Project_Launch_Date').html(res_data.Project_Launch_Date);
				$('#Project_Launch_Date').html(res_data.Project_Launch_Date);
				
				$('#non_clockable_on_leave').html('0');
				$('#non_clockable_employee_on_leave').html('0');
				$('#non_clockable_rental_on_leave').html('0');
				
				
			    var All_data = [];
				All_data.push(res_data.Project_Modules,res_data.Project_developers,res_data.Project_tasks,res_data.Project_Launch_Date);
				console.log(All_data);
				 
				var ctx = document.getElementById("bar-charts");
				var myChart = new Chart(ctx, {
							type: 'bar',
							data: {
								labels: ['Modules', 'Employees', 'Tasks'],
								datasets: [{
									label: '# of Values ',
									data: All_data,
									backgroundColor: [
										'rgba(81, 152, 255)',
										'rgba(81, 152, 255)',
										'rgba(81, 152, 255)',
										'rgba(81, 152, 255)',
									],
									borderColor: [
										'rgba(81, 152, 255, 1)',
										'rgba(81, 152, 255, 1)',
										'rgba(81, 152, 255, 1)',
										'rgba(81, 152, 255, 1)',
									],
									borderWidth: 1
								}]
							},
							options: {
								scales: {
									yAxes: [{
										ticks: {
											beginAtZero: true
										}
									}]
								}
							}
				});
										
			}
		});	
	})

</script>
<script>
$(document).ready(function() {
	var pro_id=$("#pro_id").val();
		$.ajax({
		url:'dashboard_ajax.php',
		type:'post',
		data:'page=display_main2_dashboard&pro_id='+pro_id,
		cache: false,
		success:function(result)
		{
			console.log(result);
			var res_data= jQuery.parseJSON(result);
			
			
			var All_data = [];
			All_data.push(res_data.Project_Modules,res_data.Project_developers,res_data.Project_tasks,res_data.Project_Launch_Date);
			console.log(All_data);
			
			
			var ctx1 = document.getElementById("pie-charts");
			var myChart = new Chart(ctx1, {
				type: 'doughnut',
				data: {
					labels: ['Modules', 'Employees', 'Tasks'],
					datasets: [{
						label: '# of Values ',
						data: All_data,
						 backgroundColor : [
								'#00c5fb',
								'#0253cc',
								'#80e3ff',
								'#81b3fe'
							],
						borderColor : [
								'#00c5fb',
								'#0253cc',
								'#80e3ff',
								'#81b3fe'
							],
						 borderWidth : [1, 1, 1, 1, 1]
					}]
				},
				title : {
				  display : true,
				  position : "top",
				  text : "Doughnut Chart",
				  fontSize : 18,
				  fontColor : "#111"
				},
				legend : {
				  display : true,
				  position : "center"
				}

	

			});
			}
		});	

})
</script>
<script>
$(document).ready(function() {
	var pro_id=$("#pro_id").val();
		$.ajax({
		url:'dashboard_ajax.php',
		type:'post',
		data:'page=display_task_status_dashboard&pro_id='+pro_id,
		cache: false,
		success:function(result)
		{
			console.log(result);
			var res_data= jQuery.parseJSON(result);
			var All_data = [];
			

			All_data.push(res_data.Completed,res_data.Under_Progress,res_data.Pending,res_data.Expired);
			console.log(All_data);

			var ctx2 = document.getElementById("line-charts");
			var myChart = new Chart(ctx2, {
				type: 'bar',
				data: {
					labels: ['Completed', 'Under Progress', 'Pending', 'Expired'],
					datasets: [{
						label: '# of Values ',
						data:All_data,
						 backgroundColor : [
								'#0253cc',
								'#0253cc',
								'#0253cc',
								'#0253cc',
							],
						borderColor : [
								'#0253cc',
								'#0253cc',
								'#0253cc',
								'#0253cc',
							],

					}]
				},
				options: {
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true,
								min: 0,
								max: 100,
							    callback: function(value){return value+ "%"}
							},
							scaleLabel: {
							   display: true,
							   labelString: "Percentage"
						   }
						}]
					}
				}

	

			});
			}
		});	

})
$(document).ready(function() {
	var pro_id=$("#pro_id").val();
		$.ajax({
		url:'dashboard_ajax.php',
		type:'post',
		data:'page=Tasks_progress_dashboard&pro_id='+pro_id,
		cache: false,
		success:function(result)
		{
			
			var res_data=jQuery.parseJSON(result);
			 console.log(res_data);
			var ctxx = document.getElementById("test-chart");
			var TheChart = new Chart(ctxx, {
				type: 'bar',
				data: {
					labels: ['Tasks01', 'Tasks02', 'Tasks03', 'Tasks04', 'Tasks05'],
					datasets: [{
						label: '# of Values ',
						data:res_data,
						 backgroundColor : [
								'rgba(255, 99, 132)',
								'rgba(54, 162, 235)',
								'rgba(255, 206, 86)',
								'rgba(75, 192, 192)',
								'rgba(153, 102, 255)'
							],
						borderColor : [
								'rgba(255, 99, 132)',
								'rgba(54, 162, 235)',
								'rgba(255, 206, 86)',
								'rgba(75, 192, 192)',
								'rgba(153, 102, 255)'
							],

					}]
				},
				options: {
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true,
								min: 0,
								max: 100,
							    callback: function(value){return value+ "%"}
							},
							scaleLabel: {
							   display: true,
							   labelString: "Percentage"
						   }
						}]
					}
				}

	

			});

		}
	});
});
</script>
<script>
$(document).ready(function() {
	var pro_id=$("#pro_id").val();
		$.ajax({
		url:'dashboard_ajax.php',
		type:'post',
		data:'page=display_dev_task_status&pro_id='+pro_id,
		cache: false,
		success:function(result)
		{
			
			console.log(result);
			var res_data= jQuery.parseJSON(result);
			var All_data = [];
			

			All_data.push(res_data.Completed,res_data.Under_Progress,res_data.Pending);
			console.log(All_data);

			var ctx3 = document.getElementById("area-charts");
			var myChart1 = new Chart(ctx3, {
				type: 'doughnut',
				data: {
					labels: ['Completed', 'Under Progress', 'Pending'],
					datasets: [{
						label: '# of Values ',
						data:All_data,
						 backgroundColor : [
								'#FFB6C1',
								'#FFA500',
								'#FF7F50'
							],
						borderColor : [
								'#FFB6C1',
								'#FFA500',
								'#FF7F50'
							],

					}]
				},
				title : {
				  display : true,
				  position : "top",
				  fontSize : 18,
				  fontColor : "#111"
				},
				legend : {
				  display : true,
				  position : "center"
				}

	

			});
			}
		});	

})
</script>
<!--script>
$(document).ready(function() {
	var pro_id=$("#pro_id").val();
		$.ajax({
		url:'dashboard_ajax.php',
		type:'post',
		data:'page=test&pro_id='+pro_id,
		cache: false,
		dataType: 'json',
		success:function(result)
		{
		
			console.log(result);

			 memberArea = new Morris.Donut({
			 element: 'pie-charts2',
			 data: result,
			//label:['Completed','Under Progress','Pending'],
			 colors: [
					'#00c5fb',
					'#0253cc',
					'#80e3ff',
					'#81b3fe'
				],
			resize: true,
			redraw: true,
			});
			

			}
		});	

})
</script-->
    </body>
</html>