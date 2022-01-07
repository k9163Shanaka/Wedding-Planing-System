<?php session_start(); ?>
<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'wps';

$con = mysqli_connect('localhost', 'root', '', 'wps');

//checking the connection
if(mysqli_connect_error()){
    die('Databaseconnection failed '. mysqli_connect_error());

}
?>
<?php 

  // check for form submission
  if (isset($_POST['submit'])) {

    $errors = array();

    // check if the username and password has been entered
    if (!isset($_POST['email']) || strlen(trim($_POST['email'])) < 1 ) {
      $errors[] = 'Username is Missing / Invalid';
    }

    if (!isset($_POST['password']) || strlen(trim($_POST['password'])) < 1 ) {
      $errors[] = 'Password is Missing / Invalid';
    }

    // check if there are any errors in the form
    if (empty($errors)) {
      // save username and password into variables
      $email    = mysqli_real_escape_string($con, $_POST['email']);
      $password   = mysqli_real_escape_string($con, $_POST['password']);
      $hashed_password = sha1($password);

      // prepare database query
      $query = "SELECT * FROM user 
            WHERE email = '{$email}' 
            AND password = '{$hashed_password}' 
            LIMIT 1";

      $result_set = mysqli_query($con, $query);

      if ($result_set) {
        // query succesfful


        if (mysqli_num_rows($result_set) == 1) {
            $getUser=mysqli_fetch_assoc($result_set);
              $_SESSION['id'] = $getUser['id'];
             $_SESSION['first_name'] = $getUser['first_name'];
            $_SESSION['last_name'] = $getUser['last_name'];
            $_SESSION['email'] = $getUser['email'];
            $_SESSION['street_addres1'] = $getUser['street_addres1'];
            $_SESSION['street_addres2'] = $getUser['street_addres2'];
            $_SESSION['city'] = $getUser['city'];
            $_SESSION['state'] = $getUser['state'];
            $_SESSION['phone_number'] = $getUser['phone_number'];
			$_SESSION['user_type'] = $getUser['user_type'];
	
			echo $getUser['user_type'];
    if ($getUser['user_type'] =='admin')
    {
        header('Location: admin.php');
    }
    else
    {
        header('Location: ../html/home.html');
    }

        } else {
          // user name and password invalid
          $errors[] = 'Invalid Username / Password';
        }
      } else {
        $errors[] = 'Database query failed';
      }
    }
  }
?>




<!DOCTYPE html><!--IT20264352  P.P.S.Amarasinghe-->

<head>
    <title>Sign up</title>
    <link rel="stylesheet" type="text/css" href="../css/register.css">
    
  
</head>

<body> <div  class="b">

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

<br>
<br>
<br>
<br>
<br>
<br>



<div class="containe" >
    
        
        <!--login-->
<div class="login">
<form action="login.php" method="post"

  <head>
      <meta charset="utf-8">
      <title>Login Form</title> 
      <link rel="stylesheet" type="text/css" href="../css/register.css">
  </head>
  
  
      <div class="login-box">
          <h1>Login</h1>
          
            
              <div class="textbox">
              <p>Username</p>
                   <input type="text" name="email" value="">
             </div>

             <p>Password</p>
              <div class="textbox">

                  <Input type="password" name="password" value="">

            </div>
            </br>
                
        <?php
            if (isset($errors) && !empty($errors)){
              echo  '<p class="error">Invalid username/Password</p>';
            }
            ?>

                  <input class="a" type="submit" name="submit" value="Sign in"> 
                  <!--<input class="btn" type="submit" name="submit" value="Sign in">-->
      </div>
</form>
  
</div>
     
    </div>
    
   
    


<br>
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
</div>

</div>
</body>

</html>
<?php mysqli_close($con); ?>