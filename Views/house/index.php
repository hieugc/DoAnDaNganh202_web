<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Assignment</title>
    <!--icon link-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="./Views/house/style.css" rel="stylesheet" type="text/css" />
    <link href="./Views/nav/style.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div class="containner">
        <div class="head">
          <div class="head_left">
            <span class="material-icons">
                other_houses
                </span>
                <h1><?php if(isset($_SESSION["house_active"])) echo $_SESSION["house_active"]["name"] ?></h1>
          </div>
          <div class="head_right">
            <span class="material-icons">
                add_circle_outline
            </span>
          </div>          
        </div>
        <div class="body">
          <div class="list">
          <?php
              if(isset($_SESSION["room"] )){
                  foreach($_SESSION["room"] as $row){
                      echo "<div class=\"item\"><a href=\"?url=room/room_view\">
                      <h1>". $row["name"] ."</h1></a>
                    </div>";
                  }
              }
              ?>
          </div>
        </div>
        <div class="nav" id="0">
        <?php require_once "./Views/nav/index.php"; ?>
        </div>
    </div>
    <div id="myModal_house" class="modal">

      <!-- Modal content -->
      <div class="modal-head-house">
        <div class="head_left">
          <span class="material-icons">
              other_houses
              </span>
              <h1 class="namehouse"><?php if(isset($_SESSION["house_active"])) echo $_SESSION["house_active"]["name"] ?></h1>
        </div>
      </div>
      <div class="modal-content-house">
        
      <?php
        if(isset($_SESSION["house"])){
            foreach($_SESSION["house"] as $row)
            {
                echo "<div class=\"bot-item\">
                <h3>" . $row["name"] . "</h3>
              </div>";
            }
            echo "<hr />";
        }
        ?>
          <div class="bot-item">
            <h3>Cài đặt nhà</h3><span class="material-icons">
              settings
              </span>
          </div>
          <div class="bot-item">
            <h3>Thêm nhà</h3><span class="material-icons">
              add_circle
              </span>
          </div>
          <div class="bot-item">
            <h3>Đăng xuất</h3><span class="material-icons">
              logout
              </span>
          </div>
      </div>
    
    </div>
    <div id="myModal_settinghouse" class="modal" style="display: none;">
      <div class="myModal_settinghouse_content">
        <div class="head-settinghouse">
          <div class="left">
            <span class="material-icons">
              arrow_back_ios
              </span><h1><?php if(isset($_SESSION["house_active"])) echo $_SESSION["house_active"]["name"] ?></h1>
          </div>
          <h1 class="right">Xong</h1>
        </div>
        <div class="content-settinghouse">
          <h1>Tên nhà</h1>  
          <input type="text" placeholder="" name="search">
          <h1 style="margin-top: 60px;">Hình nền nhà</h1>
          <div class="image-edit">
              <h3 style="padding-bottom: 10px;border-bottom: 1px solid #EA8C00;"><label for="image" style="display: flex;justify-content: space-between;">Chọn ảnh<span class="material-icons">
                arrow_forward_ios
                </span></label></h3><input type="file" name="image" hidden>
              <h3 style="margin-top: 10px;display: flex;justify-content: space-between;">Màu mặc định<div style="height: 50px; width: 50px;border: 1px solid #EA8C00;background-color: white;"></div></h3>
          </div>
          <div style="display: flex;justify-content: center;" id="delete"><h2 class="delete">Xóa nhà</h2></div>
        </div>
      </div>
    </div>
    <script src="./Views/house/house.js"></script>
  </body>
</html>
