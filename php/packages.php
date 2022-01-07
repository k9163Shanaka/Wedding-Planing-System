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
	
	$packages_list = "";
	


	//filter

	if((isset($_GET["filter"]))  &&  (($_GET["filter"]) != 'all')){
		
		$filt = $_GET["filter"];
		//getting the filtered list of packages
		$sql = "SELECT * FROM package WHERE pack_name = '{$filt}' ORDER BY pack_id";
		
	}else{
		//getting the list of packages
		$filt = 'All';
		$sql = "SELECT * FROM package  ORDER BY pack_id";
	}



	
	$packages = $con->query($sql);

	
	if($packages->num_rows>0){

		while($package = $packages->fetch_assoc()){

			$packages_list .= "<tr>";
			$packages_list .= "<td>" . $package["pack_name"] . "</td>";
			$packages_list .= "<td>" . "<img class=\"pack_img\" src=\"{$package['pack_img']}\">" . "</td>";
			$packages_list .= "<td>" . $package["pack_code"] . "</td>";
			$packages_list .= "<td>" . $package["pack_title"] . "</td>";
			$packages_list .= "<td>" . $package["pack_price"] . "</td>";
			$packages_list .= "<td>" 
									. "<a href=\"viewPackage.php?view_pack_id={$package["pack_id"]}\"> 
									   <img class=\"ved_btn\" src=\"../images/view1.png\" alt='View'>
									   </a>" 
							. "</td>";
			$packages_list .= "<td>" 
									. "<a href=\"editPackage.php?edit_pack_id={$package["pack_id"]}\"> 
									   <img class=\"ved_btn\" src=\"../images/edit.png\" alt='Edit'>
									   </a>" 
							. "</td>";
			$packages_list .= "<td>" 
									. "<a href=\"deletePackage.php?delete_pack_id={$package["pack_id"]}\" onclick=\"return confirm('Are you sure?');\"> 
									   <img class=\"ved_btn\" src=\"../images/delete.png\" alt='Delete'>
									   </a>" 
							. "</td>";
			$packages_list .= "</tr>";
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

  	<body class="back1">
  	
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
	        <h4> <?php echo $_SESSION['first_name']; ?> </h4>
	    	</center>
	    </div>
	        
            <ul class="nav">
            	
	      		<li class="nav1" onclick="location.href='admin.php'">Dashboard</li>
	      		
	      		<li class="nav1" onclick="location.href='packages.php'">Packages</li>
	      			      		
	        </ul>
	        
	</div>	

	
		<div class="packages">

		<form action="packages.php" method="get" id="filter_display" >	
			<select name="filter" id="filter" onchange="document.getElementById('filter_display').submit();">

				<option value=""><?php echo $filt ?></option>
				<option value="all">All</option>
				<option value="venue">Wedding Venue</option>
				<option value="photo">Photography</option>
				<option value="dress">Bridal and Groom Dress</option>
				<option value="car">Wedding Cars</option>
				<option value="entertainment">Entertainment</option>
				<optgroup label="Decorations">
					<option value="flower">Flower Bouquets</option>
					<option value="setteeback">Setteeback</option>
					<option value="poruwa">Poruwa Designs</option>
				</optgroup>
			</select>
		</form>
		<button onclick="location.href='addPackage.php'" class="packageButton">Add New Package</button>
			
		
		<br><br><br>
		<table class="pack">
			<tr>
			    <th>Package Category</th>
			    <th>Image</th>
			    <th>Package Code</th>
			    <th>Package Name</th>
			    <th>Package Price(Rs.)</th>
			    <th>View details</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>

			<?php echo $packages_list; ?>
			
			
			
		</table>
		<br>
		</div>



	
	<footer></footer>

		

    </body>

</html>

