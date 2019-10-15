<?php
	session_start();
	$err = "";

	$conn = new mysqli('localhost', 'root', 'root', 'Jewelry_store');
	if (mysqli_connect_errno()){
		$err .= "Failed to connect to MySQL: ".mysqli_connect_error().", ";
	}
	$Jewelry_name = mysqli_real_escape_string($conn,$_POST['Jewelry_name']);
	$query = "SELECT * FROM Jewelry WHERE Jewelry_name = '".$Jewelry_name."';";
	$result = mysqli_query($conn,$query);

	if(mysqli_num_rows($result)!=0){
		$rating = $_POST['rating'];
		$year = $_POST['year'];
		$price = $_POST['price'];
		$query = "UPDATE Jewelry SET isDeleted = 0,Jewelry_rating = '".$rating."',year = $year, price = $price WHERE Jewelry_name = '".$Jewelry_name."';";
		if (!mysqli_query($conn,$query)) {
			$err .= "Error: ".$query.mysqli_error($conn).", ";
		}	
		$exist = mysqli_fetch_array($result);
		$Jewelry_id = $exist['Jewelry_id'];

	}else{
		$rating = $_POST['rating'];
		$year = $_POST['year'];
		$price = $_POST['price'];
		$query = 'INSERT INTO `Jewelry`(`Jewelry_name`, `Jewelry_rating`, `year`, `price`) VALUES ("'.$Jewelry_name.'","'.$rating.'","'.$year.'", '.$price.');';
		if (!mysqli_query($conn,$query)) {
			$err .= "Error: ".$query.mysqli_error($conn)."<br/>";
		}else{ // insert Jewelry row successfully
			$query = 'SELECT Jewelry_id FROM `Jewelry` WHERE `Jewelry_name`="'.$Jewelry_name.'";';
			$result = $conn -> query($query);
			$row = mysqli_fetch_array($result);
			$Jewelry_id = $row['Jewelry_id'];
			foreach ($_POST["category"] as $category) {
				$query = 'INSERT INTO `Category`(`Jewelry_id`, `category`) VALUES ('.$Jewelry_id.',"'.$category.'")';
				if (!mysqli_query($conn,$query)) {
					$err .= "Error: ".$query.mysqli_error($conn)."<br/>";
				}		
			}	
		}

	}


			// upload image
		if ($_FILES["image"]["error"] > 0){
			$err .= "Return Code: " . $_FILES["image"]["error"] . "<br/>";
		}else{
			$sourcePath = $_FILES['image']['tmp_name']; // Storing source path of the file in a variable
			$_FILES["image"]["name"] = $Jewelry_id.".jpg";
			$targetPath = "inventory/images/".$_FILES['image']['name']; // Target path where file is to be stored
			move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
		}
		// upload synopsis
		if ($_FILES["synopsis"]["error"] > 0){
			$err .= "Return Code: " . $_FILES["synopsis"]["error"] . "<br/>";
		}else{
			$sourcePath = $_FILES['synopsis']['tmp_name']; // Storing source path of the file in a variable
			$_FILES["synopsis"]["name"] = $Jewelry_id.".txt";
			$targetPath = "inventory/synopsis/".$_FILES['synopsis']['name']; // Target path where file is to be stored
			move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
		}

	echo $err;


?>
