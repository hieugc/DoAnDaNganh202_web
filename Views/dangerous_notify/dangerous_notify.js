var nav = document.querySelectorAll(".nav_item");
var nav_active = document.querySelectorAll(".active")[0];
nav.forEach(element => {
    element.addEventListener("click", function(){
        element.classList.add("active");
        nav_active.classList.remove("active");
        nav_active = element;
    })
});
