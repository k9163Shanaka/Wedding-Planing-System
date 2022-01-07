<!DOCTYPE><!--  IT20244170 | K.P.S.G.G Wijegunerathna -->
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

<div style="background-image: url('../images/upload/1000.jpg');">
<?php
    session_start();

    if(isset($_POST["add"])){
        if(isset($_SESSION["invoice"])){
            $service_array_id = array_column($_SESSION["invoice"],"service_id");
            if(!in_array($_GET["id"],$service_array_id)){

                $count = count($_SESSION["invoice"]);
                $service_array = array(
                    'service_id' => $_GET["id"],
                    'service_name' => $_POST["hidden_details"],
                    'service_price' => $_POST["hidden_price"],
                );
                $_SESSION["invoice"][$count] = $service_array;
                echo '<script>window.location="Wedding_Venue.php"</script>';
				
            }else{
                echo '<script>alert("service is already in  the cart")</script>';
                echo '<script>window.location="Wedding_Venue.php"</script>';
            }
			
        }else{
            $service_array = array(
                'service_id' => $_GET["id"],
                'service_name' => $_POST["hidden_details"],
                'service_price' => $_POST["hidden_price"],
            );
            $_SESSION["invoice"][0] = $service_array;
			echo '<script>window.location="Wedding_Venue.php"</script>';
        }
    }

    if(isset($_POST)){
        if($_GET["action"] == "delete"){
            foreach($_SESSION["invoice"] as $keys => $value){
                if($value["service_id"] == $_GET["id"]){
                    unset($_SESSION["invoice"][$keys]);
                    echo '<script>alert("service has been removed")</script>';
                    echo '<script>window.location="invoice.php"</script>';
                }
            }
        }
    }
?>



        <h1 class="title2">Invoice</h1>
        <div>
            <table width="70%">
            <tr>
                <th >Service Description</th>
                <th >Price</th>
                <th >Remove Item</th>
            </tr>
            <?php
                if(!empty($_SESSION["invoice"])){
                    $total=0;
                    foreach($_SESSION["invoice"] as $key => $value){
                    ?>
                <tr>
                        <td><?php echo $value["service_name"];?></td>
                        <td><?php echo number_format($value["service_price"],2);?></td>
                        <td><a href="invoice.php?action=delete&id=<?php echo $value["service_id"]; ?>"><span class="price">Remove Item</span></a></td>
                </tr>
                <?php
                    $total = $total + ($value["service_price"]);
                    }
                ?>
                <tr>
                        <td ><b>Total Amount</b></td>
                        <td ><b><?php echo number_format($total,2);?></b></td>
                        
                </tr>
                <?php
                }
                ?>
            </table>
        </div><br>
		
		
		<div class="invoice_btn">
		<center><a href="Wedding_Venue.php"><button>Add more services</button></a>
		<a href="checkout.php?tprice=<?php echo $total ?>"><button>Checkout</button></a></center>
		<div>
		
	
		
		<br><br>
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