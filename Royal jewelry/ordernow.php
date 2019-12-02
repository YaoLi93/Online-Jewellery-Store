<?php
session_start();


if (array_key_exists('pid', $_POST) && array_key_exists('uid', $_POST)) {

    $pid = $_POST['pid'];
    $uid = ($_POST['uid']);
    $quantity = ($_POST['quantity']);
    // do stuff with params


} else {
    $arr = array(
        "success" => 0,
        "error" =>  "fail"
    );
    $jsonencode = json_encode($arr,JSON_PRETTY_PRINT); 
    echo $jsonencode;
}

$message1 = "put into cart successfully !";
$message2 = "product exsit in cart !";
$message3 = "can't link to mysql";

$link=mysqli_connect("localhost","root","root","jewelrystore");

if($link){
	$sql="SELECT * FROM CART WHERE PID='$pid' AND UID='$uid'";
	//echo $sql;
	$result=mysqli_query($link,$sql);
	if(mysqli_num_rows($result)!=0){
            
            $arr = array(
		    	"success" => 0,
		    	"error" =>  $message2
		    );
		    $jsonencode = json_encode($arr,JSON_PRETTY_PRINT); 
		    echo $jsonencode;

	}else{
       
      
        //$query = "INSERT INTO CART (UID, PID, SELECT, QUANTITY) VALUES (7122683, 1003, 1, 1)";
        $query = "INSERT INTO `CART` (`ID`, `UID`, `PID`, `SELECT`, `QUANTITY`) VALUES (NULL, '$uid', '$pid', '1', '$quantity')";
 
        if (mysqli_query($link, $query)) {
            $arr = array(
		    	"success" => 1,
		    	"error" =>  $message1
		    );
		    $jsonencode = json_encode($arr,JSON_PRETTY_PRINT); 
		    echo $jsonencode;
        } else {
            $error_msg=mysqli_error($link);
            $arr = array(
		    	"success" => 0,
		    	"error" =>  $error_msg
		    );
		    $jsonencode = json_encode($arr,JSON_PRETTY_PRINT); 
		    echo $jsonencode;
        }
    
	}
}else{
    $arr = array(
        "success" => 0,
        "error" =>  $message3
    );
    $jsonencode = json_encode($arr,JSON_PRETTY_PRINT); 
    echo $jsonencode;
}



?>