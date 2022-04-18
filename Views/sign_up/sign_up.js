function sign_up(){
    var input = document.getElementsByTagName("input");
    console.log(input[0].value + "/" + input[1].value);
    if(input[2].value == input[1].value){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200){
                console.log(this.responseText);
                if(this.responseText.indexOf("null") == -1){
                    window.location.href = this.responseText;
                }
                else{
                    alert("Tài khoản đã tồn tại");
                    console.log(this.responseText);
                }
            }
        };
        xmlhttp.open("GET", "?url=sign_up/Esign_up/" + input[0].value + "/" + input[1].value, true);
        xmlhttp.send();
    }
    else{
        alert("Mật khẩu không chính xác");
    }
}