<?php
namespace AkmalKeisin\Test;

use PHPUnit\Framework\TestCase;

class TestSkip extends TestCase {
    public function testSkip()
    {
        // markTestskipped mengembalikan throw Exception SkippedWithMessageException sehingga kode dibawahnya tidak dieksekusi
        $this->markTestSkipped('Test ini belum selesai/lewat');
        $counter = new Counter();
        $counter->increment();
        $counter->increment();
        $this->assertEquals(2, $counter->getCounter());
    }

    /**
     * @requires OSFAMILY Linux
     */
    public function testSkipWithCondition()
    {
        $this->assertEquals(true, "Only in linux");
    }
}