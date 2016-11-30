<?php
include ("connexion.php");
$connex = connexionPDO();

//fonction numdansbase

if (isset($_POST["submit"]))
{

	if(NumDansBase($_POST["id"]))
		$AFF = "Numéro de carte déja utilisé, veuillez en changer.";
	else
	{
		$sql = "INSERT INTO personnes(id, nom, prenom) VALUES (" . $_POST["id"] . ",'" . $_POST["nom"] . "','" . $_POST["prenom"] . "');";
		$connex->exec($sql);
	}
}

?>
<!DOCTYPE html>
<html>
 <head>
	<meta charset="utf-8" />
  	<link href="style/ocre.css" rel="stylesheet" type="text/css" />
	<title>badgeuse : ajout</title>

</head>
<body>

<?php
	require("header.php");
?>
	<section>
		<header><h3>Ajout</h3></header>
		<?php
			if (isset($AFF))
				echo "<p>$AFF</p>";
		?>
        
        <div class="ajout">
			<form id="ajout" method="post" action="ajouter.php">
                <label for="edtId">Numéro de carte:</label>
                <input type="number" id="edtId" name="id" required /> </br>
                <label for="edtNom">Nom :</label>
                <input type="text" id="edtNom" name="nom" required /> </br>
                <label for="edtPrenom">Prenom :</label>
                <input type="text" id="edtPrenom" name="prenom" required /> </br>
                <input type="submit" id="btnSubmit" name="submit" value="Envoyer" />
            </form>
            <p>Merci de renseigner tous les champs.</p>
        </div>
	</section>

<?php
	require("footer.php");
?>

</body>
</html>
