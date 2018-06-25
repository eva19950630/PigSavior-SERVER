<?php
include("dbConnect.php");

$dbtable = "user";

$sql = "SELECT * FROM $dbtable";
$result = mysqli_query($Link, $sql);
$rowsCount = mysqli_num_rows($result);

$tmpScore = array();
$score = array();
$layerArr = array();
$pointArr = array();

for ($i = 0; $i < $rowsCount; $i++) {
	$row = mysqli_fetch_row($result);
	// echo $row[5];
	if ($row[6] != null) {
		$data = explode("-", $row[6]);
		array_push($tmpScore, ($data[0]-1)*5+$data[1]);
	}
}

rsort($tmpScore);
$tmpScoreCount = count($tmpScore);
$tmpScore = array_unique($tmpScore);
// print_r($tmpScore);
// echo count($tmpScore);
for ($i = 0; $i < $tmpScoreCount; $i++) {
	if ($tmpScore[$i] != null)
		array_push($score, $tmpScore[$i]);
}
// echo count($score);
// print_r($score);

for ($i = 0; $i < 3; $i++) {
	$layer = ceil($score[$i]/5);
	$point = $score[$i] % 5;
	if ($point == 0)
		$point = 5;
	array_push($layerArr, $layer);
	array_push($pointArr, $point);
}

// print_r($layerArr);
// print_r($pointArr);

for ($i = 0; $i < 3; $i++) {
	if ($i != 2)
		echo $layerArr[$i]."-".$pointArr[$i]."#";
	else
		echo $layerArr[$i]."-".$pointArr[$i];
}

?>