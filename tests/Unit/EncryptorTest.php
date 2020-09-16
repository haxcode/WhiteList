<?php


namespace Tests\Unit;

use App\Model\WhiteList\Encryptor;
use PHPUnit\Framework\TestCase;

class EncryptorTest extends TestCase {
    
    /**
     *
     */
    public function testSimpleValidityOfEncryption() {
        $sha = Encryptor::encrypt('20191121', '9810000054', '70102035709724546729803218', 5000);
        $this->assertEquals('a4ee17d8e7abd6852834c07bbb70cadf3d79e89d35d869b7c57b30606924950768c198d07ed1c244198f92fdec2058a848e19c9b3656016994d58cd465bec9a2', $sha);
    }
    
    
    public function testMaskGenerationEncryption() {
        $date = '20191018';
        $nrb = '20721233708680000022663112';
        $nip = '1134679109';
        $mask = 'XX72123370XXXXXXXYYYXXXXXX';
        $combinedMask = Encryptor::maskCombine($mask, $nrb);
        $this->assertEquals('201910181134679109XX72123370XXXXXXX022XXXXXX', $date.$nip.$combinedMask);
        
    }
    
}
