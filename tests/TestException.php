<?php

namespace AkmalKeisin\Test;

use Exception;
use PHPUnit\Framework\TestCase;

class TestException extends TestCase {

    public function testSuccess()
    {
        $person = new Person('Keisin');
        $this->assertEquals('Hello Akmal my name is Keisin', $person->sayHello('Akmal'));
    }

    public function testException()
    {
        $person = new Person('Keisin');
        $this->expectException(Exception::class);
        $person->sayHello(null);
    }
}