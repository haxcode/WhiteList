<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Model\WhiteList\Encryptor;

class Test extends TestCase {
    /**
     * Checking the correctness of the encryption. An example of documentation from Ministerstwo Finansów.
     */
    public function correctnessTest() {
        $this->assertTrue("f8b915776eab735fdd10266b2e66068447904852b82c30eeb6de30703a087eb17ea4c4a37630494607194ddb9354c1211bd984fb5f4d9cff95f5a24ed52065e7" == Encryptor::encrypt("20191018", "1435721230", "34102012221314181237774212", 5000));
    }
    
    
    /**
     * Iteration check
     */
    public function correctnessIterationTest() {
        $this->assertTrue("371a4fbf2b393338d0a6c619ec18fe5f636fdc1992c09763acfd5dae0bb97b13359fb091e4a196ba085d1a60a312733d6a384e937e32c9aef7063c7911d46b84" == Encryptor::encrypt("20191018", "1435721230", "34102012221314181237774212", 1));
        $this->assertTrue("371a4fbf2b393338d0a6c619ec18fe5f636fdc1992c09763acfd5dae0bb97b13359fb091e4a196ba085d1a60a312733d6a384e937e32c9aef7063c7911d46b84" == Encryptor::encrypt("20191018", "1435721230", "34102012221314181237774212"));
        $this->assertTrue("4d12803aad57748d782341a2e13f8710abacf2f0a462d77f28ee96264e07d7afdec1e55d1c1ec232ec50f1c5995581d00999cda4058640112a2675e83d76414c" == Encryptor::encrypt("20191018", "1435721230", "34102012221314181237774212", 5));
        $this->assertTrue(NULL == Encryptor::encrypt("20191018", "1435721230", "34102012221314181237774212", 0));
    }
    
}
