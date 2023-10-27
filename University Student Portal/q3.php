<!--
Description: Front end of Question 3 interface page, with 3 buttons to click on.
Each button takes the user to a new page
-->
<?php
error_reporting(0);
include "configfile.php";
include "mainlog2.php";
session_start();
//checks if the user was redirected from the login page

if($_SESSION['page1']){
$_SESSION['newLoggedin'] = true;
}else{
$_SESSION['newLoggedin'] = false;
}
?>
<!DOCTYPE html>
<html>
<head>
<style>
.buttons{
display:inline-block;
 position: fixed;
top: 50%;
left: 50%;
transform: translate(-50%, -50%);
}
.sty{
display:inline-block;
padding:0.3em 1.2em;
margin:0 0.3em 0.3em 0;
border-radius:2em;
box-sizing: border-box;
text-decoration:none;
font-family:'Roboto',sans-serif;
font-weight:300;
color:#FFFFFF;
background-color:#4eb5f1;
text-align:center;

transition: all 0.2s;
}
.sty:hover{
background-color:#4095c6;
}
body{
background-color:#275a78;
}
</style>
</head>
<body>
<h1><center>WELCOME</center></h1>
<!--Table makes it easier for each form to be displayed in a row-->
<br/><br/>
<?php
echo "<h2><center>".$_SESSION['user_name']."</center></h2>";
//checks if the user is logged in
if($_SESSION['newLoggedin'] == TRUE){
$html = "
<form method = 'POST' >
<table class = 'buttons' >
<tr>
<td>

<button class = 'sty' name = 'fee'><b>FEES</b></button>
</td>
<td>
<button class = 'sty' name='attendance'> <b>ATTENDENCE</b></button>
</td>
<td>
<button class = 'sty' name = 'resul'><b>RESULTS</b></button>
</td>
</tr>
<tr>
<td style = 'position:fixed; left:35%'><button class = 'sty' name ='logOut'>LOGOUT</button></td>
</tr>
</table>
</form>
";}else if($_SESSION['newLoggedin'] == FALSE){
//if the user logs out, the following will display
$html = "
<h1><center>LOGIN</center></h1>
<form method = 'POST' >
 <table cellpadding='1' border = '1px' align='center'/>
 <tr>
<td>
<p> <b>USERNAME:</b></p>
</td>
 <td>

<input type = 'text' name = 'username'/>
 </td>
 </tr>
 <tr>
 <td>
 <p><b>PASSWORD:</b></p>
 </td>
 <td >
 <input type = 'password' name = 'password'>
 </td>
 </tr>
<tr>
 <td>
 <button name = 'register'>REGISTER</button>
 </td>
 <td>
<button name = login> LOGIN</button>
 </td>
 </tr>
 </table>
 <center>
 <input type='checkbox' name='remember' id='remember/>
<label for = 'remember'>Remember me!</label> 
</center>
 </form>
";
}
echo $html;

if(isset($_POST["fee"]))
{
header('location: fees.php');
exit;
}
else if(isset($_POST["attendance"]))
{
header('location: attendance.php');
exit;
}
else if(isset($_POST["resul"]))
{
header('location: Results.php');
exit;
}
else if(isset($_POST["logOut"])){
session_destroy();
$_SESSION['page1'] = false;
$_SESSION["newLoggedin"] = FALSE;
$_SESSION['user_name'] ="";
//Question 4.3. 
unset($_COOKIE['User-Name']);
unset($_COOKIE['Pass-Word']);
setcookie('User-Name', '', time() - 3600, '/'); // empty value and old timestamp
setcookie('Pass-Word', '', time() - 3600, '/'); // empty value and old timestamp
//Question 4 session 
header('location: Q3.php');

exit;
}
?>
</body>
</html>
