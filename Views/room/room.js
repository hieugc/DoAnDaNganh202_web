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

function update_gas(){
  var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        if(this.responseText != "null")
        {
          console.log(this.responseText);
          let demo = JSON.parse(this.responseText);
          document.getElementById("gas").innerText = String(get_value(demo)) + " %";
        }
      }
    };
    xmlhttp.open("GET", "?url=dash_board/get_gas", true);
    xmlhttp.send();
}
function update_temp(){
  var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        if(this.responseText != "null"){
          let demo = JSON.parse(this.responseText);
          document.getElementById("temp").innerText = String(get_value(demo)/100) + " " + document.getElementById("temp").innerText.split(" ")[1];
        }
      }
    };
    xmlhttp.open("GET", "?url=dash_board/get_temperature", true);
    xmlhttp.send();
}

var timer_gas;
var timer_temp;
update_gas();
update_temp();
timer_temp = setInterval(update_gas, 5000);
timer_gas = setInterval(update_temp, 5000);

function update_device(element){
  var device = element.parentNode.getElementsByTagName("div")[0].innerText;
  var name = element.parentNode.parentNode.getElementsByTagName("h3")[0].innerText;
  console.log(name);
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      if(this.responseText != "null"){
        console.log(this.responseText);
      }
    }
  };
  if(element.checked){
    xmlhttp.open("GET", "?url=room/update_device/" + name + "/1/" + device, true);
  }
  else{
    xmlhttp.open("GET", "?url=room/update_device/" + name + "/0/" + device, true);
  }
  xmlhttp.send();
}
