<?php



session_start();
$message1 = "put into cart successfully !";
$message2 = "no data!";
$message3 = "can't link to mysql";


$link=mysqli_connect("localhost","root","root","jewelrystore");
if($link){
      // $sql="SELECT * FROM UC_USER WHERE USER_NAME='$user_name' AND USER_PWD='$password' ";
      $sql="SELECT A.ID, A.PRODUCT_NAME, A.PRICE, B.URL1, C.OID, C.PID, C.QUANTITY, C.CREATE_DATE FROM PRODUCT A INNER JOIN PRODUCT_IMAGE B ON A.ID=B.ID INNER JOIN ORDER_HISTORY C ON B.ID=C.PID";
    
    //echo $sql;
	$result=mysqli_query($link,$sql);
	if(mysqli_num_rows($result)!=0){
		//	echo "<script type='text/javascript'>alert('$message1');</script>";
            
            // $_SESSION["usr"]=$username;
			// $c_usrname_value = $user_name;
			// $c_pwd_value=$password;
			// setcookie("username", $c_usrname_value, time() + (86400 * 30), "/");
            // setcookie("pwd", $c_pwd_value, time() + (86400 * 30), "/");
            
            $product_array = array();
			while($row = mysqli_fetch_array($result))
			{
                $arr = array(
                    "ID" => $row["OID"],
                    "PRODUCT_NAME" =>  $row["PRODUCT_NAME"],
                    "PRICE" => $row["PRICE"],
                    "QUANTITY" => $row["QUANTITY"],
                    "URL" => $row["URL1"],
                    "DATE" => $row["CREATE_DATE"]
                );
                array_push($product_array, $arr);
			}
			
			$jsonencode = json_encode($product_array,JSON_PRETTY_PRINT); 
		    echo $jsonencode;
	}else{
        $error_msg=mysqli_error($link);
        $arr = array(
            "success" => 0,
            "error" =>  $error_msg
        );
        $jsonencode = json_encode($arr,JSON_PRETTY_PRINT); 
        echo $jsonencode;
	}
}else{
    $arr = array(
        "success" => 0,
        "error" =>  $message3
    );
    $jsonencode = json_encode($arr,JSON_PRETTY_PRINT); 
    echo $jsonencode;
}
mysqli_close($link);

?>