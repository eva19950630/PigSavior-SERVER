<?php
include("dbConnect.php");

session_start();

$dbtable = "user";

$password = $_POST['password'];
// $process = $_POST['userProcess'];

// echo $account.' '.$password;
echo $_SESSION['account'];

if ($_SESSION['account'] != null)
	$account = $_SESSION['account'];
else
	$account = $_POST['account'];

// search db
$sql = "SELECT * FROM $dbtable where account = '$account'";
$result = mysqli_query($Link, $sql);
$rowsCount = mysqli_num_rows($result);
for ($i = 0; $i < $rowsCount; $i++)
	$row = mysqli_fetch_row($result);

// echo $rowsCount;
if ($rowsCount == 0)
	echo 'no register';
else {
	if ($account != null && $password != null) {
		if ($row[2] == $password) {
			$_SESSION['account'] = $account;
			echo $row[0].'@'.$row[4].'@'.$row[5].'@'.$row[6];
			$row[8]++;
			$row[9] = date("Y-m-d h:i:s");
			$query = "UPDATE user SET login_count = '$row[8]', last_login_time = '$row[9]' where account = '$account'";
			$result = mysqli_query($Link, $query);
		} else {
			echo 'wrong password';
		}
	}
}

?>