<?php
	$InvoiceNo = $_REQUEST['InvoiceNo'];
		
	$conn = mysqli_connect("localhost","root","","mobileshop");
	
	$sql = "Select * from bill where InvoiceNo='$InvoiceNo'";
	mysqli_query($conn,$sql);
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($result);
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Invoice</title>
		<link rel="stylesheet" href="style.css">
		<link rel="license" href="https://www.opensource.org/licenses/mit-license/">
		<script src="script.js"></script>
	</head>
	<body>
		<header>
			<h1>Invoice</h1>
			<address contenteditable>
				
			</address>
			</header>
		<article>
			<h1>Recipient</h1>
			<address contenteditable>
				<p><font color="RED">Deva's Mobile Shop</font><br>c/o Deva Sonawane</p>
			</address>
			<table class="meta">
			
				<tr>
					<th><span contenteditable>Cust. Name</span></th>
					<td><span contenteditable><?php echo $row[1].' '.$row[2]; ?></span></td>
				</tr>
				<tr>
					<th><span contenteditable>Cust. Mobile No.</span></th>
					<td><span contenteditable><?php echo $row[3]; ?></span></td>
				</tr>
				
				<tr>
					<th><span contenteditable>Invoice #</span></th>
					<td><span contenteditable><?php echo $InvoiceNo; ?></span></td>
				</tr>
				<tr>
					<th><span contenteditable>Date</span></th>
					<td><span contenteditable><?php echo $row[7]; ?></span></td>
				</tr>
				<tr>
					<th><span contenteditable>Amount Due</span></th>
					<td><span id="prefix" contenteditable>Rs.</span><span><?php echo $row[9]; ?></span></td>
				</tr>
			</table>
			<table class="inventory">
				<thead>
					<tr>
						<th><span contenteditable>Item</span></th>
						<th><span contenteditable>Description</span></th>
						<th><span contenteditable>Rate</span></th>
						<th><span contenteditable>Quantity</span></th>
						<th><span contenteditable>Total Price</span></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><a class="cut">-</a><span contenteditable><?php echo $row[5]; ?></span></td>
						<td><span contenteditable><?php echo $row[5]; ?></span></td>
						<td><span data-prefix>Rs.</span><span contenteditable><?php echo $row[8]; ?></span></td>
						<td><span contenteditable><?php echo $row[6]; ?></span></td>
						<td><span data-prefix>Rs.</span><span><?php echo $row[9]; ?></span></td>
					</tr>
				</tbody>
			</table>
			<!---
			<a class="add">+</a>
			-->
			<table class="balance">
				<tr>
					<th><span contenteditable>Total</span></th>
					<td><span data-prefix>Rs.</span><span><?php echo $row[9]; ?></span></td>
				</tr>
				<tr>
					<th><span contenteditable>Amount Paid</span></th>
					<td><span data-prefix>$</span><span contenteditable><?php echo $row[9]; ?></span></td>
				</tr>
				<tr>
					<th><span contenteditable>Balance Due</span></th>
					<td><span data-prefix>$</span><span><?php echo "0"; ?></span></td>
				</tr>
			</table>
		</article>
		<aside>
			<h1><span contenteditable>Additional Notes</span></h1>
			<div contenteditable>
				<p>If any problem occur, then next time come with bill. Thank You!!!</p>
			</div>
		</aside>
	</body>
</html>