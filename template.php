<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Bootstrap Example</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	</head>
	<div class="container">
		<?php
		session_start();
		?>
		<?php
		if(isset($_SESSION["username"])==false){
		header('Location: http://localhost/test/dang-nhap.php');
		}
		else{
		include 'header2.php';
		$a=$_SESSION["username"];
		}
		?>
		<?php include 'connect.php'; ?>
		<?php mysqli_close($conn); ?>
	</div>
	<<?php include 'footer.php'; ?>
</html>