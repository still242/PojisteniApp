<?php

function autoloader(string $trida) : void
{
	$trida = str_replace('\\', '/', $trida);

	if (!include($trida . '.php'))
	{
		throw new \Exception("Chyba načtení třídy $trida");
		exit;
	}
}

spl_autoload_register('autoloader');

Databaze::pripoj('localhost', 'root', '', 'db_pojisteni');