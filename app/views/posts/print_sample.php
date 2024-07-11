Following are the instructions to print content on your USB / Bluetooth Thermal Printer from your own website via Bluetooth Print app
Bluetooth Print App URL: https://play.google.com/store/apps/details?id=mate.bluetoothprint

You can print from your webpage (localhost or website) through any android browser on your bluetooth OR USB thermal printer. It means that you just need to open your website from any android browser and clinking a button on your website will send print command to Bluetooth print app provided that you install small program into your web page
Instructions: - Enable Browser Print function in the app first
 - Put following HTML link on your request webpage
  <a href="my.bluetoothprint.scheme://<RESPONSEURL>">Print</a> 
  where <RESPONSEURL> is your response URL
  e.g. <a href="my.bluetoothprint.scheme://http://www.mydomain.com/response.php?id=45">Print</a>
  The response page must have data to print in JSON format
  Now when you open your webpage with any android browser and click on button click me using above method, android browser will launch Bluetooth print app installed on device which will then try to access response URL i.e. http://www.mydomain.com/response.php?id=45 and it will print JSON data accordingly

Note: If you are trying to access from localhost, make sure that you can access localhost page in your browser. You can find several help tutorials for this.
Below are sample request file program and response file program. You need to open request file in Chrome browser and on print button click, app will try to access JSON content in response page and print that content.

//------------------------ Below is sample request file program (request.html) --------------------------
<html>
<head>
</head>    
<body>
<a href="my.bluetoothprint.scheme://http://192.168.43.160/response.php">localhost print</a>
<a href="my.bluetoothprint.scheme://https://www.matetech.in/myfiles/temp/response.php">webpage print</a>
</body>
</html>

//------------------------ Below is sample response file program in PHP (response.php) ---------------------------
<?php
//you can print text, image, barcode and QR code by sending request from your website. You just need to send data in JSON format
//note that putting comments, header output etc. may create invalid JSON response and app cannot parse the response
$a = array();

//sending text entry
$obj1->type = 0;//text
$obj1->content = 'My Title';//any string	
$obj1->bold = 1;//0 if no, 1 if yes
$obj1->align =2;//0 if left, 1 if center, 2 if right
$obj1->format = 3;//0 if normal, 1 if double Height, 2 if double Height + Width, 3 if double Width, 4 if small
array_push($a,$obj1);

//sending image entry		
$obj2->type = 1;//image
$obj2->path = 'https://www.mydomain.com/image.jpg';//complete filepath on your web server; make sure that it is not big size
$obj2->align = 2;//0 if left, 1 if center, 2 if right; set left align for big size images
array_push($a,$obj2);

//sending barcode entry		
$obj3->type = 2;//barcode
$obj3->value = '1234567890123';//valid barcode value
$obj3->width = 100;//valid barcode width
$obj3->height = 50;//valid barcode height
$obj3->align = 0;//0 if left, 1 if center, 2 if right
array_push($a,$obj3);

//sending QR entry		
$obj4->type = 3;//QR code
$obj4->value = 'sample qr text';//valid QR code value
$obj4->size = 40;//valid QR code size in mm
$obj4->align = 2;//0 if left, 1 if center, 2 if right
array_push($a,$obj4);

//sending HTML Code	
$obj5->type = 4;//HTML Code
$obj5->content = "<center><span style=\"font-weight:bold; font-size:20px;\">This is sample text</span></center>";
array_push($a,$obj5);

//sending empty line
$obj6->type = 0;//text
$obj6->content = ' ';//empty line
$obj6->bold = 0;
$obj6->align = 0;
array_push($a,$obj6);

//sending multi lines text
$obj7->type = 0;//text
$obj7->content = 'This text has<br />two lines';//multiple lines text
$obj7->bold = 0;
$obj7->align = 0;
array_push($a,$obj7);

echo json_encode($a,JSON_FORCE_OBJECT);
//Note that same sequence will be used for printing content
//Note: If any non english entry is added, it will get auto get converted to text special if this setting is on in the app. You will find this setting in Settings->Special Characters
?>