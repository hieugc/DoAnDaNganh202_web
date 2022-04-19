var myModal_house = document.getElementById("myModal_house");
var head_left = document.getElementsByClassName("head_left")[0];
var Lbot_item = document.getElementsByClassName("bot-item");
var namehouse = document.getElementsByClassName("namehouse")[0].innerHTML;

var myModal_settinghouse = document.getElementById("myModal_settinghouse");
var head_settinghouse = document.getElementsByClassName("head-settinghouse")[0];

var left = head_settinghouse.getElementsByClassName("left")[0];
var right = head_settinghouse.getElementsByClassName("right")[0];
var deletev = document.getElementById("delete");
var content_settinghouse = document.getElementsByClassName("content-settinghouse")[0];

var head_right = document.getElementsByClassName("head_right")[0];
left.onclick = function(){
  myModal_house.style.display = "none";
  myModal_settinghouse.style.display = "none";
}
right.onclick = function(){
  myModal_house.style.display = "none";
  myModal_settinghouse.style.display = "none";
}
Lbot_item[Lbot_item.length - 3].onclick = function(){
    myModal_house.style.display = "none";
    myModal_settinghouse.style.display = "block";
    left.getElementsByTagName("h1")[0].innerText = namehouse;
    deletev.style.display = "flex";
    content_settinghouse.getElementsByTagName("h1")[0].innerText = "Tên nhà";
    content_settinghouse.getElementsByTagName("h1")[1].innerText = "Hình nền nhà";
}
Lbot_item[Lbot_item.length - 2].onclick = function(){
    myModal_house.style.display = "none";
    myModal_settinghouse.style.display = "block";
    left.getElementsByTagName("h1")[0].innerText = "Tất cả nhà";
    deletev.style.display = "none";
    content_settinghouse.getElementsByTagName("h1")[0].innerText = "Tên nhà";
    content_settinghouse.getElementsByTagName("h1")[1].innerText = "Hình nền nhà";
}

head_left.onclick = function() {
    myModal_house.style.display = "block";
}
head_right.onclick = function(){
  myModal_settinghouse.style.display = "block";
  left.getElementsByTagName("h1")[0].innerText = "Tất cả phòng";
  deletev.style.display = "none";
  content_settinghouse.getElementsByTagName("h1")[0].innerText = "Tên phòng";
  content_settinghouse.getElementsByTagName("h1")[1].innerText = "Hình nền phòng";
}

window.onclick = function(event) {
  if (event.target == myModal_house) {
    myModal_house.style.display = "none";
  }
  if(event.target == myModal_settinghouse){
    myModal_settinghouse.style.display = "none";
  }
}


function get_value(string){
  return Number(string.split(",")[1].split(":")[1].replace("\"","").replace("\"",""));
}

function auto_draw_gas(){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      if(this.responseText != "null")
      {
        let demo = JSON.parse(this.responseText);
        console.log(demo);
        var datag = get_value(demo);
        if(datag >= 400){
          clearInterval(timer_gas);
          window.location.href = "?url=dangerous_notify/dangerous_notify_view/"+datag;
        }
      }
    }
  };
  xmlhttp.open("GET", "?url=dash_board/get_gas", true);
  xmlhttp.send();
}
var timer_gas = setInterval(auto_draw_gas, 5000);