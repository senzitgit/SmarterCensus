/** ********************************************** **
    @Author            Almir Pamukovic
    @Website        www.pamukovic.com
    @Last Update    2, 12, 2014

    TABLE CONTENTS
    -------------------------------
        01. CONTACT
        02. STICKY NAV
        03. FITVIDS
        04. OWL CAROUSEL
        05. ELEMENTS ANIMATION
        06. COUNT TO (number animate)
        07. CONTACT FORM
        08. NEWSLETTER SUBSCRIBE
        09. BACKSTRETCH BACKGROUND [STATIC LOGO - NOSLIDER]
        10. VIDEO BACKGROUND
        11. GOOGLE MAP
        12. MAGNIFIC POPUP
        13. PORTFOLIO
        14. STICKY TOP NAV
        15. FULLSCREEN
        16. VIDEO BACKGROUND
*************************************************** **/
/**    01. CONTACT
 *************************************************** **/
jQuery(document).ready(function () {

    $('#contactform').submit(function () {

        var action = $(this).attr('action');

        $("#message").slideUp(750, function () {
            $('#message').hide();

            $.post(action, {
                    name: $('#name').val(),
                    email: $('#email').val(),
                    phone: $('#phone').val(),
                    subject: $('#subject').val(),
                    comments: $('#comments').val()
			
                },
                function (data) {
                    document.getElementById('message').innerHTML = data;
                    $('#message').slideDown('slow');
                    if (data.match('success') != null) $('#contactform').slideUp('slow');

                }
            );

        });

        return false;

    });

});


/**    02. NAVIGATION
 *************************************************** **/

$(document).ready(function () {
    $("#nav").sticky({
        topSpacing: 0
    });

});


jQuery('#top-nav').onePageNav({
    scrollSpeed: 1200,
    currentClass: 'active',
    changeHash: true,
    filter: ':not(.external)'
});



/**    03. NICE SCROLLBAR
 *************************************************** **/

$('html').niceScroll({
    cursorcolor: "#1A212C",
    zindex: '99999',
    cursorminheight: 60,
    scrollspeed: 100,
    cursorwidth: 9,
    autohidemode: true,
    background: "#aaa",
    cursorborder: 'none',
    cursoropacitymax: .7,
    cursorborderradius: 0,
    horizrailenabled: false
});


/**    04. PORTFOLIO
 *************************************************** **/

jQuery(window).load(function () {

    var $container = $('#container');
    // init
    $container.isotope({
        resizable: false,
        itemSelector: '.project-item',
        layoutMode: 'fitRows'
    });


    $('#options a').click(function () {
        var selector = $(this).attr('data-filter');
        $container.isotope({
            filter: selector
        });

        $(this).parent().parent().find('.selected').removeClass('selected');
        $(this).addClass('selected');
        return false;
    });

});


/**    05. INVIEW ANIMATION
 *************************************************** **/

(function ($) {
    function getViewportHeight() {
        var height = window.innerHeight; // Safari, Opera
        var mode = document.compatMode;

        if ((mode || !$.support.boxModel)) { // IE, Gecko
            height = (mode == 'CSS1Compat') ?
                document.documentElement.clientHeight : // Standards
            document.body.clientHeight; // Quirks
        }

        return height;
    }

    $(window).scroll(function () {
        var vpH = getViewportHeight(),
            scrolltop = (document.documentElement.scrollTop ?
                document.documentElement.scrollTop :
                document.body.scrollTop),
            elems = [];

        // naughty, but this is how it knows which elements to check for
        $.each($.cache, function () {
            if (this.events && this.events.inview) {
                elems.push(this.handle.elem);
            }
        });

        if (elems.length) {
            $(elems).each(function () {
                var $el = $(this),
                    top = $el.offset().top,
                    height = $el.height(),
                    inview = $el.data('inview') || false;

                if (scrolltop > (top + height) || scrolltop + vpH < top) {
                    if (inview) {
                        $el.data('inview', false);
                        $el.trigger('inview', [false]);
                    }
                } else if (scrolltop < (top + height)) {
                    if (!inview) {
                        $el.data('inview', true);
                        $el.trigger('inview', [true]);
                    }
                }
            });
        }
    });

    // kick the event to pick up any elements already in view.
    // note however, this only works if the plugin is included after the elements are bound to 'inview'
    $(function () {
        $(window).scroll();
    });
})(jQuery);

$(document).ready(function () {
    // Simple add animate class to any element
    $('.animate').on('inview', function (event, visible) {
        if (visible == true) {
            $(this).addClass("animated"); // add original animated class to activate animation animated.css
        }
    });

});


/**    06. TOOLTIP
 *************************************************** **/

// tooltips
jQuery('[data-toggle~="tooltip"]').tooltip({
    container: 'body'
});


/**    07. CUSTOMERS CAROUSEL
 *************************************************** **/

$(document).ready(function () {

    var sync1 = $("#custm-1");
    var sync2 = $("#custm-2");

    sync1.owlCarousel({
        singleItem: true,
        slideSpeed: 1000,
        navigation: false,
        pagination: false,
        afterAction: syncPosition,
        responsiveRefreshRate: 200,
    });

    sync2.owlCarousel({
        items: 4,
        itemsDesktop: [1199, 4],
        itemsDesktopSmall: [979, 4],
        itemsTablet: [768, 4],
        itemsMobile: [479, 1],
        pagination: false,
        responsiveRefreshRate: 100,
        afterInit: function (el) {
            el.find(".owl-item").eq(0).addClass("synced");
        }
    });

    function syncPosition(el) {
        var current = this.currentItem;
        $("#custm-2")
            .find(".owl-item")
            .removeClass("synced")
            .eq(current)
            .addClass("synced")
        if ($("#custm-2").data("owlCarousel") !== undefined) {
            center(current)
        }
    }

    $("#custm-2").on("click", ".owl-item", function (e) {
        e.preventDefault();
        var number = $(this).data("owlItem");
        sync1.trigger("owl.goTo", number);
    });

    function center(number) {
        var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
        var num = number;
        var found = false;
        for (var i in sync2visible) {
            if (num === sync2visible[i]) {
                var found = true;
            }
        }

        if (found === false) {
            if (num > sync2visible[sync2visible.length - 1]) {
                sync2.trigger("owl.goTo", num - sync2visible.length + 2)
            } else {
                if (num - 1 === -1) {
                    num = 0;
                }
                sync2.trigger("owl.goTo", num);
            }
        } else if (num === sync2visible[sync2visible.length - 1]) {
            sync2.trigger("owl.goTo", sync2visible[1])
        } else if (num === sync2visible[0]) {
            sync2.trigger("owl.goTo", num - 1)
        }

    }

});



/**    10. BLOG CAROUSEL
 *************************************************** **/
 
 $(document).ready(function() {
 
  var owl = $("#blog-carousel");
 
  owl.owlCarousel({
      items : 3, //10 items above 1000px browser width
      itemsDesktop : [1000,4], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,3], // betweem 900px and 601px
      itemsTablet: [600,2], //2 items between 600 and 0
      itemsMobile : false, // itemsMobile disabled - inherit from itemsTablet option
      navigation: false,
    pagination: true
  });
 });




(function ($) {
    "use strict";

    jQuery.fn.exists = function () {
        return this.length > 0;
    }

    $(function () {
        var navMain = $(".navbar-collapse");
        navMain.on("click", "a", null, function () {
            if ($(this).attr("href") !== "#") {
                navMain.collapse('hide');
            }
        });

        $("#content").bind("click", function () {
            if ($(".navbar-collapse.navbar-ex1-collapse.in").exists()) {
                navMain.collapse('hide');
            }
        });

    });

})(jQuery);


/**    11. SLIDER
 *************************************************** **/

jQuery(document).ready(function () {

    $('#slides').superslides({
        animation: "slide",
        slide_speed: 100,
        pagination: true,
        hashchange: true,
        scrollable: true,
        play: 15000
    });



});


/**    12. TEXT ROTATE
 *************************************************** **/
var TxtRotate = function (el, toRotate, period) {
    this.toRotate = toRotate;
    this.el = el;
    this.loopNum = 0;
    this.period = parseInt(period, 10) || 2000;
    this.txt = '';
    this.tick();
    this.isDeleting = false;
};

TxtRotate.prototype.tick = function () {
    var i = this.loopNum % this.toRotate.length;
    var fullTxt = this.toRotate[i];

    if (this.isDeleting) {
        this.txt = fullTxt.substring(0, this.txt.length - 1);
    } else {
        this.txt = fullTxt.substring(0, this.txt.length + 1);
    }

    this.el.innerHTML = '<span class="wrap">' + this.txt + '</span>';

    var that = this;
    var delta = 150 - Math.random() * 100;

    if (this.isDeleting) {
        delta /= 2;
    }

    if (!this.isDeleting && this.txt === fullTxt) {
        delta = this.period;
        this.isDeleting = true;
    } else if (this.isDeleting && this.txt === '') {
        this.isDeleting = false;
        this.loopNum++;
        delta = 500;
    }

    setTimeout(function () {
        that.tick();
    }, delta);
};

window.onload = function () {
    var elements = document.getElementsByClassName('txt-rotate');
    for (var i = 0; i < elements.length; i++) {
        var toRotate = elements[i].getAttribute('data-rotate');
        var period = elements[i].getAttribute('data-period');
        if (toRotate) {
            new TxtRotate(elements[i], JSON.parse(toRotate), period);
        }
    }
    // INJECT CSS
    var css = document.createElement("style");
    css.type = "text/css";
    css.innerHTML = ".txt-rotate > .wrap { border-right: 1px solid #fff }";
    document.body.appendChild(css);
};
