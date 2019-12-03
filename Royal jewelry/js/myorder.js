$(document).ready(function(){
 
     getorder();
    
  });
  

   //-----------------------Get product-----------------------
   function getorder(){
    var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
        var myArr = JSON.parse(this.responseText);
        myFunction2(myArr);
    }
  };
  xhttp.open("GET", "getorder.php", true);
  xhttp.send();
  }

  function myFunction2(packJson) {
    var row;
    for(var i = 0; i < packJson.length; i++){
    var totalprice=packJson[i].PRICE * packJson[i].QUANTITY;
    console.log(totalprice);
    var item= "item : " + packJson[i].QUANTITY;
    var per ="per : $" + packJson[i].PRICE;
    var total ="total: $" + totalprice;
    console.log(item+","+per+","+total);
    row+="<tr><th scope=\"col\"><h3><p class=\"font-weight-bold\">order : ";
    row+=packJson[i].ID;
    row+="</p></h3></th>"
    row+="<tr><th scope=\"col\">"
    row+="<image style=\"width:100px\" src=\"";
    row+=packJson[i].URL;
    row+="\"></th><th scope=\"col\"><h4>"
    row+=packJson[i].PRODUCT_NAME;
    row+="</th><th scope=\"col\"><h4>";
    row+=item; //packJson[i].QUANTITY;
    row+="</h4></th><th scope=\"col\"><h4>";
    row+=per; //packJson[i].PRICE;
    row+="</h4></th><th scope=\"col\"><h4>";
    row+=total;//totalprice;
    row+="</h4></th><th scope=\"col\"><h4> ";
    row+=packJson[i].DATE;
    row+="</h4></th></tr>";
    
    }
    document.getElementById("ordertable").innerHTML = row;
  }