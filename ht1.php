<?php
// Start the session
session_start();
$_SESSION["username"]="hoang";
$_SESSION["userid"]= 1;
?>
<?php include 'header1.php'; ?>
</head>
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-8">
      <div id="demo" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
    </ul>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="11.png" alt="E-learning" width="1100" height="500">
        <div class="carousel-caption">
          <h3>E-learning</h3>
        </div>
      </div>
      <div class="carousel-item">
        <img src="15.jpg" alt="E-learning" width="1100" height="500">
        <div class="carousel-caption">
          <h3>E-learning</h3>
        </div>
      </div>
      <div class="carousel-item">
        <img src="16.jpg" alt="E-learning" width="1100" height="500">
        <div class="carousel-caption">
          <h3>E-learning</h3>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>
  </div>
    </div>
    <div class="col-lg-4">
      <div class="fb-page" data-href="https://www.facebook.com/facebook" data-tabs="timeline" data-width="400" data-height="200" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote></div>
      <div class="fb-page" data-href="https://www.facebook.com/facebook" data-tabs="timeline" data-width="400" data-height="200" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote></div>
    </div>
  </div>
  
</div>
<div class="container">
  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "datn";
  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  // Check connection
  if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
  }
  $sql1 = "SELECT * FROM `khoahoc`";
  $result1 = mysqli_query($conn, $sql1);
  if (mysqli_num_rows($result1) > 0) {
  // output data of each row
  echo "<div class=\"row\">";
    while($row1 = mysqli_fetch_assoc($result1)) {
    echo "<div class=\"col-sm-6 mt-4 border\">";
      echo "<a  href=\" khoahoc.php?id=". $row1["id"]. "\"><h5><strong> " .$row1["TenKhoaHoc"].  "</strong></h5><br></a>";
      $sql2 = "SELECT chude.id,chude.TenChuDe,chude.HocPhi,giaovien.TenGiaoVien,chude.DcHinhAnh FROM ((chude INNER JOIN giaovien ON giaovien.id=chude.IdGiaoVien) INNER JOIN khoahoc ON khoahoc.id= chude.IdKhoaHoc) where khoahoc.id=".$row1["id"];
      $result2 = mysqli_query($conn, $sql2);
      if (mysqli_num_rows($result2) > 0) {
      // output data of each row
      while($row2 = mysqli_fetch_assoc($result2)) {
      echo "<div class=\"row mt-2\">";
        echo "<div class=\"col-4\">";
          echo "<a  href=\" monhoc.php?id=". $row2["id"]. "\"><img src=\"" . $row2["DcHinhAnh"] . "\" alt=\"icondfs\" style=\"width:100px;height:100px;\"></a>";
        echo "</div>";
        echo "<div class=\"col\">";
          echo "<a  href=\" monhoc.php?id=". $row2["id"]. "\">Chủ đề:  " . $row2["TenChuDe"] .  "<br></a>";
          echo "Giáo viên: " . $row2["TenGiaoVien"].  "<br>";
          echo "Học phí: " . $row2["HocPhi"].  "<br>";
        echo "</div>";
      echo "</div>";
      }
      
      
      } else {
      echo "0 results";
      }
    echo "</div>";
    }
    
  echo "</div>";
  } else {
  echo "0 results";
  }
  mysqli_close($conn);
  ?>
</div>
<<?php include 'footer.php'; ?>
</body>
</html>