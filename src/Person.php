<?php

namespace AkmalKeisin\Test;

class Person {
    public function __construct(private string $name)
    {
        
    }

    public function sayHello(?string $name) 
    {
        if($name == null) throw new \Exception('Nama null');
        return 'Hello ' . $name . ' my name is ' . $this->name; 
    }

    public function printHello(?string $name)
    {
        if($name == null) throw new \Exception('Nama null');
        echo 'Hello ' . $name . ' my name is ' . $this->name; 
    }
}