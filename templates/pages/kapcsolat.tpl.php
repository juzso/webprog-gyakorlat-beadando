<h2>Kapcsolat</h2>

<?php if ($siker) : ?>
    <div class="siker">
        <h3>Elküldött adatok</h3>

        <p>
            <strong>Név:</strong>
            <?= h($nev) ?>
        </p>

        <p>
            <strong>E-mail:</strong>
            <?= h($email) ?>
        </p>

        <p>
            <strong>Tárgy:</strong>
            <?= h($targy) ?>
        </p>

        <p>
            <strong>Üzenet:</strong>
            <?= nl2br(h($uzenet)) ?>
        </p>
    </div>
<?php endif; ?>

<?php if ($hibak) : ?>
    <ul class="hiba">
        <?php foreach ($hibak as $h) : ?>
            <li><?= h($h) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form id="kapcsolatForm" method="post" action="?kapcsolat" novalidate>
    <label>Név</label>
    <input
        type="text"
        name="nev"
        value="<?= h($_POST['nev'] ?? '') ?>"
    >

    <label>E-mail</label>
    <input
        type="text"
        name="email"
        value="<?= h($_POST['email'] ?? '') ?>"
    >

    <label>Tárgy</label>
    <input
        type="text"
        name="targy"
        value="<?= h($_POST['targy'] ?? '') ?>"
    >

    <label>Üzenet</label>
    <textarea name="uzenet" rows="6"><?= h($_POST['uzenet'] ?? '') ?></textarea>

    <input class="btn" type="submit" value="Üzenet küldése">
</form>