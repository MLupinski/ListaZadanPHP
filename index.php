<?php
session_start();
require_once('HTML/header.html');
?>
		<div class = "container in">
			<div class = "row">
				<div class = "col-xl">
					<h3>Tworzenie Listy Zadań</h3>
					<?php
						if(!empty($_SESSION['OK']))
            {
							echo '<div class="alert alert-success" role="alert">
											<b>Lista dodana do bazy.</b>
										</div>';
              session_destroy();
            }
						elseif (!empty($_SESSION['ERROR']))
						{
							echo '<div class="alert alert-danger" role="alert">
											<b>Musisz wypełnić wszystkie pola.</b>
										</div>';
							session_destroy();
						}
					?>
					<form action="checkSubmit.php" method="post">
						<label class="lab">Nazwa Listy: </label>
						<input type="text" name="listName"/>

						<label class="lab">Data ukończenia zadań: </label>
						<input type="date" name="listDate"/>

						<label class="lab">Zadania (po przecinku): </label>
						<textarea name="listTasks"></textarea>

						<label class="lab">Ilość nagłówków: </label>
						<input type="number" name="titlesNumber"/>

						<label class="lab">Nagłówki (po przecinku): </label>
						<textarea name="titles"></textarea>

						<label class="lab">Co ile zadań nagłówek: </label>
						<input type="number" name="titlesBetween"/>
						<br/><br/>
						<input type="submit" name="addlist" value="Utwórz listę" />
						<input type="submit" name="showlist" value="Wyświetl listy" />
						<input type="submit" name="examplelist" value="Przykład" />
					</form>
				</div>
			</div>
		</div>



	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	</body>
