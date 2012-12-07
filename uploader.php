<?php
$uniqueId = uniqid();
$uploadPath = "upload/";
$fileName = $uniqueId."_".$_FILES["file"]["name"]; 
$fileTmpLoc = $_FILES["file"]["tmp_name"];

$pathAndName = $uploadPath.$fileName;

$moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
$result = new StdClass();

if ($moveResult == true) 
{
	$result->success = true;
	$result->fileName = $fileName;
	$result->uploadPath = $uploadPath;
	//echo "File successfully saved.";
} 
else 
{
	$result->success = false;
}
print_r(json_encode($result));
?>

