<?php if (isset($errormessage)) : ?>
    <p class="hiba"><?= h($errormessage) ?></p>
<?php else : ?>
    <p class="siker">Sikeres belépés.</p>
<?php endif; ?>

<p>
    <a class="btn" href=".">Tovább</a>
</p>