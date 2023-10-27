<?php
/*
Description: Using a session variable we find and display the user's information (Fee's 
details)
*/
include "configfile.php";
session_start();
$var = $_SESSION["user_name"];
?>
<!DOCTYPE html>
<html>
<head>
<style>
tr , td {
 border: 1px solid black;
background-color:#367EA8;
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
//sql to find the ID of the user
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
//we use the ID to get the relavent information
$result = mysqli_query($connectToDb, "SELECT student_reg.STID,
student_reg.FIRSTNAME, 
student_info.STD_BALANCE,
student_info.DUE_DATE
FROM student_reg, student_info
WHERE '$Student_ID' = student_reg.STID AND '$Student_ID' = student_info.ID");
echo "<table border='1'>
<tr>
<th >StudentID</th>
<th>Student name</th>
<th>Balance</th>
<th>Due date</th>
</tr>";
while($row = mysqli_fetch_array($result))

{
echo "<tr>";
echo "<td>". $row['STID']."</td>";
echo "<td>" . $row['FIRSTNAME'] . "</td>";
echo "<td>" . $row['STD_BALANCE'] . "</td>";
echo "<td>".$row['DUE_DATE']."</td>";
echo "</tr>";
echo "<tr>";
echo "<td colspan = '3'>";
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