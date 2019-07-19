<?php
session_start();
require_once('connect.php');

if(isset($_POST['showlist']))
{
  header('Location: showList.php');
}
elseif (isset($_POST['addlist']))
{
  if (empty($_POST['listName']) || empty($_POST['listTasks']) || empty($_POST['titles']) || empty($_POST['titlesNumber'])
  || empty($_POST['titlesBetween']) || empty($_POST['listDate']))
  {
    $_SESSION['ERROR'] = 1;
    header('Location: index.php');
  }
  else
  {
    $insQuery = "INSERT INTO lists (NAME, TODO, TITLES, TITLESNUM, TASKSBETWEEN, DATE) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $dbh->prepare($insQuery);
    $stmt->execute([$_POST['listName'], $_POST['listTasks'], $_POST['titles'], $_POST['titlesNumber'], $_POST['titlesBetween'], $_POST['listDate']]);

    $_SESSION['OK'] = 1;
    header('Location: index.php');
  }
}
else
{
  header('Location: example.php');
}

 ?>
