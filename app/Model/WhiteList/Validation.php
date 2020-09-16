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
    private string $nip = '';
    
    /**
     * @var string
     */
    private string $iban = '';
    
    /**
     * Validation constructor.
     * @param string $nip
     * @param string $iban
     */
    public function __construct(?string $nip, ?string $iban) {
        $this->setNip($nip);
        $this->setIban($iban);
    }
    
    /**
     * @param $nip
     */
    public static function validateIban($iban) {
        if (empty($iban)) {
            return FALSE;
        }
        return (strlen($iban) == 26);
    }
    
    public function validate(): bool {
        return self::validateNIP($this->getNip());
    }
    
    /**
     * @param string $nip
     */
    public static function validateNIP(string $nip) {
        if (empty($nip)) {
            return FALSE;
        }
        return (strlen($nip) == 10);
    }
    
    /**
     * @return string
     */
    public function getNip(): string {
        return trim($this->nip);
    }
    
    /**
     * @param string $nip
     */
    public function setNip(?string $nip): void {
        if (is_string($nip)) {
            self::validateNIP($nip);
            $this->nip = str_replace(' ', '', trim($nip));
        }
    }
    
    /**
     * @return string
     */
    public function getIban(): string {
        return str_replace(' ', '', trim($this->iban));
    }
    
    /**
     * @param string $iban
     */
    public function setIban(?string $iban): void {
        self::validateIban($iban);
        $this->iban = $iban ?? '';
    }
    
    
}
