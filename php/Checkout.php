<!DOCTYPE html><!--  IT20244170 | K.P.S.G.G Wijegunerathna -->

<head>

    <link rel="stylesheet" href="../css/package.css">
    <script src="../js/main.js"></script>
  
</head>

<body>

<header>
    <div class="wrapper">
        <div class="logo">
            <img src="../images/upload/logo.png" alt="" class="logo" align="center">
        </div>
        <nav>
            <a href="../html/home.html">Home</a>
            <a href="Wedding_Venue.php">services</a>
            <a href="UserProfile.php">Profile</a>
            <a href="../html/gallery.html">Gallery</a>
            <a href="../html/contact_us.html">Contact Us</a>
            <a href="../html/aboutus.html">About us</a>

            <a href="../html/Signup.html">
                <img width="30" height="30" align="center" src="../images/upload/user.png">
            </a>

        </nav>
    </div>
</header>

<div style="background-image: url('../images/upload/2000.jpg');">
<div class="side">
		<ul>
			<li><a href="Wedding_Venue.php"> Wedding Venue</a></li><br>
			<li><a href="Photography.php"> Photography</a></li><br>
			<li><a href="Bridal_and_Groom_Dress.php"> Bridal and Groom Dress</a></li><br>
			<li><a href="../html/Decorations.html"> Decorations</a></li><br>
			<li><a href="Wedding_car.php"> Wedding Cars</a></li><br>
			<li><a href="Entertainment.php"> Entertainment</a></li><br>
			<li><a href="invoice.php"> Checkout</a></li><br>
		</ul>
</div>
	
<form method="post" action="checkout.php?action=added">
		<div class="detail">
		<center><h3>Payment</h3></center>
		<br>
		
		<label class="cname">Name on Card</label><br>
        <input type="text" id="cname" name="cardname" placeholder="John More Doe" pattern="[A-Za-z]{3,10}" title="Name on the card should contain between 3 to 6 characters" required>	
		<br><br>
		
		<label>Credit card number</label><br>
        <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" pattern="[0-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}" title="sample:1234-1234-1234-1234" required>
		<br><br>
		
		<label>Exp Month</label>
		<label>Exp Year</label>
		<label>CVV</label><br>
		
		<input type="text" id="exmonth" name="exmonth" placeholder="MM" pattern="[0-1][0-9]"  title="01 for January" required>
		
        <input type="text" id="expyear" name="expyear" placeholder="2022" pattern="20[0-9]{2}" title="eg:2020" required>
		
        <input type="text" id="cvv" name="cvv" placeholder="352" pattern="[0-9]{3}" title="Should contain 3 digit" required>
		<br><br>
		
		<?php
		$toprice = $_GET['tprice'];
		?>
		<div class="bill"><h4>Total Billed : Rs.<?php echo $toprice ?></h4>
		</div>
		<center>
				
		<a onclick="goBack()"><button>Previous</button></a>
		<button <input type="submit" name="added" >  Checkout</button>
		</center>
		
	</div>	
</form>
<br><br>



<?php
require 'config.php';

session_start();
 if(isset($_POST["added"])){
foreach($_SESSION["invoice"] as $keys => $value){
	$serviceID=$value["service_id"];
	$customer_name=$_SESSION["first_name"];
	$email=$_SESSION["email"];
	$seviceName=$value["service_name"];
	$sevicePrice=$value["service_price"];
	
	$sql="INSERT INTO reservation(customer_name,email,service_id,service_name,service_price)VALUES('$customer_name','$email','$serviceID','$seviceName','$sevicePrice')";
	$con->query($sql);
}
    echo '<script>alert("Payment Successful")</script>';
    echo '<script>window.location="Wedding_Venue.php"</script>';
 }
	
?>

<footer>
    <div class="footer-container">
        <div class="left-col">
            <img src="../images/upload/logo.png" alt="" class="footer-logo">
            <div class="social-media">
                <a href="#"><img height="30" width="30" src="../images/upload/fb.png"> </a>
                <a href="#"> <img height="30" width="30" src="../images/upload/twitter-.png"> </a>
                <a href="#"> <img height="30" width="30" src="../images/upload/instagram.png"> </a>
                <a href="#"> <img height="30" width="30" src="../images/upload/youtube.png"> </a>
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
                <img width="250" height="50" src="../images/upload/pay.png">
            </div>
        </div>
    </div>
</footer>	
	
</body>

</html>