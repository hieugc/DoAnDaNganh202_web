var nav = document.querySelectorAll(".nav_item");
nav[document.getElementsByClassName("nav")[0].id].classList.add("active");
var nav_active = document.querySelectorAll(".active")[0];
nav.forEach(element => {
    element.addEventListener("click", function(){
        element.classList.add("active");
        if(nav_active != element){
            nav_active.classList.remove("active");
            nav_active = element;
        }
    })
});
