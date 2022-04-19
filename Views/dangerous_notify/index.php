<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Assignment</title>
    <!--icon link-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="./Views/dangerous_notify/style.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div class="cointain">
      <div class="head">
        <span class="material-icons">
          report_problem
        </span></div>
      <h1>Gas bị rò rỉ</h1>
      <h2><?php if(isset($_SESSION["room_active"])) echo $_SESSION["room_active"]["name"];?></h2>
      <h2><?php if(isset($_SESSION["house_active"])) echo $_SESSION["house_active"]["name"];?></h2>
      <div class="btn"><p onclick="safe()">Bỏ qua</p></div>
    </div>
    <script src="./Views/dangerous_notify/dangerous_notify.js"></script>
  </body>
</html>
