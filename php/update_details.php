<!-- php code by IT20206482 D.G.B.M.H.K Basnayaka-->
<?php session_start();?>
<?php require_once('config.php');
$userID =  $_SESSION['id'];

$query = "SELECT * FROM user 
            WHERE id = '{$userID}' 
           LIMIT 1 ";

$result  = mysqli_query($con, $query);




?>
<?php if(isset($_POST['update'])){

    $fname= $_POST['fname'];
    {
        $updateqr = "UPDATE user SET first_name='{$fname}' where id = '{$userID}'";
    }

    $lname= $_POST['lname'];
    {
        $updateqr2 = "UPDATE user SET last_name='{$lname}' where id = '{$userID}'";
    }
    $st1= $_POST['st1'];
    {
        $updateqr3 = "UPDATE user SET street_addres1='{$st1}' where id = '{$userID}'";
    }
    $st2= $_POST['st2'];
    {
        $updateqr4 = "UPDATE user SET street_addres2='{$st2}' where id = '{$userID}'";
    }
    $city= $_POST['city'];
    {
        $updateqr5 = "UPDATE user SET city='{$city}' where id = '{$userID}'";
    }
    $state= $_POST['state'];
    {
        $updateqr6 = "UPDATE user SET state='{$state}' where id = '{$userID}'";
    }
    $email= $_POST['email'];
    {
        $updateqr7 = "UPDATE user SET email='{$email}' where id = '{$userID}'";
    }
    $phone= $_POST['phone'];
    {
        $updateqr8 = "UPDATE user SET phone_number='{$phone}' where id = '{$userID}'";
    }


    if($con->query($updateqr)==true){
       // echo "ooooook";
    }else{
        echo "na ";

    }

    if($con->query($updateqr2)==true){
       // echo "ooooook";
    }else{
        echo "na ";

    }

    if($con->query($updateqr3)==true){
       // echo "ooooook";
    }else{
        echo "na ";

    }

    if($con->query($updateqr4)==true){
        //echo "ooooook";
    }else{
        echo "na ";

    }

    if($con->query($updateqr5)==true){
      //  echo "ooooook";
    }else{
        echo "na ";

    }

    if($con->query($updateqr6)==true){
        //echo "ooooook";
    }else{
        echo "na ";

    }

    if($con->query($updateqr7)==true){
       // echo "ooooook";
    }else{
        echo "na ";

    }

    if($con->query($updateqr8)==true){
        //echo "ooooook";
    }else{
        echo "na ";

    }



}
    $getUser=mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
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
	<div class="regform"><h1>Update User Details</h1></div>
	<div class="main">



		<form action="update_details.php" method="post" class="userform">

		<div id="name">
			<h2 class="name">Name</h2>

			<input class="firstname" type="text" name="fname" value="<?php echo $getUser['first_name']; ?>"><br>
				<label class="firstlabel">First Name</label>

			<input class="lastname" type="text" name="lname" value="<?php echo $getUser['last_name']; ?>">
				<label class="lastlabel">Last name</label>



		</div>
		<h2 class="name">Address</h2>

		<input class="Address" type="text" name="st1"  value="<?php echo $getUser['street_addres1']; ?>">
		<h2 class="name"></h2>


		<input class="Address" type="text" name="st2"  value="<?php echo $getUser['street_addres2']; ?>" >
		<h2 class="name"></h2>

		<input class="Address" type="text" name="city"  value="<?php echo $getUser['city']; ?>">
		<h2 class="name"></h2>


		<input class="Address" type="text" name="state"  value="<?php echo $getUser['state']; ?>">
		<h2 class="name"></h2>



		
		<h2 class="name">Email</h2>

		<input class="email" type="email" name="email"  value="<?php echo $getUser['email']; ?>">
		
		
		<h2 class="name">Phone</h2>
		<input class="phone" type="text" name="phone" value="<?php echo $getUser['phone_number']; ?>">
		
		

		
		
		<div>
		<input type = "checkbox" id = "term1" onclick = "enableButton()"> correct Information ?.<br><br>
 		<button class="a" type = "submit" id = "sbmt" name="update"value = "submit" disabled>Update Details</button>
		 
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