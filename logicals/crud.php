<?php
$crud_uzenet = '';
try {
    $dbh = db_connect();
    if(isset($_GET['torol'])) { $st=$dbh->prepare('DELETE FROM film WHERE id=:id'); $st->execute(array(':id'=>(int)$_GET['torol'])); $crud_uzenet='A film törölve lett.'; }
    if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['crud_muvelet'])) {
        $cim=trim($_POST['cim']??''); $ev=(int)($_POST['ev']??0); $hossz=(int)($_POST['hossz']??0);
        if($cim=='' || $ev<1900 || $hossz<1) $crud_uzenet='Hibás adatok.';
        elseif($_POST['crud_muvelet']==='uj') { $st=$dbh->prepare('INSERT INTO film(cim,ev,hossz) VALUES(:cim,:ev,:hossz)'); $st->execute(array(':cim'=>$cim, ':ev'=>$ev, ':hossz'=>$hossz)); $crud_uzenet='Új film létrehozva.'; }
        elseif($_POST['crud_muvelet']==='modosit') { $st=$dbh->prepare('UPDATE film SET cim=:cim, ev=:ev, hossz=:hossz WHERE id=:id'); $st->execute(array(':cim'=>$cim, ':ev'=>$ev, ':hossz'=>$hossz, ':id'=>(int)$_POST['id'])); $crud_uzenet='Film módosítva.'; }
    }
} catch(PDOException $e) { $crud_uzenet='Adatbázis hiba: '.$e->getMessage(); }
?>