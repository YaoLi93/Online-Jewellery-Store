<?php
session_start();
$usrname = md5($_POST["username"]);
$passwd = md5($_POST["password"]);
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$space=" ";
$name = $firstname . $space;
$name = $name . $lastname;

$message1 = "register successfully !";
$message2 = "username exsit";
$message3 = "can't link to mysql";

$link=mysqli_connect("localhost","root","root","jewelrystore");

if($link){
	$sql="SELECT * FROM UC_USER WHERE USER_NAME='$usrname' ";
	//echo $sql;
	$result=mysqli_query($link,$sql);
	if(mysqli_num_rows($result)!=0){
            echo "<script type='text/javascript'>alert('$message2');</script>";
            echo "<script type='text/javascript'>
			window.location.href = 'register.html';
            </script>";
            




			// $_SESSION["usr"]=$username;
			// $c_usrname_value = $user_name;
			// $c_pwd_value=$password;
			// setcookie("username", $c_usrname_value, time() + (86400 * 30), "/");
			// setcookie("pwd", $c_pwd_value, time() + (86400 * 30), "/");
			// while($row = mysqli_fetch_array($result))
			// {
		    // setcookie("name", $row["NAME"], time() + (86400 * 30), "/");
			// //echo $row["NAME"];
			// break;
			// }
			// //setcookie("name", $result["NAME"], time() + (86400 * 30), "/");
			
			// $fileNames = array(
			// 	'name' => $_COOKIE["name"]
			// ); // 是数组，不是字符串
			// echo "<script type='text/javascript'>
			// window.location.href = 'index.html';
			// </script>";
			// // $loc = 'index.html';
			// // Header("Location: index.html");
            // // die(0);
            


	}else{
       
        $nowtime= date('Y-m-d H:i:s');
        $query = "INSERT INTO UC_USER (USER_NAME, USER_PWD, NAME, STAT, CREATE_DATE, PWD_INTENSITY) VALUES ('$usrname', '$passwd', '$name', '1', '$nowtime', '1')";
        
 
        if (mysqli_query($link, $query)) {
            echo "<script type='text/javascript'>alert('$message1');</script>";    
            //echo "新记录插入成功";
        } else {
            $error_msg=mysqli_error($conn);
            echo "<script type='text/javascript'>alert('$error_msg');</script>"; 
        }
       

		echo "<script type='text/javascript'>
			window.location.href = 'login.html';
			</script>";
	}
}else{
	echo "<script type='text/javascript'>alert('$message3');</script>";
	echo "<script type='text/javascript'>
			window.location.href = 'login.html';
			</script>";
}



?>