





//(function ($) { //'use strict';
//  Homepage Slider
  $(document).ready(function(){
    $('.home-slider').slick();
   	$(".headerpage").load("head.html");
     $(".footerpage").load("footer.html");
     getProfile();
    //  var name= "<?php if(!empty($_COOKIE["name"])){echo $_COOKIE["name"];}else{	echo "login";} ?>" ;
    //  var element = document.getElementById("loginTag");
    //  element.innerHTML=name;	
   
  });

  function getProfile(){
    var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    myFunction(this);
    }
  };
  xhttp.open("GET", "test.php", true);
  xhttp.send();
  }

  function myFunction(json) {
    alert(json);
  }
//});

//   $( document ).ready(function() {
//     $('.home-slider').slick();
// });

//})(jQuery);















