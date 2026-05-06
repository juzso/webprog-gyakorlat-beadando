<?php
if(isset($_POST['felhasznalo'], $_POST['jelszo'], $_POST['vezeteknev'], $_POST['utonev'])) {
    $ujra = true;
    try {
        $dbh = db_connect();
        $sth = $dbh->prepare('SELECT id FROM felhasznalok WHERE bejelentkezes = :bejelentkezes');
        $sth->execute(array(':bejelentkezes' => $_POST['felhasznalo']));
        if($sth->fetch(PDO::FETCH_ASSOC)) { $uzenet = 'A felhasználói név már foglalt!'; }
        else {
            $stmt = $dbh->prepare('INSERT INTO felhasznalok(id, csaladi_nev, uto_nev, bejelentkezes, jelszo) VALUES(0, :csn, :un, :login, sha1(:jelszo))');
            $stmt->execute(array(':csn'=>$_POST['vezeteknev'], ':un'=>$_POST['utonev'], ':login'=>$_POST['felhasznalo'], ':jelszo'=>$_POST['jelszo']));
            $uzenet = 'A regisztráció sikeres. Most már be lehet lépni.'; $ujra = false;
        }
    } catch (PDOException $e) { $uzenet = 'Hiba: '.$e->getMessage(); }
} else { header('Location: .'); exit; }
?>