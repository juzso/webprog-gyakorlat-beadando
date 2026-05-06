<h2>Üzenetek</h2>

<?php if (!isset($_SESSION['login'])) : ?>
    <p class="hiba">
        Az üzenetek megtekintéséhez be kell jelentkezni.
    </p>
<?php else : ?>
    <?php
    try {
        $dbh = db_connect();

        $sorok = $dbh
            ->query('SELECT * FROM uzenetek ORDER BY kuldes_ideje DESC')
            ->fetchAll(PDO::FETCH_ASSOC);
    ?>

        <table>
            <tr>
                <th>Idő</th>
                <th>Küldő</th>
                <th>Név</th>
                <th>E-mail</th>
                <th>Tárgy</th>
                <th>Üzenet</th>
            </tr>

            <?php foreach ($sorok as $s) : ?>
                <tr>
                    <td><?= h($s['kuldes_ideje']) ?></td>
                    <td><?= h($s['felhasznalo']) ?></td>
                    <td><?= h($s['nev']) ?></td>
                    <td><?= h($s['email']) ?></td>
                    <td><?= h($s['targy']) ?></td>
                    <td><?= nl2br(h($s['uzenet'])) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

    <?php
    } catch (PDOException $e) {
    ?>
        <p class="hiba"><?= h($e->getMessage()) ?></p>
    <?php
    }
    ?>
<?php endif; ?>