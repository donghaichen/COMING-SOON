
<!DOCTYPE html>
<!-- saved from url=(0048)http://ashobiz.asia/rosley025/theme/index-r.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  
  <meta charset="utf-8">
  <!-- Title here -->
  <title>港港网络</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Description, keywords and author name here -->
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">

  <!-- HTML5 Support for IE -->
  <script src="http://libs.useso.com/js/html5shiv/r29/html5.min.js"></script>
  <script src="http://libs.useso.com/js/respond.js/1.4.2/respond.min.js"></script>
 
		
  <!-- Stylesheets -->
   <link rel="stylesheet" href="http://libs.useso.com/js/bootstrap/3.2.0/css/bootstrap.min.css">
   <link rel="stylesheet" href="http://libs.useso.com/js/font-awesome/4.1.0/css/font-awesome.min.css">
 
  
 		
  <!-- Main style sheet -->
  <link href="./css/style.css" rel="stylesheet">
  <!-- This template supports 9 colors. Red, Blue, Green, Black, Dark Blue, Yellow, Orange, Purple and Rose. Give your favorite color name in below line. -->
  <link href="./css/jquery.countdown.css" rel="stylesheet">
 

  <!-- Favicon -->
  <link rel="shortcut icon" href="http://www.ggphp.com/favicon.ico">
</head>

<body>

<!-- Top Area -->
<div class="tops">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
             <div class="csoon">
               <div class="padd">
                  <!-- Coming Soon section. -->
                  <h2>网站建设中...</h2>
                  <p>很快回来，如有疑问请拨打4000 880 387 或联系客服QQ1282570027</p>
               </div>
             </div>
           <div class="timer">
                                <div class="days-wrapper">
                                    <span class="days"></span> <br>days
                                </div>
                                <div class="hours-wrapper">
                                    <span class="hours"></span> <br>hours
                                </div>
                                <div class="minutes-wrapper">
                                    <span class="minutes"></span> <br>minutes
                                </div>
                                <div class="seconds-wrapper">
                                    <span class="seconds"></span> <br>seconds
                                </div>
                            </div>

         </div>
      </div>
   </div>
</div>   
	
   
<!-- Footer -->
<footer class="text-center">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
         <!-- Copyright section. You can add extra links here. Replace below line with your site url and site name. -->
        <div class="copyright">Copyright 2005-2014 ggppc.com  all rights reserved. <a href="http://www.ggppc.com" title="上海网站建设|上海网站制作公司|上海网页建设|上海网站设计">上海港港网络科技有限公司</a> 版权所有</div>
      </div>
    </div>
  </div>
</footer>		

<!-- JS -->
 <!-- Javascript -->
        <script src="http://libs.useso.com/js/jquery/1.8.2/jquery.min.js"></script>
		    <script src="http://libs.useso.com/js/bootstrap/3.2.0/js/bootstrap.min.js"></script>

     
        <script>
	
/*
 * jQuery The Final Countdown plugin v1.0.0 beta
 * http://github.com/hilios/jquery.countdown
 *
 * Copyright (c) 2011 Edson Hilios
 *
 * Permission is hereby granted, free of charge, to any person obtaining
 * a copy of this software and associated documentation files (the
 * "Software"), to deal in the Software without restriction, including
 * without limitation the rights to use, copy, modify, merge, publish,
 * distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to
 * the following conditions:
 *
 * The above copyright notice and this permission notice shall be
 * included in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
 * LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
 * OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
 * WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */
(function($) {
  
  $.fn.countdown = function(toDate, callback) {
    var handlers = ['seconds', 'minutes', 'hours', 'days', 'weeks', 'daysLeft'];
    
    function delegate(scope, method) {
      return function() { return method.call(scope) }
    }
    
    return this.each(function() {
      // Convert
      if(!(toDate instanceof Date)) {
        if(String(toDate).match(/^[0-9]*$/)) {
          toDate = new Date(toDate);
        } else if( toDate.match(/([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{2,4})\s([0-9]{1,2})\:([0-9]{2})\:([0-9]{2})/) ||
            toDate.match(/([0-9]{2,4})\/([0-9]{1,2})\/([0-9]{1,2})\s([0-9]{1,2})\:([0-9]{2})\:([0-9]{2})/)
            ) {
          toDate = new Date(toDate);
        } else if(toDate.match(/([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{2,4})/) || 
                  toDate.match(/([0-9]{2,4})\/([0-9]{1,2})\/([0-9]{1,2})/)
                  ) {
          toDate = new Date(toDate)
        } else {
          throw new Error("Doesn't seen to be a valid date object or string")
        }
      }
      
      var $this = $(this),
          values = {},
          lasting = {},
          interval = $this.data('countdownInterval'),
          currentDate = new Date(),
          secondsLeft = Math.floor((toDate.valueOf() - currentDate.valueOf()) / 1000);
      
      function triggerEvents() {
        // Evaluate if this node is included in the html
        if($this.closest('html').length === 0) {
          stop(); // Release the memory
          dispatchEvent('removed');
          return;
        }
        // Calculate the time offset
        secondsLeft--;
        if(secondsLeft < 0) {
          secondsLeft = 0;
        }
        lasting = {
          seconds : secondsLeft % 60,
          minutes : Math.floor(secondsLeft / 60) % 60,
          hours   : Math.floor(secondsLeft / 60 / 60) % 24,
          days    : Math.floor(secondsLeft / 60 / 60 / 24),
          weeks   : Math.floor(secondsLeft / 60 / 60 / 24 / 7),
          daysLeft: Math.floor(secondsLeft / 60 / 60 / 24) % 7
        }
        for(var i=0; i<handlers.length; i++) {
          var eventName = handlers[i];
          if(values[eventName] != lasting[eventName]) {
            values[eventName] = lasting[eventName];
            dispatchEvent(eventName);
          }
        }
        if(secondsLeft == 0) { 
          stop();
          dispatchEvent('finished');
        }
      }
      triggerEvents();
      
      function dispatchEvent(eventName) {
        var event     = $.Event(eventName);
        event.date    = new Date(new Date().valueOf() + secondsLeft);
        event.value   = values[eventName] || "0";
        event.toDate  = toDate;
        event.lasting = lasting;
        switch(eventName) {
          case "seconds":
          case "minutes":
          case "hours":
            event.value = event.value < 10 ? '0'+event.value.toString() : event.value.toString();
            break;
          default:
            if(event.value) {
              event.value = event.value.toString();
            }
            break;
        }
        callback.call($this, event);
      }
      
      function stop() {
        clearInterval(interval);
      }

      function start() {
        $this.data('countdownInterval', setInterval(delegate($this, triggerEvents), 1000));
        interval = $this.data('countdownInterval');
      }
      
      if(interval) stop();
      start();
    });
  }
})(jQuery);

jQuery(document).ready(function() {

    /*
        Background slideshow
    */
  

    /*
        Countdown initializer
    */
    var now = new Date();
    var countTo = 25 * 24 * 60 * 60 * 1000 + now.valueOf();
    $('.timer').countdown(countTo, function(event) {
        var $this = $(this);
        switch(event.type) {
            case "seconds":
            case "minutes":
            case "hours":
            case "days":
            case "weeks":
            case "daysLeft":
                $this.find('span.'+event.type).html(event.value);
                break;
            case "finished":
                $this.hide();
                break;
        }
    });

   

});
</script>


</body></html>