<!--
(Registration page), connects with the 
database and allows a user to submit their information to the 
database, 
registering them on the system. 
-->
<?php
//link to database linker code
include "configfile.php";
//This is the link to the backend code
include "mainlog1.php";
?>
<!DOCTYPE html>
<html>
<head>
<!--embedded css to make the form look neater -->
<style type="text/css">
form
{
text-align:center;
}
label
{
 display: inline-block;
 width: 140px;
 text-align:left;
}
input{
background-color:#f1f1f1;
border-radius:1px;
color: green;
}
label{
colour:#FFFFFF;
}
h1
{
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
color:#FFFFFF;
background-color:#4eb5f1;
text-align:center;
transition: all 0.2s;
}

.sty:hover{
background-color:#4095c6;
}
</style>
<title></title>
</head>
<!--html form for input -->
<body>
<h1>REGISTERATION</h1>
<form action = "" method = "POST">
<label for="username">USERNAME:</label>
<!--'required' added to each input tag to make sure nothing is left empty, acts as a 
validation method-->
<input type = "text" name = "username" placeholder ="Username" required 
/><br/><br/>
<label for="Password">PASSWORD:</label>
<input type = "password" name = "Password" placeholder ="Password" required 
/><br/><br/>
<label for="confirmPword">CONFIRM PASSWORD:</label>
<input type = "password" name = "confirmPword" placeholder ="Confirm Password" 
required /><br/><br/>
<label for="firstname">FIRSTNAME:</label>
<input type = "text" name = "firstname" placeholder ="Firstname" required 
/><br/><br/>
<label for="surname">SURNAME:</label>
<input type = "text" name = "surname" placeholder ="surname" required /><br/><br/>
<label for="Email">EMAIL:</label>
<input type = "text" name = "Email" placeholder ="Email" required /><br/><br/>
<label for="Qual">QUALIFICATION:</label>
<select name ="Qual" required >

<option value = "BSc I.T.">BSc</option>
<option value = "DIT">DIT</option>
<option value = "HCIT">HCIT</option>
</select>
<br/><br/>
<label for="cellphone">CELLPHONE:</label>
<input type = "text" name = "cellphone" placeholder = "Cell Number" required /><br/><br/>
<label>GENDER:</label>
<input type="radio" name="male" value="male"> MALE
<input type="radio" name="female" value="female"> FEMALE
<br/><br/>
<label for="Nationality">NATIONALITY: </label>
<select name ="Nationality" required ><br/><br/>
<option name = "option1"value = "South African">South African</option>
<option name = "option2" value = "other">Other</option>
</select>
<br/><br/>
<input type ="Reset" value = "CANCEL" class = "sty"/>
<input type="submit" name = "REGISTER" value = "REGISTER" class = "sty">
</form>
</body>
</html>
