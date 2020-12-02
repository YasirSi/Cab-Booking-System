<?php 
	session_start();

	include('../dbConnect.php');
	include('admin.php');
	
	include("header.php");
	include("sidebar.php");

	if(isset($_GET['id']))
	{
		// echo "<center>".$_GET['id']."</center>";
		
		$dbConnect = new dbConnect();
		$admin = new admin();

		$idpass = $_GET['id'];

		$sql = $admin->General($idpass, $dbConnect->connect);
	}
?>

<html>
		<div id="main-content"> <!-- Main Content Section with everything -->
			
			<noscript> <!-- Show a notification if the user has disabled javascript -->
				<div class="notification error png_bg">
					<div>
						Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
					</div>
				</div>
			</noscript>
			
			<!-- Page Head -->
			<?php
				echo "<h2>Welcome " .$_SESSION['userdata']['username']. "</h2>";
				echo "<p id='page-intro'>This Is List of All Users.</p>"
			?>
			
			<div class="clear"></div> <!-- End .clear -->
			
			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-content">
					
					<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
					<div class="select">

						<form action="allU.php" method="POST">
							<center>Filter Value:-
								<select name="filter" id="filter">
									<option value="Select Value">Select Value</option>
									<option value="name">Name</option>
								</select>
								<input type="submit" value="submit" name="submit" class="submit">
							</center>
						</form>

						<?php

							if (isset($_POST['submit'])) 
							{
								$dbConnect = new dbConnect();
								$ab = new admin();

								$filter=isset($_POST['filter'])?$_POST['filter']:'';
								if($filter=='fare'|| $filter=='date')
								{
									$a= "<table><tr><th>Ride_id</th><th>Ride_date</th><th>Pickup</th><th>Drop</th><th>Distance</th><th>Fare</th><th>Laugage</th></tr><tr>";
									$ab->filterrr($a,$filter,$dbConnect->connect);
								}
								else
								{
									$a='<table><tr> <th><b>UserName</b></th>  <th><b>Name</b></th> <th><b>Contact</b></th> <th><b>Date</b></th> </tr><tr>';
									$ab->filterrr($a,$filter,$dbConnect->connect);
								}
							}
						?>
					</div>
					
					<table>
							<thead>
								<tr>
								   <th>User Id</th>
								   <th>UserName</th>
								   <th>Name</th>
								   <th>Date of Signup</th>
								   <th>Mobile</th>
								   <th>Is Block?</th>
								   <th>Action</th>
								</tr>
							</thead>

							<tbody>
								<?php 
									$dbConnect = new dbConnect();

									echo "<form method='POST'>";
										$query = mysqli_query($dbConnect->connect, "SELECT * FROM tbl_user");
										while($row = mysqli_fetch_array($query))
										{
											echo "<tr>";
												echo "<td>" . $row['user_id'] . "</td>";
												echo "<td>" . $row['user_name'] . "</td>";
												echo "<td>" . $row['name'] . "</td>";
												echo "<td>" . $row['dateofsignup'] . "</td>";
												echo "<td>" . $row['mobile'] . "</td>";
												echo "<td>" . $row['is_block'] . "</td>";

												echo "<td>";
													echo "<a href='allU.php?id=".$row['user_id']."'>Approve/Cancel</a>";
												echo "</td>";
											echo "</tr>";
										}
									echo "</form>";
								?> 
							</tbody>
						</table>
					</div> <!-- End #tab1 -->					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
					
			<div class="clear"></div>
	
			<?php include("footer.php"); ?>
			