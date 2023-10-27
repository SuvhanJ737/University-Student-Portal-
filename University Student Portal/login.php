<!--
/*Description: Front end of Question 2, 
-->
<?php
include "configfile.php";
include "mainlog2.php";
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
<style>
input{
height : 20px;
}
h1{
text-align:center;
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
color:#class = "sty">;
background-color:#4eb5f1;
text-align:center;
transition: all 0.2s;
}
.sty:hover{
background-color:#4095c6;
}
</style>
</head>
<body class = "a">
<h1>LOGIN</h1>
<form method = "POST" >
 <table cellpadding="1" border = "1px" align="center"/>
 <tr>
<td>
<p> <b>USERNAME:</b></p>
</td>
 <td>
<input type = "text" name = "username"/>
 </td>
 </tr>
 <tr>

 <td>
 <p><b>PASSWORD:</b></p>
 </td>
 <td >
 <input type = "password" name = "password" >
 </td>
 </tr>
<tr>
 <td>
 <button name = "register" class = "sty">REGISTER</button>
 </td>
 <td>
<button name = "login" class = "sty"> LOGIN</button>
 </td>
 </tr>
 </table>
 <center>
 <input type="checkbox" name="remember" id="remember" <?php ?> />
<label for = "remember">Remember me!</label> 
</center>
 </form>
 
 </body>
</html>
