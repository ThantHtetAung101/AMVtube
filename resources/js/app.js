require('./bootstrap');
$(document).ready(function(){
    var video = document.getElementById("video");
    console.log("notbad");
    var WindowWidth = window.innerWidth;
    if (WindowWidth < 1000) {
        console.log("good")
        video.setAttribute("width", "320px");
        video.setAttribute("height", "240px");
    }
})
