var nav = document.querySelectorAll(".nav_item");
var nav_active = document.querySelectorAll(".active")[0];
nav.forEach(element => {
    element.addEventListener("click", function(){
        element.classList.add("active");
        nav_active.classList.remove("active");
        nav_active = element;
    })
});

function Draw(i_data, i_title, i_index, i_type){
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(function(){drawChart(i_data, i_title, i_index, i_type);});
  function drawChart(i_data, i_title, i_index, i_type) {
    var data = new google.visualization.DataTable();

      data.addColumn('string', "Thời gian");
      data.addColumn('number', i_type);
      data.addRows(i_data);
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
  ['18:00 09/12/2013',  28],
  ['2014',  30],
  ['2015',  29],
  ['2016',  31]
];
var title_1 = "Nhiệt độ phòng";
var data_2 = [
  ['18:00 09/12/2013',  28],
  ['2014',  30],
  ['2015',  29],
  ['2016',  31]
];
var title_2 = "Nồng độ gas";
Draw(data_1, title_1, 'chart_div_2', "Nhiệt độ");
Draw(data_2, title_2, 'chart_div_3', "Nhiệt độ");