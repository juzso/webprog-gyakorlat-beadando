<h2>Belépés / Regisztráció</h2>

<div class="ket-oszlop">
    <section class="doboz">
        <h3>Belépés</h3>

        <form action="?belep" method="post">
            <label>Felhasználónév</label>
            <input type="text" name="felhasznalo" required>

            <label>Jelszó</label>
            <input type="password" name="jelszo" required>

            <input class="btn" type="submit" value="Belépés">
        </form>

        <p class="muted">Teszt: teszt / teszt1234</p>
    </section>

    <section class="doboz">
        <h3>Regisztráció</h3>

        <form action="?regisztral" method="post">
            <label>Vezetéknév</label>
            <input type="text" name="vezeteknev" required>

            <label>Utónév</label>
            <input type="text" name="utonev" required>

            <label>Felhasználónév</label>
            <input type="text" name="felhasznalo" required>

            <label>Jelszó</label>
            <input type="password" name="jelszo" required>

            <input class="btn" type="submit" value="Regisztráció">
        </form>
    </section>
</div>