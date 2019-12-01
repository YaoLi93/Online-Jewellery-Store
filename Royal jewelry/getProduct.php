
<?php
//echo "login page";


session_start();
// $user_name=md5($_POST["username"]);
// $password=md5($_POST["password"]);
// $url="index.html";
// //echo "".$user_name.",".$password.".";
$message1 = "get products successfully !";
$message2 = "no such product";
$message3 = "can't link to mysql";

$link=mysqli_connect("localhost","root","root","jewelrystore");
if($link){
      // $sql="SELECT * FROM UC_USER WHERE USER_NAME='$user_name' AND USER_PWD='$password' ";
      $sql="SELECT A.ID, A.PRODUCT_NAME, A.PRICE, B.URL1 FROM PRODUCT A INNER JOIN PRODUCT_IMAGE B ON A.ID=B.ID";
    
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
                    "URL1" => $row["URL1"]
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