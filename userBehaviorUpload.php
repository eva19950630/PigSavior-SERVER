<?php
include("dbConnect.php");

$dbtable = "user_behavior";

$behavior = $_POST['behavior'];

// echo $behavior;

// split behavior data
$data = explode("#", $behavior);
$user_id = $data[0];
$game_scene = $data[1];
$user_action = $data[2];
$target = $data[3];
$upload_time = date("Y-m-d h:i:s");

$query = "INSERT into $dbtable(behavior_id, user_id, game_scene, user_action, target, upload_time) values (null, '$user_id', '$game_scene', '$user_action', '$target', '$upload_time')";
$result = mysqli_query($Link, $query) or die(mysqli_error($Link));
echo "user behavior save successfully";

?>