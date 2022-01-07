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

	$errors = array();


	$package_category = '';
	$package_name = '';
	$package_code = '';
	$price = '';
	$description = '';




	if(isset($_POST['submit'])){


		//image uploading
		$file_name = $_FILES['image']['name'];
		$file_type = $_FILES['image']['type'];
		$file_size = $_FILES['image']['size'];
		$temp_name = $_FILES['image']['tmp_name'];

		$upload_to = '../images/upload/';

		//checking the file type
		if ($file_type != ('image/jpeg' || 'image/png')) {

			$errors[] = 'Only JPEG and PNG files are allowed.';

		}

		//checking file size
		if ($file_size > 500000){
			$errors[] = 'File size should be less than 500kb.';
		}


			
		



		//other fields uploading
		$package_category = $_POST['package_category'];
		$package_name = $_POST['package_name'];
		$package_code = $_POST['package_code'];
		$price = $_POST['price'];
		$description = $_POST['description'];


		//checking required fields
		$req_fields = array('package_category', 'package_name', 'package_code', 'price', 'description');

		foreach($req_fields as $field){
			if(empty(trim($_POST[$field]))) {
				$errors[] = $field . " is required";

			}
		}

		//checking max length
		$max_len_fields = array('package_category' => 20, 'package_name' => 255, 'package_code' => 11,  'description' => 255);

		foreach($max_len_fields as $field => $max_len){
			if(strlen(trim($_POST[$field])) > $max_len) {
				$errors[] = $field . " must be less than " . $max_len . ' characters';

			}
		}

		//checking if package code already exists
		$pack_code = $con -> real_escape_string($_POST["package_code"]);
		$sql = "SELECT * FROM package WHERE pack_code = '{$pack_code}'LIMIT 1";

		$result_set = $con->query($sql);

		if ($result_set){
			if($result_set->num_rows == 1){
					$errors[] = 'Package Code is already exists';
		
				}
		}
 
		if (empty($errors)) {

			//no errors found .. adding new record
			
			$pack_name = $con -> real_escape_string($_POST["package_category"]);
			$pack_title = $con -> real_escape_string($_POST["package_name"]);
			$pack_price = $con -> real_escape_string($_POST["price"]);
			$pack_detail = $con -> real_escape_string($_POST["description"]);
			$pack_img = $con -> real_escape_string($upload_to . $file_name);

			$sql = "INSERT INTO package (pack_code, pack_name, pack_title, pack_price, pack_detail, pack_img) VALUES ('{$pack_code}', '{$pack_name}', '{$pack_title}', '{$pack_price}', '{$pack_detail}', '{$pack_img}')";

			$result = $con->query($sql);

			if($result){
				//uploading file
				$file_uploaded = move_uploaded_file($temp_name, $upload_to . $file_name);
			}

			if($result){
				header('location: packages.php');
			} else {
				$errors[] = 'Failed to add the new Package.';
			}

		}

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

  	<body class="back2">
  	
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

	
	<div class="add_package">
	<form action="addPackage.php"  method="post" class="pack_form" enctype="multipart/form-data">

		<h1 align="center">Add New Package</h1>

		<hr>
		

		<?php 

			if (!empty($errors)) {
				echo '<div class="errmsg">';
				foreach ($errors as $error){
					$error = ucfirst(str_replace("_", " ", $error)); 
					echo '-' . $error . '<br>';
				}
				echo '</div>';
			}
		 ?>
		<table>
			<tr>
				<td><label >Package Category</label></td>
				<td><select name="package_category" id="apackage" class="input_field" required>
					<option value="">---Select Package Category---</option>
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
				</select> </td>
			</tr>
		
		
		<tr>
			<td><label>Package Name</label> </td>
			<td><input type="text"  class="input_field" id="pack_name" name="package_name" placeholder="Package name or model name"  <?php echo 'value="' .$package_name . '"';?>required></td>
		</tr>
		
		<tr>
			<td><label>Package Code</label></td>
			<td><input type="text" class="input_field" id="pack_code" name="package_code"  placeholder="Package Code"  <?php echo 'value="' .$package_code . '"';?>required></td>
		</tr>
		

		<tr>
			<td><label>Image</label></td>
			<td><input type="file"  class="input_field" id="pimg" name="image"  accept="image/*" required></td>

		</tr>		
		<tr>
			<td><label>Price Rs/=</label></td>
			<td><input type="text" class="input_field" id="price"  name="price" pattern="[0-9]{1,10}" placeholder="12345.65"  <?php echo 'value="' .$price . '"';?>required></td>
		</tr>
		</table>
		<p>
			<label>Description</label>
			<textarea id="adescrip"  name="description" rows="10" cols="50"  required><?php echo $description?></textarea>

		</p>
		<br><br>
		<hr>
		<br>
		<center>
		
		Accept all are correct
		<input type="checkbox" name="check" id="check" onclick="enableAddNowBtn()" required><br><br><br>
		<input type="submit" class="input_field_sbtn" id="sbtn" name="submit" value="Add Now" disabled>
		<button class="input_field_cbtn" onclick="location.href='packages.php'">Back</button>
		</center>


	</form>
	</div>

		
	<footer></footer>
    </body>

</html> 

