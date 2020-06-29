/*global $, document, window */

$(document).ready(function () {
    "use strict";
    
    $("aside").innerHeight($(document).innerHeight());

    $("aside .group-list > ul > li.active > a > .drop").toggleClass("fa-chevron-left fa-chevron-down");
    $("aside .group-list > ul > li.active .sub-list").css("display", "block");
    $("aside .group-list > ul > li.active").addClass("active2");
    
    $("aside .group-list > ul > li.drop-down > a").click(function (e) {
        e.preventDefault();
        
        if (!$(this).parent().hasClass("active2")) {
            $("aside .group-list > ul > li").removeClass("active2");
            $("aside .group-list > ul > li .sub-list").slideUp();
            $("aside .group-list > ul > li > a > .drop").removeClass("fa-chevron-down").addClass("fa-chevron-left");
            $(this).parent().addClass("active2");
            $(this).parent().find(".sub-list").slideDown();
            $(this).parent().find("a > .drop").removeClass("fa-chevron-left").addClass("fa-chevron-down");
        } else {
            $(this).parent().toggleClass("active2");
            $(this).parent().find(".sub-list").slideToggle();
            $(this).parent().find("a > .drop").toggleClass("fa-chevron-left fa-chevron-down");
        }
    });
    
    $("nav .left-side .sidebar-collabse").click(function () {
        
        if ($(window).innerWidth() < 992) {
            
            if ($("aside").innerWidth() === 250) {
                $("aside").animate({width: '0px'});
                $("nav").css("width", "100%");
                $("nav").css("float", "none");
                $("nav .right-side").show();
            } else {
                $("aside").animate({width: '250px'});
                $("aside").css("position", "absolute");
                $("nav").animate({
                    width: parseInt($(".content").css('width')) - 250
                });
                $("nav").css("float", "right");
                $("nav .right-side").hide();
            }
            
        } else {
            
            if ($("aside").innerWidth() === 250) {
                $("aside").animate({width: '0px'});
                $(".content").animate({width: '100%'});
            } else {
                $(".content").animate({
                    width: parseInt($(".content").css('width')) - 250
                });
                $("aside").animate({width: '250px'});
            }
            
        }
    });
    
    $("nav .right-side .nav-tabs").click(function () {
        
        if (!$(this).hasClass("active")) {
            $("nav .right-side .nav-tabs").removeClass("active");
            $(this).addClass("active");
            $("nav .nav-tab").fadeOut();
            $(".tab-" + $(this).attr("data-tab")).fadeIn();
        } else {
            $(this).removeClass("active");
            $(".tab-" + $(this).attr("data-tab")).fadeOut();
        }
    });
    
    $("body, aside").niceScroll();

    $(".vertical-center").each(function () {
        $(this).css("marginTop", ($(this).parent().innerHeight() - $(this).innerHeight()) / 2);
    });
    
    
    $(".fixed-height").each(function () {
        
        if ($(this).innerHeight() > $(this).parent().next().find(".fixed-height").innerHeight()) {
            $(this).parent().next().find(".fixed-height").innerHeight($(this).innerHeight());
        } else {
            $(this).innerHeight($(this).parent().next().find(".fixed-height").innerHeight());
        }
        
        if ($(this).parent().next().find(".fixed-height").innerHeight() > $(this).parent().next().next().find(".fixed-height").innerHeight()) {
            $(this).parent().next().next().find(".fixed-height").innerHeight($(this).parent().next().find(".fixed-height").innerHeight());
        } else {
            $(this).innerHeight($(this).parent().next().next().find(".fixed-height").innerHeight());
            $(this).parent().next().find(".fixed-height").innerHeight($(this).parent().next().next().find(".fixed-height").innerHeight());
        }
    });
    
    $(".fixed-height-p").each(function () {
        
        if ($(this).innerHeight() > $(this).parents(".fixed-height").parent().next().find(".fixed-height-p").innerHeight()) {
            $(this).parents(".fixed-height").parent().next().find(".fixed-height-p").innerHeight($(this).innerHeight());
        } else {
            $(this).innerHeight($(this).parents(".fixed-height").parent().next().find(".fixed-height-p").innerHeight());
        }
        
        if ($(this).parents(".fixed-height").parent().next().find(".fixed-height-p").innerHeight() > $(this).parents(".fixed-height").parent().next().next().find(".fixed-height-p").innerHeight()) {
            $(this).parents(".fixed-height").parent().next().next().find(".fixed-height-p").innerHeight($(this).parents(".fixed-height").parent().next().find(".fixed-height-p").innerHeight());
        } else {
            $(this).innerHeight($(this).parents(".fixed-height").parent().next().next().find(".fixed-height-p").innerHeight());
            $(this).parents(".fixed-height").parent().next().find(".fixed-height-p").innerHeight($(this).parents(".fixed-height").parent().next().next().find(".fixed-height-p").innerHeight());
        }
    });
    
});