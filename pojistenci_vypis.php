<?php
require('nastaveni.php');

use Evidence\Pojistenci\SpravcePojistencu;

$spravcePojistencu = new SpravcePojistencu();

if (isset($_GET['odstranit']))
    $spravcePojistencu->odstran($_GET['odstranit']);

$pojistenci = $spravcePojistencu->vratPojistence();

$titulek = 'Pojištěnci';
$popis = 'Výpis pojištěnců.';
require('hlavicka.php');
?>
    <h2>Výpis pojištěnců</h2>
<table class="table table-bordered">
    <tr>
        <th>Jméno</th>
        <th>Bydliště</th>
		<th></th>
    </tr>
    <?php foreach ($pojistenci as $pojistenec) : ?>

        <tr>
            <td><a href="profil.php?id=<?= htmlspecialchars($pojistenec['pojistenec_id']) ?>"><?= htmlspecialchars($pojistenec['jmeno']) . ' ' . htmlspecialchars($pojistenec['prijmeni']) ?></a></td>
            <td><?= htmlspecialchars($pojistenec['adresa']) . ', ' . htmlspecialchars($pojistenec['mesto']) ?></td>
			<td class="text-center"><a href="pojistenci.php?editovat=<?= htmlspecialchars($pojistenec['pojistenec_id']) ?>"><button type="button" class="btn btn-xs btn-default">Editovat</button></a>
                <a href="pojistenci_vypis.php?odstranit=<?= htmlspecialchars($pojistenec['pojistenec_id']) ?>"><button type="button" class="btn btn-xs btn-danger">Odstranit</button></a></td>
        </tr>

    <?php endforeach ?>
</table>

<nav>
	<a class="btn btn-primary btn-sm" href="pojistenci.php">Nový pojištěnec</a>
</nav>

<?php require('paticka.php'); ?>
