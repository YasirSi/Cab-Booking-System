<?php
	include('dbConnect.php');
    include('user.php');

    $dbConnect = new dbConnect();
    $user = new user();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />

	<title>Invoice</title>
	
	<link rel='stylesheet' type='text/css' href='css/style.css' />
	<script type='text/javascript' src='js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='js/example.js'></script>

</head>

<body>
	<div id="page-wrap">
		<textarea id="header">INVOICE</textarea>
				
		<div style="clear:both"></div>
		
		<div id="customer">

            <div id="customer-title">
				<table id="meta">
					<tr>
						<td class="meta-head">User Name</td>
						<td><?php echo $_SESSION['userdata']['username'];?></td>
					</tr>

					<tr>
						<td class="meta-head">Name</td>
						<td><?php echo $_SESSION['userdata']['name'];?></td>
					</tr>

					<tr>
						<td class="meta-head">Mobile</td>
						<td><?php echo $_SESSION['userdata']['mobile'];?></td>
					</tr>
				</table>
			</div> 
	
            <table id="meta">
                <tr>
                    <td class="meta-head">Invoice</td>
                    <td>xx xx</td>
				</tr>
				
                <tr>
                    <td class="meta-head">Pickup</td>
                    <td id="date"><?php echo $_SESSION['ride']['pickup'];?></td>
				</tr>
				
				<tr>
                    <td class="meta-head">Drop</td>
                    <td id="date"> <?php echo $_SESSION['ride']['drop'];?></td>
				</tr>
            </table>
		
		</div>
		
		<table id="items">
		
		  <tr>
		      <th>Pickup</th>
		      <th>Drop</th>
		      <th>Distance</th>
		      <th>Luggage</th>
		      <th>Price</th>
		  </tr>
		  
		  <tr class="item-row">
		      <td><?php echo $_SESSION['ride']['pickup'];?></td>
			  <td><?php echo $_SESSION['ride']['drop'];?></td>
			  <td><?php echo $_SESSION['ride']['distance'];?></td>
			  <td><?php echo $_SESSION['ride']['luggage'];?></td>
			  <td><?php echo $_SESSION['ride']['fare'];?></td>
		  </tr>
		  
		  <tr id="hiderow">
		    <td colspan="5"></td>
		  </tr>
		  
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Subtotal</td>
		      <td class="total-value"><div id="subtotal">$<?php echo $_SESSION['ride']['fare'];?></div></td>
		  </tr>

		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Total</td>
		      <td class="total-value"><div id="total">$<?php echo $_SESSION['ride']['fare'];?></div></td>
		  </tr>

		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Amount Paid</td>

		      <td class="total-value"><textarea id="paid">$0.00</textarea></td>
		  </tr>

		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line balance">Balance Due</td>
		      <td class="total-value balance"><div class="due">$<?php echo $_SESSION['ride']['fare'];?></div></td>
		  </tr>
		</table>
		
		<!-- <div id="terms">
		  <h5>NOTICE</h5>
		  <textarea>**THIS INVOICE DOESN'T SURE YOUR RIDE CONFIRMATION**</textarea>
		</div> -->

		<h2><a href="javascript:window.print()">Print Invoice</a></h2>
	</div>
</body>
</html>