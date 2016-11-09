<?php
// Changer ces valeurs selon votre configuration de systeme de base de donnée.
$host='localhost';
$base='obat';
$user='root';
$pass='lsdtmearbt';
// Configuration interne de Obat
try {
	$bdd = new PDO("mysql:host=$host;dbname=$base;charset=utf8", $user, $pass);
} catch (PDOException $e) {
    die('Connexion échouée : ' . $e->getMessage());
}
