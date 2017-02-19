jQuery(function ($) {

    'use strict';

    /*==============================================================*/
    // Table of index
    /*==============================================================*/

    /*==============================================================
     # sticky-nav
     # Date Time
     # language Select
     # Search Slide
     # Breaking News
     # Owl Carousel
     # magnificPopup
     # newsletter
     # weather	
     
     ==============================================================*/


    /*==============================================================*/
    // Search Slide
    /*==============================================================*/

    $('.search-icon').on('click', function () {
        $('.searchNlogin').toggleClass("expanded");
        $("#textoBuscador").toggleClass("hide");
    });






    /*==============================================================*/
    // Magnific Popup
    /*==============================================================*/

    (function () {
        $('.image-link').magnificPopup({
            gallery: {
                enabled: true
            },
            type: 'image'
        });
        $('.feature-image .image-link').magnificPopup({
            gallery: {
                enabled: false
            },
            type: 'image'
        });
        $('.image-popup').magnificPopup({
            type: 'image'
        });
        $('.video-link').magnificPopup({type: 'iframe'});
    }());


    $("#cerrarRadios").on('click', function () {
        $("#maderoRadios").fadeOut();
    });

    $(".imageSlide").owlCarousel({
        autoPlay: true,
        slideSpeed: 300,
        pagination: true,
        paginationSpeed: 400,
        singleItem: false,
        stopOnHover: true,
        addClassActive: true,
        afterMove: function () {
            var new_portrait;
            $(this).find('.active-portrait').fadeOut(200, function () {
                new_portrait = list.find('.owl-item.active .portrait img');
                if (new_portrait.length > 0) {
                    $(this).find('.active-portrait img').attr('src', new_portrait.attr('src'));
                    $(this).find('.active-portrait img').attr('alt', new_portrait.attr('alt'));
                }
                $(this).find('.active-portrait').fadeIn(200);
            });
        }
    });


    $("#mostrarWhatsapp").on('click',function(){
       $("#spanWhatsapp").fadeToggle(); 
    });

});

$(document).ready(function() {
      $.simpleWeather({
        woeid: '349864', //2357536
        location: '',
        unit: 'c',
        success: function (weather) {
            var html = '<div class="col-md-6"><h4>Iquique ' + weather.temp + '&deg;' + weather.units.temp + '</h4>';
            html += '<div>' + weather.high + ' &deg;' + weather.units.temp +' / ' + weather.low + ' &deg;' + weather.units.temp +'</div>';
            html += '<div>Humedad: ' + weather.humidity + '%</div></div>';
            html += "<div class='col-md-6'><img src='" + weather.image + "' /></div>";
            $("#weather").html(html);
        },
        error: function (error) {
            $("#weather").html('<p>Error al intentar obtener información del clima. </p>');
        }
    }); 
    
    
});