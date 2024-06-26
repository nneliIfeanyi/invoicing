
<?php

$a = array();

$obj1->type = 0;
$obj1->content = 'My Title';	
$obj1->bold = 1;
$obj1->align =1;
$obj1->format = 3;
array_push($a,$obj1);


	
$obj5->type = 4;
$obj5->content = "<center><span style=\"font-weight:bold; font-size:20px;\">This is sample text</span></center>";
array_push($a,$obj5);

$obj6->type = 0;
$obj6->content = ' ';
$obj6->bold = 0;
$obj6->align = 0;
array_push($a,$obj6);

$obj7->type = 0;
$obj7->content = 'This text has<br />two lines';
$obj7->bold = 0;
$obj7->align = 0;
array_push($a,$obj7);

echo json_encode($a,JSON_FORCE_OBJECT);

?>