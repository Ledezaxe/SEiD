<?php
	include("connexion.php")
?>

<!DOCTYPE html>
<html>
 <head>
	<meta charset="utf-8" />
  	<link href="style/ocre.css" rel="stylesheet" type="text/css" />
	<title>badgeuse</title>

</head>
<body>
<!-- DEBUT de la page -->
<?php
	$connex = connexionPDO();
	require("header.php");
?>
    
	<section>
		<header>
            Bienvenue
            <span class="ss-titre">Nous sommes le <?php echo date("j/n/Y"); ?></span>
            <h3>Les dernières 24 heures</h3>
		</header>
        
        <!--Affichage des dernieres 24h pointages-->
        <ul id="badge-list">
            <?php
                $sql = "SELECT nom, prenom, date FROM personnes, pointage WHERE pointage.id = personnes.id AND date > DATE_SUB(NOW(), INTERVAL 1 DAY) ORDER BY date DESC";
                $res = $connex->query($sql);
                $res = $res->fetchAll(PDO::FETCH_ASSOC);

                foreach ($res as $val)
                {
                    echo "<li class=\"badge\">";
                    echo "<h3>" . $val["date"] . "</h3>" . 
                    "<p>" . $val["nom"] . " " . $val["prenom"] . "</p>";
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