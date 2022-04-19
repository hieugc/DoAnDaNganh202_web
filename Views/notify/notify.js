
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