<?php
include("base/sql_abstract.php");

$number = "debut";

while ($number != -1)
	{
		fscanf(STDIN, "%d\n", $number); // lit un nombre sur l'entree standard
		if ($number != -1)
			sql_abstract("INSERT INTO `babtou`.`pointage` (`id`, `date`) VALUES ('" . $number . "', CURRENT_TIMESTAMP);");
	}

?>