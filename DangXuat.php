<?php
session_start();
unset($_SESSION["userid"]);
unset($_SESSION["username"]);
unset($_SESSION['chude']);
header("Location:dangnhap.php");
?>