<?php

// connect to server and database
$Link = mysqli_connect('localhost', 'root', 'csnaker'); //連結伺服器
$db = mysqli_select_db($Link, "pigsaviorapp"); //選擇資料庫
mysqli_query($Link, "SET CHARACTER SET utf8");	//送出Big5編碼的MySQL指令
mysqli_query($Link,  "SET collation_connection = 'utf8_unicode_ci'");

if(!@$Link)
	die("connect server failed");
if(!@$db)
	die("connect db failed");

date_default_timezone_set("Asia/Taipei");

?>