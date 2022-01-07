<!-- IT20083700 -->
<!-- K.M.R.I Senanayaka -->
<!-- Group - 9 -->


<?php session_start(); ?>
<?php require_once ('config.php'); ?>
<?php 
	// checking if the admin is logged in
	if (!isset($_SESSION["id"])){
		header("location: login.php");
	}
	else
	{
		if ($_SESSION["user_type"] != 'admin'){
			header("location: login.php");
		}
	}
 ?>

<?php 
	
	$order_list = "";
	

	//getting the list of packages	
	

	$sql = "SELECT * FROM reservation ORDER BY order_id";
	
	$orders = $con->query($sql);

	
	if($orders->num_rows>0){

		while($order = $orders->fetch_assoc()){

			$order_list .= "<tr>";
			$order_list .= "<td>" . $order["order_id"] . "</td>";
			$order_list .= "<td>" . $order["customer_name"] . "</td>";
			$order_list .= "<td>" . $order["email"] . "</td>";
			$order_list .= "<td>" . $order["service_id"] . "</td>";
			$order_list .= "<td>" . $order["service_name"] . "</td>";
			$order_list .= "<td>" . $order["service_price"] . "</td>";
			$order_list .= "</tr>";
			
		}
	}
	else{ 
		echo "Database query faild.";
	}

 ?>


<!DOCTYPE html>
<html>

	<head>

	  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	  	<title>Admin Panel</title>
	  	<link rel="stylesheet" type="text/css" href="../css/admin_styles.css">
	  	<script type="text/javascript" src="../js/admin_myScript.js"> </script>

  	</head>

  	<body class="back5">
  	
  	<header>
  		
  		<div   id="left_area">
  			<img src="../images/logo.png" class="logo" alt="logo">
  		</div>
        <div    id="right_area">
        	<span  class="logoutBtn" onclick="location.href='logout.php'" >Logout </span>
        </div>
    
  	</header>	

	<div class="sidebar">
	    <div class="profile">
	    	<center>
	    	<h3>Admin Panel</h3>
	        <img src="../images/profile.jpg" class="profileImage" alt="profile image">
	        <h4><?php echo $_SESSION['first_name']; ?> </h4>
	    	</center>
	    </div>
	        
            <ul class="nav">
            	
	      		<li class="nav1" onclick="location.href='admin.php'">Dashboard</li>
	      		
	      		<li class="nav1" onclick="location.href='packages.php'">Packages</li>
	      			      		
	        </ul>
	        
	</div>	

	
		<div class="reservations">
			
		<h1 align="center">Reservations</h1>
		<br><br><hr><br>
		<table class="pack">
			<tr>
			    <th>Reservation Id</th>
			    <th>Customer Name</th>
			    <th>Email</th>
			    <th>Package Id</th>
			    <th>Package Name</th>
			    <th>Amount</th>
			</tr>

			<?php echo $order_list; ?>
			
			
			
		</table>
		<br>
		</div>



	
	<footer></footer>

		

    </body>

</html>

