<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <style>
    #menu{
    display: none;
    }
    .sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
    }
    .sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
    }
    .sidenav a:hover {
    color: #f1f1f1;
    }
    .sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
    }
    @media screen and (max-width: 450px) {
    #menu{
    display: block;
    }
    #menu1{
    display: none;
    }
    }
    </style>
  </head>
  <body>
    <!--băt đầu phần header-->
    <div class="jumbotron jumbotron-fluid p-3">
      <div class="row ">
        <H1 class="col-sm">Học Trực Tuyến</H1>
        <form class="col-sm form-inline" action="/action_page.php">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" onkeyup="showResult(this.value)">
          <button class="btn btn-success" type="submit"><i class="fas fa-search"></i>Search</button>
          <div id="livesearch"></div>
        </form>
        <div class="col-sm">
          <div id="dangnhap1">
            <a href="#" class="btn btn-info" role="button">Đăng ký</a>
            <a href="#" class="btn btn-primary d-sm-inline" role="button">Đăng nhập</a>
          </div>
          <div class="dropdown" id="dangnhap2" style="display: none;">
            <span  class=" dropdown-toggle" style="cursor:pointer; font-size:20px;" data-toggle="dropdown"><i class=" fas fa-user-alt"></i>
            <?php echo $_SESSION["username"];?></span>
            <div class="dropdown-menu"style="position: relative; z-index:2; ">
              <a class="dropdown-item" href="ThongTinTK.php">Thông tin tài khoản</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="DoiMK.php">Đổi mật khẩu</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="KHDK.php">Khóa học đã đăng ký</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="naptien.php">Nạp tiền</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="DangXuat.php">Đăng xuất</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <nav id="menu1" class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top" style=" z-index:1; ">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="ht1.php"><i class="fas fa-house-user"></i>Trang chủ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/test/khoahoc.php?id=1">Lớp 10</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/test/khoahoc.php?id=2">Lớp 11</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/test/khoahoc.php?id=3">Lớp 12</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/test/khoahoc.php?id=4">Tiếng Anh</a>
        </li>
      </ul>
    </nav>
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a href="ht1.php"><i class="fas fa-house-user"></i>Trang chủ</a>
      <a href="http://localhost/test/khoahoc.php?id=1">Lớp 10</a>
      <a href="http://localhost/test/khoahoc.php?id=2">Lớp 11</a>
      <a href="http://localhost/test/khoahoc.php?id=3">Lớp 12</a>
      <a href="http://localhost/test/khoahoc.php?id=4">Tiếng Anh</a>
    </div>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark" >
      <span style="color:white; font-size:30px;cursor:pointer" id ="menu" onclick="openNav()"><i class=" fas fa-list-ul"> </i> Menu</span>
    </nav>
    <script>
    function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    }
    function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    }
    </script>
    <?php
    if(isset($_SESSION["username"])==true){
    echo "<script> document.getElementById(\"dangnhap1\").style.display=\"none\";
    document.getElementById(\"dangnhap2\").style.display=\"block\";
    </script>";
    }
    ?>
    <!--kết thúc phần header-->