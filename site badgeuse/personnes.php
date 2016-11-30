<?php
	include("connexion.php")
?>

<!DOCTYPE html>
<html>
 <head>
	<meta charset="utf-8" />
  	<link href="style/ocre.css" rel="stylesheet" type="text/css" />
	<title>badgeuse : personnes</title>

</head>
<body>
<!-- DEBUT de la page -->
<?php
	$connex = connexionPDO();
	require("header.php");
?>
	<section>
		<header>
					<h3>Personnes</h3>
		</header>
				<!--Affichage des 3 derniers pointages-->
				<ul id="badge-list">
<?php
		$sql = "SELECT id, nom, prenom FROM personnes";
		$res = $connex->query($sql);
		$res = $res->fetchAll(PDO::FETCH_ASSOC);

		foreach ($res as $val)
		{
			echo "<li class=\"badge\">";
			echo "<a href='profil.php?id=" . $val["id"] . "'>" . $val["nom"] . " " . $val["prenom"] . "</p>";
			echo "</li>";
		}
?>
				</ul>	
	</section>

	
<?php
	require("footer.php");
?>

</body>
</html>