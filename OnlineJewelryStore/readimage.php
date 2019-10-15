<?php

	$id = $_POST['Jewelry_id'];
	$path='inventory/images/'.$id.'.jpg';
	$type=pathinfo($path,PATHINFO_EXTENSION);
	$data=file_get_contents($path);
	$base64='data:image/'.$type.';base64,'.base64_encode($data);
	$img =  $base64;
	echo $img;
?>	