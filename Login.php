<html>
<head>
	<title>Trang đăng nhập</title>
	<meta charset="utf-8">
</head>
<body>
<?php include 'connect.php'; ?>
<?php
		if (isset($_POST["btn_submit"])) {
			$name = $_POST["username"];
			$pass = $_POST["password"];

			$sql = "SELECT *
					FROM user
					WHERE TenNguoiDung= '$name'
					AND MatKhau = '$pass'";
			$query = mysqli_query($conn, $sql);

			if (mysqli_num_rows($query)) {
				$row = mysqli_fetch_array($query);
				$_SESSION["username"]=$name;
				$_SESSION["userid"]= $row["id"];
				header("location:ht1.php");
		}
		else{
			$error =  "<div class='alert alert-danger'>Tài khoản không hợp lệ !</div>";
			// header("location:admin.php");
		}
    }
    ?>
	<form method="POST" action="Login.php">
	<fieldset>
	    <legend>Đăng nhập</legend>
	    	<table>
	    		<tr>
	    			<td>Username</td>
	    			<td><input type="text" name="username" size="30"></td>
	    		</tr>
	    		<tr>
	    			<td>Password</td>
	    			<td><input type="password" name="password" size="30"></td>
	    		</tr>
	    		<tr>
	    			<td colspan="2" align="center"> <input type="submit" name="btn_submit" value="Đăng nhập"></td>
	    		</tr>
	    	</table>
  </fieldset>
  </form>
</body>
</html>