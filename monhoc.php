<?php
// Start the session
session_start();
include 'header1.php';
?>
<?php
if(isset($_SESSION["username"])==false){
$a="";
}
else{
$a=$_SESSION["username"];
}
?>
<div class="container">
  <?php include 'connect.php'; ?>;
  <?php
  $sql1 = "SELECT chude.id,chude.TenChuDe,chude.HocPhi,giaovien.TenGiaoVien,chude.IdKhoaHoc,chude.DcHinhAnh FROM chude INNER JOIN giaovien
  ON giaovien.id=chude.IdGiaoVien where chude.id =" .$_GET["id"];
  $result1 = mysqli_query($conn, $sql1);
  if (mysqli_num_rows($result1) > 0) {
  // output data of each row
  $row1 = mysqli_fetch_assoc($result1);
  $_SESSION["chude"]= $row1["id"];
  $b=$_SESSION["chude"];
  echo "<div class=\"row mt-2\">";
    echo "<div class=\"col-sm-4\" style=\"overflow-y:auto;\">";
      echo "<img src=\"" . $row1["DcHinhAnh"] . "\" alt=\"icondfs\" style=\"width:200px;height:288px;\"><br>";
    echo "</div>";
    echo "<div class=\"col-sm-8\" style=\"font-size: 30px\">";
      echo "Chủ Đề: " . $row1["TenChuDe"].  "<br>";
      echo "Giáo Viên: " . $row1["TenGiaoVien"].  "<br>";
      echo "Học Phí: " . $row1["HocPhi"].  "<br>";
      echo "<a id=\"btn_dk\" href=\"dangkyKH.php\" class=\"btn btn-danger\" role=\"button\">Đăng ký</a>";
    echo "</div>";
  echo "</div>";
  $sql2 = "SELECT * FROM baigiang  where baigiang.idChuDe=" .$_SESSION["chude"];
  $result2 = mysqli_query($conn, $sql2);
  if (mysqli_num_rows($result2) > 0) {
  // output data of each row
  
  
  while($row2 = mysqli_fetch_assoc($result2)) {
  echo "<div>";
    echo "<a style=\"font-size: 30px\" href=\" http://localhost/test/baigiang1.php?id=". $row2["id"]. "\">Tên Bài Giảng: " . $row2["TenBaiGiang"] .  "<br></a>";
  echo "</div>";
  }
  
  
  } else {
  echo "0 results";
  }
  } else {
  echo "0 results";
  }
  // kiem tra nut dang ky
  $sql3 = "SELECT tg.id FROM tg INNER JOIN nguoidung ON nguoidung.id=tg.idNguoiDung where nguoidung.TenNguoiDung = \"$a\" and tg.idChuDe=$b";
  $result3 = mysqli_query($conn, $sql3);
  if (mysqli_num_rows($result3) > 0) {
  echo "<script>document.getElementById(\"btn_dk\").style.display=\"none\";</script>";
  }
  mysqli_close($conn);
  ?>
</div>
<<?php include 'footer.php'; ?>
</html>