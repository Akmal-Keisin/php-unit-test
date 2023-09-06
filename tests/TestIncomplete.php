<?php

namespace AkmalKeisin\Test;

use PHPUnit\Framework\TestCase;

class TestIncomplete extends TestCase {

    public function testFirst()
    {
        $counter = new Counter();
        $counter->increment();
        $counter->increment();
        $this->assertEquals(2, $counter->getCounter());
        $this->markTestIncomplete('Test belum selesai');
    }
}