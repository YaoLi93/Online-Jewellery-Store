





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
      //console.log(this);
        var myArr = JSON.parse(this.responseText);
        myFunction(myArr);
    }
  };
  xhttp.open("GET", "index_validate.php", true);
  xhttp.send();
  }

  function myFunction(packJson) {
    document.getElementById("login").innerHTML = packJson.name;
  }
//});

//   $( document ).ready(function() {
//     $('.home-slider').slick();
// });

//})(jQuery);















