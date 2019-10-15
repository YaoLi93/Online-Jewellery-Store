<?php
	session_start();
	$username = $password = $err = $usertype = "";	

	
	$conn = new mysqli('localhost', 'root', 'root', 'Jewelry_store');
	if (mysqli_connect_errno()){
		$err .= "Failed to connect to MySQL: ".mysqli_connect_error()."<br/>";
	}

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$username = text_input($_POST['username']);
		$password = sha1(text_input($_POST['password']));
	}
	
	$redirect ="";
	
	$query = 'SELECT * FROM `user` WHERE `user_name`="'.$username.'" or `user_email`="'.$username.'"' ;	
	$result = $conn -> query($query);
	$row = mysqli_fetch_assoc($result);
	
	if(mysqli_num_rows($result) == 0){
		$err .= "User does not exist.";
	} 
	else{
		if($password == $row['password']){
			$_SESSION['username'] = $row['user_name'];
			$_SESSION['id'] = $row['user_id'];
			session_write_close();
			$query = "SELECT * FROM ADMIN WHERE user_id = ".$_SESSION['id'].";";
			$result = $conn -> query($query);
			$row = mysqli_fetch_assoc($result);
			if(mysqli_num_rows($result) == 0){
				$usertype = 'user';
			} 
			else{
				$usertype = 'admin';
			}
		}
		else {
			$err .= "Wrong password, please try again.";
		}
	}


	$message = array('err'=>$err,'usertype'=>$usertype,'username'=>$_SESSION['username']);
	echo json_encode($message);
	
	function text_input($data){
 		$data = trim($data);
  		$data = stripslashes($data);
  		$data = htmlspecialchars($data);
  		return $data;
	}
?>
