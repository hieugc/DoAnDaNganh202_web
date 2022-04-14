var nav = document.querySelectorAll(".nav_item");
var nav_active = document.querySelectorAll(".active")[0];
nav.forEach(element => {
    element.addEventListener("click", function(){
        element.classList.add("active");
        nav_active.classList.remove("active");
        nav_active = element;
    })
});

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


var data_1 = [
  ['18:00 09/12/2013',  28],
  ['2014',  30],
  ['2015',  29],
  ['2016',  31]
];
var title_1 = "Nhiệt độ phòng";
var color_1 = "#FF4646";//EC6666
Draw(data_1, title_1, 'chart_div_2', "Nhiệt độ", color_1);

var data_2 = [
  ['18:00 09/12/2013',  28],
  ['2014',  30],
  ['2015',  29],
  ['2016',  31]
];
var title_2 = "Nồng độ khí gas";
var color_2 = "#147AD6"
Draw(data_2, title_2, 'chart_div_3', "Nồng độ", color_2);