var $ = jQuery;
var navOpen = false;
var navAnimating = false;

$(document).ready(function(){
    $('.multibox_carousel').owlCarousel({
        loop: true,
        navText: ["<img src='"+theme_url+"/assets/img/FullButtonLeft.svg'>","<img src='"+theme_url+"/assets/img/FullButtonRight.svg'>"],
        margin: 21,
        responsive: {
            0: {
                items: 1,
                nav: false,
                dots: true
            },
            768: {
                items: 3,
                nav: true,
                dots: false
            }
        }
    })
    
    $('.carousel_2').owlCarousel({
        loop: true,
        margin: 10,
        navText: ["<img src='"+theme_url+"/assets/img/ApplicantFullButtonLeft.svg'>","<img src='"+theme_url+"/assets/img/ApplicantFullButtonRight.svg'>"],
        responsive: {
            0: {
                items: 1,
                nav: false,
                dots: true
            },
            768: {
                items: 2,
                nav: true,
                dots: true
            }
        }
    })
});

function toggleNav() {
    if(!navAnimating) {
        navAnimating = true;
        if(navOpen) {
            $(".nav").animate({
                left: "100%"
            }, 1000, function() {
                navOpen = false;
                navAnimating = false;
            })
        } else {
            $(".nav").animate({
                left: 0
            }, 1000, function() {
                navOpen = true;
                navAnimating = false;
            })
        }    
    }
}

var modal = document.getElementById("myModal");

function openModal() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
function closeModal() {
    console.log("hello mate");
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        closeModal();
    }
}

/* header animation */

$(window).scroll(function(){
    console.log("SCROLLING");
    if(window.scrollY > 0){
        $('.headernav').addClass('scrolled');
    }
    if(window.scrollY == 0){
        $('.headernav').removeClass('scrolled');
    }
});
