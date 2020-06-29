/*global $, document, window */

$(document).ready(function () {
    "use strict";
    
    $(".validation").submit(function (e) {
        
        var preventDefault = 0;
        
        $(this).find(".valid").each(function () {
            
            if ($(this).val() === '') {
                
                if (!$(this).hasClass("notValid")) {
                    $(this).parent().append("<p class='text-danger'>THIS FIELD IS REQUIRED.</p>");
                }
                
                preventDefault += 1;
                $(this).addClass("notValid");
                
            } else {
                $(this).next("p.text-danger").hide();
                $(this).removeClass("notValid");
            }
        });
        
        if (preventDefault !== 0) {
            e.preventDefault();
        }
        
    });
    
    $(".validation .cancel").click(function () {
        $(this).parentsUntil(".validation").parent().find("input, textarea").val("");
    });
    
    $(".wizard .next").click(function (e) {
        
        
        var goToNext = 0;
        
        $(this).parent().siblings(".wizard-content").find("section.active .valid").each(function () {
            
            if ($(this).val() === '') {
                
                if (!$(this).hasClass("notValid")) {
                    $(this).parent().append("<p class='text-danger'>THIS FIELD IS REQUIRED.</p>");
                }
                
                goToNext += 1;
                $(this).addClass("notValid");
                
            } else {
                $(this).next("p.text-danger").hide();
                $(this).removeClass("notValid");
            }
        });
        
        if (goToNext === 0) {
            
            $(this).siblings(".prev").removeClass("disabled");
        
            if (parseInt($(this).parent().prev().find("section.active").attr("data-show")) ===  3) {
                $(this).text("Submit");
            }

            if (parseInt($(this).parent().prev().find("section.active").attr("data-show")) ===  4) {
                $(this).attr("type", "submit");
            }

            $(this).parent().prev().find("section.active").slideUp().removeClass("active").next().slideDown().addClass("active");
            $(this).parents(".wizard").find("ul.heading li.active").removeClass("active").next().addClass("active");
            
        }
        
    });
    
    $(".wizard .prev").click(function () {
        
        if (!$(this).hasClass("disabled")) {
        
            if (parseInt($(this).parent().prev().find("section.active").attr("data-show")) === 2) {
                $(this).addClass("disabled");
            }
            
            if (parseInt($(this).parent().prev().find("section.active").attr("data-show")) === 4) {
                $(this).siblings(".next").attr("type", "button").text("Next");
            }

            $(this).parent().prev().find("section.active").slideUp().removeClass("active").prev().slideDown().addClass("active");
            $(this).parents(".wizard").find("ul.heading li.active").removeClass("active").prev().addClass("active");
            
        }
        
    });
    
});