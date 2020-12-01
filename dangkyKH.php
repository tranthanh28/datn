<?php session_start(); ?>
	<?php
	if(isset($_SESSION["username"])==false){
	header('Location: http://localhost/test/dang-nhap.php');
	}
	else if(isset($_SESSION["chude"])==false){
	header('Location: http://localhost/test/canhbao.php');
	}
	else{
	include 'header1.php';
	$a=$_SESSION["username"];
	$b= $_SESSION["chude"];
	}
	?>
	<?php include 'connect.php'; ?>
	<?php
	$sql1 = "SELECT id,SoTien FROM nguoidung where TenNguoiDung=\"$a\"";
	$result1 = mysqli_query($conn, $sql1);
	$row1 = mysqli_fetch_assoc($result1);
	$id=$row1["id"];
	$sql2 = "SELECT HocPhi FROM chude where id=\"$b\"";
	$result2 = mysqli_query($conn, $sql2);
	$row2 = mysqli_fetch_assoc($result2);
	if($row1["SoTien"]>=$row2["HocPhi"]){
		$c=$row1["SoTien"]-$row2["HocPhi"];
		$sql3 = "UPDATE nguoidung SET SoTien = $c WHERE TenNguoiDung=\"$a\";";
		mysqli_query($conn, $sql3);
		$sql4 = "INSERT INTO `tg` (`id`, `idNguoiDung`, `idChuDe`) VALUES (NULL, '$id', '$b');";
		mysqli_query($conn, $sql4);
		echo $id;
		echo "<div class=\"alert alert-success text-center\" style =\"padding-top: 150px; height:350px; font-size: 30px;\">Đăng ký khóa học thành công</div>";
		}
		else{
			echo "<div class=\"alert alert-danger text-center \" style =\"display: flex; flex-wrap: nowrap; justify-content: center; align-items: center; height:350px;\">
				<div style =\"text-align: center; font-size: 30px;\">Đăng ký khóa học không thành công.<br>
				Tài khoản không đủ để đăng ký.Vui lòng nạp tiền vào để đăng ký khóa học</div></div>";
				echo "<div style=\"text-align: center;\">";
					echo "<button class=\" btn btn-info\" onclick=\"goBack()\">Trở về</button>";
					echo "<a href=\"naptien.php\" class=\"btn btn-danger\" role=\"button\">Nạp tiền</a>";
				echo "</div>";
			}
			mysqli_close($conn);
		?>
		<?php include 'footer.php'; ?>
		<script>
			function goBack() {
			window.history.back();
			}
		</script>
	</html>