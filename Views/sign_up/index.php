<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DADN</title>
    <!--icon link-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="./Views/sign_up/style.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div class="contain">
      <form action="" method="post">
        <div class="imgcontainer">
          <img src="./Views/login/Login.png" alt="Avatar" class="avatar">
          <h1>Smart home</h1>
        </div>
      
        <div class="container">
          <label for="uname"><b>Tên đăng kí</b></label>
          <input type="text" placeholder="Điền Username" name="uname" required>
      
          <label for="psw"><b>Mật khẩu</b></label>
          <input type="password" placeholder="Điền Password" name="psw" required>
          <label for="psw"><b>Xác nhận mật khẩu</b></label>
          <input type="password" placeholder="Xác nhận mật khẩu" name="psw_1" required>
          <div style="display: flex;justify-content: center;">
            <div class="button" onclick="sign_up()">Đăng kí</div>
          </div>
          <div style="display: flex;justify-content: center;">
           <div class="button unactive"><a href="?url=login/login_view/">Đăng nhập</a></div>
          </div>
        </div>
      </form>
    </div>
    <script src="./Views/sign_up/sign_up.js"></script>
  </body>
</html>
