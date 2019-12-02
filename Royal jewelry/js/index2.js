





//(function ($) { //'use strict';
//  Homepage Slider


 //var uid=-1;
  $(document).ready(function(){
    $('.home-slider').slick();
   	// $(".headerpage").load("head.html");
    //  $(".footerpage").load("footer.html");
    
   
  //    Elementcart=document.getElementById("gocart");
  //    Elementorder=document.getElementById("myorder");
  //    Elementcart.onclick="GoCart()";
  //    Elementorder.onclick="GoHistory()";
    //  getProfile();
     getProduct();
    
  });
  
  // function GoCart(){
   
  //   if(uid<0){
  //     alert("you have to login");
  //   }else{
  //     window.open("cart.html");
  //   }
  // }
  // function GoHistroy(){
  //   if(uid<0){
  //     alert("you have to login");
  //   }else{
  //     window.open("myorder.html");
  //   }
  // }
  
  // //-----------------------get Profile-----------------------
  // function getProfile(){
  //   var xhttp = new XMLHttpRequest();
  // xhttp.onreadystatechange = function() {
  //   if (this.readyState == 4 && this.status == 200) {
  //     console.log(this.responseText);
  //       var myArr = JSON.parse(this.responseText);
  //       myFunction(myArr);
  //   }
  // };
  // xhttp.open("GET", "index_validate.php", true);
  // xhttp.send();
  // }

  // function myFunction(packJson) {
  //   document.getElementById("gocart").addEventListener ("click", GoCart, false);
  //   document.getElementById("myorder").addEventListener ("click", GoHistroy, false);

  //  if(packJson.success==1){ 
  //   document.getElementById("login").innerHTML = packJson.name;
  //   uid=packJson.UID;
  //  }
  // }


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
    row+="<div class='col-md-4' id=\"";
    row+=i;
    row+="\"><div class=\"product-item\"><div class=\"product-thumb\"><span class=\"bage\">Sale</span><img id=\"img\" class=\"img-responsive\" src=\"";
    row+=packJson[i].URL1;
    row+="\" alt=\"";
    row+=packJson[i].ID;
    row+="\" />  ";
    row+="<div class=\"preview-meta\"> <ul><li><span  data-toggle=\"modal\" data-target=\"#product-modal\"><i class=\"tf-ion-ios-search-strong\"></i></span></li><li>";
    row+="<a href=\"#\" ><i class=\"tf-ion-ios-heart\"></i></a></li><li> <a href=\"\"><i class=\"tf-ion-android-cart\"></i></a></li></ul></div></div><div class=\"product-content\">";
    row+="<h4><a href=\"#\" onclick=\'godetail("
    row+=packJson[i].ID;
    row+=")\'>";
    row+=packJson[i].PRODUCT_NAME;
    row+="</a></h4><p class=\"price\">$";
    row+=packJson[i].PRICE;
    row+="</p></div></div></div>";
    }
    document.getElementById("product_row").innerHTML = row;
  }
    var pid=1;
  function godetail(id){
      pid=id;
      console.log(pid);
      var des="product-single.html?id="+pid;
      console.log(des);
      window.open(des);
  }


//   function page(){
//     for(var i = 0; i < packJson.length; i++){
//         var element=document.getElementById("img");
//         　element.style.display="none";//隐藏
//     }
//   }

//});

//   $( document ).ready(function() {
//     $('.home-slider').slick();
// });

//})(jQuery);















