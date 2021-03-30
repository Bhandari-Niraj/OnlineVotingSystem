<?php
 if ($_GET['id']) {

 	require_once('class/candidate.php');
 	$candidate = new Candidate();

 	$candidate->id = $_GET['id'];

 	$status = $candidate->remove();\

 	header('location: list_candidate.php?msg=1');
 }

?>


