<?php 
	session_start();

	include('../dbConnect.php');

	include("header.php");
	include("sidebar.php");
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
				echo "<p id='page-intro'>This Is List of All Location.</p>"
			?>
			
			<div class="clear"></div> <!-- End .clear -->
			
			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-content">
					
					<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
						<table>
							
							<thead>
								<tr>
								   <th>Id</th>
								   <th>Name</th>
								   <th>Distance</th>
								   <th>Is Available</th>
								   <th>Delete</th>
								</tr>
							</thead>

							<tbody>
								<?php 
									$dbConnect = new dbConnect();

									echo "<form>";
										$query = mysqli_query($dbConnect->connect, "SELECT * FROM tbl_location");
										while($row = mysqli_fetch_array($query))
										{
											echo "<tr>";
												echo "<td>" . $row['id'] . "</td>";
												echo "<td>" . $row['name'] . "</td>";
												echo "<td>" . $row['distance'] . "</td>";
												echo "<td>" . $row['is_available'] . "</td>";

												echo "<td>";
													echo "<a href='dellocation.php?id=".$row['id']."'>Delete</a>";
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
			