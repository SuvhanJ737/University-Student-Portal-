<?php
/*
(Registration page), connects with the 
database and allows a user to submit their information to the 
database, 
registering them on the system. 
*/
if(isset($_POST["REGISTER"]))
{
$userName = $_POST["username"];
$pass1 = $_POST["Password"];
$pass2 = $_POST["confirmPword"];
$fName = $_POST["firstname"];
$sName = $_POST["surname"];
$qual = $_POST["Qual"];
//$qual2 = $qual;
$email = $_POST["Email"];
$cell = $_POST["cellphone"];
if(isset($_POST['male'])){
$gender = "MALE";
}else{
$gender = "FEMALE";
}
$nationality = $_POST["Nationality"];

$bflag1 = false;
$bflag2 = false;
//password validation
if($pass1 == $pass2){
$bflag1 = true;
}
//Php built in email vailidation
if(filter_var($email, FILTER_VALIDATE_EMAIL)){
$bflag2 = true;
}else{
$bflag2 = false;
echo "Email address is invalid";
}
//if data entered is valid then 
if($bflag1 == true && $bflag2 == true){
//sql to insert is executed
$sql = "INSERT INTO student_reg(USERNAME, PSSWORD, 
CONFIRMPASSWORD, FIRSTNAME, SURNAME, EMAIL,QUALIFICATION, CELL_NUMBER, GENDER, 
NATIONALITY)
VALUES('$userName', '$pass1','$pass2', '$fName', '$sName','$email', 
'$qual', '$cell', '$gender', '$nationality');";
mysqli_query($connectToDb, $sql);
}else
{
echo("<h3> <center>Error: Passwords do not match or email is 
invalid </center></h3>");
}
}
?>