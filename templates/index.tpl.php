<?php session_start(); ?>
<?php if(file_exists('./logicals/'.$keres['fajl'].'.php')) { include("./logicals/{$keres['fajl']}.php"); } ?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= h($ablakcim['cim']) ?></title>
    <link rel="stylesheet" href="./styles/stilus.css?v=compact4" type="text/css">
    <?php if(file_exists('./styles/'.$keres['fajl'].'.css')) { ?><link rel="stylesheet" href="./styles/<?= h($keres['fajl']) ?>.css" type="text/css"><?php } ?>
    <script src="./scripts/ellenorzes.js" defer></script>
</head>
<body>
<header>
    <img src="./images/<?= h($fejlec['kepforras']) ?>" alt="<?= h($fejlec['kepalt']) ?>">
    <div>
        <h1><?= h($fejlec['cim']) ?></h1>
        <p><?= h($fejlec['motto']) ?></p>
        <?php if(isset($_SESSION['login'])) { ?>
            <p class="login-info">Bejelentkezett: <strong><?= h($_SESSION['csn'].' '.$_SESSION['un'].' ('.$_SESSION['login'].')') ?></strong></p>
        <?php } ?>
    </div>
</header>
<nav class="topnav">
    <ul>
        <?php foreach ($oldalak as $url => $oldal) { ?>
            <?php if((!isset($_SESSION['login']) && $oldal['menun'][0]) || (isset($_SESSION['login']) && $oldal['menun'][1])) { ?>
                <li<?= (($oldal == $keres) ? ' class="active"' : '') ?>><a href="<?= ($url == '/') ? '.' : '?'.$url ?>"><?= h($oldal['szoveg']) ?></a></li>
            <?php } ?>
        <?php } ?>
    </ul>
</nav>
<main id="content">
    <?php include("./templates/pages/{$keres['fajl']}.tpl.php"); ?>
</main>
<footer>&copy;&nbsp;<?= h($lablec['copyright']) ?> <?= h($lablec['ceg']) ?></footer>
</body>
</html>