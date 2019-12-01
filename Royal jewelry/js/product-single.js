




  $(document).ready(function(){
   	$(".headerpage").load("head.html");
     $(".footerpage").load("footer.html");
    var pid=window.location.href.split("=")[1];
    get_singleProduct(pid);
  });

  function get_singleProduct(pid){
  
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var myArr = JSON.parse(this.responseText);
        myFunction2(myArr);
    }
  };
 var url="get_singleProduct.php?id="+pid;

  xhttp.open("GET", url, true);
  xhttp.send();
  }

  function myFunction2(packJson) {
      var nameE=document.getElementById("name");
      nameE.innerHTML=packJson[0].PRODUCT_NAME;
      
      var priceE=document.getElementById("price");
      var priceStr=packJson[0].PRICE + "$";
      priceE.innerHTML=priceStr;

      var quantityE=document.getElementById("number");
      quantityE.innerHTML=packJson[0].QUANTITY;

      var detailE=document.getElementById("desc");
      detailE.innerHTML=packJson[0].DETAIL;

      var img1=document.getElementById("url1");
      var img2=document.getElementById("url2");
      var img3=document.getElementById("url3");
    img1.src=packJson[0].URL1;
    img2.src=packJson[0].URL2;
    img3.src=packJson[0].URL3;


    $('#lurl1').attr('data-thumb',packJson[0].URL1);
    $('#lurl2').attr('data-thumb',packJson[0].URL2);
    $('#lurl3').attr('data-thumb',packJson[0].URL3);
}













