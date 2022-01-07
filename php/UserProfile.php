<!-- php code by IT20206482 D.G.B.M.H.K Basnayaka-->
<!DOCTYPE html>
<html>
	<head>
		<title>User profile</title>
		<link rel="stylesheet" type="text/css" href="../css/up.css">
		<script type="text/javascript" src="../js/check.js"></script>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/style.css">
	</head>
	
	<body>
	
	
	
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

    <?php session_start();?>
    <?php require_once('config.php');
    $userID =  $_SESSION['id'];

    $query = "SELECT * FROM user 
            WHERE id = '{$userID}' 
           LIMIT 1 ";

    $result  = mysqli_query($con, $query);




    ?>
	<div class="fullP">
		
	<div class="regform"><h1>User Profile</h1> </div>



	<div class="main">
		<form>
		<div id="name">
			<h2 class="name">Name</h2>
			<label class="firstlabel"><?php  echo $_SESSION['first_name']; ?></label>
			<label class="lastlabel"><?php  echo $_SESSION['last_name']; ?></label>
		</div>
		
		<div>
			<h2 class="name">Address</h2>
			<label class="Streetno"><?php  echo $_SESSION['street_addres1']; ?></label><br></br>
			<label class="Streetno"><?php  echo $_SESSION['street_addres2']; ?></label><br></br>
			<label class="Streetno"><?php  echo $_SESSION['city']; ?></label><br></br>
			<label class="Streetno"><?php  echo $_SESSION['state']; ?></label><br></br>
		</div>
		
		<div>
			<h2 class="name">Phone</h2>
			<label class="pno"><?php  echo $_SESSION['phone_number']; ?></label><br></br>
		</div>
		
		<div>
			<h2 class="name">Email</h2>
			<label class="eml"><?php  echo $_SESSION['email']; ?></label><br></br>
		</div>
		
		

		


		
		</form>

<div>
    <button  id = "sbmt"  onclick="edit()" >Edit</button>
    <script>
        function edit() {
            location.replace("update_details.php")
        }
    </script>
</div>

<div>
    <button id="sbmt" onclick="logout()">Logout</button>

    <script>
        function logout() {
            location.replace("logout.php")
        }
    </script>

</div>
		
	</div>
		
	
<!--Footer-->		
		
		<footer>
    <div class="footer-container">
        <div class="left-col">
            <img src="../images/logo.png" alt="" class="footer-logo">
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
		
		
		
		
	</body>
</html>
