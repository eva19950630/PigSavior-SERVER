<?php
include("dbConnect.php");

$dbtable = "user";

$account = $_POST['account'];
$process = $_POST['userProcess'];
$challProgress = $_POST['challProgress'];
$isOpenChallenge = $_POST['isOpenChallenge'];

if ($account != null && $process != null) {
	$query = "UPDATE user SET process = '$process' where account = '$account'";
	$result = mysqli_query($Link, $query);
	echo "user process update successfully";
} else if ($account != null && $challProgress != null) {
	$query = "UPDATE user SET challenge_process = '$challProgress' where account = '$account'";
	$result = mysqli_query($Link, $query);
	echo "user challenge progress update successfully";
} else if ($account != null && $isOpenChallenge != null) {
	$query = "UPDATE user SET isOpenChallenge = '$isOpenChallenge' where account = '$account'";
	$result = mysqli_query($Link, $query);
	echo "user open challenge update successfully";
} else {
	echo "user data update failed";
}

?>