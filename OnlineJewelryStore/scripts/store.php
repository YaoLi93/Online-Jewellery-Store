<?php
$err = "";
if(isset($_FILES["file"]["type"])){
	$temporary = explode(".", $_FILES["file"]["name"]);
	$file_extension = end($temporary);
	if ($file_extension == "jpg") {
		if ($_FILES["file"]["error"] > 0){
			$err .= "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
		}else{
			$sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
			$targetPath = "images/".$_FILES['file']['name']; // Target path where file is to be stored
			move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
			$err .= "<span id='success'>Image Uploaded Successfully...!!</span><br/>";
			$err .= "<br/><b>File Name:</b> " . $_FILES["file"]["name"] . "<br>";
			$err .= "<b>Type:</b> " . $_FILES["file"]["type"] . "<br>";
			$err .= "<b>Size:</b> " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
			$err .= "<b>Temp file:</b> " . $_FILES["file"]["tmp_name"] . "<br>";

		}
	}else{
		$err .= "<span id='invalid'>***Invalid file Size or Type***<span>";
	}
}
echo $err;
print_r ($_POST["Jewelry_name"]);
foreach ($_POST["category"] as $category) {
	echo $category;
}

?>