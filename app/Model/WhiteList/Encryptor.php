<?php


namespace App\Model\WhiteList;


class Encryptor {
    public static function encryptSHA($toHash, $iterations = 1) {
        for($i = 0; $i < $iterations; $i++) {
            $toHash = hash('sha512', $toHash);
        }
        return $toHash;
    }

    public static function encrypt($date, $nip, $nrb, $iterations){
        return self::encryptSHA($date.$nip.$nrb, $iterations);
    }
}


?>
