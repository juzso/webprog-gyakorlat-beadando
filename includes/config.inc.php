<?php
$ablakcim = array(
    'cim' => 'Mozi Portál'
    );
$fejlec = array(
    'kepforras' => 'logo.png',
    'kepalt' => 'Mozi logó',
    'cim' => 'Mozi Portál',
    'motto' => 'Magyar filmek és mozik adatbázisa.'
    );
$lablec = array(
    'copyright' => 'Copyright Ács András & Csányi Kristóf ',
    'ceg' => ''
    );

$oldalak = array(
    '/' => array('fajl' => 'fooldal', 'szoveg' => 'Főoldal', 'menun' => array(1,1)),
    'kepek' => array('fajl' => 'kepek', 'szoveg' => 'Képek', 'menun' => array(1,1)),
    'kapcsolat' => array('fajl' => 'kapcsolat', 'szoveg' => 'Kapcsolat', 'menun' => array(1,1)),
    'uzenetek' => array('fajl' => 'uzenetek', 'szoveg' => 'Üzenetek', 'menun' => array(0,1)),
    'crud' => array('fajl' => 'crud', 'szoveg' => 'CRUD', 'menun' => array(1,1)),
    'belepes' => array('fajl' => 'belepes', 'szoveg' => 'Belépés', 'menun' => array(1,0)),
    'kilepes' => array('fajl' => 'kilepes', 'szoveg' => 'Kilépés', 'menun' => array(0,1)),
    'belep' => array('fajl' => 'belep', 'szoveg' => '', 'menun' => array(0,0)),
    'regisztral' => array('fajl' => 'regisztral', 'szoveg' => '', 'menun' => array(0,0))
);
$hiba_oldal = array('fajl' => '404', 'szoveg' => 'A keresett oldal nem található!');

function db_connect() {
    $dbh = new PDO('mysql:host=localhost;dbname=', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
    return $dbh;
}
function h($s) { return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }
?>
