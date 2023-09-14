<?php 

namespace AkmalKeisin\Test;

use PHPUnit\Framework\TestCase;

/**
 * in this test, i've learned how to depends some test with other test.
 * this is very useful in some condition, but i've learned if unit test is better be independent. not deppends on other test.
 * if the test that other test deppends on causing an exception/failed. the other next test will not running. 
 */

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