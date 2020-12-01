<?php
session_start();
?>
<?php
include 'header1.php';
?>
<div class="container">
  <?php include 'connect.php'; ?>;
  <?php
  $sql1 = "SELECT * FROM `khoahoc` where id=".$_GET["id"];
  $result1 = mysqli_query($conn, $sql1);
  if (mysqli_num_rows($result1) > 0) {
  // output data of each row
  $row1 = mysqli_fetch_assoc($result1);
  echo "<div class=\"container alert alert-info\">";
    echo "<h1>" .$row1["TenKhoaHoc"]."</h1>";
    echo "<span style=\"font-size: 40px;\">Nội dung:".$row1["ThongTin"]. "</span>";
  echo "</div>";
  $sql2 = "SELECT chude.id,chude.TenChuDe,chude.HocPhi,giaovien.TenGiaoVien,chude.IdKhoaHoc,chude.DcHinhAnh FROM chude INNER JOIN giaovien ON giaovien.id=chude.IdGiaoVien where chude.IdKhoaHoc=".$_GET["id"];
  $result2 = mysqli_query($conn, $sql2);
  if (mysqli_num_rows($result2) > 0) {
  while($row2 = mysqli_fetch_assoc($result2)) {
  echo "<div class=\"row mt-2\">";
    echo "<div class=\"col-4\">";
      echo "<a  href=\"http://localhost/test/monhoc.php?id=" . $row2["id"] ."\"><img src=\"" . $row2["DcHinhAnh"] . "\" alt=\"icondfs\" style=\"width: 120px; height: 200\"></a>";
    echo "</div>";
    echo "<div class=\"col\">";
      echo "<a  style=\"font-size: 30px;\" href=\"http://localhost/test/monhoc.php?id=" . $row2["id"] ."\">Chủ đề:  " . $row2["TenChuDe"] .  "<br></a>";
      echo "<div style=\"font-size: 30px;\">";
        echo "Giáo viên: " . $row2["TenGiaoVien"].  "<br>";
        echo "Học phí: " . $row2["HocPhi"].  "<br>";
      echo "</div>";
    echo "</div>";
  echo "</div>";
  }
  } else {
  echo "0 results";
  }
  } else {
  echo "0 results";
  }
  mysqli_close($conn);
  ?>
</div>
<<?php include 'footer.php'; ?>
</html>