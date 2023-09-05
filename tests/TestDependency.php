<?php 

namespace AkmalKeisin\Test;

use PHPUnit\Framework\TestCase;

class TestDependency extends TestCase {

    public function testFirst(): Counter
    {
        $counter = new Counter();
        $counter->increment();
        $counter->increment();
        $counter->increment();
        self::assertEquals(3, $counter->getCounter());
        
        return $counter;
    }


    /**
     * @depends testFirst
     * @test
     */
    public function second(Counter $counter): void
    {
        $counter->increment();
        $counter->increment();

        self::assertEquals(5, $counter->getCounter());
    }
}