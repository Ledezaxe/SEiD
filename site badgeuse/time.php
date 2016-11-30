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
            <h3>
                <?php

                if(!empty($_GET['cat']))
                {
                    if($_GET['cat'] == "WEEK")
                    {  
                        echo "<h3>La semaine courante</h3>";
                    }
                    else if($_GET['cat'] == "MONTH")
                    {
                        echo "<h3>Le mois courant</h3>";
                    }
                    else
                    {
                        echo "<h3>L'année courante</h3>";
                    }
                }
                ?>
            </h3>		
        </header>
        
        <article>
            <div class="time">
                <h4>Nom</h4>
                <h4>Prenom</h4>
                <h4>Date</h4>
            </div>
<?php
if(!empty($_GET['cat']))
{
    $sql = "SELECT nom, prenom, date FROM personnes, pointage WHERE pointage.id = personnes.id AND date > DATE_SUB(NOW(), INTERVAL 1 $_GET[cat])  ORDER BY date DESC";
    $res = $connex->query($sql);
    $res = $res->fetchAll(PDO::FETCH_ASSOC);
    
    $rpr = 0;

    foreach ($res as $val)
    {
        if($rpr == 0)
        {
            echo '<div class="time">';
            echo '<p>' . $val["nom"] . '</p>' . '<p>' . $val["prenom"] . '</p><p class="date">' . $val["date"] . '</p>';
            echo '</div>';
            
            $rpr++;
        }
        else
        {
            echo '<div class="time" id="time1">';
            echo '<p>' . $val["nom"] . '</p>' . '<p>' . $val["prenom"] . '</p><p class="date">' . $val["date"] . '</p>';
            echo '</div>';
            
            $rpr--;
        }
        
    }
}
?>
        </article>	
	</section>

	
<?php
	require("footer.php");
?>

</body>
</html>