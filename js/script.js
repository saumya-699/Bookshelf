var images = ["images/1.jpg", "images/2.jpg", "images/3.jpg"];
var i = 0;
auto_slides();

function auto_slides(){
    var slide = document.getElementById("slides");
    i++
    if(i >= images.length){
        i = 0;
    }
    slide.src = images[i];
    setTimeout(auto_slides, 10000)
}

function previous() {
    var slide = document.getElementById("slides");
    i--
    if(i == -1){
        i = images.length - 1;
    }
    slide.src = images[i];
}
function next() {
    var slide = document.getElementById("slides");
    i++
    if(i >= images.length){
        i = 0;
    }
    slide.src = images[i];
}
