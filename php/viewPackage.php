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
	if(isset($_GET["view_pack_id"])){
		
		$id = $_GET["view_pack_id"];
		$sql = "SELECT * FROM package WHERE pack_id = {$id} LIMIT 1";
		$result_set = $con->query($sql);

		if ($result_set){

			$result = $result_set->fetch_assoc();

			$package_id = $result['pack_id'];
			$package_category = $result['pack_name'];
			$package_name = $result['pack_title'];
			$package_code = $result['pack_code'];
			$price = $result['pack_price'];
			$description = $result['pack_detail'];
			$package_img = $result['pack_img'];
			
		}

	}else{ 
		header("location: packages.php?err=query_failed");
	}

?>

<!DOCTYPE html>
<html>

	<head>

	  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	  	<title>Admin Panel</title>
	  	<link rel="stylesheet" href="../css/admin_styles.css">
	  	<script type="text/javascript" src="../js/admin_myScript.js"> </script>

  	</head>

  	<body class="back3">
  	
  	<header>
  		
  		<div   id="left_area">
  			<img src="../images/logo.png" class="logo" alt="logo">
  		</div>
        <div    id="right_area">
        	<span  class="logoutBtn" onclick="location.href='logout.php'">Logout </span>
        </div>
    
  	</header>	

	<div class="sidebar">
	    <div class="profile">
	    	<center>
	    	<h3>Admin Panel</h3>
	        <img src="../images/profile.jpg" class="profileImage" alt="profile image">
	        <h4><?php echo $_SESSION['first_name']; ?></h4>
	    	</center>
	    </div>
	        
            <ul class="nav">
            	
	      		<li class="nav1" onclick="location.href='admin.php'">Dashboard</li>
	      		
	      		<li class="nav1" onclick="location.href='packages.php'">Packages</li>
	      			      		
	        </ul>
	        
	</div>		

	
	<div class="view_package">
		<h1 align="center">View Package</h1>
		<hr>
		<br>
		<center>
		<img src="<?php echo $package_img ?>" id="view_p_img" alt="package image">
		</center>

		<table>
		<tr><td><span class="viewDis">Package Id </span></td>  <td  class="vivData"> <?php echo $package_id ?> </td></tr>
		<tr><td><span class="viewDis">Package Code </span></td>  <td class="vivData"> <?php echo $package_code ?> </td></tr>
		<tr><td><span class="viewDis">Package Category </span></td>  <td class="vivData"><?php echo $package_category ?> </td></tr>
		<tr><td><span class="viewDis">Package Name </span></td>  <td class="vivData"> <?php echo $package_name ?> </td></tr>
		<tr><td><span class="viewDis">Package Price Rs/=</span></td><td class="vivData"> <?php echo $price ?> </td></tr>
		</table>
		
		 <table><tr><td><span class="viewDis">Package&nbspDescription</span></td> <td class="vivText"> <?php echo $description ?> </td></tr>
		</table>
			
		<br>
		<hr>
		<center>
		<br>
		<button class="input_field_cbtn" onclick="location.href='packages.php'">Back</button>
		<br><br>

		</center>

	</div>

		
	<footer></footer>
    </body>

</html> 

