


<?php
if(!empty($_COOKIE["username"]) && !empty($_COOKIE["pwd"]) ){
		$arr = array(
			"name" => $_COOKIE["name"],
			"username" =>  $_COOKIE["username"],
			"passwd" => $_COOKIE["pwd"]
		);
		$jsonencode = json_encode($arr,JSON_PRETTY_PRINT); 
		echo $jsonencode;
	}
?>
