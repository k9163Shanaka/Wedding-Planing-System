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
	if(isset($_GET["delete_pack_id"])){
		
		$id = $_GET["delete_pack_id"];
		$sql = "DELETE FROM package WHERE pack_id = {$id} LIMIT 1";
		$delete = $con->query($sql);

		if ($delete){
			header("location: packages.php?msg=package_deleted");
		}

	}else{ 
		header("location: packages.php?err=delete_failed");
	}

?>