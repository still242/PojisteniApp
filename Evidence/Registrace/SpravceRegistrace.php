<?php

namespace Evidence\Registrace;

use Databaze;

class SpravceRegistrace
{

    public function pridejUzivatele(string $uzivatelske_jmeno, string $heslo) : void {
        $stmt = Databaze::dotaz('INSERT INTO uzivatele (uzivatelske_jmeno, heslo) VALUES (?, ?)', array($uzivatelske_jmeno, $heslo));

        $hashHeslo = password_hash($heslo, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($uzivatelske_jmeno, $hashHeslo))) {
            $stmt = null;
            header("location: ../registrace.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }
}
