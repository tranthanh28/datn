<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tao phong</title>
    <!-- import the webpage's stylesheet -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="/style.css" />
    <!-- import the webpage's javascript file -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios@0.20.0/dist/axios.min.js"></script>
    <script src="https://cdn.stringee.com/sdk/web/2.2.1/stringee-web-sdk.min.js"></script>
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
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v9.0&appId=851417032320247&autoLogAppEvents=1" nonce="hRF5Abrq"></script>
    <!--băt đầu phần header-->
    <div class="jumbotron jumbotron-fluid p-3">
      <div class="row ">
        <div class="col-sm">
          <a href="ht1.php"><img src="logo1.png" height="100px" title="học trực tuyến" alt="Học trực tuyến"></a><br>
          <div class="fb-like" data-href="http://localhost/test/ht1.php" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="false"></div>
        </div>
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
            <?php echo $_SESSION["username"];?></span><br>
            <a href="phonghop.php" class="btn btn-success" role="button">Phòng họp</a>
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
    <div class="container" v-cloak id="app">
      <div>
        <button class="btn btn-primary" v-if="!room" @click="createRoom">
        Tạo Meeting
        </button>
        <button class="btn btn-primary" v-if="!room" @click="joinWithId">
        Join Meeting
        </button>
        <button class="btn btn-primary" v-if="room" @click="publish(true)">
        Share Desktop
        </button>
      </div>
      <div v-if="roomId" class="info">
        Link phòng:
        <a v-bind:href="roomUrl" target="_blank">{{roomUrl}}</a>
      <p>Id phòng: <code>{{roomId}}</code> để share.</p>
    </div>
  </div>
  <div class="container">
    <div id="videos"></div>
  </div>
</body>
<script src="api.js"></script>
<script src="script.js"></script>
</html>