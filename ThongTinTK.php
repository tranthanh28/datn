<?php
session_start();
?>
<?php
if(isset($_SESSION["username"])==false){
header('Location: http://localhost/test/dang-nhap.php');
}
else{
include 'header1.php';
$a=$_SESSION["username"];
}
?>
<?php include 'connect.php'; ?>
<div class="container">
	<div class="alert alert-success">
		<?php
		$sql1 = "SELECT * FROM nguoidung where TenNguoiDung=\"$a\"";
		$result1 = mysqli_query($conn, $sql1);
		$row1 = mysqli_fetch_assoc($result1);
		echo "Tài khoản: ". $row1["TenNguoiDung"]. "<br>";
		echo "Số dư: ". $row1["SoTien"]. "<br>";
		echo "Họ tên: ". $row1["HoTen"]. "<br>";
		echo "Tỉnh thành: ". $row1["DiaChi"]. "<br>";
		echo "Ngày tham gia: ". $row1["NgayThamGia"]. "<br>";
		echo "Số điện thoại: ". $row1["SoDienThoai"]. "<br>";
		?>
		
	</div>
</div>
<?php mysqli_close($conn); ?>
</div>
<?php include 'footer.php'; ?>
</html>