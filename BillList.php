<?php
	error_reporting(E_ALL ^ E_DEPRECATED);
	require_once('User.php');
	require_once('Mobile.php');
	require_once('DataBase.php');
	session_start();
	$AdminID="";
	$admin = NULL;
	$mobiles = NULL;
	$brands = NULL;
	if(isset($_SESSION['AdminID']) && !empty($_SESSION['AdminID'])) {
		$UserID=$_SESSION['AdminID'];
		$DB = new DataBase();
		$admin = $DB->getAdminById($UserID);
		$mobiles = $DB->getMobilesAsend();
		$brands = $DB->getBrands();
		if($brands == 0 || $brands == "error" || sizeof($brands) == 0){
			$brands = NULL;
		}
		if($mobiles == 0 || $mobiles == "error" || sizeof($mobiles)==0){
			$mobiles = NULL;
		}
	}else{
		header('Location: LoginAsAdmin.php');
	}
?>

<html>
	<head>
		<title>Admin Page</title>
		<link rel="stylesheet" href="bootstrap-theme.css">
		<link rel="stylesheet" href="bootstrap-theme.min.css">
		<link rel="stylesheet" href="bootstrap.css">
		<link rel="stylesheet" href="bootstrap.min.css">
	</head>
	<body>
	<div class="container-fluid">
		    <nav class="navbar navbar-inverse">
		      <div class="container">
		        <!-- Brand and toggle get grouped for better mobile display -->
		        <div class="navbar-header">
		          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-4">
		            <span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		          </button>
		          <a class="navbar-brand" href="#"></a>
		        </div>
		    
		        <!-- Collect the nav links, forms, and other content for toggling -->
		        <div class="collapse navbar-collapse" id="navbar-collapse-4">
		          <ul class="nav navbar-nav navbar-right">
		            <li><a href="Home.php"></a></li>
		            <li><a href="BillList.php">Bill List</a></li>
		            <li><a href="Bill.html">Make Bill</a></li>
		          </ul>
		          <ul class="collapse nav navbar-nav nav-collapse" role="search" id="nav-collapse4">
		            <li><a href="#">Support</a></li>
		            <li class="dropdown">
		              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><img class="img-circle" src="https://pbs.twimg.com/profile_images/588909533428322304/Gxuyp46N.jpg" alt="maridlcrmn" width="20" /> Maridlcrmn <span class="caret"></span></a>
		              <ul class="dropdown-menu" role="menu">
		                <li><a href="#">My profile</a></li>
		                <li><a href="#">Favorited</a></li>
		                <li><a href="#">Settings</a></li>
		                <li class="divider"></li>
		                <li><a href="#">Logout</a></li>
		              </ul>
		            </li>
		          </ul>
		        </div><!-- /.navbar-collapse -->
		      </div><!-- /.container -->
		    </nav><!-- /.navbar -->
		</div><!-- /.container-fluid -->
		
		
		
		
	
		
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="my-list">
					
					<?php
					
						$conn = mysqli_connect("localhost","root","","mobileshop");
	
						$sql = "Select * from Bill";
						$result = mysqli_query($conn,$sql);

						echo "<b><table style=\"position:absolute;width:892px;height:77px; font-family:\"Courier New\", Courier, monospace; font-size:80%\" id=\"Table1\" border=2 >".
							"<tr font-size=20px align=\"center\">".
							"<td class=\"cell0\"><b><span style=\"color:#000000;font-family:Arial;font-size:13px;line-height:36px;\">Invoice No</span></td>".
							"<td class=\"cell0\"><b><span style=\"color:#000000;font-family:Arial;font-size:13px;line-height:16px;\">First Name</span></td>".
							"<td class=\"cell0\"><b><span style=\"color:#000000;font-family:Arial;font-size:13px;line-height:16px;\">Last Name</span></td>".
							"<td class=\"cell0\"><b><span style=\"color:#000000;font-family:Arial;font-size:13px;line-height:16px;\">Mobile No</span></td>".
							"<td class=\"cell0\"><b><span style=\"color:#000000;font-family:Arial;font-size:13px;line-height:16px;\">EMail ID</span></td>".
							"<td class=\"cell0\"><b><span style=\"color:#000000;font-family:Arial;font-size:13px;line-height:16px;\">Model</span></td>".
							"<td class=\"cell0\"><b><span style=\"color:#000000;font-family:Arial;font-size:13px;line-height:16px;\">Quantity</span></td>".
							"<td class=\"cell0\"><b><span style=\"color:#000000;font-family:Arial;font-size:13px;line-height:16px;\">Purchase Date</span></td>".
							"<td class=\"cell0\"><b><span style=\"color:#000000;font-family:Arial;font-size:13px;line-height:16px;\">Amount</span></td>".
							"<td class=\"cell1\"><b><span style=\"color:#000000;font-family:Arial;font-size:13px;line-height:16px;\">Total</span></td>".
							"</tr>";
							
						while($row=mysqli_fetch_array($result))
						{
							echo "<tr align=\"center\">".
								"<td class=\"cell0\"><span style=\"color:#000000;font-family:Arial;font-size:13px;line-height:36px;\"><a href=\"ViewBill.php?InvoiceNo=$row[0]\">$row[0]</a></span></td>".
								"<td class=\"cell0\"><span style=\"color:#000000;font-family:Arial;font-size:13px;line-height:36px;\">$row[1]</span></td>".
								"<td class=\"cell0\"><span style=\"color:#000000;font-family:Arial;font-size:13px;line-height:36px;\">$row[2]</span></td>".
								"<td class=\"cell0\"><span style=\"color:#000000;font-family:Arial;font-size:13px;line-height:36px;\">$row[3]</span></td>".
								"<td class=\"cell0\"><span style=\"color:#000000;font-family:Arial;font-size:13px;line-height:36px;\">$row[4]</span></td>".
								"<td class=\"cell0\"><span style=\"color:#000000;font-family:Arial;font-size:13px;line-height:36px;\">$row[5]</span></td>".
								"<td class=\"cell0\"><span style=\"color:#000000;font-family:Arial;font-size:13px;line-height:36px;\">$row[6]</span></td>".
								"<td class=\"cell0\"><span style=\"color:#000000;font-family:Arial;font-size:13px;line-height:36px;\">$row[7]</span></td>".
								"<td class=\"cell0\"><span style=\"color:#000000;font-family:Arial;font-size:13px;line-height:36px;\">$row[8]</span></td>".
								"<td class=\"cell1\"><span style=\"color:#000000;font-family:Arial;font-size:13px;line-height:36px;\">$row[9]</span></td>".
							"</tr>";
							
						}
						echo "</table>";
					
					?>
					
					</div>
				</div>
			</div>
    	</div>
		<a href="logout.php" class="btn btn-success">Sign Out</a>
	</body>
</html>