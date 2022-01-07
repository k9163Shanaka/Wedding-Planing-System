<!--  IT20263058 | H.C.M. Silva -->
<?php
$host = "localhost";
$userName = "root";
$password = "";
$dbName = "wps";
// Create database connection
$conn = new mysqli($host, $userName, $password, $dbName);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$first_name = $_POST['firstname'];
$last_name = $_POST['lastname'];
$phone_number = $_POST['Mobile'];
$details = $_POST['subject'];

$sql = "INSERT INTO contact (first_name,last_name,phone_number,details) VALUE ('$first_name','$last_name','$phone_number','$details')";

if (!mysqli_query($conn,$sql))
{
    //echo 'done';

}
else
{
    header('Location: ../html/contact_us.html');
}
?>