<!DOCTYPE html>
<html>
<?php
/*
Description: Using a session variable we find and display the user's information (Attendance 
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
//basic SQL that uses the student ID to pull data from two tables

$result = mysqli_query($connectToDb, "SELECT student_reg.FIRSTNAME,
student_info.ATTENDANCE 
FROM student_reg, student_info
WHERE '$Student_ID' = student_reg.STID AND '$Student_ID' = student_info.ID");
echo "<table border='1'>
<tr>
<th>StudentID</th>
<th>Student name</th>
<th>Attendance</th>
</tr>";
while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td> <center>". $Student_ID."</center></td>";
echo "<td> <center>" . $row['FIRSTNAME'] . " </center> </td>";
echo "<td> <center>" . $row['ATTENDANCE']."%". "</center> </td>";
echo "</tr>";
echo "<tr>";
echo "<td colspan = '2'>";
echo "</td>";
echo "<td>";
echo"<form method = POST>
<button name='go_back'>RETURN</button>
</form>"; 
echo "</td>";
echo "</tr>";

}
echo "</table>";
mysqli_close($connectToDb);
if(isset($_POST["go_back"]))
{
header('location: Q3.php');
}
?>
</body>
</html>
