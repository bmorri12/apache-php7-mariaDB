<!--
All eode is under the GNU GENERAL PUBLIC LICENSE Version 3, 29 June 2007.
-->

<?php 

include("config.php"); 

// connect to the mysqli server
$link = mysqli_connect($db_host, $db_user, $db_pass)
or die ("Could not connect to mysqli because ".mysqli_error($link));

// select the database
mysqli_select_db($link,$db_name)
or die ("Could not select database because ".mysqli_error($link));

// check if the username is taken
$check = "select id from $db_table where username = '".$_POST['username']."';";
$qry = mysqli_query($link,$check) or die ("Could not match data because ".mysqli_error($link));
$num_rows = mysqli_num_rows($qry); 
if ($num_rows != 0) { 
echo "Sorry, there the username $username is already taken.<br>";
echo "<a href=register.html>Try again</a>";
exit; 
} else {

// insert the data
$insert = mysqli_query($link,"insert into $db_table (username, email,password) values (
'".$_POST['username']."',
'".$_POST['email']."',
'".$_POST['password']."')")
or die("Could not insert data because ".mysqli_error($link));

// print a success message
echo "Your user account has been created!<br>"; 
echo "Now you can <a href='login.html'>log in</a>"; 
}

?>
