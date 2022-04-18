

function login(){
    var input = document.getElementsByTagName("input");
    console.log(input[0].value + "/" + input[1].value);
    var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200){
			if(this.responseText.indexOf("null") == -1){
				window.location.href = this.responseText;
			}
			else{
				console.log(this.responseText);
			}
		}
	};
	xmlhttp.open("GET", "?url=login/sign_in/" + input[0].value + "/" + input[1].value, true);
	xmlhttp.send();
}