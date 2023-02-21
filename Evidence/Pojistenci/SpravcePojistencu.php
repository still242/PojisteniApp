<?php

namespace Evidence\Pojistenci;

use Databaze;

class SpravcePojistencu
{

	public function vratPojistence() : array
    {
        return Databaze::dotaz('SELECT * FROM pojistenec ORDER BY prijmeni')->fetchAll();
    }

	public function vratSeznam() : array
    {
        return Databaze::dotaz('SELECT pojistenec_id, CONCAT(jmeno, " ", prijmeni) AS cele_jmeno FROM pojistenec ORDER BY pojistenec_id')->fetchAll();
    }

	public function nacti($pojistenecId) : array
	{
		return Databaze::dotaz('SELECT * FROM pojistenec WHERE pojistenec_id=?', array($pojistenecId))->fetch();
	}

	public function pridej(string $jmeno, string $prijmeni, string $email, int $telefon, string $adresa, string $mesto, int $psc,) : void
    {
        Databaze::dotaz('INSERT INTO pojistenec (jmeno, prijmeni, email, telefon, adresa, mesto, psc) VALUES (?, ?, ?, ?, ?, ?, ?)', array($jmeno, $prijmeni, $email, $telefon, $adresa, $mesto, $psc));
    }

	public function uprav(int $pojistenecId, string $jmeno, string $prijmeni, string $email, string $telefon, string $adresa, string $mesto, string $psc) : void
    {
        Databaze::dotaz('UPDATE pojistenec SET jmeno=?, prijmeni=?, email=?, telefon=?, adresa=?, mesto=?, psc=? WHERE pojistenec_id=?', array($jmeno, $prijmeni, $email, $telefon, $adresa, $mesto, $psc, $pojistenecId));
    }

	public function odstran(int $pojistenecId) : void
    {
        Databaze::dotaz('DELETE FROM pojistenec WHERE pojistenec_id=?', array($pojistenecId));
    }

}
