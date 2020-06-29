/*global $, document, window */

$(document).ready(function () {
    "use strict";
    
    var seconds = 0,
        minutes = 0,
        hours = 0,
        days = 0,
        now = new Date(),
        nowYear = now.getFullYear(),
        nowMonth = now.getMonth() + 1,
        nowDay = now.getDate(),
        nowHour = now.getHours(),
        nowMinute = now.getMinutes(),
        nowSecond = now.getSeconds(),
        time = $(".counter-down").attr("data-time"),
        array31 = [1, 3, 5, 7, 8, 10, 12];
        ;
    
    $(function getTheTime(){
        
        var splitTime = time.split(" "),
            timeSecond = splitTime[0].split(":")[2],
            timeMinute = splitTime[0].split(":")[1],
            timeHour = splitTime[0].split(":")[0],
            timeDay = splitTime[1].split("/")[0],
            timeMonth = splitTime[1].split("/")[1],
            timeYear = splitTime[1].split("/")[2],
            timerDay = 0,
            timerMonth = 0,
            timerYear = 0;
        
        seconds = timeSecond - nowSecond;
        if (seconds < 0) {
            seconds += 60;
            timeMinute -= 1;
        }
        
        minutes = timeMinute - nowMinute;
        if (minutes < 0) {
            minutes += 60;
            timeHour -= 1;
        }
        
        hours = timeHour - nowHour;
        if(hours < 0) {
            hours += 24;
            timeDay -= 1;
        }
        
        timerDay = timeDay - nowDay;
        if(timerDay < 0) {
            
            if (nowMonth === 2) {
                timerDay += 29;
            } else if (jQuery.inArray(nowMonth ,array31) !== 1) {
                timerDay += 31;
            } else {
                timerDay += 30;
            }
            
            timeMonth -= 1;
        }
        
        timerMonth = timeMonth - nowMonth;
        if(timerMonth < 0) {
            timerMonth += 12;
            timeYear -= 1;
        }
        
        timerYear = timeYear - nowYear;
        
        days = timerDay + (30 * timerMonth) + (365 * timerYear);
        
        if(timerYear < 0) {
            seconds = 0;
            minutes = 0;
            hours = 0;
            days = 0;
        }
        
    });
    
    $(function timer(){
        seconds -= 1;
        
        if (seconds === -1) {
            
            seconds = 59;
            minutes -= 1;
            
            if (minutes === -1) {
                
                minutes = 59;
                hours -= 1;
                
                if (hours === -1) {
                    
                    hours = 23;
                    days -= 1;
                    
                    if (days === -1) {
                        days = "good";
                    }
                    
                }
            }
        }
        
        if (days === "good") {
            $("#seconds").parentsUntil(".container").html('<h3 class="text-center">Thank you for waiting</h3>');
        } else {
            
            $("#seconds").text(seconds);
            $("#minutes").text(minutes);
            $("#hours").text(hours);
            $("#days").text(days);
            
        }
        
        
        
        setTimeout(timer, 1000);
    });
    
});