// IT20206482 | D.G.B.M.H.K Basnayaka, wedding planing system

var i = 0;
var images = [];
var time = 2000;


images[0] = '../images/image_slider/image1.jpg';
images[1] = '../images/image_slider/image2.jpg';
images[2] = '../images/image_slider/image3.jpg';
images[3] = '../images/image_slider/image4.jpg';


function changeImg(){
    document.slide.src = images[i];

    if(i < images.length - 1){
        i++;
    } else {
        i = 0;
    }

    setTimeout("changeImg()", time);
}

window.onload = changeImg;