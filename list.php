<?php
require_once('HTML/header.html');
require_once('connect.php');
?>

<div class = "container inshow">
	<div class = "row">
		<div class = "col-xl">
<?php
$id = $_GET['id'];

$insQuery = "SELECT * FROM lists where ID = :id";
$stmt = $dbh->prepare($insQuery);
$stmt->bindParam(':id', $id);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(count($results) == true)
{
    foreach($results as $row)
    {
      $title = $row['TASKSBETWEEN'] + 1;
      $titles = explode(',', $row['TITLES']);
      $todo = explode(',', $row['TODO']);
      echo '<h1>'.$row['NAME'].'</h1>
            <hr/ style="background-color: red;">';
      for ($z = 0, $i = 0,  $j = 0; $i < count($todo); $z++)
      {
        if ($z % $title == 0)
        {
          echo '<h3>'.$titles[$j].'</h3><br/>';
          $j++;
        }
        else
        {
          echo '<p>'.$todo[$i].'</p>';
          $i++;
        }
      }
    }          
}
else
{
    echo 'Wystąpił błąd z połączeniem.';
}
?>
    </div>
  </div>
</div>
