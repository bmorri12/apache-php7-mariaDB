<?php

include("config.php"); 

// connect to the mysqli server
$link = mysqli_connect($db_host, $db_user, $db_pass)
or die ("Could not connect to mysqli because ".mysqli_error($link));

// select the database
mysqli_select_db($link,$db_name)
or die ("Could not select database because ".mysqli_error($link));

$match = "select id from $db_table where username = '".$_POST['username']."'
and password = '".$_POST['password']."';"; 

$qry = mysqli_query($link,$match)
or die ("Could not match data because ".mysqli_error($link));
$num_rows = mysqli_num_rows($qry); 

if ($num_rows <= 0) { 
echo "Sorry, there is no username $username with the specified password.<br>";
echo "<a href=login.html>Try again</a>";
exit; 
} else {

setcookie("loggedin", "TRUE", time()+(3600 * 24));
setcookie("site_username", "$username");
echo "You are now logged in!<br>"; 
echo "Continue to the <a href=members.php>members</a> section.";
}
?>
