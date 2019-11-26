
<?php
//echo "login page";
session_start();
$user_name=md5($_POST["username"]);
$password=md5($_POST["password"]);
$url="index.html";
//echo "".$user_name.",".$password.".";
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
			$_SESSION["usr"]=$username;
			$c_usrname_value = $user_name;
			$c_pwd_value=$password;
			setcookie("username", $c_usrname_value, time() + (86400 * 30), "/");
			setcookie("pwd", $c_pwd_value, time() + (86400 * 30), "/");
			while($row = mysqli_fetch_array($result))
			{
		    setcookie("name", $row["NAME"], time() + (86400 * 30), "/");
			echo $row["NAME"];
			break;
			}
			//setcookie("name", $result["NAME"], time() + (86400 * 30), "/");
			
			$fileNames = array(
				'name' => $_COOKIE["name"]
			); // 是数组，不是字符串
			sendback_index($fileNames);
			echo "<script type='text/javascript'>
			window.location.href = 'index.html';
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

function sendback_index($array)
{
	$filesJSON = json_encode($array);// 转成json格式
	echo "<script type='text/javascript' src='js/index.js'>
		alert('?');
		getProfile($filesJSON);
	</script>";
}

?>