<?php
include("dbConnect.php");

$dbtable = "game_history";

$history = $_POST['history'];

// split history data
$data = explode("#", $history);
$user_id = $data[0];
$game_stage = $data[1];
$question = $data[2];
$correctAns_obj = $data[3];
$userAns_obj = $data[4];
$isCorrect = $data[5];
$misconception = $data[6];
$upload_time = date("Y-m-d h:i:s");

$query = "INSERT into $dbtable(history_id, user_id, game_stage, question, correctAns_obj, userAns_obj, isCorrect, misconception, upload_time) values (null, '$user_id', '$game_stage', '$question', '$correctAns_obj', '$userAns_obj', '$isCorrect', '$misconception', '$upload_time')";
$result = mysqli_query($Link, $query) or die(mysqli_error($Link));
echo "game history save successfully";

?>