<?php
try
{
    $GLOBALS['bdd'] = new PDO('mysql:host=localhost;dbname=butterfly', 'dezaxe', 'azerty', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>