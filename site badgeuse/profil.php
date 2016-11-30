<?php
	include("connexion.php")
?>

<!DOCTYPE html>
<html>
 <head>
	<meta charset="utf-8" />
  	<link href="style/ocre.css" rel="stylesheet" type="text/css" />
	<title>badgeuse : profil</title>

</head>
<body>
<!-- DEBUT de la page -->
<?php
	$connex = connexionPDO();
	require("header.php");
?>
	<section>
<?php
		$sql = "SELECT personnes.id, nom, prenom FROM personnes WHERE personnes.id = " . $_GET["id"];
		$res = $connex->query($sql);
		$res = $res->fetch(PDO::FETCH_ASSOC);
		echo "<header>
					<h3>" . $res["nom"] . " " . $res["prenom"] . "</h3>
		</header>";
		echo "<p>";
		echo "Numéro : " . $res["id"] . "\nNom : " . $res["nom"] . "\nPrenom : " . $res["prenom"];
		echo "</p></section><section>";

		$sql = "SELECT date FROM personnes, pointage WHERE personnes.id = pointage.id AND personnes.id = " . $_GET["id"];
		$res = $connex->query($sql);
		$res = $res->fetchAll(PDO::FETCH_ASSOC);

		echo "<header>pointage</header>";

		foreach ($res as $val)
			{
				echo "<tr>";
				echo "<td>" . $val["date"] . "</td>";
				echo "</tr>";
			}
?>	
	</section>

	
<?php
	require("footer.php");
?>

</body>
</html>