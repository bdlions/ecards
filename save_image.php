<?php
session_start();
$unique_id = uniqid();
$file = "saved_images/".$unique_id.'.png';
$_SESSION['image_name'] = $unique_id.'.png';
//file_put_contents($file, $_POST['data'], FILE_APPEND | LOCK_EX);
$handle = fopen($file, 'w') or die('Cannot open file:  '.$file);

$imageData = $_REQUEST['data'];
// Remove the headers (data:,) part.  
// A real application should use them according to needs such as to check image type
$filteredData=substr($imageData, strpos($imageData, ",")+1);

// Need to decode before saving since the data we received is already base64 encoded
$unencodedData=base64_decode($filteredData);

fwrite($handle, $unencodedData);
echo $file;
?>
