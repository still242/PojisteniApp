<?php
require('nastaveni.php');

use Evidence\Pojistenci\SpravcePojistencu;

$spravcePojistencu = new SpravcePojistencu();

if (isset($_GET['id']))
{
    $profilPojistenec = $spravcePojistencu->nacti($_GET['id']);
    if ($profilPojistenec)
        $pojistenec = $profilPojistenec;
}

$titulek = 'Profil pojištěnce';
$popis = 'Zobrazení profilu pojištěnce.';
require('hlavicka.php');
?>
    <h2>Profil pojištěnce <?= htmlspecialchars($pojistenec['jmeno']) . ' ' . htmlspecialchars($pojistenec['prijmeni']) ?></h2>
    <div class="container center">
        <form class="row g-3" method="post">
            <div class="col-md-6">
                <label class="form-label">Jméno</label>
                <input type="text" readonly name="jmeno" value="<?= htmlspecialchars($pojistenec['jmeno']) ?>" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">Příjmení</label>
                <input type="text" readonly name="prijmeni" value="<?= htmlspecialchars($pojistenec['prijmeni']) ?>" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="text" readonly name="email" value="<?= htmlspecialchars($pojistenec['email']) ?>" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">Telefon</label>
                <input type="tel" readonly name="telefon" value="<?= htmlspecialchars($pojistenec['telefon']) ?>" placeholder="Bez předvolby +420" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">Adresa</label>
                <input type="text" readonly name="adresa" value="<?= htmlspecialchars($pojistenec['adresa']) ?>" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="form-label">Město</label>
                <input type="text" readonly name="mesto" value="<?= htmlspecialchars($pojistenec['mesto']) ?>" class="form-control">
            </div>
            <div class="col-md-2">
                <label class="form-label">PSČ</label>
                <input type="text" readonly name="psc" value="<?= htmlspecialchars($pojistenec['psc']) ?>" class="form-control">
            </div>
        </form>

<?php
require('paticka.php');
?>