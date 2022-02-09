var images = [];

images[0] = [theme_url + "/assets/img/Image1.jpg"];
images[1] = [theme_url + "/assets/img/Image2.jpg"];
images[2] = [theme_url + "/assets/img/Image3.jpg"];
images[3] = [theme_url + "/assets/img/Image4.jpg"];
images[4] = [theme_url + "/assets/img/Image5.jpg"];
images[5] = [theme_url + "/assets/img/Image6.jpg"];
var index = 0;

function change() {
  $('#homeHeroImg').animate({
    opacity: 0
  }, 250, function(){
    document.getElementById("homeHeroImg").src = images[index];
    if (index == images.length-1) {
      index = 0;
    } else {
      index++;
    }
    $(this).animate({
      opacity: 1
    }, 250)
  })
}

setInterval(change, 5000)

window.onload = change();