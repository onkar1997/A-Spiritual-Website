$(document).ready(function(){
    'use strict';
 
    //adding smooth scrolling

    $('.nav-link, #scroll-to-top, .navbar-brand').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
            || location.hostname == this.hostname) {

            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
                $('html,body').animate({
                scrollTop: target.offset().top
                }, 1000);
            return false;
            }
        }
     });

    
    // increment and decrement quantity btn
    function increase() {
        var textBox = document.getElementById("qty-input");
        var value = parseInt(textBox.value)
        if(value < 10) {
            value++;
            textBox.value++;
        }
    }
    
    function decrease() {
        var textBox = document.getElementById("qty-input");
        var value = parseInt(textBox.value)
        if(value > 1) {
            value--;
            textBox.value--;
        }
    }
     
 });

