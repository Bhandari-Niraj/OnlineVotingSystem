<?php

$staff_id = $_POST['id'];
$conn = new mysqli('localhost', 'root', '', 'db_election');
if ($conn->connect_errno != 0) {
	die('Error on database Connection');
} 

if ($conn->connect_errno == 0) 
{

$sql = "Select * from tbl_staff where staff_id = '$staff_id' ";

$res = $conn->query($sql);


if ($res->num_rows == 1) {
	echo "Staff Id Already Used.";
}else{
	echo "Staff Id Available.";
}

}
?>


