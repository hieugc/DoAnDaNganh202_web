<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DADN</title>
    <!--icon link-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="./Views/notify/style.css" rel="stylesheet" type="text/css" />
    <link href="./Views/nav/style.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div class="containner">
      <h1 class="head">Thông báo</h1>
      <div class="list">
        <?php 
          if(isset($_SESSION["notify"])){
            foreach($_SESSION["notify"] as $row){
              echo "<div class=\"notify_item\">
              <div class=\"notify_head_item\">
                <div class=\"notify_head_left_item\">" . explode("@",$row["content"])[0] . "</div>
                <div class=\"notify_head_right_item\">" . explode("-",$row["time"])[2] . "-" . explode("-",$row["time"])[1] . "-" . explode("-",$row["time"])[0] . "</div>
              </div>
              <div class=\"notify_mid_item\">
                <div class=\"notify_mid_head_item\">Rò rỉ khí gas tại " . explode("@",$row["content"])[1] . "</div>
                <div class=\"content\">
                  Rò rỉ " . $row["value"]/100 . "%
                </div>
              </div>
            </div>";
            }
          }
        ?>
        
      </div>
      <div class="nav" id="2"><?php require_once "./Views/nav/index.php"; ?></div>
    </div>
    <script src="./Views/notify/notify.js"></script>
  </body>
</html>
