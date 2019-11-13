<?php 
session_start();
session_destroy();
unset($_SESSION['username_admin']);  // where $_SESSION["nome"] is your own variable. if you do not have one use only this as follow **session_unset();**
header("Location: index.php");

?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
        <title>Dashboard - EMS</title>
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>
        <div class="main-wrapper">
			<div class="account-page">
				<a href="job-list.html" class="btn btn-primary apply-btn">Apply Job</a>
				<div class="container">
					<h3 class="account-title">Management Login</h3>
					<div class="account-box">
						<div class="account-wrapper">
							<div class="account-logo">
								<a href="index.html"><img src="images/logo2.png" alt="Focus Technologies"></a>
							</div>
							<form method="post" >
								<div class="form-group form-focus">
									<label class="control-label">Username or Email</label>
									<input autocomplete="off" type="text"  name="username" id="username" class="form-control floating" >
								</div>
								<div class="form-group form-focus">
									<label class="control-label">Password</label>
									<input autocomplete="off" type="password" name="password" id="password" class="form-control floating" >
								</div>
								<div class="form-group text-center">
									<button type="submit" name="submit" class="btn btn-primary btn-block account-btn" >Login</button>
								</div>
								<div class="text-center">
									<a href="forgot-password.html">Forgot your password?</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
        </div>
		<div class="sidebar-overlay" data-reff="#sidebar"></div>
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/app.js"></script>
    </body>
</html>