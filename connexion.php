<?php

try
{
    $db = new PDO('mysql:host=localhost:3306;dbname=combats;charset=utf8', 'root', '');$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch( Exception $e )
{
    die( 'Erreur : ' . $e->getMessage());
}