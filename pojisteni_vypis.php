<?php
require('nastaveni.php');

use Evidence\Pojisteni\SpravcePojisteni;

$spravcePojisteni = new SpravcePojisteni();

if (isset($_GET['odstranit']))
    $spravcePojisteni->odstran($_GET['odstranit']);

$pojisteni = $spravcePojisteni->vratPojisteni();

$titulek = 'Pojisteni';
$popis = 'Výpis pojisteni.';
require('hlavicka.php');
?>
<h2>Výpis pojištění</h2>
<table class="table table-bordered table-responsive">

    <tr>
        <th>Pojištění</th>
        <th>částka</th>
        <th>Předmět pojištění</th>
        <th>Pojisteni od</th>
        <th>Pojisteni do</th>
        <th>Pojištěnec</th>
		<th></th>
    </tr>
    <?php foreach ($pojisteni as $pojistka) : ?>

        <tr>
            <td><?= htmlspecialchars($pojistka['pojisteni']) ?></td>
            <td><?= htmlspecialchars($pojistka['castka']) ?></td>
            <td><?= htmlspecialchars($pojistka['predmet_pojisteni']) ?></td>
            <td><?= htmlspecialchars($pojistka['pojisteni_od']) ?></td>
            <td><?= htmlspecialchars($pojistka['pojisteni_do']) ?></td>
            <td><?= htmlspecialchars($pojistka['jmeno']) . ' ' . htmlspecialchars($pojistka['prijmeni']) ?></td>
			<td><a href="pojisteni.php?editovat=<?= htmlspecialchars($pojistka['pojisteni_id']) ?>"><button type="button" class="btn btn-xs btn-default">Editovat</button></a>
			<a href="pojisteni_vypis.php?odstranit=<?= htmlspecialchars($pojistka['pojisteni_id']) ?>"><button type="button" class="btn btn-xs btn-danger">Odstranit</button></a></td>
        </tr>

    <?php endforeach ?>
</table>

<nav>
	<a class="btn btn-primary btn-sm" href="pojisteni.php">Nové pojištění</a>
</nav>

<?php require('paticka.php'); ?>
