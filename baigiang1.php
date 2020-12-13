<?php
// Start the session
session_start();

?>
<?php  
if(isset($_SESSION["username"])==false){
header('Location: dang-nhap.php');
}
else if(isset($_SESSION["chude"])==false){
header('Location: canhbao.php');
}
?>

<?php include 'connect.php'; ?>;
<?php
$a=$_SESSION["username"];
$b= $_SESSION["chude"];
$sql3 = "SELECT tg.id FROM tg INNER JOIN nguoidung ON nguoidung.id=tg.idNguoiDung where nguoidung.TenNguoiDung = \"$a\" and tg.idChuDe=$b";
$result3 = mysqli_query($conn, $sql3);
if (mysqli_num_rows($result3) == 0) {
header("Location:dkKhoaHoc.php");
}
else{
include 'header1.php';
$sql4 = "SELECT DiaChi FROM baigiang where id= ".$_GET["id"];
$result4 = mysqli_query($conn, $sql4);
$row4 = mysqli_fetch_assoc($result4);
echo "<div class=\"container-fluid\">
  <div class=\"row\">
    <div class=\"col-sm-8 bg-dark\" style=\"height: 400px;\">
      <video  controls style=\"width: 100%;height: 400px;\">
        <source src=\"" . $row4["DiaChi"] . "\" type=\"video/webm\">
        Your browser does not support.
      </video>
    </div>
    <div class=\"col-sm-4 border\" style=\"position: relative; overflow-y: auto;height: 400px;\">
      <div style=\"height: 300; width: 100%;\" >
        binh luan
      </div>
      <div style=\"position: absolute;bottom: 0; width: 90%;\">
        <form class=\"form-inline\" action=\"/action_page.php\" style=\"width: 100%;\">
          <input class=\"form-control mr-sm-2 w-75\" type=\"text\" placeholder=\"Bình luận\">
          <button class=\"btn btn-success\" type=\"submit\">Gửi</button>
        </form>
      </div>>
    </div>
  </div>
</div>";
$sql2 = "SELECT * FROM baigiang  where baigiang.idChuDe=$b";//thay doi o day
$result2 = mysqli_query($conn, $sql2);
if (mysqli_num_rows($result2) > 0) {
// output data of each row
while($row2 = mysqli_fetch_assoc($result2)) {
echo "<div>";
  echo "<a href=\" baigiang1.php?id=". $row2["id"]. "\">Tên bài giảng: " . $row2["TenBaiGiang"] .  "<br></a>";
echo "</div>";
}


} else {
echo "0 results";
}
}
mysqli_close($conn);
?>
<<?php include 'footer.php'; ?>
</html>