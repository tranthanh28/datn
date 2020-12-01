<?php
// Start the session
session_start();
?>
<?php
if(isset($_SESSION["username"])==false){
header('Location: http://localhost/test/dangnhap.php');
}
else{
include 'header1.php';
$a=$_SESSION["username"];
}
?>
<?php include 'connect.php'; ?>
<?php
if (count($_POST) > 0) {
$result = mysqli_query($conn, "SELECT * from nguoidung WHERE id=" . $_SESSION["userid"] );
$row = mysqli_fetch_array($result);
  if ($_POST["mkcu"] == $row["MatKhau"]) {
mysqli_query($conn, "UPDATE nguoidung set MatKhau='" . $_POST["mkmoi"] . "' WHERE id=" . $_SESSION["userid"] );
$message = "Mật khẩu đã được thay đổi";
} else
$message = "Mật khẩu không đúng";


}
?>
<?php mysqli_close($conn); ?>
<body>
  <div class="container">
    <form action="DoiMK.php" class="was-validated" name="frmChange" onSubmit="return validatePassword()" method="post">
      <div class="form-group">
        <label for="mkcu">Mật khẩu cũ:</label>
        <input type="text" class="form-control" id="mkcu" placeholder="Nhập mật khẩu cũ" name="mkcu" required>
        <div class="valid-feedback"></div>
        <div class="invalid-feedback">Vui lòng điền mật khẩu cũ.</div>
      </div>
      <div class="form-group">
        <label for="mkmoi">Mật khẩu mới</label>
        <input type="password" class="form-control" id="mkmoi" placeholder="Nhập mật khẩu mới" name="mkmoi" required>
        <div class="valid-feedback"></div>
        <div class="invalid-feedback">Vui lòng điền mật khẩu mới.</div>
      </div>
      <div class="form-group">
        <label for="mkmoi2">Nhập lại mật khẩu</label>
        <input type="password" class="form-control" id="mkmoi2" placeholder="Nhập lại mật khẩu mới" name="mkmoi2" required>
        <div class="valid-feedback"></div>
        <div class="invalid-feedback">Vui lòng điền mật khẩu mới.</div>
        <div id="mk"></div>
      </div>
      <div class="alert alert-info"><?php if(isset($message)) { echo $message; } ?></div>
      <button type="submit" name="submit" class="btn btn-primary">Gửi</button>
    </form>
  </div>
  <script>
  function validatePassword() {
  var mkmoi,mkmoi2,output = true;
  mkmoi = document.frmChange.mkmoi;
  mkmoi2 = document.frmChange.mkmoi2;
  if(mkmoi.value != mkmoi2.value) {
    mkmoi.value="";
    mkmoi2.value="";
    mkmoi.focus();
    document.getElementById("mk").innerHTML = "mật khẩu mới không giống";
    output = false;
    }
  return output;
  }
  </script>
</body>
</html>
</div>
<?php include 'footer.php'; ?>
</html>