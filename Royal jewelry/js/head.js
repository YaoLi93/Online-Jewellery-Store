
 var uid=-1;
  $(document).ready(function(){
   	$(".headerpage").load("head.html");
     $(".footerpage").load("footer.html");
     getUser();
  });
  
  function GoCart(){
   
    if(uid<0){
      alert("you have to login");
    }else{
      window.open("cart.html");
    }
  }
  function GoHistroy(){
    if(uid<0){
      alert("you have to login");
    }else{
      window.open("myorder.html");
    }
  }
  
  //-----------------------get Profile-----------------------
  function getUser(){
    var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
        var myArr = JSON.parse(this.responseText);
        Getuser_Function(myArr);
    }
  };
  xhttp.open("GET", "index_validate.php", true);
  xhttp.send();
  }

  function Getuser_Function(packJson) {
    document.getElementById("gocart").addEventListener ("click", GoCart, false);
    document.getElementById("myorder").addEventListener ("click", GoHistroy, false);

   if(packJson.success==1){ 
    document.getElementById("login").innerHTML = packJson.name;
    uid=packJson.UID;
   }
  }
