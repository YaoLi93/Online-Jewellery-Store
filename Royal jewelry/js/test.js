
goodsList = new Array();

$(document).ready(function(){

getProfile();

});


function getProfile(){

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
        var myArr = JSON.parse(this.responseText);
        myFunction(myArr);
        document.write(goodsList[1].price);
    }
  };

  xhttp.open("GET", "cart.php", true);
  xhttp.send();

  }

function myFunction(packJson) {
	
    //document.write(packJson[0].id);
    //document.write(packJson.length);
    for (var i=0;i<packJson.length;i++){
    	//document.write(packJson[i].id);
    	goodsList[i] = new Array;
    	goodsList[i].id = packJson[i].id;
    	goodsList[i].imgUrl = packJson[i].imgUrl;
    	goodsList[i].goodsInfo = packJson[i].goodsInfo;
    	goodsList[i].goodsParams = packJson[i].PID;
    	goodsList[i].price = packJson[i].goodsCount*packJson[i].singleGoodsMoney;
    	goodsList[i].goodsCount = packJson[i].goodsCount;
    	goodsList[i].singleGoodsMoney = packJson[i].singleGoodsMoney;
    	document.write(goodsList[i].id);
    }
    
}