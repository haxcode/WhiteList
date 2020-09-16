<?php


namespace App\Model\WhiteList;


use DateTime;
use Illuminate\Support\Facades\Redis;


/**
 * Class ActiveVATPayer
 * @package App\Http\Controllers
 * @author Robert Kubica <rkubica@edokumenty.eu>
 * @copyright (c) eDokumenty Sp. z o.o.
 */
class ActiveVATPayer {
    
    /**
     * @param Validation $validation
     * @return bool
     */
    public static function check(Validation $validation): bool {
        $now = new DateTime();
        $nowDate = $now->format('Ymd');
        $masksKey = $nowDate.':'.'maski';
        $headerKey = $nowDate.':'.'naglowek';
        
        $masks = Redis::get($masksKey);
        $header = Redis::get($headerKey);
        
        $ibanValid = Validation::validateIban($validation->getIban());
        $header = json_decode('{'.$header.'}', TRUE);
        $masks = json_decode('{'.$masks.'}', TRUE);
        $numberOfTransformation = $header['naglowek']['liczbaTransformacji'];
        $sha = Encryptor::encrypt($nowDate, $validation->getNip(), '', $numberOfTransformation);
        $exist = Redis::get($sha);
        if ($exist) {
            return TRUE;
        }
        $sha = Encryptor::encrypt($nowDate, $validation->getNip(), $validation->getIban(), $numberOfTransformation);
        $exist = Redis::get($sha);
        if ($exist) {
            return TRUE;
        }
        if(!$ibanValid){
            return FALSE;
        }
        
        $numberIdentyfier = substr($validation->getIban(), 2, 8);
        foreach ($masks['maski'] as $mask) {
            if (strpos($mask, $numberIdentyfier) >= 0) {
                $sha = Encryptor::encrypt($nowDate, $validation->getNip(), Encryptor::maskCombine($mask, $validation->getIban()), $numberOfTransformation);
                $exist = Redis::get($sha);
                if ($exist) {
                    return TRUE;
                }
            }
        }
        
        return false;
    }
}
