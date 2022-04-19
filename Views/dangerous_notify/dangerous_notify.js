function safe(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            if(this.responseText.indexOf("error") == -1 || this.responseText.indexOf("not found") == -1){
                window.location.href = "?url=house/house_view";
            }
            else{
                console.log(this.responseText);
            }
        };
    }
    xmlhttp.open("GET", "?url=dangerous_notify/safe/", true);
    xmlhttp.send();
}