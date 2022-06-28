<?php 
	error_reporting(E_ALL ^ E_DEPRECATED);
	require_once('User.php');
	require_once('DataBase.php');
	$InvoiceNo = $_REQUEST['invoiceno'];
	$FName = $_REQUEST['firstName'];
	$LName = $_REQUEST['lastName'];
	$MobNo = $_REQUEST['mobileno'];
	$EMailID = $_REQUEST['email'];
	$ModelNo = $_REQUEST['modelno'];
	$PDate = $_REQUEST['purchasedate'];
	$Amount = $_REQUEST['amount'];
	$Qty = $_REQUEST['qty'];
	$Total = $Qty * $Amount;
	
	$conn = mysqli_connect("localhost","root","","mobileshop");
	
	$sql = "INSERT INTO BILL VALUES ('$InvoiceNo','$FName','$LName','$MobNo','$EMailID','$ModelNo','$Qty','$PDate','$Amount','$Total')";
	mysqli_query($conn,$sql);
	done();
	header('Location:'/Invoice.php);
?>
<html>
	<script type="text/javascript">
		function done()
		{
			prompt("Bill Generated");
		}
	</script>
	<body>
		
	</body>
</html>
