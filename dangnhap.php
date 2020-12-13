<?php
session_start();
?>
<?php include 'connect.php'; ?>
<?php
if (count($_POST) > 0) {
$name = $_POST["name"];
$pass = $_POST["pass"];
$sql = "SELECT *
FROM nguoidung
WHERE TenNguoiDung= '$name'
AND MatKhau = '$pass'";
$query = mysqli_query($conn, $sql);
if (mysqli_num_rows($query) == 1) {
$row = mysqli_fetch_array($query);
$_SESSION["username"]=$row["TenNguoiDung"];
$_SESSION["userid"]= $row["id"];
header("location:ht1.php");
}
else{
$error =  "<div class='alert alert-danger'>Tài khoản không hợp lệ !</div>";
}
}
?>
<?php mysqli_close($conn); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dang nhap</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
    :root {
    --input-padding-x: 1.5rem;
    --input-padding-y: 0.75rem;
    }
    .login,
    .image {
    min-height: 100vh;
    }
    .bg-image {
    background-image: url('ba4.jpg');
    background-size: cover;
    background-position: center;
    }
    .login-heading {
    font-weight: 300;
    }
    .btn-login {
    font-size: 0.9rem;
    letter-spacing: 0.05rem;
    padding: 0.75rem 1rem;
    border-radius: 2rem;
    }
    .form-label-group {
    position: relative;
    margin-bottom: 1rem;
    }
    .form-label-group>input,
    .form-label-group>label {
    padding: var(--input-padding-y) var(--input-padding-x);
    height: auto;
    border-radius: 2rem;
    }
    .form-label-group>label {
    position: absolute;
    top: 0;
    left: 0;
    display: block;
    width: 100%;
    margin-bottom: 0;
    /* Override default `<label>` margin */
      line-height: 1.5;
      color: #495057;
      cursor: text;
      /* Match the input under the label */
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
      /* Fallback for Edge
      -------------------------------------------------- */
      @supports (-ms-ime-align: auto) {
      .form-label-group>label {
      display: none;
      }
      .form-label-group input::-ms-input-placeholder {
      color: #777;
      }
      }
      /* Fallback for IE
      -------------------------------------------------- */
      @media all and (-ms-high-contrast: none),
      (-ms-high-contrast: active) {
      .form-label-group>label {
      display: none;
      }
      .form-label-group input:-ms-input-placeholder {
      color: #777;
      }
      }
      </style>
    </head>
    <body>
      <div class="container-fluid">
        <div class="row no-gutter">
          <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
          <div class="col-md-8 col-lg-6">
            <div class="login d-flex align-items-center py-5">
              <div class="container">
                <div class="row">
                  <div class="col-md-9 col-lg-8 mx-auto">
                    <h3 class="login-heading mb-4">Welcome back!</h3>
                    <?php if(isset($error)){echo $error;}?>
                    <form action="" method="post">
                      <div class="form-label-group">
                        <input type="text" id="name" name="name" class="form-control" placeholder="user name" required autofocus>
                        <label for="name">User name</label>
                      </div>
                      <div class="form-label-group">
                        <input type="password" name="pass" id="inputPassword" class="form-control" placeholder="Password" required>
                        <label for="inputPassword">Password</label>
                      </div>
                      <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Sign in</button>
                      <div class="text-center">
                        <a class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" href="dangky.php">Register</a>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </body>
</html>