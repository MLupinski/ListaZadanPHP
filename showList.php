<?php
session_start();
$todayDate = date("Y-m-d");
require_once('HTML/header.html');
require_once('connect.php');
?>
<div class = "container inlist">
	<div class = "row">
		<div class = "col-xl">
			<h3>SPIS WSZYSTKICH LIST ZADAŃ</h3>
<?php

	$insQuery = "SELECT * FROM lists";
	$stmt = $dbh->prepare($insQuery);
	$stmt->execute();
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

	if(count($results) == true)
  {
    	foreach($results as $row)
      {
        $dayToEnd = (strtotime($row['DATE']) - strtotime($todayDate)) / (60*60*24);
        $dayToEnd = round($dayToEnd);

        if($dayToEnd <= 7)
        {
          echo '<table>
                  <thead>
                    <tr>
                      <th scope = "col">ID.</th>
                      <th scope = "col">Nazwa listy</th>
                      <th scope = "col">Data zakończenia</th>
                      <th scope = "col">Opcje</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>';
                    echo '<td>'.$row['ID'].'.</td>
                      <td>'.$row['NAME'].'</td>
                      <td style = "color: red;">!! '.$row['DATE'].' !!</td>';
                    echo "<td> <a style='color: green' href='list.php?id=".$row['ID']."'>Pokaż dane</a><br/>
                          <a style='color: #cc6600;' href='listedit.php?id=".$row['ID']."'>Edytuj liste</a><br/>
                          <a style='color: red;' href='listdelete.php?id=".$row['ID']."'].'>Usuń liste</a></td>";
          echo '		</tr>
                  </tbody>
                </table>';
        }
        else
        {
          echo '<table>
                  <thead>
                    <tr>
                      <th scope = "col">ID.</th>
                      <th scope = "col">Nazwa listy</th>
                      <th scope = "col">Data zakończenia</th>
                      <th scope = "col">Opcje</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>';
                    echo '<td>'.$row['ID'].'.</td>
                      <td>'.$row['NAME'].'</td>
                      <td>'.$row['DATE'].'</td>';
                    echo "<td> <a style='color: green' href='list.php?id=".$row['ID']."'>Pokaż dane</a><br/>
                          <a style='color: #cc6600;' href='listedit.php?id=".$row['ID']."'>Edytuj liste</a><br/>
                          <a style='color: red;' href='listdelete.php?id=".$row['ID']."'>Usuń liste</a><br/>
													<a style='color:blue;' href='generatePDF.php?id=".$row['ID']."'>Zapisz do PDF </a></td>";
          echo '		</tr>
                  </tbody>
                </table>';

        }
      }
      echo '<a class = "btn btn-info" href="index.php">Powrót</a>';
  }
  else
  {
    	echo '<div class="alert alert-info">
						<b>Aktualnie nie posiadasz żadnej listy zadań.</b><br/><br/>
						<a class = "btn btn-info" href="index.php">Powrót</a>
						</div>';
  }
?>
    </div>
  </div>
</div>
