<?php
$hibak = array(); $siker = false;
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nev = trim($_POST['nev'] ?? ''); $email = trim($_POST['email'] ?? ''); $targy = trim($_POST['targy'] ?? ''); $uzenet = trim($_POST['uzenet'] ?? '');
    if(mb_strlen($nev) < 3) $hibak[] = 'A név legalább 3 karakter legyen.';
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) $hibak[] = 'Hibás e-mail cím.';
    if(mb_strlen($targy) < 3) $hibak[] = 'A tárgy legalább 3 karakter legyen.';
    if(mb_strlen($uzenet) < 10) $hibak[] = 'Az üzenet legalább 10 karakter legyen.';
    if(!$hibak) {
        try {
            $felhasznalo = isset($_SESSION['login']) ? $_SESSION['csn'].' '.$_SESSION['un'] : 'Vendég';
            $dbh = db_connect();
            $stmt = $dbh->prepare('INSERT INTO uzenetek(nev,email,targy,uzenet,felhasznalo) VALUES(:nev,:email,:targy,:uzenet,:felhasznalo)');
            $stmt->execute(array(':nev'=>$nev, ':email'=>$email, ':targy'=>$targy, ':uzenet'=>$uzenet, ':felhasznalo'=>$felhasznalo));
            $siker = true;
        } catch(PDOException $e) { $hibak[] = 'Adatbázis hiba: '.$e->getMessage(); }
    }
}
?>
