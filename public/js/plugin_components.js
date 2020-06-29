/*global $, document */

$(document).ready(function () {
    $("#ex12a").slider({ id: "slider12a", min: 0, max: 100, value: 23 });
    $("#ex12c").slider({ id: "slider12c", min: 0, max: 10, range: true, value: [3, 7] , step: 0.2}); 
    $("#ex13").slider({
        id: "slider13",
        step: 10,
        value: [100, 200],
        range: true,
        ticks: [0, 100, 200, 300, 400],
        ticks_labels: ['$0', '$100', '$200', '$300', '$400']
    });
    $("#ex14").slider({
        id: "slider14",
        value: 2,
        ticks: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
        ticks_labels: ['zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine']
    });
    var ticks = ['zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'];
    
    
    $("#ex12a").click(function () {
        $("#slider12a .slider-track").append("<span class='badge'>" + $("#ex12a").slider().slider('getAttribute').min + "</span>");
        $("#slider12a .slider-track").append("<span class='badge'>" + $("#ex12a").slider().slider('getAttribute').max + "</span>");
        $("#slider12a .slider-handle.min-slider-handle").append("<span class='badge'>" + $("#ex12a").slider().slider('getValue') + "</span>");
    });
    $("#ex12a").click();
    
    $("#ex12c").click(function () {
        $("#slider12c .slider-track").append("<span class='badge'>" + $("#ex12c").slider().slider('getAttribute').min + "</span>");
        $("#slider12c .slider-track").append("<span class='badge'>" + $("#ex12c").slider().slider('getAttribute').max + "</span>");
        $("#slider12c .slider-handle.min-slider-handle").append("<span class='badge'>" + $("#ex12c").slider().slider('getValue')[0] + "</span>");
        $("#slider12c .slider-handle.max-slider-handle").append("<span class='badge'>" + $("#ex12c").slider().slider('getValue')[1] + "</span>");
    });
    $("#ex12c").click();
    
    $("#ex13").click(function () {
        $("#slider13 .slider-track").append("<span class='badge'>" + $("#ex13").slider().slider('getAttribute').min + "</span>");
        $("#slider13 .slider-track").append("<span class='badge'>" + $("#ex13").slider().slider('getAttribute').max + "</span>");
        $("#slider13 .slider-handle.min-slider-handle").append("<span class='badge'>" + $("#ex13").slider().slider('getValue')[0] + "</span>");
        $("#slider13 .slider-handle.max-slider-handle").append("<span class='badge'>" + $("#ex13").slider().slider('getValue')[1] + "</span>");
    });
    $("#ex13").click();
    
    $("#ex14").click(function () {
        $("#slider14 .slider-track").append("<span class='badge'>" + ticks[$("#ex14").slider().slider('getAttribute').min] + "</span>");
        $("#slider14 .slider-track").append("<span class='badge'>" + ticks[$("#ex14").slider().slider('getAttribute').max] + "</span>");
        $("#slider14 .slider-handle.min-slider-handle").append("<span class='badge'>" + ticks[$("#ex14").slider().slider('getValue')] + "</span>");
    });
    $("#ex14").click();
    
    $("#ex12a").on("slide", function(slideEvt) {
        $("#slider12a .slider-handle.min-slider-handle .badge").text(slideEvt.value);
        var warningMin = ($("#ex12a").slider().slider('getAttribute').max - $("#ex12a").slider().slider('getAttribute').min) * 0.1 + $("#ex12a").slider().slider('getAttribute').min,
            
            warningMax = $("#ex12a").slider().slider('getAttribute').min + (($("#ex12a").slider().slider('getAttribute').max - $("#ex12a").slider().slider('getAttribute').min) * 0.9);
        
        if (slideEvt.value < warningMin) {
            $("#slider12a .slider-track .badge:first-of-type").fadeOut();
        } else {
            $("#slider12a .slider-track .badge:first-of-type").fadeIn();
        }
        
        if (slideEvt.value > warningMax) {
            $("#slider12a .slider-track .badge:last-of-type").fadeOut();
        } else {
            $("#slider12a .slider-track .badge:last-of-type").fadeIn();
        }
    });
    
    $("#ex12c").on("slide", function(slideEvt) {
        $("#slider12c .slider-handle.min-slider-handle .badge").text(slideEvt.value[0]);
        $("#slider12c .slider-handle.max-slider-handle .badge").text(slideEvt.value[1]);
        
        var warningMin = ($("#ex12c").slider().slider('getAttribute').max - $("#ex12c").slider().slider('getAttribute').min) * 0.1 + $("#ex12c").slider().slider('getAttribute').min,
            
            warningMax = $("#ex12c").slider().slider('getAttribute').min + (($("#ex12c").slider().slider('getAttribute').max - $("#ex12c").slider().slider('getAttribute').min) * 0.9);
        
        if (slideEvt.value[0] < warningMin) {
            $("#slider12c .slider-track .badge:first-of-type").fadeOut();
        } else {
            $("#slider12c .slider-track .badge:first-of-type").fadeIn();
        }
        
        if (slideEvt.value[1] > warningMax) {
            $("#slider12c .slider-track .badge:last-of-type").fadeOut();
        } else {
            $("#slider12c .slider-track .badge:last-of-type").fadeIn();
        }
    });
    
    $("#ex13").on("slide", function(slideEvt) {
        $("#slider13 .slider-handle.min-slider-handle .badge").text(slideEvt.value[0]);
        $("#slider13 .slider-handle.max-slider-handle .badge").text(slideEvt.value[1]);
        
        var warningMin = ($("#ex13").slider().slider('getAttribute').max - $("#ex13").slider().slider('getAttribute').min) * 0.1 + $("#ex13").slider().slider('getAttribute').min,
            
            warningMax = $("#ex13").slider().slider('getAttribute').min + ($("#ex13").slider().slider('getAttribute').max - $("#ex13").slider().slider('getAttribute').min) * 0.9;
        
        if (slideEvt.value[0] < warningMin) {
            $("#slider13 .slider-track .badge:first-of-type").fadeOut();
        } else {
            $("#slider13 .slider-track .badge:first-of-type").fadeIn();
        }
        
        if (slideEvt.value[1] > warningMax) {
            $("#slider13 .slider-track .badge:last-of-type").fadeOut();
        } else {
            $("#slider13 .slider-track .badge:last-of-type").fadeIn();
        }
    });
    
    $("#ex14").on("slide", function(slideEvt) {
        $("#slider14 .slider-handle.min-slider-handle .badge").text(ticks[slideEvt.value]);
        
        var warningMin = ($("#ex14").slider().slider('getAttribute').max - $("#ex14").slider().slider('getAttribute').min) * 0.1 + $("#ex14").slider().slider('getAttribute').min,
            
            warningMax = $("#ex14").slider().slider('getAttribute').min + (($("#ex14").slider().slider('getAttribute').max - $("#ex14").slider().slider('getAttribute').min) * 0.9);
        
        if (slideEvt.value < warningMin) {
            $("#slider14 .slider-track .badge:first-of-type").fadeOut();
        } else {
            $("#slider14 .slider-track .badge:first-of-type").fadeIn();
        }
        
        if (slideEvt.value > warningMax) {
            $("#slider14 .slider-track .badge:last-of-type").fadeOut();
        } else {
            $("#slider14 .slider-track .badge:last-of-type").fadeIn();
        }
    });
    
    
    
    
    
    
    $(".switch").click(function () {
        $(this).toggleClass("active");
    });
    
    $(".bootstrap-switch").click(function () {
        $(this).toggleClass("active");
    });
});