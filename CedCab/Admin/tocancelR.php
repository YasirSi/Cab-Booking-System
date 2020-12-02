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

        $sql = $admin->Ride2($idpass, $dbConnect->connect);
      
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
				echo "<p id='page-intro'>Showing All Rides Till Now.</p>"
			?>
			
			<div class="clear"></div> <!-- End .clear -->
			
			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-content">
					
					<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->

						<table>
							
							<thead>
								<tr>
								   <!-- <th><input class="check-all" type="checkbox" /></th> -->
								   <th>Ride Id</th>
								   <th>Ride Date</th>
								   <th>Pickup</th>
								   <th>Destination</th>
								   <th>Total Distance</th>
								   <th>Luggage</th>
								   <th>Total Fare</th>
								   <th>Status</th>
								   <th>User Id</th>
								   <th>Complete</th>
								   <th>Cancel</th>
								</tr>
							</thead>

							<tbody>
								<?php 
									$dbConnect = new dbConnect();

									echo "<form>";
										$query = mysqli_query($dbConnect->connect, "SELECT * FROM tbl_ride");
										while($row = mysqli_fetch_array($query))
										{
											echo "<tr>";
												echo "<td>" . $row['ride_id'] . "</td>";
												echo "<td>" . $row['ride_date'] . "</td>";
												echo "<td>" . $row['pickup'] . "</td>";
												echo "<td>" . $row['destination'] . "</td>";
												echo "<td>" . $row['total_distance'] . "</td>";
												echo "<td>" . $row['luggage'] . "</td>";
												echo "<td>" . $row['total_fare'] . "</td>";
												echo "<td>" . $row['status'] . "</td>";
												echo "<td>" . $row['user_id'] . "</td>";
								
												echo "<td>";
													echo "<a href='allR.php?id=".$row['ride_id']."'>Complete</a>";									
												echo "</td>";

												echo "<td>";
													echo "<a href='tocancelR.php?id=".$row['ride_id']."'>Cancel</a>";
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
			