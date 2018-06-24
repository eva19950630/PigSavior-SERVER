<?php
include("dbConnect.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PigSavior</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- optimized for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
	<form action="index.php" method="post">
	    <input type="submit" name="401" value="四年一班" class="btn btn-default" />
	    <input type="submit" name="402" value="四年二班" class="btn btn-default" />
	    <input type="submit" name="403" value="四年三班" class="btn btn-default" />
	    <input type="submit" name="404" value="四年四班" class="btn btn-default" />
	</form>
</body>
</html>

<?php

$sql = "SELECT * FROM user ORDER BY process DESC, field (isOpenChallenge, 'true', 'false')";
$result = mysqli_query($Link, $sql);
$rowsCount = mysqli_num_rows($result);

$class_401 = array();
$class_402 = array();
$class_403 = array();
$class_404 = array();

for ($i = 0; $i < $rowsCount; $i++) {
	$row = mysqli_fetch_row($result);
	if (strcmp(substr($row[1], 0, 3), "401") == 0)
		array_push($class_401, $row[0]);
	else if (strcmp(substr($row[1], 0, 3), "402") == 0)
		array_push($class_402, $row[0]);
	else if (strcmp(substr($row[1], 0, 3), "403") == 0)
		array_push($class_403, $row[0]);
	else if (strcmp(substr($row[1], 0, 3), "404") == 0)
		array_push($class_404, $row[0]);
}
// echo count($class_401)." ".count($class_402)." ".count($class_403)." ".count($class_404);

// echo "user_id / account / 豬豬塔? / 豬豬塔進度 / Stage進度 / 總答題數 / 答對題數 / 答對率<br><hr>";
?>
<table border='1'>
	<tr>
	    <td>user_id</td>
	    <td>account</td>
	    <td>豬豬塔?</td>
	    <td>豬豬塔進度</td>
	    <td>Stage進度</td>
	    <td>總答題數</td>
	    <td>答對題數</td>
	    <td>答對率</td>
	</tr>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['401'])) {
	for ($i = 0; $i < count($class_401); $i++) {
		$sql = "SELECT * FROM user where user_id = '$class_401[$i]'";
		$result = mysqli_query($Link, $sql);
		$row = mysqli_fetch_row($result);
		$challNum = 0;
		if ($row[5] == "true" && $row[6] != null) {
			$challProgress = explode("-", $row[6]);
			$challNum = ($challProgress[0]-1)*5+$challProgress[1];
		}
		$sql2 = "SELECT * FROM game_history where user_id = '$class_401[$i]'";
		$result2 = mysqli_query($Link, $sql2);
		$historyCount = mysqli_num_rows($result2);
		$totalCorrect = 0;
		for ($j = 0; $j < $historyCount; $j++) {
			$row2 = mysqli_fetch_row($result2);
			if ($row2[6] == "True")
				$totalCorrect += 1;
		}
		$correctRate = round(($totalCorrect/$historyCount)*100, 2);
?>
        <tr>
            <td><?php echo $row[0]?></td>
            <td><?php echo $row[1]?></td>
            <td><?php echo $row[5]?></td>
            <td><?php echo $challNum?></td>
            <td><?php echo $row[4]?></td>
            <td><?php echo $historyCount?></td>
            <td><?php echo $totalCorrect?></td>
            <td><?php echo $correctRate?></td>
        </tr>
<?php
	}
?>
	</table>
<?php
} else if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['402'])) {
	for ($i = 0; $i < count($class_402); $i++) {
		$sql = "SELECT * FROM user where user_id = '$class_402[$i]'";
		$result = mysqli_query($Link, $sql);
		$row = mysqli_fetch_row($result);
		$challNum = 0;
		if ($row[5] == "true" && $row[6] != null) {
			$challProgress = explode("-", $row[6]);
			$challNum = ($challProgress[0]-1)*5+$challProgress[1];
		}
		$sql2 = "SELECT * FROM game_history where user_id = '$class_402[$i]'";
		$result2 = mysqli_query($Link, $sql2);
		$historyCount = mysqli_num_rows($result2);
		$totalCorrect = 0;
		for ($j = 0; $j < $historyCount; $j++) {
			$row2 = mysqli_fetch_row($result2);
			if ($row2[6] == "True")
				$totalCorrect += 1;
		}
		$correctRate = round(($totalCorrect/$historyCount)*100, 2);
?>
        <tr>
            <td><?php echo $row[0]?></td>
            <td><?php echo $row[1]?></td>
            <td><?php echo $row[5]?></td>
            <td><?php echo $challNum?></td>
            <td><?php echo $row[4]?></td>
            <td><?php echo $historyCount?></td>
            <td><?php echo $totalCorrect?></td>
            <td><?php echo $correctRate?></td>
        </tr>
<?php
	}
?>
	</table>
<?php
} else if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['403'])) {
	for ($i = 0; $i < count($class_403); $i++) {
		$sql = "SELECT * FROM user where user_id = '$class_403[$i]'";
		$result = mysqli_query($Link, $sql);
		$row = mysqli_fetch_row($result);
		$challNum = 0;
		if ($row[5] == "true" && $row[6] != null) {
			$challProgress = explode("-", $row[6]);
			$challNum = ($challProgress[0]-1)*5+$challProgress[1];
		}
		$sql2 = "SELECT * FROM game_history where user_id = '$class_403[$i]'";
		$result2 = mysqli_query($Link, $sql2);
		$historyCount = mysqli_num_rows($result2);
		$totalCorrect = 0;
		for ($j = 0; $j < $historyCount; $j++) {
			$row2 = mysqli_fetch_row($result2);
			if ($row2[6] == "True")
				$totalCorrect += 1;
		}
		$correctRate = round(($totalCorrect/$historyCount)*100, 2);
?>
        <tr>
            <td><?php echo $row[0]?></td>
            <td><?php echo $row[1]?></td>
            <td><?php echo $row[5]?></td>
            <td><?php echo $challNum?></td>
            <td><?php echo $row[4]?></td>
            <td><?php echo $historyCount?></td>
            <td><?php echo $totalCorrect?></td>
            <td><?php echo $correctRate?></td>
        </tr>
<?php
	}
?>
	</table>
<?php
} else if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['404'])) {
	for ($i = 0; $i < count($class_404); $i++) {
		$sql = "SELECT * FROM user where user_id = '$class_404[$i]'";
		$result = mysqli_query($Link, $sql);
		$row = mysqli_fetch_row($result);
		$challNum = 0;
		if ($row[5] == "true" && $row[6] != null) {
			$challProgress = explode("-", $row[6]);
			$challNum = ($challProgress[0]-1)*5+$challProgress[1];
		}
		$sql2 = "SELECT * FROM game_history where user_id = '$class_404[$i]'";
		$result2 = mysqli_query($Link, $sql2);
		$historyCount = mysqli_num_rows($result2);
		$totalCorrect = 0;
		for ($j = 0; $j < $historyCount; $j++) {
			$row2 = mysqli_fetch_row($result2);
			if ($row2[6] == "True")
				$totalCorrect += 1;
		}
		$correctRate = round(($totalCorrect/$historyCount)*100, 2);
?>
        <tr>
            <td><?php echo $row[0]?></td>
            <td><?php echo $row[1]?></td>
            <td><?php echo $row[5]?></td>
            <td><?php echo $challNum?></td>
            <td><?php echo $row[4]?></td>
            <td><?php echo $historyCount?></td>
            <td><?php echo $totalCorrect?></td>
            <td><?php echo $correctRate?></td>
        </tr>
<?php
	}
?>
	</table>
<?php
}
?>