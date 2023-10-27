<!DOCTYPE html>
<html>
<?php
/*
Description: Using a session variable we find and display the user's information (Fee's 
details)*/
include "configfile.php";
session_start();
$var = $_SESSION["user_name"];
?>
<!DOCTYPE html>
<html>
<head>
<style>
tr , th , td {
 border: 1px solid black;
 text-align: center;
}
table{

border-collapse: collapse;
width:100%;
}
th{
background-color: #f1f1f1;
}
</style>
</head>
<body>
<?php
//gets the ID that matches the username
$getID = "SELECT STID FROM student_reg WHERE '$var' = USERNAME";
$runSQL = mysqli_query($connectToDb, $getID);
if(mysqli_num_rows($runSQL)>0)
{
while($row = mysqli_fetch_assoc($runSQL)){
$Student_ID = $row['STID'];
}
}else{
die("error with user ID, Please contact admin as soon as possible");
}
//find relavent information and pulls it from the table
$result = mysqli_query($connectToDb, "SELECT * FROM student_res WHERE ID = $Student_ID");
echo "<table border='1'>
<tr>

<th>StudentID</th>
<th>Student name</th>
<th>Module</th>
<th>Results</th>
</tr>
<tr><td>".$Student_ID."</td> <td>$var</td></tr>
";
//displaying data in a table
while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td></td>";
echo "<td></td>";
echo "<td> <center>" . $row['MODULE'] . " </center> </td>";
echo "<td> <center>" . $row['FINAL_MARK']."</center> </td>"; 
echo "</tr>";
}
echo "<tr>";
echo "<td ><button name = 'req'>RESQUEST ACADEMIC RECORD</button></td>";
echo "<td></td> <td></td> <td> <form method = POST>
<button name='go_back'>RETURN</button>
</form>"; 
echo "</td>";
echo "</tr>";
echo "</table>";
mysqli_close($connectToDb);
if(isset($_POST["go_back"]))
{
header('location: Q3.php');

}else if(isset($_POST['req']))
{
//details for sending an email
$to = 'Vidur360@gmail.com';
$subject = 'request academic record for '.$var;
$message = 'Please end the academic record';
$headers = 'From The Sender Name <Vidur360@gmail.com>\r\n';
$headers = "Reply-To: replyto@Vidur360@gmail.com\r\n";
$headers = "Content-type: text/html\r\n";
//send mail - built in php function
mail($to, $subject, $message, $headers);
}
?>
</body>
</html>
