<?php
	session_start();
	$email = $username = $password = "";
	$err = "";	
	$conn = new mysqli('localhost', 'root', 'root', 'Jewelry_STORE');
	if (mysqli_connect_errno()){
		$err .= "Failed to connect to MySQL: ".mysqli_connect_error()."<br/>";
	}

	$email = text_input($_POST["email"]);
	$username = text_input($_POST["username"]);
	$password = text_input($_POST["password"]);
	
	$query = "SELECT * FROM USER WHERE user_name = '".$username."' OR user_email = '".$email."';";
	$result = $conn -> query($query);
	if(mysqli_num_rows($result) == 0){
		$sha1pwd = sha1($password);
		$query = 'INSERT INTO `user`(`user_email`, `user_name`, `password`) VALUES ("'.$email.'","'.$username.'","'.$sha1pwd.'");';
		$result = $conn -> query($query);
		$_SESSION['username'] = $username;

		$query = "SELECT * FROM USER WHERE user_name = '".$username."';";
		$result = mysqli_query($conn,$query);
		$user = mysqli_fetch_array($result);
		$_SESSION['id'] = $user['user_id'];
		session_write_close();

	}
	else{
		$err .= "Username or Email already exists.";
	}

	$message = array('err'=>$err,'username'=>$_SESSION['username']);
	echo json_encode($message);
		
	function text_input($data)
	{
 		$data = trim($data);
  		$data = stripslashes($data);
  		$data = htmlspecialchars($data);
  		return $data;
	}
?>
