<h2>Regisztráció eredménye</h2>

<p class="<?= empty($ujra) ? 'siker' : 'hiba' ?>">
    <?= h($uzenet ?? '') ?>
</p>

<p>
    <a class="btn" href="?belepes">Belépés oldal</a>
</p>