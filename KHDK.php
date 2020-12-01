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
  <?php
  $sql1 = "SELECT id FROM nguoidung where TenNguoiDung=\"$a\"";
  $result1 = mysqli_query($conn, $sql1);
  $row1 = mysqli_fetch_assoc($result1);
  $id= $row1["id"];
  $sql2 = "SELECT idChuDe FROM tg where idNguoiDung=$id";
  $result2 = mysqli_query($conn, $sql2);
  if (mysqli_num_rows($result2) > 0) {
  while ($row2 = mysqli_fetch_assoc($result2)){
  $idKH= $row2["idChuDe"];
  $sql3 = "SELECT id,TenChuDe,DcHinhAnh FROM chude where id=$idKH;";
  $result3 = mysqli_query($conn, $sql3);
  if($row3 = mysqli_fetch_assoc($result3)){
  echo "<div class=\"row mt-2\">";
    echo "<div class=\"col-4\">";
      echo "<a  href=\" http://localhost/test/monhoc.php?id=". $row3["id"]. "\"><img src=\"" . $row3["DcHinhAnh"] . "\" alt=\"icondfs\" style=\"width:100px;height:100px;\"></a>";
    echo "</div>";
    echo "<div class=\"col\">";
      echo "<a  href=\" http://localhost/test/monhoc.php?id=". $row3["id"]. "\">Chủ đề:  " . $row3["TenChuDe"] .  "<br></a>";
    echo "</div>";
  echo "</div>";
  }
  
  }
  }
  else{
  echo "Không có khóa học nào đăng ký";
  }
  ?>
</div>
<?php mysqli_close($conn); ?>
<?php include 'footer.php'; ?>
</html>