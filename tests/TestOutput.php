<?php

namespace AkmalKeisin\Test;
use PHPUnit\Framework\TestCase;

class TestOutput extends TestCase {
    public function testSuccess()
    {
        $person = new Person('Keisin');
        $this->expectOutputString('Hello Akmal my name is Keisin');
        $person->printHello('Akmal');
    }
}