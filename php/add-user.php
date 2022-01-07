<?php require_once('config.php'); ?>
<?php 

	$errors = array(); 
	$first_name = '';
	$last_name = '';
	$email = '';
	$password ='';
	$street_addres1 ='';
	$street_addres2 ='';
	$city ='';
	$state ='';
	$phone_number ='';

	if (isset($_POST['submit'])){


	$first_name =$_POST ['first_name'];
	$last_name =$_POST ['last_name'];
	$email =$_POST ['email'];
	$password =$_POST['password'];
	$street_addres1 =$_POST['street_addres1'];
	$street_addres2 =$_POST['street_addres2'];
	$city =$_POST['city'];
	$state =$_POST['state'];
	$phone_number =$_POST['phone_number'];

		//checking required field
		if (empty(trim($_POST['first_name']))){
			$errors[] = 'First name is required';
		}
	
	if (empty(trim($_POST['last_name']))){
			$errors[] = 'Last name is required';
		}

	if (empty(trim($_POST['street_addres1']))){
			$errors[] = 'street addres1 is required';
		}

	if (empty(trim($_POST['street_addres2']))){
			$errors[] = 'street addres2 is required';
		}

	if (empty(trim($_POST['city']))){
			$errors[] = 'city is required';
		}

	if (empty(trim($_POST['state']))){
			$errors[] = 'state is required';
		}


	if (empty(trim($_POST['email']))){
			$errors[] = 'email is required';
		}

	
	if (empty(trim($_POST['phone_number']))){
			$errors[] = 'Phone number is required';
		}

	if (empty(trim($_POST['password']))){
			$errors[] = 'password is required';
		}
	

	if (empty(trim($_POST['Confirm_Password']))){
			$errors[] = 'Confirm Password is required';
		}

		//check max length of inputs

		$max_len_fields = array('first_name' => 50, 'last_name' =>50,'email' => 100,'password' => 40, 'street_addres1'=> 30, 'street_addres2'=> 30, 'city'=>30, 'state'=>30, 'phone_number'=>10);
		foreach ($max_len_fields as $field =>$max_len){
			if (strlen(trim($_POST[$field])) > $max_len) {
				$errors[] =$field . ' must be less than' . $max_len .'characters';
			}
		}

		//checking email has taken 

		$email = mysqli_real_escape_string($con, $_POST['email']);

		$query = "SELECT * FROM user WHERE email = '{$email}' LIMIT 1";

		$result_set =mysqli_query($con,$query);

		if ($result_set){
			if (mysqli_num_rows($result_set) == 1) {
				$errors[] = 'Email addres already exists';
			}

		}



		

		if (empty($errors)) {
				// no errors found....adding new record
				//sanitized details
				$first_name = mysqli_real_escape_string($con, $_POST['first_name']);
				$last_name = mysqli_real_escape_string($con, $_POST['last_name']);
				$street_addres1 = mysqli_real_escape_string($con, $_POST['street_addres1']);
				$street_addres2 = mysqli_real_escape_string($con, $_POST['street_addres2']);
				$city = mysqli_real_escape_string($con, $_POST['city']);
				$state = mysqli_real_escape_string($con, $_POST['state']);
				$phone_number = mysqli_real_escape_string($con, $_POST['phone_number']);


				//email address is alredy senitizer
				$hashed_password = sha1($password);
				

				$query = "INSERT INTO user (";
				$query .= "first_name, last_name, email, password, street_addres1, street_addres2, city, state,phone_number";
				$query .= ") VALUES (";
				$query .= "'{$first_name}','{$last_name}','{$email}','{$hashed_password}','{$street_addres1}','{$street_addres2}','{$city}','{$state}','{$phone_number}'";
				$query .= ")";

				$result =mysqli_query($con,$query);

				if ($result) {
					//query successful..redirecting to user page
					header('Location:../html/home.html?user_added=true');

				}else {
					$errors[] ='Failed to add the new record';

						}
				}

	}


 ?>





















<!DOCTYPE html>  <!--IT20264352 P.P.S.Amarasinghe-->
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="../css/register.css">
		<script type="text/javascript" src="../js/check.js"></script>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/style.css">
	</head>
	
	<body>
	<div class="c">
	
	
	<DIV CLASS="box-area"></DIV>
<header>
    <div class="wrapper">
        <div class="logo">
            <img src="../images/logo.png" alt="" class="logo" align="center">
        </div>
        <nav>
            <a href="../html/home.html">Home</a>
            <a href="Wedding_Venue.php">services</a>
            <a href="UserProfile.php">Profile</a>
            <a href="../html/gallery.html">Gallery</a>
            <a href="../html/contact_us.html">Contact Us</a>
            <a href="../html/aboutus.html">About us</a>

            <a href="../html/Signup.html">
                <img width="30" height="30" align="center" src="../images/user.png">
            </a>

        </nav>
    </div>
</header>

<!--registration form-->

	<div class="fullP">
	<div class="regform"><h1>Registration Form</h1></div>
	<div class="main">
		<form action="add-user.php" method="post" class="userform">

			<?php 
				if(!empty($errors)){
					echo'<div class="errmsg">';
					echo '<b>There were errors on your form</b></br>';
					foreach ($errors as $error){
						echo $error . '<br>';
					}
					echo '</div>';
				}

			?>

		<div id="name">
			<h2 class="name">Name</h2>

			<input class="firstname" type="text" name="first_name" <?php echo 'value="' .$first_name . '"';?>><br>
				<label class="firstlabel">First Name</label>

			<input class="lastname" type="text" name="last_name" <?php echo 'value="' .$last_name . '"';?>>
				<label class="lastlabel">Last name</label>



		</div>
		<h2 class="name">Address</h2>

		<input class="Address" type="text" name="street_addres1" placeholder="Street Address 01" <?php echo 'value="' .$street_addres1 . '"';?>>
		<h2 class="name"></h2>


		<input class="Address" type="text" name="street_addres2" placeholder="Street Address 02" <?php echo 'value="' .$street_addres2 . '"';?>>
		<h2 class="name"></h2>

		<input class="Address" type="text" name="city" placeholder="City" <?php echo 'value="' .$city . '"';?>>
		<h2 class="name"></h2>


		<input class="Address" type="text" name="state" placeholder="State" <?php echo 'value="' .$state . '"';?>>
		<h2 class="name"></h2>



		
		<h2 class="name">Email</h2>

		<input class="email" type="email" name="email" placeholder="name@gmail.com" <?php echo 'value="' .$email . '"';?>>
		
		
		<h2 class="name">Phone</h2>
		<input class="phone" type="text" name="phone_number" <?php echo 'value="' .$phone_number . '"';?> >
		
		
		<h2 class="name">Password</h2>
		<input class="Password" type="password" name="password" >
		
		<h2 class="name">Confirm Password</h2>
		<input class="Confirm_Password" type="password" name="Confirm_Password" >
		
		
		<div>
		<input type = "checkbox" id = "term1" onclick = "enableButton()"> I agree to the terms and conditions.<br><br> 
 		<button class="a" type = "submit" id = "sbmt" name="submit"value = "submit" disabled>Submit</button>
		 
		</div>
		
		</form>
		
		
		
		</div>
		<br>
		</br>
		
		<footer>
    <div class="footer-container">
        <div class="left-col">
            <img src="../images/logo.png" alt="footer" class="footer-logo">
            <div class="social-media">
                <a href="#"><img height="30" width="30" src="../images/fb.png"> </a>
                <a href="#"> <img height="30" width="30" src="../images/twitter-.png"> </a>
                <a href="#"> <img height="30" width="30" src="../images/instagram.png"> </a>
                <a href="#"> <img height="30" width="30" src="../images/youtube.png"> </a>
            </div>
            <p class="right-text">&copy; 2020 wedding planer.</p>
        </div>

        <div class="right-col">
            <div class="pages">
                <a href="#">Home</a>
                <a href="#">Services</a>
                <a href="#">Profile</a>
                <a href="#">Gallery</a>
                <a href="#">About Us
                <a href="#">Contact us</a>

            </div>

            <div class="pay_us">
                <p>Payment methods</p>
                <div class="border"></div>
            </div>

            <div class="pay_logo">
                <img width="250" height="50" src="../images/pay.png">
            </div>
        </div>
    </div>
</footer>
		
		
		
	</div>	
	</body>
</html>