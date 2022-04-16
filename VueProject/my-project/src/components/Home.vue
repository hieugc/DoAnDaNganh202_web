<script setup>

</script>

<template>


    <div class="containner">
      <h1 class="head">Nhà</h1>
      <div class="list">
        <div class="notify_item">
          <div class="notify_head_item">
            <div class="notify_head_left_item">Nhà 1</div>
            <div class="notify_head_right_item">10/04/2020</div>
          </div>
          <div class="notify_mid_item">
            <div class="notify_mid_head_item">Tên thao tác lỗi</div>
              <div class="content">
                Thiết bị ... tại ...
              </div>
              <div class="content">
                Thiết bị ... tại ...
              </div>
          </div>
          <div class="notify_bot_item"><span class="material-icons">
            keyboard_double_arrow_right
          </span></div>
        </div>

        <div class="notify_item">
          <div class="notify_head_item">
            <div class="notify_head_left_item">Nhà 1</div>
            <div class="notify_head_right_item">10/04/2020</div>
          </div>
          <div class="notify_mid_item">
            <div class="notify_mid_head_item">Tên thao tác lỗi</div>
              <div class="content">
                Thiết bị ... tại ...
              </div>
              <div class="content">
                Thiết bị ... tại ...
              </div>
          </div>
          <div class="notify_bot_item"><span class="material-icons">
            keyboard_double_arrow_right
          </span></div>
        </div>

      </div>




      <div class="nav">
        <div class="nav_item">
          <div class="icon">
            <span class="material-icons">
              home
              </span>
          </div>
          <div class="title">
              Nhà
          </div>
        </div>

        <div class="nav_item active">
          <div class="icon">
            <span class="material-icons">
              meeting_room
              </span>
          </div>
          <div class="title">
              Phòng
          </div>
        </div>

        <div class="nav_item ">
          <div class="icon">
            <span class="material-icons">
              notifications
              </span>
          </div>
          <div class="title">
              Thông báo
          </div>
        </div>
      </div>
    </div>
    

</template>

<style scoped>

@import url('https://fonts.googleapis.com/icon?family=Material+Icons');
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.head{
    padding: 10px 16px;
    margin: 5px 20px;
    border-bottom: 2px solid black;
}
.list{
    margin: 0 20px;
    overflow: scroll;
    min-height: 700px;
    max-height: 700px;
}
.notify_item{
    margin-top: 15px;
    padding: 10px;
    border: 2px solid black;
    border-radius: 20px;
}
.notify_head_item{
    display: flex;
    flex-flow: row;
    justify-content: space-between;
    font-size: 18px;
    font-weight: bold;
}
.notify_head_left_item{
    padding: 7px 0;
    min-width: 130px;
    text-align: center;
    background-color: red;
    border-radius: 20px;
}
.notify_head_right_item{
    padding: 7px 0;
}
.notify_mid_item{
    margin-top: 10px;
}
.notify_mid_head_item{
    font-size: 24px;
    font-weight: bold;
}
.content{
    margin: 5px 10px;
    max-width: 100%;
}
.notify_bot_item{
    display: flex;
    justify-content: flex-end;
}

.nav{
    display: flex;
    justify-content:space-around;
    margin: 5px 10px;
}

.nav_item{
    width: 33.33%;
    padding-top: 5px;
    display: flex;
    flex-flow: column;
    font-size: 20px;
    text-align: center;
}
.icon span.material-icons{
    font-size: 30px;
}
.nav_item.active{
    border-top: 2px solid aqua;
}
.nav_item.active *{
    color: aqua;
}
</style>
