<?php


$pid = filter_input(INPUT_GET,"id",FILTER_SANITIZE_STRING);
$link=mysqli_connect("localhost","root","root","jewelrystore");
if($link){
      $sql="SELECT * FROM PRODUCT A INNER JOIN PRODUCT_IMAGE B ON A.ID=B.ID AND A.ID='$pid' ";
    
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
                    "ID" => $row["ID"],
                    "PRODUCT_NAME" =>  $row["PRODUCT_NAME"],
                    "PRICE" => $row["PRICE"],
                    "QUANTITY" => $row["QUANTITY"],
                    "DETAIL" =>  $row["DETAIL"],
                    "URL1" => $row["URL1"],
                    "URL2" => $row["URL2"],
                    "URL3" => $row["URL3"]
                );
                array_push($product_array, $arr);
			}
			
			$jsonencode = json_encode($product_array,JSON_PRETTY_PRINT); 
		    echo $jsonencode;
	}else{
		//echo "<script type='text/javascript'>alert('$message2');</script>";
	}
}else{
//	echo "<script type='text/javascript'>alert('$message3');</script>";
}
mysqli_close($link);

?>
