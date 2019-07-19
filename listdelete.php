<?php
require_once('connect.php');
$id = $_GET['id'];

$insQuery = "DELETE FROM lists WHERE ID = :id";
$stmt = $dbh->prepare($insQuery);
$stmt->bindParam(':id', $id);
$stmt->execute();

$_SESSION['DEL'] = 1;
header('Location: showList.php');
