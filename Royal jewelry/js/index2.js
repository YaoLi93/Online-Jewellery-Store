





//(function ($) { //'use strict';
//  Homepage Slider
  $(document).ready(function(){
    $('.home-slider').slick();
   	$(".headerpage").load("head.html");
     $(".footerpage").load("footer.html");
     getProfile();
     getProduct();
    //  var name= "<?php if(!empty($_COOKIE["name"])){echo $_COOKIE["name"];}else{	echo "login";} ?>" ;
    //  var element = document.getElementById("loginTag");
    //  element.innerHTML=name;	
   
  });


  //-----------------------get Profile-----------------------
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


  //-----------------------Get product-----------------------
  function getProduct(){
    var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
        var myArr = JSON.parse(this.responseText);
        myFunction2(myArr);
    }
  };
  xhttp.open("GET", "getProduct.php", true);
  xhttp.send();
  }

  function myFunction2(packJson) {
    var row;
    for(var i = 0; i < packJson.length; i++){
    row+="<div class='col-md-4'><div class=\"product-item\"><div class=\"product-thumb\"><span class=\"bage\">Sale</span><img class=\"img-responsive\" src=\"";
    row+=packJson[i].URL1;
    row+="\" alt=\"";
    row+=packJson[i].ID;
    row+="\" />  ";
    row+="<div class=\"preview-meta\"> <ul><li><span  data-toggle=\"modal\" data-target=\"#product-modal\"><i class=\"tf-ion-ios-search-strong\"></i></span></li><li>";
    row+="<a href=\"#\" ><i class=\"tf-ion-ios-heart\"></i></a></li><li> <a href=\"\"><i class=\"tf-ion-android-cart\"></i></a></li></ul></div></div><div class=\"product-content\">";
    row+="<h4><a href=\"product-single.html\">";
    row+=packJson[i].PRODUCT_NAME;
    row+="</a></h4><p class=\"price\">$";
    row+=packJson[i].PRICE;
    row+="</p></div></div></div>";
    }
    // for(var i = 0; i < packJson.length; i++){
 
    //     alert(packJson[i].name + " " + packJson[i].password);
      
    //  }
    document.getElementById("product_row").innerHTML = row;
  }


//});

//   $( document ).ready(function() {
//     $('.home-slider').slick();
// });

//})(jQuery);















