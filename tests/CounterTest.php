<?php
namespace AkmalKeisin\Test;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class CounterTest extends TestCase {
    public function testCounter() {
        $counter = new Counter();
        $counter->increment();
        $counter->increment();
        // echo $counter->getCounter() . PHP_EOL;
        self::assertEquals(2, $counter->getCounter());
    }

    public function testOther() {
        echo "other" . PHP_EOL;
    }

    /**
     * @test
     */
    public function otherCounterIncrement()
    {
        $counter = new Counter();
        $counter->increment();
        $counter->increment();

        self::assertEquals(2, $counter->getCounter());
    }
}