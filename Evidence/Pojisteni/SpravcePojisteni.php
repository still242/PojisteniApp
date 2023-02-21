<?php

namespace Evidence\Pojisteni;

use Databaze;

class SpravcePojisteni
{

	public function vratPojisteni() : array
    {
        return Databaze::dotaz('SELECT * FROM pojisteni LEFT JOIN pojistenec USING (pojistenec_id) ORDER BY castka')->fetchAll();
    }

	public function nacti(int $pojisteniId) : array
	{
		return Databaze::dotaz('SELECT * FROM pojisteni WHERE pojisteni_id=?', array($pojisteniId))->fetch();
	}

	public function pridej(string $pojisteni, int $castka, string $predmet_pojisteni, string $pojisteni_od, string $pojisteni_do, string $pojistenecId) : void
    {
		if (!$pojistenecId)
            $pojistenecId = null;
        Databaze::dotaz('INSERT INTO pojisteni (pojisteni, castka, predmet_pojisteni, pojisteni_od, pojisteni_do, pojistenec_id) VALUES (?, ?, ?, ?, ?, ?)', array($pojisteni, $castka, $predmet_pojisteni, $pojisteni_od, $pojisteni_do, $pojistenecId));
    }

	public function uprav(int $pojisteniId, string $pojisteni, int $castka, string $predmet_pojisteni, string $pojisteni_od, string $pojisteni_do, string $pojistenecId) : void
    {
		if (!$pojistenecId)
            $pojistenecId = null;
        Databaze::dotaz('UPDATE pojisteni SET pojisteni=?, castka=?, predmet_pojisteni=?, pojisteni_od=?, pojisteni_do=?, pojistenec_id=? WHERE pojisteni_id=?', array($pojisteni, $castka, $predmet_pojisteni, $pojisteni_od, $pojisteni_do, $pojistenecId, $pojisteniId));
    }

	public function odstran(int $pojisteniId) : void
    {
        Databaze::dotaz('DELETE FROM pojisteni WHERE pojisteni_id=?', array($pojisteniId));
    }

}
