<?php
require('nastaveni.php');

use Evidence\Registrace\SpravceRegistrace;

$spravceRegistrace = new SpravceRegistrace();

$registrace = array(
    'uzivatelske_jmeno' => '',
    'heslo' => '',
    'potvrzeni_hesla' => '',
);

if ($_POST)
{
    $spravceRegistrace->pridejUzivatele($_POST['uzivatelske_jmeno'], $_POST['heslo'], $_POST['potvrzeni_hesla']);
}

$titulek = 'Registrace';
$popis = 'Registrace uživatele do systému.';

require('hlavicka.php');
?>

<h2>Zaregistruj se</h2>
<div class="h-50 center">
    <form class="row g-3" method="post">
        <div class="col-md-8">
            <label class="form-label">Uživatelské jméno:</label>
            <input type="text" name="uzivatelske_jmeno" value="<?= htmlspecialchars($registrace['uzivatelske_jmeno']) ?>" class="form-control">
        </div>
        <div class="col-md-8">
            <label class="form-label">Heslo:</label>
            <input type="password" name="heslo" value="<?= htmlspecialchars($registrace['heslo']) ?>" class="form-control">
        </div>
        <div class="col-md-8">
            <label class="form-label">Potvrzení hesla::</label>
            <input type="password" name="potvrzeni_hesla" value="" class="form-control">
        </div>
        <div class="col-md-12">
        <input type="submit" class="btn btn-primary btn-lg" value="Zaregistrovat" />
        </div>
    </form>
</div>
