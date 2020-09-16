<?php


namespace App\Model\WhiteList;

/**
 * Class Encryptor
 * @package App\Model\WhiteList
 * @author Robert Kubica <rkubica@edokumenty.eu>
 * @copyright (c) eDokumenty Sp. z o.o.
 */
class Encryptor {
    
    /**
     * @param string $date
     * @param string $nip
     * @param string $nrb
     * @param int $iterations
     * @return string
     */
    public static function encrypt(string $date, string $nip, string $nrb = '', $iterations = 5000): string {
        return self::encryptSHA($date.$nip.$nrb, $iterations);
    }
    
    /**
     * @param string $toHash
     * @param int $iterations
     * @return string
     */
    public static function encryptSHA(string $toHash, int $iterations = 5000): string {
        for ($i = 0; $i < $iterations; $i++) {
            $toHash = hash('sha512', $toHash);
        }
        
        return $toHash;
    }
    
    /**
     * @param string $mask
     * @param string $nrb
     * @return string
     */
    public static function maskCombine(string $mask, string $nrb) {
        $mask = str_split($mask);
        $nrb = str_split($nrb);
        $output = '';
        foreach ($mask as $index => $element) {
            $output .= ($element == 'Y') ? $nrb[$index] : $element;
        }
        return $output;
    }
}

