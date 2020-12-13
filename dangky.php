<?php
session_start();
?>
<?php include 'connect.php'; ?>
<?php
if (count($_POST) > 0) {
$name = $_POST["name"];
$pass = $_POST["mkmoi"];
$email = $_POST["email"];
$date= date("Y-m-d");
$sql = "INSERT INTO `nguoidung` (`id`, `TenNguoiDung`, `SoTien`, `DiaChi`, `MatKhau`, `SoDienThoai`, `HoTen`, `NgayThamGia`, `Email`) VALUES (NULL, '$name', '0', '', '$pass', '', '', '$date', '$email');";
if (mysqli_query($conn, $sql)) {
  $_SESSION["username"]=$name;
  header("location:ht1.php");
} else {
  $err= "Tên tài khoản đã có người sử dụng";
}

}
?>
<?php mysqli_close($conn); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dang ky</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
    :root {
    --input-padding-x: 1.5rem;
    --input-padding-y: .75rem;
    }
    body {
    background: #007bff;
    background: linear-gradient(to right, #0062E6, #33AEFF);
    }
    .card-signin {
    border: 0;
    border-radius: 1rem;
    box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
    overflow: hidden;
    }
    .card-signin .card-title {
    margin-bottom: 2rem;
    font-weight: 300;
    font-size: 1.5rem;
    }
    .card-signin .card-img-left {
    width: 45%;
    background: scroll center url('bgr.jpg');
    background-size: cover;
    }
    .card-signin .card-body {
    padding: 2rem;
    }
    .form-signin {
    width: 100%;
    }
    .form-signin .btn {
    font-size: 80%;
    border-radius: 5rem;
    letter-spacing: .1rem;
    font-weight: bold;
    padding: 1rem;
    transition: all 0.2s;
    }
    .form-label-group {
    position: relative;
    margin-bottom: 1rem;
    }
    .form-label-group input {
    height: auto;
    border-radius: 2rem;
    }
    .form-label-group>input,
    .form-label-group>label {
    padding: var(--input-padding-y) var(--input-padding-x);
    }
    .form-label-group>label {
    position: absolute;
    top: 0;
    left: 0;
    display: block;
    width: 100%;
    margin-bottom: 0;
    line-height: 1.5;
    color: #495057;
    border: 1px solid transparent;
    border-radius: .25rem;
    transition: all .1s ease-in-out;
    }
    .form-label-group input::-webkit-input-placeholder {
    color: transparent;
    }
    .form-label-group input:-ms-input-placeholder {
    color: transparent;
    }
    .form-label-group input::-ms-input-placeholder {
    color: transparent;
    }
    .form-label-group input::-moz-placeholder {
    color: transparent;
    }
    .form-label-group input::placeholder {
    color: transparent;
    }
    .form-label-group input:not(:placeholder-shown) {
    padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
    padding-bottom: calc(var(--input-padding-y) / 3);
    }
    .form-label-group input:not(:placeholder-shown)~label {
    padding-top: calc(var(--input-padding-y) / 3);
    padding-bottom: calc(var(--input-padding-y) / 3);
    font-size: 12px;
    color: #777;
    }
    </style>
  </head>
  <body>
      <div class="container">
        <div class="row">
          <div class="col-lg-10 col-xl-9 mx-auto">
            <div class="card card-signin flex-row my-5">
              <div class="card-img-left d-none d-md-flex">
              </div>
              <div class="card-body">
                <h5 class="card-title text-center">Register</h5>
                <form class="form-signin" name="frmChange" onSubmit="return validatePassword()" action="" method="post">
                  <div class="form-label-group">
                    <input type="text" id="inputUserame" name="name" class="form-control" placeholder="Username" required autofocus>
                    <label for="inputUserame">Username</label>
                    <?php if(isset($err)){echo $err;}?>
                  </div>
                  <div class="form-label-group">
                    <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required>
                    <label for="inputEmail">Email address</label>
                  </div>
                  
                  <hr>
                  <div class="form-label-group">
                    <input type="password" id="inputPassword" name="mkmoi" class="form-control" placeholder="Password" required>
                    <label for="inputPassword">Password</label>
                  </div>
                  
                  <div class="form-label-group">
                    <input type="password" id="inputConfirmPassword" name="mkmoi2" class="form-control" placeholder="Password" required>
                    <label for="inputConfirmPassword">Confirm password</label>
                  </div>
                  <div id="mk"></div>
                  <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Register</button>
                  <a class="d-block text-center mt-2 small" href="dangnhap.php">Sign In</a>
                  <hr class="my-4">
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
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
    document.getElementById("mk").innerHTML = "mật khẩu nhập không giống";
    output = false;
    }
  return output;
  }
  </script>
    </body>
  </html>