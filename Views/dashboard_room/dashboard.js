function Draw(i_data, i_title, i_index, i_type, i_color){
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(function(){drawChart(i_data, i_title, i_index, i_type, i_color);});
  function drawChart(i_data, i_title, i_index, i_type, i_color) {
    var data = new google.visualization.DataTable();
      data.addColumn('string', "Thời gian");
      data.addColumn('number', i_type);
      data.addRows(i_data);
    var options = {
      title: i_title,
      hAxis: {
        title: 'Thời gian',  
        titleTextStyle: {color: i_color}
      },
      vAxis: {
        minValue: 0
      //  textStyle: {color: i_color}
      },
      series: {
        0: {
            color: i_color
        }
      },
      legend: 'none',
      titleTextStyle: {
        color: i_color
      }
    };
    var chart = new google.visualization.AreaChart(document.getElementById(i_index));
    chart.draw(data, options);
  }
}

function draw_gas(){
  var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        if(this.responseText != "null")
        {
          console.log(this.responseText);
          let demo = JSON.parse(this.responseText);
          var arr = demo.split("},{");
          var data_gas = [];
          for(var i = arr.length - 1; i >= 0 ; i--){
            data_gas.push([get_date(arr[i]), get_value(arr[i])]);
          }
          Draw(data_gas, "Nồng độ khí gas", "chart_div_2", "Nồng độ", "#147AD6");
          //timer_gas = setInterval(auto_draw_gas, 5000);
        }
      }
    };
    xmlhttp.open("GET", "?url=dash_board/get_range_gas", true);
    xmlhttp.send();
}
function draw_temp(){
  var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        if(this.responseText != "null"){
          let demo = JSON.parse(this.responseText);
          var arr = demo.split("},{");
          var data_temp = [];
          for(var i = arr.length - 1; i >= 0 ; i--){
            data_temp.push([get_date(arr[i]), get_value(arr[i])]);
          }
          Draw(data_temp, "Nhiệt độ phòng", "chart_div_3", "Nhiệt độ", "#FF4646");
          //timer_temp = setInterval(auto_draw_temp, 5000);
        }
      }
    };
    xmlhttp.open("GET", "?url=dash_board/get_range_temperature", true);
    xmlhttp.send();
}
function get_value(string){
  return Number(string.split(",")[1].split(":")[1].replace("\"","").replace("\"",""));
}
function get_date(string){
  return String(string.split(",")[4].split("\":\"")[1].replace("Z\"", "").replace("T", " "));
}
function auto_draw_gas(){
  var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        if(this.responseText != "null")
        {
          let demo = JSON.parse(this.responseText);
          console.log(demo);
          data_gas.push([get_date(demo), get_value(demo)]);
          Draw(data_gas, "Nồng độ khí gas", "chart_div_2", "Nồng độ", "#147AD6");
        }
      }
    };
    xmlhttp.open("GET", "?url=dash_board/get_gas", true);
    xmlhttp.send();
}
function auto_draw_temp(){
  var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        if(this.responseText != "null"){
          let demo = JSON.parse(this.responseText);
          console.log(demo);
          data_temp.push([get_date(demo), get_value(demo)]);
          Draw(data_temp, "Nhiệt độ phòng", "chart_div_3", "Nhiệt độ", "#FF4646");}
      }
    };
    xmlhttp.open("GET", "?url=dash_board/get_temperature", true);
    xmlhttp.send();
}
//var data_gas = [];
//var data_temp = [];
var timer_gas;
var timer_temp;
draw_gas();
draw_temp();
timer_temp = setInterval(draw_gas, 5000);
timer_gas = setInterval(draw_temp, 5000);