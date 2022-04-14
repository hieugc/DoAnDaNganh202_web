var nav = document.querySelectorAll(".nav_item");
var nav_active = document.querySelectorAll(".active")[0];
nav.forEach(element => {
    element.addEventListener("click", function(){
        element.classList.add("active");
        nav_active.classList.remove("active");
        nav_active = element;
    })
});

google.charts.load('current', {'packages':['corechart']});
function Draw(i_data, i_title, i_index){
  google.charts.setOnLoadCallback(drawChart(i_data, i_title, i_index));
  function drawChart(i_data, i_title, i_index) {
    var data = google.visualization.arrayToDataTable([
        ['Thời gian', 'Nhiệt độ'],
        ['18:00 09/12/2013',  28],
        ['2014',  30],
        ['2015',  29],
        ['2016',  31]
      ]);
    var options = {
      title: i_title,
      hAxis: {title: 'Thời gian',  titleTextStyle: {color: '#333'}},
      vAxis: {minValue: 0},
      legend: 'none'
    };
    var chart = new google.visualization.AreaChart(document.getElementById(i_index));
    chart.draw(data, options);
}
}


var data_1 = [
  ['Thời gian', 'Nhiệt độ'],
  ['18:00 09/12/2013',  28],
  ['2014',  30],
  ['2015',  29],
  ['2016',  31]
];
var title_1 = "Nhiệt độ phòng";
var data_2 = [
  ['Thời gian', 'Nồng độ'],
  ['18:00 09/12/2013',  28],
  ['2014',  30],
  ['2015',  29],
  ['2016',  31]
];
var title_2 = "Nồng độ gas";
Draw(data_1, title_1, 'chart_div_2');