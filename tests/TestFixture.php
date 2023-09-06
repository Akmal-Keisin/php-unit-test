<?php
namespace AkmalKeisin\Test;

use Exception;
use PHPUnit\Framework\TestCase;

class TestFixture extends TestCase {
    private Person $person;

    // setup executed before test method executed
    public function setUp() : void 
    {
        $this->person = new Person('Keisin');
        echo "Before one" . PHP_EOL;
    }

    // this before annotaion also executed before test method executed
    /**
     * @before
     */
    public function setUpTwo(): void 
    {
        echo "Before two" . PHP_EOL;
    }

    // this tearDown method executed "After" test method executed
    public function tearDown(): void
    {
        echo "After one" . PHP_EOL;
    }

    /**
     * @after
     */
    public function tearDownTwo(): void
    {
        echo "After two" . PHP_EOL;
    }

    public function testSuccess()
    {
        $this->assertEquals('Hello Akmal my name is Keisin', $this->person->sayHello('Akmal'));
    }

    public function testException()
    {
        $this->expectException(Exception::class);
        $this->person->printHello(null);
    }
}