'use strict'

var preloader = $('#spinner-wrapper');
$(window).on('load', function() {
    var preloaderFadeOutTime = 500;

    function hidePreloader() {
        preloader.fadeOut(preloaderFadeOutTime);
    }
    hidePreloader();
});

function ibg(){
    $.each($('._ibg'), function (){
        if ($(this).find('._img').length>0) {
            $(this).css('background-image','url("'+$(this).find('._img').attr('src')+'")')
        }
    })
}
ibg()

/*password showhide*/

$(".toggle-password").click(function() {
  $(this).toggleClass("fa-eye fa-eye-slash");
  if ($(this).parent('div').find('input').attr("type") == "password") {
     $(this).parent('div').find('input').attr("type", "text");
  } else {
     $(this).parent('div').find('input').attr("type", "password");
  }
});

$(".toggle-password2").click(function() {
  $(this).toggleClass("fa-eye fa-eye-slash");
  if ($(this).parent('fieldset').find('input').attr("type") == "password") {
     $(this).parent('fieldset').find('input').attr("type", "text");
  } else {
     $(this).parent('fieldset').find('input').attr("type", "password");
  }
});

/*password showhide*/

jQuery(document).ready(function($) {

    if ($.isFunction($.fn.incrementalCounter))
        $("#incremental-counter").incrementalCounter();

    if ($.isFunction($.fn.appear))
        $(".slideDown, .slideUp").appear();

    $(".slideDown, .slideUp").on('appear', function(event, $all_appeared_elements) {
        $($all_appeared_elements).addClass('appear');
    });

    var lazy = $('#header.lazy-load')

    $(window).on('scroll', function() {
        if ($(this).scrollTop() > 50) {
            lazy.addClass('visible');
        } else {
            lazy.removeClass('visible');
        }
    });

    if ($.isFunction($.fn.scrollbar))
        $('.scrollbar-wrapper').scrollbar();

    if ($.isFunction($.fn.masonry)) {

        
        var vElem = $('.img-wrapper video');
        var videoCount = vElem.length;
        var vLoaded = 0;

        vElem.each(function(index, elem) {


            if (elem.readyState) {
                vLoaded++;

                if (count == vLoaded) {
                    $('.js-masonry').masonry('layout');
                }

                return;
            }

            $(elem).on('loadedmetadata', function() {
                vLoaded++;
                if (videoCount == vLoaded) {
                    $('.js-masonry').masonry('layout');
                }
            })
        });


        
        var $mElement = $('.img-wrapper img');
        var count = $mElement.length;
        var loaded = 0;

        $mElement.each(function(index, elem) {

            if (elem.complete) {
                loaded++;

                if (count == loaded) {
                    $('.js-masonry').masonry('layout');
                }

                return;
            }

            $(elem).on('load', function() {
                loaded++;
                if (count == loaded) {
                    $('.js-masonry').masonry('layout');
                }
            })
        });

    }


    $(window).trigger('scroll');
    $(window).trigger('resize');
});

$('.already').click(function(){
    $('.already').toggleClass('active')
    if ($('.already').hasClass('active')) {
        $('.alr1').css('display','block');
        $('.alr2').css('display','none');
        $('.sign-up-form h2').html('Գտիր ընկերներիդ')
        $('.already').html('Արդեն ունեք էջ?')
        sessionStorage.reloadAfterPageLoad = 1
    } else {
        $('.alr1').css('display','none');
        $('.alr2').css('display','block');
        $('.sign-up-form h2').html('Շփվիր ընկերներիդ հետ')
        $('.already').html('Չունեք էջ?')
        sessionStorage.reloadAfterPageLoad = 2
    }
})

$(window).on('load', function() {
    if (sessionStorage.reloadAfterPageLoad == 1) {
        $('.alr1').css('display','block');
        $('.alr2').css('display','none');
        $('.sign-up-form h2').html('Գտիր ընկերներիդ')
        $('.already').html('Արդեն ունեք էջ?')
    } else {
        $('.alr1').css('display','none');
        $('.alr2').css('display','block');
        $('.sign-up-form h2').html('Շփվիր ընկերներիդ հետ')
        $('.already').html('Չունեք էջ?')
        $('.already').removeClass('active')
    }
});

$('.pull-right').click(function(){
    
})

function attachSticky() {
    $('#profilee-card').stick_in_parent({
        parent: '#page-contents',
        offset_top: 70
    });

    $('#sticky-sidebar').stick_in_parent({
        parent: '#page-contents',
        offset_top: 70
    });

}

$(window).on("resize", function() {

    if ($.isFunction($.fn.stick_in_parent)) {
        if ($(this).width() <= 1500) {
            $('#chat-block').trigger('sticky_kit:detach');
            $('#sticky-sidebar').trigger('sticky_kit:detach');

            return;
        } else {

            attachSticky();
        }

        return function(e) {
            return $(document.body).trigger("sticky_kit:recalc");
        };
    }
});

function initMap() {
  var uluru = {lat: 12.927923, lng: 77.627108};
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 15,
    center: uluru,
    zoomControl: true,
    scaleControl: false,
    scrollwheel: false,
    disableDoubleClickZoom: true
  });
  
  var marker = new google.maps.Marker({
    position: uluru,
    map: map
  });

}