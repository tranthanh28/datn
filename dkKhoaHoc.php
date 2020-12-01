 <?php
  // Start the session
  session_start();
  ?>
  <?php
  if(isset($_SESSION["username"])==false){
  header('Location: http://localhost/test/dang-nhap.php');
  }
  else{
  include 'header1.php';
  }
  ?>
  <div class="container">
    <div class="alert alert-danger text-center " style ="display: flex; flex-wrap: nowrap; justify-content: center; align-items: center; height:350px;">
      <div style ="text-align: center; font-size: 30px;">Tài khoản của bạn chưa đăng ký khóa học này.<br>
      Vui lòng bấm nút đăng ký bên dưới để có thể truy cập vào khóa học.</div></div>
      <div style="text-align: center;">"
        <a href="dangkyKH.php" class="btn btn-danger" role="button">Đăng ký</a>
      </div>;
    </div>
    <<?php include 'footer.php'; ?>
  </html>