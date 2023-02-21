<?php
require('nastaveni.php');

use Evidence\Pojisteni\SpravcePojisteni;
use Evidence\Pojistenci\SpravcePojistencu;

$spravcePojisteni = new SpravcePojisteni();
$spravcePojistencu = new SpravcePojistencu();

$seznamPojistencu = $spravcePojistencu->vratSeznam();

$pojisteni = array(
	'pojisteni_id' => '',
	'pojisteni' => '',
	'castka' => '',
    'predmet_pojisteni' => '',
    'pojisteni_od' => '',
    'pojisteni_do' => '',
	'pojistenec_id' => '',
);

if ($_POST)
{
	if (!$_POST['pojisteni_id'])
        $spravcePojisteni->pridej($_POST['pojisteni'], $_POST['castka'], $_POST['predmet_pojisteni'], $_POST['pojisteni_od'], $_POST['pojisteni_do'], $_POST['pojistenec_id']);
	else
        $spravcePojisteni->uprav($_POST['pojisteni_id'], $_POST['pojisteni'], $_POST['castka'], $_POST['predmet_pojisteni'], $_POST['pojisteni_od'], $_POST['pojisteni_do'], $_POST['pojistenec_id']);
	header('Location: pojisteni_vypis.php');
	exit;
}

if (isset($_GET['editovat']))
{
	$nactenePojisteni = $spravcePojisteni->nacti($_GET['editovat']);
	if ($nactenePojisteni)
        $pojisteni = $nactenePojisteni;
}

$titulek = 'Správa pojisteni';
$popis = 'Přidávání a editace pojisteni do systému.';
require('hlavicka.php');
?>
<h2>Přidej pojištění</h2>
    <div class="container center">
        <form class="row g-3" method="post">
            <div class="col-md-12">
                <label class="form-label">Pojištění</label>
                <select class="form-control form-control-sm" name="pojisteni" value="<?= htmlspecialchars($pojisteni['pojisteni']) ?>" >
                    <option>Pojištění majetku</option>
                    <option>Životní pojištění</option>
                    <option>Pojisteni vozidel</option>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Částka</label>
                <input type="text" name="castka" value="<?= htmlspecialchars($pojisteni['castka']) ?>" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">Předmět pojištění</label>
                <input type="text" name="predmet_pojisteni" value="<?= htmlspecialchars($pojisteni['predmet_pojisteni']) ?>" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">Pojištění od:</label>
                <input type="date" name="pojisteni_od" value="<?= htmlspecialchars($pojisteni['pojisteni_od']) ?>" placeholder="Bez předvolby +420" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">Pojištění do:</label>
                <input type="date" name="pojisteni_do" value="<?= htmlspecialchars($pojisteni['pojisteni_do']) ?>" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">Pojištěnec:</label></br>
                <select name="pojistenec_id">
                    <option value="">Vyberte pojištěnce</option>
                    <?php foreach($seznamPojistencu as $polozka): ?>
                        <option value="<?= htmlspecialchars($polozka['pojistenec_id']) ?>" <?php if ($pojisteni['pojistenec_id'] == $polozka['pojistenec_id']) : ?>selected="selected"<?php endif ?>>
                            <?= htmlspecialchars($polozka['cele_jmeno']) ?>
                        </option>
                    <?php endforeach ?>
                </select><br />
            </div>
						<div class="col-12">
                <button type="submit" class="btn btn-primary">Odeslat</button>
            </div>
            <div class="col-md-6">
                <input type="hidden" name="pojisteni_id" value="<?= htmlspecialchars($pojisteni['pojisteni_id']) ?>" class="form-control">
            </div>
        </form>
    </div>

<?php
require('paticka.php');
?>
