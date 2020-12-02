<?php 
	session_start();
	include('../dbConnect.php');
	include('admin.php');

	include("header.php");
	include("sidebar.php");

	$dbConnect = new dbConnect();
	$admin = new admin();

	if(isset($_GET['id']))
	{
		// echo "<center>".$_GET['id']."</center>";
		$idpass = $_GET['id'];
		$sql = $admin->General($idpass, $dbConnect->connect);
	}
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<style>
		body
		{
			background-color:#F1F1F1;
		}
	</style>
<div id="main-content" class="container"> 
    <noscript> 
        <div class="notification error png_bg">
            <div>
                Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
            </div>
        </div>
	</noscript>
	
	<!-- Page Head -->
	<?php
		echo "<h2>Welcome " .$_SESSION['userdata']['username']. "</h2>";
		echo "<p id='page-intro'>What would you like to do?</p>"
	?>

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 ">
			<div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
				<div class="card-header">Fare</div>
					<div class="card-body">
						<h5 class="card-title">Total Fare Spent On CedCab</h5>
						<p class="card-text">
							<?php 
								$admin->total_user($dbConnect->connect);
							?>
						</p>
					</div>
				</div>
			</div>


			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 ">
				<div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
					<div class="card-header">Fare</div>
						<div class="card-body">
							<h5 class="card-title">Overall Fare Collection</h5>
							<p class="card-text">
								<?php 
									$admin->total_fare($dbConnect->connect);
								?>
							</p>
					</div>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 ">
				<div class="card text-white bg-success mb-3" style="max-width: 18rem;">
					<div class="card-header">Users</div>
						<div class="card-body">
							<h5 class="card-title">Number of Approved Users</h5>
							<p class="card-text">
								<?php 
									$admin->approved_user($dbConnect->connect);
								?>
							</p>
						</div>
					</div>
				</div>

			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 ">
				<div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
					<div class="card-header">Users</div>
						<div class="card-body">
							<h5 class="card-title">Number of Blocked Users</h5>
							<p class="card-text">
								<?php 
									$admin->blocked_user($dbConnect->connect);
								?>
							</p>
						</div>
					</div>
				</div>

			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 ">
				<div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
					<div class="card-header">Request</div>
						<div class="card-body">
							<h5 class="card-title">Number of Pending Request</h5>
							<p class="card-text">
								<?php 
									$admin->pending_request($dbConnect->connect);
								?>
							</p>
						</div>
					</div>
				</div>

			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 ">
				<div class="card text-white bg-success mb-3" style="max-width: 18rem;">
					<div class="card-header">Request</div>
						<div class="card-body">
							<h5 class="card-title">Cancelled Request</h5>
							<p class="card-text">
								<?php 
									$admin->cancelled_request($dbConnect->connect);
								?>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

