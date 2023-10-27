<?php
 error_reporting(0);
session_start();
/*
Question 4.2. // redirect error
if($_SESSION['loggedin'])
{
header('location: Q3.php');
exit;
}
*/
//if the login attempts exceeds 3, we make them wait 30 mins
if ($_SESSION["login_attempts"] > 2)
{
echo "<h2><center>Please wait for 30 minutes to try again</h2></center>";
sleep(60 * 30);// 60 seconds * 30 = 1800 (30 mins in seconds)
unset($_SESSION["login_attempts"]);
}
if(isset($_POST["login"]))
{
$uName = $_POST["username"];
$pass = $_POST["password"];
//to prevent from mysqli injection 
$uName = stripcslashes($uName); 
$pass = stripcslashes($pass); 
$uName = mysqli_real_escape_string($connectToDb, $uName); 

$pass = mysqli_real_escape_string($connectToDb, $pass); 
//The following sql searches for matching user name and password
$sql = "select * from student_reg where USERNAME = '$uName' and PSSWORD = 
'$pass'"; 
 $result = mysqli_query($connectToDb, $sql); 
 $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
 $count = mysqli_num_rows($result); 
mysqli_close($connectToDb);
if($count == 1)
{
echo"<p><center>LOGIN SUCCESSFUL</center></p>";
$_SESSION['user_name'] = $uName;
//Question 4.1
$_SESSION['loggedin'] = TRUE;
if(!empty($_POST["remember"])) {
setcookie ("User-Name",$_POST["username"],time()+ (10 * 365 * 24 * 60 * 60));
setcookie ("Pass-Word",$_POST["password"],time()+ (10 * 365 * 24 * 60 * 60)); 
} else {
}
header('location: Q3.php');
}
else{
echo "<p><center>LOGIN FAILED</center></p>";
$_SESSION["login_attempts"] +=1;
echo "<center> You've used ".$_SESSION["login_attempts"]." login 
attempts </center>";
}
}else if(isset($_POST["register"]))
{

header('location: Q1.php');
}
 ?>