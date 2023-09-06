<?php

namespace AkmalKeisin\Test;

use PHPUnit\Framework\TestCase;

class TestSharingFixture extends TestCase {
    protected static ?Counter $counter;

    public static function setUpBeforeClass(): void
    {
        self::$counter = new Counter();
        echo PHP_EOL . "Unit test start" . PHP_EOL;
    }

    public static function tearDownAfterClass(): void
    {
        self::$counter = null;
        echo PHP_EOL . "Unit test clear" . PHP_EOL; 
    }

    public function testFirst()
    {
        self::$counter->increment();
        self::$counter->increment();
        $this->assertEquals(2, self::$counter->getCounter());
    }

    public function testSecond()
    {
        self::$counter->increment();
        self::$counter->increment();
        $this->assertEquals(4, self::$counter->getCounter());
    }
}