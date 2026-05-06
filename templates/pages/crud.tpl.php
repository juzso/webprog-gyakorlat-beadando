<h2>Film CRUD</h2>

<?php if ($crud_uzenet) : ?>
    <p class="siker"><?= h($crud_uzenet) ?></p>
<?php endif; ?>

<?php
try {
    $dbh = db_connect();
    $szerkeszt = null;

    if (isset($_GET['szerkeszt'])) {
        $st = $dbh->prepare('SELECT * FROM film WHERE id = :id');
        $st->execute([
            ':id' => (int) $_GET['szerkeszt']
        ]);
        $szerkeszt = $st->fetch(PDO::FETCH_ASSOC);
    }
?>

<form method="post" action="?crud" class="doboz">
    <input
        type="hidden"
        name="crud_muvelet"
        value="<?= $szerkeszt ? 'modosit' : 'uj' ?>"
    >

    <?php if ($szerkeszt) : ?>
        <input type="hidden" name="id" value="<?= h($szerkeszt['id']) ?>">
    <?php endif; ?>

    <label>Cím</label>
    <input
        type="text"
        name="cim"
        value="<?= h($szerkeszt['cim'] ?? '') ?>"
    >

    <label>Év</label>
    <input
        type="number"
        name="ev"
        value="<?= h($szerkeszt['ev'] ?? '') ?>"
    >

    <label>Hossz (perc)</label>
    <input
        type="number"
        name="hossz"
        value="<?= h($szerkeszt['hossz'] ?? '') ?>"
    >

    <input
        class="btn"
        type="submit"
        value="<?= $szerkeszt ? 'Módosítás mentése' : 'Új film felvétele' ?>"
    >

    <?php if ($szerkeszt) : ?>
        <a class="btn masodlagos" href="?crud">Mégse</a>
    <?php endif; ?>
</form>

<?php
    $filmek = $dbh
        ->query('SELECT * FROM film ORDER BY id DESC')
        ->fetchAll(PDO::FETCH_ASSOC);
?>

<table>
    <tr>
        <th>ID</th>
        <th>Cím</th>
        <th>Év</th>
        <th>Hossz</th>
        <th>Művelet</th>
    </tr>

    <?php foreach ($filmek as $f) : ?>
        <tr>
            <td><?= h($f['id']) ?></td>
            <td><?= h($f['cim']) ?></td>
            <td><?= h($f['ev']) ?></td>
            <td><?= h($f['hossz']) ?> perc</td>
            <td>
                <a href="?crud&szerkeszt=<?= h($f['id']) ?>">Szerkeszt</a>
                |
                <a
                    onclick="return confirm('Biztosan törlöd?')"
                    href="?crud&torol=<?= h($f['id']) ?>"
                >
                    Töröl
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php
} catch (PDOException $e) {
?>
    <p class="hiba">Adatbázis hiba: <?= h($e->getMessage()) ?></p>
<?php
}
?>