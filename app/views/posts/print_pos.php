
<?php

$a = array();

$obj1->type = 0;
$obj1->content = 'My Title';	
$obj1->bold = 1;
$obj1->align =1;
$obj1->format = 0;
array_push($a,$obj1);


echo json_encode($a,JSON_FORCE_OBJECT);

?>