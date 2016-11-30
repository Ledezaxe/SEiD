<?php
include ("connexion.php");
?>

<!DOCTYPE html>
<html>
 <head>
	<meta charset="utf-8" />
  	<link href="style/ocre.css" rel="stylesheet" type="text/css" />
	<title>Badgeuse : recherche</title>

</head>
<body>

<?php
	$connex = connexionPDO();
	require("header.php");
?>

<section>
<?php
	if (isset($_POST["query"]))
	{
		$sql = "SELECT nom, prenom FROM personnes WHERE nom LIKE '%" . addslashes($_POST["query"]) . "%' OR prenom LIKE '%" . addslashes($_POST["query"]) . "%';";
		$res = $connex->query($sql);
		$res = $res->fetchAll(PDO::FETCH_ASSOC);
		if (!empty($res))
		{
			echo "<header><h3>Recherche</h3></header>";
			echo "<ul id=\"badge-list\">";
			foreach ($res as $val)
			{
				echo "<li class=\"product\">";
				echo "<h3>" . $val["nom"] . " " . $val["prenom"] . "</p>";
				echo "</li>";
			} 
			echo "</ul>";
		}
		else
		{
			echo "<div id=\"no-result\">";
			echo "<header>OOPS !</header>";
			echo "<img src=\"images/erreur.png\" alt=\"erreur introuvable\">";
			echo "<p><strong>Aucune personnes ne correspond à votre recherche !</strong></p></div>";
		}
	}
	else
		header("Location: index.php");
?>
</section>
	
<?php
	require("footer.php");
?>

</body>
</html>