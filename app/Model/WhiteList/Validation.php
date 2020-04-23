<?php


namespace App\Model\WhiteList;

/**
 * Class Validation
 * @package App\Model\WhiteList
 * @author              Robert Kubica <rkubica@edokumenty.eu>
 * @copyright       (c) eDokumenty Sp. z o.o.
 */
class Validation {
    
    
    /**
     * @var string
     */
    private string $nip;
    
    /**
     * @var string
     */
    private string $iban;
    
    /**
     * Validation constructor.
     * @param string $nip
     * @param string $iban
     */
    public function __construct(string $nip, string $iban) {
        $this->setNip($nip);
        $this->setIban($iban);
    }
    
    /**
     * @param string $nip
     */
    private static function validateNIP(string $nip) {
        //TODO add exception and validation
    }
    
    /**
     * @param $nip
     */
    private static function validateIban($nip) {
        //TODO add exception and validation
    }
    
    /**
     * @return string
     */
    public function getNip(): string {
        return $this->nip;
    }
    
    /**
     * @param string $nip
     */
    public function setNip(string $nip): void {
        self::validateNIP($nip);
        $this->nip = $nip;
    }
    
    /**
     * @return string
     */
    public function getIban(): string {
        return $this->iban;
    }
    
    /**
     * @param string $iban
     */
    public function setIban(string $iban): void {
        self::validateIban($iban);
        $this->iban = $iban;
    }
    
    
    
    
}
