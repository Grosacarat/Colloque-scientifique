<?php

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

<head>
	<title>sans titre</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.38" />
</head>

<body>
	
	<!-- CSS -->
	<style>
		h2.php{color: darkcyan; text-align: center; margin-top: 95px}
		p{color: black; text-align: center;}
		input[type=submit]{border-style: ridge; border-width: 5px; border-color: darkcyan; background-image: linear-gradient(to bottom, darkcyan, black); cursor: pointer; margin-left: 690px; color: white}
		input[type=text]{border-style: ridge; border-width: 3px; border-color: darkcyan;}
		select{border-style: ridge; border-width: 3px; border-color: darkcyan;}
		body{background-image: url("./image/cadre1.png"); background-repeat: no-repeat; background-position: center;}
		p.oui{text-align: center; color: darkcyan;}
		p.non{text-align: center; color: red;}
	</style>
	
	<br><br><br><br>
	
	
	<!-- INSCRIPTION -->
	<h2 class="php">Inscription pour la conférence débat</h2>
	
	<form action="projet.php" method="GET">
	
	<p><label for="nom">Nom :</label>
	<input type="text" id="nom" name="nom"></p>
	
	<p><label for="prénom">Prénom :</label>
	<input type="text" id="prénom" name="prénom"></p>
	
	<p><label for="organisation">Organisation :</label>
	<input type="text" id="organisation" name="organisation"></p>
	
	<p><label for="email">Adresse mail :</label>
	<input type="text" id="email" name="email"></p>
	
	<p><label for="date1">Date :</label>
	<select id="date1" name="date1">
    <?php
    for ($i = 1; $i <= 31; $i++) {
      echo '<option value="'.$i.'">'.$i.'</option>';}
    ?>
    </select>
    
    <label for="date2">/</label>
	<select id="date2" name="date2">
    <?php
    for ($i = 1; $i <= 12; $i++) {
      echo '<option value="'.$i.'">'.$i.'</option>';}
    ?>
    </select>
    
    <label for="heure">L'heure d'arrivé :</label>
	<select id="heure" name="heure">
    <?php
    for ($i = 00; $i <= 23; $i++) {
      echo '<option value="'.$i.'">'.$i.'</option>';}
    ?>
    </select>
    
    <label for="minute">h</label>
	<select id="minute" name="minute">
    <?php
    for ($i = 00; $i <= 59; $i++) {
      echo '<option value="'.$i.'">'.$i.'</option>';}
    ?>
    </select>
    </p>
	<br>
	<input type="submit" name="valider" value="   Confirmer   ">
	</form>
	
	    	<?php
	if ($_SERVER['REQUEST_METHOD'] === 'GET') {
		if (isset($_GET['valider'])) {
			$nom = $_GET['nom'];
			$prénom = $_GET['prénom'];
			$organisation = $_GET['organisation'];
			$email = $_GET['email'];
			$date1 = $_GET['date1'];
			$date2 = $_GET['date2'];
			$heure = $_GET['heure'];
			$minute = $_GET['minute'];
			echo "<p class='oui'>Inscription terminer</p>";
		}
		else {
			echo "<p class='non'>veuillez remplir tout les champs</p>";
		}
	}
	?>


<!-- Liste des participants -->
<?php

session_start();
$participants = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nom = $_POST['nom'];

  $participants[] = $nom;

  $_SESSION['participants'] = $participants;
}



session_start(); 
$participants = $_SESSION['participants']; 

if (isset($participants) && count($participants) > 0) {
  echo "<ul>";
  foreach ($participants as $nom) {
    echo "<li>$nom</li>";
  }
  echo "</ul>";
} else {
  echo "Aucun participant enregistré.";
}
?>



</body>

</html>
