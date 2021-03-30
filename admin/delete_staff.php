<?php
 if ($_GET['id']) {
 	$id = $_GET['id'];

 	require_once('class/staff.php');
 	$staff = new Staff();
 	$staff->id = $id;
 	$status = $staff->remove();

 	header('location: view_staff.php?msg=1');

 }


?>