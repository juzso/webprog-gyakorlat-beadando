<h2>Képgaléria</h2>

<?php if ($upload_uzenet) : ?>
    <p class="siker"><?= h($upload_uzenet) ?></p>
<?php endif; ?>

<?php if (isset($_SESSION['login'])) : ?>
    <form method="post" enctype="multipart/form-data" class="doboz">
        <label>Új kép feltöltése</label>
        <input type="file" name="kep">

        <input class="btn" type="submit" value="Feltöltés">
    </form>
<?php else : ?>
    <p class="muted">
        Új képet csak bejelentkezett felhasználó tölthet fel.
    </p>
<?php endif; ?>

<div class="galeria">
    <?php foreach (glob('./images/gallery/*.{jpg,jpeg,png,gif}', GLOB_BRACE) as $kep) : ?>
        <figure>
            <img src="<?= h($kep) ?>" alt="Galéria kép">
            <figcaption><?= h(basename($kep)) ?></figcaption>
        </figure>
    <?php endforeach; ?>
</div>