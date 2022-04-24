<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DADN</title>
    <!--icon link-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="./Views/login/style.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div class="contain">
      <form action="" method="post">
        <div class="imgcontainer">
          <img src="./Views/login/Login.png" alt="Avatar" class="avatar">
          <h1>Smart home</h1>
        </div>
      
        <div class="container">
          <label for="uname"><b>Tên đăng nhập</b></label>
          <input type="text" placeholder="Điền Username" name="uname" required>
      
          <label for="psw"><b>Mật khẩu</b></label>
          <input type="password" placeholder="Điền Password" name="psw" required>
          <div style="display: flex;justify-content: center;">
            <div class="button" onclick="login()">Đăng nhập</div>
          </div>
          <div style="display: flex;justify-content: center;">
           <div class="button unactive"><a href="?url=sign_up/sign_up_view/">Đăng kí</a></div>
          </div>
        </div>
      </form>
    </div>
    <script src="./Views/login/login.js"></script>
  </body>
</html>
