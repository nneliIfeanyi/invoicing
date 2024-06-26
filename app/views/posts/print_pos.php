
<?php

$a = array();
$obj5->type = 4;
$obj5->content = "<center><span style=\"font-weight:bold; font-size:20px;\">" .$_SESSION['user_name']. "</span></center>";
array_push($a,$obj5);

$obj1->type = 0;
$obj1->content = $_SESSION['user_dsc'] .'<br />'. $_SESSION['address'];	
$obj1->bold = 0;
$obj1->align = 1;
$obj1->format = 3;
array_push($a,$obj1);

$obj6->type = 0;
$obj6->content = ' ';
$obj6->bold = 0;
$obj6->align = 0;
array_push($a,$obj6);

$obj5->type = 4;
$obj5->content = "<center><span style=\"font-weight:bold; font-size:20px;\">" .$_SESSION['user_phone']. "</span></center>";
array_push($a,$obj5);	


echo json_encode($a,JSON_FORCE_OBJECT);

?>