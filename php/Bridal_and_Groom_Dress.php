<?php
require 'config.php';
?>

<!DOCTYPE html><!--  IT20244170 | K.P.S.G.G Wijegunerathna -->
<html>
<head>
	<link rel="stylesheet" href="../css/package.css">
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

<div class="flower_title"><h3>Bridal and Groom Dress</h3></div>

<div class="content_container">

<?php
	$sql="SELECT * FROM `package` WHERE pack_name='dress'";

	$result = $con->query($sql);



if($result->num_rows >0){
 while($row = $result->fetch_array()){
?>	

	<div class="content_box">
			<center>
			<form method="post" action="invoice.php?action=add&id=<?php echo $row["pack_id"];?>">
			<h2 class="content_title"><?php echo $row["pack_title"]."<br>";?>
			<img src="<?php echo $row["pack_img"];?>" width="300px" height="300px"><br>
			<h2 class="price"><?php echo "Price :".$row["pack_price"];?></h2>
			<input type="hidden" name="hidden_details" value="<?php echo $row["pack_title"];?>">
			<input type="hidden" name="hidden_price" value="<?php echo $row["pack_price"];?>">
			<input type="submit" name="add" class="btn" value="Add to cart">
			</center>	
</div>
</form>
<?php
 }
}
?>
</div>

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