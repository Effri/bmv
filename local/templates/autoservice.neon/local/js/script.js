$(document).ready(function() {
    
    $("#main_slider_owl").owlCarousel({
        loop:true,

        nav:true,
        dots:true,
        autoplay:true,
        autoplayTimeout:10000,
        autoplaySpeed:2000,
        navSpeed:2000,
        dotsSpeed:2000,
        dragEndSpeed:2000,
        navText: ['<span class="owl_btn"></span>', '<span class="owl_btn"></span>'],
        items:1
    });
    
    $("#team_owl").owlCarousel({
        loop:false,
        nav:true,
        dots:false,
        margin:30,
        navText: ['<span class="owl_btn"><i class="fa fa-chevron-left"></i></span>', '<span class="owl_btn"><i class="fa fa-chevron-right"></i></span>'],
        responsive:{
                0:{
                        items:1
                },
                500:{
                        items:2
                },
                768:{
                        items:2
                },
                992:{
                        items:3
                },
                1200:{
                        items:3
                }
        }
    });
    
    $("#portfolio_owl").owlCarousel({
        loop:false,
        nav:false,
        dots:false,
        margin:30,
        responsive:{
                0:{
                        items:2
                },
                500:{
                        items:2
                },
                768:{
                        items:3
                },
                992:{
                        items:4
                },
                1200:{
                        items:4
                }
        }
    });
    $(".portfolio_item").click(function() {
        $('.portfolio_main_img').attr('src', $(this).data('src'));
        $(".portfolio_item").removeClass('active');
        $(this).addClass('active');
    });
   
    $("#brand_owl").owlCarousel({
        loop:false,
        nav:true,
        dots:false,
        margin:10,
        // margin: 160,
        autoplay:true,
        autoWidth:true,
        autoplayTimeout:5000,
        autoplaySpeed:1000,
        navText: ['<span class="owl_btn"><i class="fa fa-chevron-left"></i></span>', '<span class="owl_btn"><i class="fa fa-chevron-right"></i></span>'],
        responsive:{
                0:{
                        items:3
                },
                768:{
                        items:4
                },
                992:{
                        items:5
                },
                1200:{
                        items:5
                }
        }
    });

    $("#portfolio_main_owl").owlCarousel({
        // loop:true,
        nav:true,
        dots:false,
        margin:10,
        autoplay:false,
        autoplayTimeout:5000,
        autoplaySpeed:1000,
        navText: ['<span class="owl_btn"><i class="fa fa-chevron-left"></i></span>', '<span class="owl_btn"><i class="fa fa-chevron-right"></i></span>'],
        responsive:{
            0:{
                items:2
            },
            768:{
                items:3
            },
            992:{
                items:4
            },
            1200:{
                items:4
            }
        }
    });
    
    $('[data-toggle="tooltip"]').tooltip();
    
    $('.search_open').click(function() {
        $('.search_float_container').toggle();
    });
        
    function menu_open() {
        if(!$('.left_float_sidebar').hasClass('float_left_show')) {
            $('.float_fade_background').addClass('float_background_show');
            $('.left_float_sidebar').addClass('float_left_show');
        }
    } 
    function menu_close() {
        $('.float_fade_background').removeClass('float_background_show');
        $('.left_float_sidebar').removeClass('float_left_show');
    } 
    
    $('#mobile_burger_menu').click(function() {
        menu_open();
    });
    
    $('.close_menu').click(function() {
        menu_close();
    });
    
    $(".left_float_sidebar, .float_fade_background").swipe( {
        swipeLeft:menu_close
    });
    
    var swipe = 0;
    $('.open_swipe').click(function(){
        ++swipe;
        $(".swipe_container").css("transform", "translateX(-"+swipe+"00%)");
        $(this).next('.prv_swipe_block').addClass('prv_swipe_show');
    });
    
    $('.close_swipe').click(function(){
        --swipe;
        $(".swipe_container").css("transform", "translateX(-"+swipe+"00%)");
        $('.prv_swipe_block').removeClass('prv_swipe_show');
    });
    
    /* OPTIONS */
    var color_switcher = $('.color_switcher'),
            clw = color_switcher.width(),
            cs_color = $('.cs_color'),
            cs_radio = $('.cs_color input');

    if(color_switcher.hasClass('active') == true){
            color_switcher.css('left', 0);
    } else {
            color_switcher.css('left', -clw);
    }
    color_switcher.css('display', 'block');

    $('.switch').on('click', function() {
            color_switcher.css('transition', '.4s');

            if(color_switcher.hasClass('active') == true){
                    color_switcher.removeClass('active');
                    color_switcher.css('left', -clw);
            } else {
                    color_switcher.addClass('active');
                    color_switcher.css('left', 0);
            }
    });

    cs_radio.each(function(i, element) {
            var csr_parent = $(element).parent('.cs_color'),
                    bg_color = $(element).val();
            csr_parent.css('background-color', bg_color);
    });

    cs_color.on('click', function(){
            cs_color.removeClass('active');
            $(".sp-replacer").removeClass('active');
            $(this).addClass('active');
    });

    function hexToRgb(torgb) {
        var bigint = parseInt(torgb, 16);
        var r = (bigint >> 16) & 255;
        var g = (bigint >> 8) & 255;
        var b = bigint & 255;

        return "rgb(" + r + ", " + g + ", " + b + ")";
    }   

    if($('.cs_color_custom').length > 0 ) {
        var torgb = $('.cs_color_custom').val().slice(1);
        $(".cs_color_custom").spectrum({
            color: hexToRgb(torgb),
            showInput: false,
            allowEmpty:false
        });
    }

    $(".sp-container button").on('click', function(){
        var color = $('.sp-preview-inner').css('background-color');

        function rgb2hex(rgb){
                rgb = rgb.match(/^rgba?[\s+]?\([\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?/i);
                return (rgb && rgb.length === 4) ? "#" +
                ("0" + parseInt(rgb[1],10).toString(16)).slice(-2) +
                ("0" + parseInt(rgb[2],10).toString(16)).slice(-2) +
                ("0" + parseInt(rgb[3],10).toString(16)).slice(-2) : '';
        }

        var hex = rgb2hex(color);
        $('.cs_color_custom').val(hex);

        $(".cs_color input").prop("checked", false);
        cs_color.removeClass('active');
        $(".sp-replacer").addClass('active');
    });

    $('.cs_color input[checked]').parent('.cs_color').addClass('active');
    $('.sp-preview-inner').css('background-color', hexToRgb(torgb));

    if($('.cs_color_custom').hasClass('active')){
            $('.sp-replacer').addClass('active');
    }
    
    $(".cs_scroll_container").mCustomScrollbar({
        theme:"PRV-carservice"
    });
    /* OPTIONS END */

    // document.getElementsByClassName('ya-share2__link').href += 'http://google.com/';
    // document.getElementsByClassName('ya-share2__title').text = "VK";


});

$('.ya-share2__link').each(function(){
    $(this).attr('href','http://somesite.ru'+$(this).attr('href'));
});

! function (e) {
    function t(o) {
        if (n[o]) return n[o].exports;
        var r = n[o] = {
            i: o,
            l: !1,
            exports: {}
        };
        return e[o].call(r.exports, r, r.exports, t), r.l = !0, r.exports
    }
    var n = {};
    t.m = e, t.c = n, t.d = function (e, n, o) {
        t.o(e, n) || Object.defineProperty(e, n, {
            configurable: !1,
            enumerable: !0,
            get: o
        })
    }, t.n = function (e) {
        var n = e && e.__esModule ? function () {
            return e.default
        } : function () {
            return e
        };
        return t.d(n, "a", n), n
    }, t.o = function (e, t) {
        return Object.prototype.hasOwnProperty.call(e, t)
    }, t.p = "https://yastatic.net/share2/", t(t.s = 14)
}([function (e, t, n) {
    "use strict";

    function o(e) {
        return e.getElementsByTagName("head")[0] || e.body
    }

    function r(e) {
        var t = document.createElement("script");
        return t.src = e, t.defer = !0, document.head.appendChild(t), t
    }

    function i(e) {
        function t() {
            document.removeEventListener("DOMContentLoaded", t), window.removeEventListener("load", t), e()
        }
        "complete" === document.readyState || "loading" !== document.readyState && !document.documentElement.doScroll ? e() : (document.addEventListener("DOMContentLoaded", t), window.addEventListener("load", t))
    }
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.injectJs = r, t.ready = i;
    var a = function (e) {
        this._document = e
    };
    a.prototype.injectCss = function (e, t) {
        var n = t.nonce,
            r = o(this._document),
            i = this._document.createElement("style");
        i.type = "text/css", i.innerHTML = e, n && i.setAttribute("nonce", n), r.appendChild(i)
    }, t.default = a
},function (e, t, n) {
    function o(e) {
        return n(r(e))
    }

    function r(e) {
        var t = i[e];
        if (!(t + 1)) throw new Error("Cannot find module '" + e + "'.");
        return t
    }
    var i = {
        "./blogger.js": 17,
        "./collections.js": 18,
        "./delicious.js": 19,
        "./digg.js": 20,
        "./evernote.js": 21,
        "./facebook.js": 4,
        "./linkedin.js": 22,
        "./lj.js": 23,
        "./moimir.js": 5,
        "./odnoklassniki.js": 6,
        "./pinterest.js": 7,
        "./pocket.js": 24,
        "./qzone.js": 25,
        "./reddit.js": 26,
        "./renren.js": 27,
        "./sinaWeibo.js": 28,
        "./skype.js": 29,
        "./surfingbird.js": 30,
        "./telegram.js": 31,
        "./tencentWeibo.js": 32,
        "./tumblr.js": 33,
        "./twitter.js": 34,
        "./viber.js": 35,
        "./vkontakte.js": 8,
        // "./whatsapp.js": 36
    };
    o.keys = function () {
        return Object.keys(i)
    }, o.resolve = r, e.exports = o, o.id = 16
}, function (e, t, n) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.default = {
        config: {
            shareUrl: {
                default: {
                    baseUrl: "https://www.instagram.com",
                    params: {
                        text: {
                            options: ["title", "url"],
                            separator: " "
                        }
                    }
                }
            }
        },
        i18n: {
            az: "Instagram",
            be: "Instagram",
            en: "Instagram",
            hy: "Instagram",
            ka: "Instagram",
            kk: "Instagram",
            ro: "Instagram",
            ru: "Instagram",
            tr: "Instagram",
            tt: "Instagram",
            uk: "Instagram",
            uz: "Instagram"
        },
        color: "#65bc54"
    }
}]);