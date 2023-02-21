<?php
require('nastaveni.php');

use Evidence\Pojistenci\SpravcePojistencu;

$spravcePojistencu= new SpravcePojistencu();

$pojistenec = array(
	'pojistenec_id' => '',
    'jmeno' => '',
    'prijmeni' => '',
    'email' => '',
    'telefon' => '',
    'adresa' => '',
    'mesto' => '',
    'psc' => '',
);

if ($_POST)
{
	if (!$_POST['pojistenec_id'])
        $spravcePojistencu->pridej($_POST['jmeno'], $_POST['prijmeni'], $_POST['email'], $_POST['telefon'], $_POST['adresa'], $_POST['mesto'], $_POST['psc']);
	else
        $spravcePojistencu->uprav($_POST['pojistenec_id'], $_POST['jmeno'], $_POST['prijmeni'], $_POST['email'], $_POST['telefon'], $_POST['adresa'], $_POST['mesto'], $_POST['psc']);
	header('Location: pojistenci_vypis.php');
	exit;
}

if (isset($_GET['editovat']))
{
	$nactenyPojistenec = $spravcePojistencu->nacti($_GET['editovat']);
	if ($spravcePojistencu)
        $pojistenec = $nactenyPojistenec;
}

$titulek = 'Správa pojistencu';
$popis = 'Přidávání a editace pojistencu do systému.';
require('hlavicka.php');
?>
    <h2>Nový pojištěnec</h2>
    <div class="container center">
        <form class="row g-3" method="post">
            <div class="col-md-6">
                <label class="form-label">Jméno</label>
                <input type="text" name="jmeno" value="<?= htmlspecialchars($pojistenec['jmeno']) ?>" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">Příjmení</label>
                <input type="text" name="prijmeni" value="<?= htmlspecialchars($pojistenec['prijmeni']) ?>" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="email" name="email" value="<?= htmlspecialchars($pojistenec['email']) ?>" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">Telefon</label>
                <input type="tel" name="telefon" value="<?= htmlspecialchars($pojistenec['telefon']) ?>" placeholder="Bez předvolby +420" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">Adresa</label>
                <input type="text" name="adresa" value="<?= htmlspecialchars($pojistenec['adresa']) ?>" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="form-label">Město</label>
                <input type="text" name="mesto" value="<?= htmlspecialchars($pojistenec['mesto']) ?>" class="form-control">
            </div>
            <div class="col-md-2">
                <label class="form-label">PSČ</label>
                <input type="text" name="psc" value="<?= htmlspecialchars($pojistenec['psc']) ?>" class="form-control">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Ulož pojistence</button>
            </div>
            <div class="col-md-6">
                <input type="hidden" name="pojistenec_id" value="<?= htmlspecialchars($pojistenec['pojistenec_id']) ?>" class="form-control">
            </div>
        </form>
    </div>

<?php
require('paticka.php');
?>
