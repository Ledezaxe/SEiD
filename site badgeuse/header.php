<?php
session_start();
?>

<header  class="entete">
	
	<h1><a href="index.php">Bienvenue</a></h1>
	
	<form id="search" action="recherche.php" method="post" enctype="multipart/form-data">
			<p>
				<label for="searchText">Rechercher :</label>
				<input id="searchText" name="query" type="text" value="" />
				<input id ="searchBtn" type="submit" class="bouton" value="OK" />
			</p>
		</form>
	
	
		<nav id="menu-categorie">
		<ul>
			<li class="smenu"><a href="time.php?cat=WEEK">la semaine courante</a></li>
			<li class="smenu"><a href="time.php?cat=MONTH">le mois courant</a></li>
			<li class="smenu"><a href="time.php?cat=YEAR">l'année courante</a></li>
			<li class="smenu"><a href="personnes.php">toutes les personnes</a></li>
		</ul>
		</nav>
</header>

<?php
	if (isset($aff))
		unset($aff);
?>