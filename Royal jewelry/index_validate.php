


<?php
if(!empty($_COOKIE["username"]) && !empty($_COOKIE["pwd"]) ){
		$arr = array(
			"success" => 1,
			"name" => $_COOKIE["name"],
			"username" =>  $_COOKIE["username"],
			"passwd" => $_COOKIE["pwd"],
			"UID" => $_COOKIE["uid"]
		);
		$jsonencode = json_encode($arr,JSON_PRETTY_PRINT); 
		echo $jsonencode;
	}else{
		$arr = array(
			"success" => 0,
		);
		$jsonencode = json_encode($arr,JSON_PRETTY_PRINT); 
		echo $jsonencode;
	}
?>
