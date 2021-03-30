<?php
  if ($_GET['id']) {
  	$id = $_GET['id'];

  	require_once('class/election.php');
  	$election = new Election();
  	$election->id = $id;

  	$election->remove();

  	header('location: list_election.php?msg=1');
  }
?>