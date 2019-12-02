<?php
session_start();
$url="index.html";
$message1 = "sign in successfully !";
$message2 = "no products in the cart";
$message3 = "can't link to mysql";

$link=mysqli_connect("localhost","root","root","jewelrystore");
if($link){
	$sql="SELECT A.ID, A.UID, A.PID, A.QUANTITY, B.URL1, C.PRODUCT_NAME, C.PRICE FROM CART A INNER JOIN PRODUCT_IMAGE B ON A.PID=B.ID INNER JOIN PRODUCT C ON C.ID = A.PID";
	$result=mysqli_query($link,$sql);
	if(mysqli_num_rows($result)!=0){
			$product_array = array();
			while($row = mysqli_fetch_array($result))
			{
                $arr = array(
                    "id" => $row["ID"],
                    "imgUrl" => $row["URL1"],
                    "UID" =>  $row["UID"],
                    "goodsParams" => $row["PID"],                    
                    "goodsInfo" => $row["PRODUCT_NAME"],
                    "goodsCount" => $row["QUANTITY"],
                    "singleGoodsMoney" => $row["PRICE"]
                );
                array_push($product_array, $arr);
			}
			$jsonencode = json_encode($product_array,JSON_PRETTY_PRINT); 
		    echo $jsonencode;

	}else{
		echo "<script type='text/javascript'>alert('$message2');</script>";
		echo "<script type='text/javascript'>
			window.location.href = 'index.html';
			</script>";
	}
}else{
	echo "<script type='text/javascript'>alert('$message3');</script>";
	echo "<script type='text/javascript'>
			window.location.href = 'index.html';
			</script>";
}
?>