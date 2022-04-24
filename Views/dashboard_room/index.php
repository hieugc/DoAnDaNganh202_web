<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DADN</title>
    <!--icon link-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
    <link href="./Views/dashboard_room/style.css" rel="stylesheet" type="text/css" />
    <link href="./Views/nav/style.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div class="containner">
        <h1 class="head"><a href="?url=room/room_view/"><span class="material-icons">
          arrow_back_ios
          </span>Báo cáo</a></h1>
          <div class="list">
            <div id="chart_div_2"></div>
            <div id="chart_div_3"></div>
          </div>
          <div class="nav" id="1"><?php require_once "./Views/nav/index.php"; ?></div>
    </div>
    <script src="./Views/dashboard_room/dashboard.js"></script>
  </body>
</html>
