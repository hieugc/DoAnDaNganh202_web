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
var image_edit = document.getElementsByClassName("image-edit")[0];
var QR = document.getElementsByClassName("QR")[0];
left.onclick = function(){
  myModal_house.style.display = "none";
  myModal_settinghouse.style.display = "none";
}
right.onclick = function(){
  var input1 = myModal_settinghouse.getElementsByTagName("input")[0].value;
  var input2 = myModal_settinghouse.getElementsByTagName("input")[1].value;
  var id = input2.split("-").reverse()[0];
  var device = "";
  if(input2.indexOf("led") == -1) device = "fan";
  else device = "led";
  console.log(input1 + " " + input2 + " " + id + " " + device);
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      if(this.responseText.indexOf("ok") != -1)
      {
        var text = "<div class=\"item\"><h3>" + input1 + "</h3><label class=\"switch\"><div hidden>" + device + "-" + id + "</div><input type=\"checkbox\" onclick=\"update_device(this)\"><span class=\"slider round\"></span></label></div>";
        document.getElementsByClassName("list")[0].innerHTML = text + document.getElementsByClassName("list")[0].innerHTML;
        myModal_house.style.display = "none";
        myModal_settinghouse.style.display = "none";
      }
      else{
        console.log(this.responseText);
      }
    }
  };
  xmlhttp.open("GET", "?url=room/create_" + device + "/" + input1 + "/" + id, true);
  xmlhttp.send();
}
Lbot_item[Lbot_item.length - 3].onclick = function(){
    myModal_house.style.display = "none";
    myModal_settinghouse.style.display = "block";
    left.getElementsByTagName("h1")[0].innerText = namehouse;
    deletev.style.display = "flex";
    image_edit.style.display = "block";
    QR.style.display = "none";
    content_settinghouse.getElementsByTagName("h1")[0].innerText = "Tên phòng";
    content_settinghouse.getElementsByTagName("h1")[1].innerText = "Hình nền phòng";
}
Lbot_item[Lbot_item.length - 2].onclick = function(){
    myModal_house.style.display = "none";
    myModal_settinghouse.style.display = "block";
    left.getElementsByTagName("h1")[0].innerText = "Tất cả phòng";
    deletev.style.display = "none";
    image_edit.style.display = "block";
    QR.style.display = "none";
    content_settinghouse.getElementsByTagName("h1")[0].innerText = "Tên phòng";
    content_settinghouse.getElementsByTagName("h1")[1].innerText = "Hình nền phòng";
}

head_left.onclick = function() {
    myModal_house.style.display = "block";
}
head_right.onclick = function(){
  myModal_settinghouse.style.display = "block";
  left.getElementsByTagName("h1")[0].innerText = "Tất cả thiết bị";
  deletev.style.display = "none";
  image_edit.style.display = "none";
  QR.style.display = "block";
  content_settinghouse.getElementsByTagName("h1")[0].innerText = "Tên tên thiết bị";
  content_settinghouse.getElementsByTagName("h1")[1].innerText = "Mã thiết bị";
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
          document.getElementById("gas").innerText = String(get_value(demo)/100) + " %";
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