





(function ($) { 'use strict';
  // Homepage Slider
  $(document).ready(function(){
    $('.home-slider').slick();
   	$(".headerpage").load("head.html");
     $(".footerpage").load("footer.html");

  })


})(jQuery);
	var name= "<?php if(!empty($_COOKIE["name"])){echo $_COOKIE["name"];}else{	echo "login";} ?>";
	var element = document.getElementById("loginTag");
	element.innerHTML=name;	















