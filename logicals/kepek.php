<?php
$upload_uzenet = '';
if($_SERVER['REQUEST_METHOD']==='POST' && isset($_FILES['kep'])) {
    if(!isset($_SESSION['login'])) { $upload_uzenet = 'Képfeltöltéshez be kell jelentkezni.'; }
    elseif($_FILES['kep']['error'] !== UPLOAD_ERR_OK) { $upload_uzenet = 'A feltöltés nem sikerült.'; }
    else {
        $engedelyezett = array('image/jpeg'=>'jpg','image/png'=>'png','image/gif'=>'gif');
        $mime = mime_content_type($_FILES['kep']['tmp_name']);
        if(!isset($engedelyezett[$mime])) { $upload_uzenet = 'Csak JPG, PNG vagy GIF kép tölthető fel.'; }
        elseif($_FILES['kep']['size'] > 2*1024*1024) { $upload_uzenet = 'A kép legfeljebb 2 MB lehet.'; }
        else {
            $ujnev = 'feltoltes_'.time().'_'.mt_rand(1000,9999).'.'.$engedelyezett[$mime];
            $cel = './images/gallery/'.$ujnev;
            if(move_uploaded_file($_FILES['kep']['tmp_name'], $cel)) {
                try { $dbh=db_connect(); $st=$dbh->prepare('INSERT INTO kepek(fajlnev, eredeti_nev, felhasznalo) VALUES(:f,:e,:u)'); $st->execute(array(':f'=>$ujnev, ':e'=>$_FILES['kep']['name'], ':u'=>$_SESSION['login'])); } catch(Exception $e) {}
                $upload_uzenet = 'A kép feltöltése sikeres.';
            } else { $upload_uzenet = 'Nem sikerült menteni a képet.'; }
        }
    }
}
?>
