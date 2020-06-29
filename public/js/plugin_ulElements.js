/*global $, document */

$(document).ready(function () {
    "use strict";
    
    /* Start Buttons */
    
    $("button.drop-down").click(function () {
        $(this).find(".drop-list").slideToggle();
    });
    
    /* End Buttons */
    
    /* Start Checkbox */
    
    $("[type=checkbox]").parent().append("<div class='checkbox'></div>");
    $("label").click(function () {
        $(this).siblings(".checkbox").click();
    });
    
    $("[checked]").siblings(".checkbox").addClass("active");
    $("[checked]").siblings(".checkbox").append("<i class='fas fa-check'><i>");
    
    $(".checkbox").click(function () {
        $(this).toggleClass("active");
        if ($(this).hasClass("active")) {
            $(this).append("<i class='fas fa-check'><i>");
        } else {
            $(this).children().remove();
        }
        $(this).siblings("input").click();
    });
    
    /* End Checkbox */
    
    /* Start Radio */
    
    $("[type=radio]").parent().append("<div class='radio'></div>");
    $("label").click(function () {
        $(this).siblings(".radio").click();
    });
    
    $("[checked]").siblings(".radio").addClass("active");
    $("[checked]").siblings(".radio").append("<div class='circle'><div>");

    $(".radio").click(function () {

        if (!$(this).hasClass("active")) {
            $(this).toggleClass("active");
            if ($(this).hasClass("active")) {
                $(this).append("<div class='circle'><div>");
            } else {
                $(this).children().remove();
            }
            $(this).siblings("input").click();
            $(this).parent().siblings().find(".radio").removeClass("active");
            $(this).parent().siblings().find(".radio").children().remove();
        }
    });
    
    /* End Radio */
    
    /* Start Tabs */
    
    $(".tab-head > div").click(function () {
        
        if (!$(this).hasClass("active")) {
            $(this).siblings().removeClass("active");
            $(this).addClass("active");
            $(this).parent().next().children().fadeOut(100);
            $(this).parent().next().find("." + $(this).attr("data-tab")).fadeIn(100);
        }
    });
    
    $(".tab .tab-body .tab-1").each(function () {
        
        if ($(this).innerHeight() > $(this).next().innerHeight()) {
            $(this).next().innerHeight($(this).innerHeight());
        } else {
            $(this).innerHeight($(this).next().innerHeight());
        }
        
        if ($(this).next().innerHeight() > $(this).next().next().innerHeight()) {
            $(this).next().next().innerHeight($(this).next().innerHeight());
        } else {
            $(this).innerHeight($(this).next().next().innerHeight());
            $(this).next().innerHeight($(this).next().next().innerHeight());
        }
    });
    
    /* End Tabs */
    
    /* Start Accordions */
    
    $(".accordion .accordion-head a").click(function (e) {
        
        e.preventDefault();
        if (!$(this).parents(".accordion-item").hasClass("active")) {
            $(this).find("i").removeClass("fa-chevron-right").addClass("fa-chevron-down");
            $(this).parents(".accordion-item").addClass("active");
            $(this).parents(".accordion-item").find(".accordion-body").slideDown();
            $(this).parents(".accordion-item").siblings().removeClass("active");
            $(this).parents(".accordion-item").siblings().find(".accordion-body").slideUp();
            $(this).parents(".accordion-item").siblings().find(".accordion-head a i").removeClass("fa-chevron-down").addClass("fa-chevron-right");
        } else {
            $(this).find("i").removeClass("fa-chevron-down").addClass("fa-chevron-right");
            $(this).parents(".accordion-item").removeClass("active");
            $(this).parents(".accordion-item").find(".accordion-body").slideUp();
        }
    });
    
    /* End Accordions */
    
    /* Start Modals */
    
    $(".modal-custom .closing").click(function () {
        $(this).parents(".modal-custom").fadeOut();
    });
    
    $(".modal-click").click(function () {
        $("." + $(this).attr("data-modal")).fadeIn();
    });
    
    /* End Modals */
    
    /* Start Alerts */
    
    $(".alert .close").click(function () {
        $(this).parents(".alert").fadeOut();
    });
    
    /* End Alerts */
    
    /* Start Notes */
    
    $(".note .close").click(function () {
        $(this).parents(".note").fadeOut();
    });
    
    $("[data-note]").click(function () {
        var thisNote = "." + $(this).attr("data-note");
        
        $(thisNote).fadeIn();
        $(thisNote).find(".fadeout-time").css("width", 0);
        
        $(thisNote).find(".fadeout-time").animate({
            width: "100%"
        }, 3000, function () {
            $(thisNote).fadeOut();
        });
        
        $(thisNote).mouseleave(function () {
            $(thisNote).find(".fadeout-time").animate({
                width: "100%"
            }, 1000, function () {
                $(thisNote).fadeOut();
            });
        });
        
        $(thisNote).mouseenter(function () {
            $(thisNote).find(".fadeout-time").stop();
        });
    });
    
    /* End Notes */
    
});