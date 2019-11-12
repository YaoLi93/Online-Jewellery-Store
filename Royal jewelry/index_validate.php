


<?php
if(!empty($_COOKIE["username"]) && !empty($_COOKIE["pwd"]) ){
$user_name=$_COOKIE["username"];
$password=$_COOKIE["pwd"];
$message1 = "sign in successfully !";
$message2 = "no data";
$message3 = "can't link to mysql";

$link=mysqli_connect("localhost","root","root","jewelrystore");
if($link){
	$sql="SELECT * FROM UC_USER WHERE USER_NAME='$user_name' AND USER_PWD='$password' ";
	//echo $sql;
	$result=mysqli_query($link,$sql);
	if(mysqli_num_rows($result)!=0){
			echo "<script type='text/javascript'>alert('$message1');</script>";
			echo "<script type='text/javascript'>
			window.location.href = 'index.php';
			</script>";
			// $loc = 'index.html';
			// Header("Location: index.html");
			// die(0);

	}else{
		echo "<script type='text/javascript'>alert('$message2');</script>";
	}
}else{
	echo "<script type='text/javascript'>alert('$message3');</script>";
}
}


?>
