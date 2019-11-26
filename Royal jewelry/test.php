<?php
$arr = array(
           "name" => "sam",
           "nick" => "s"
       );
$jsonencode = json_encode($arr,JSON_PRETTY_PRINT);
echo $jsonencode;


?>
