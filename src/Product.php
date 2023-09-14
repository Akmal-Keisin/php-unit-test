<?php

namespace AkmalKeisin\Test;

class Product {

    public function __construct(private int $id, private string $name, private int $price)
    {
        
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function getId(): int {
        return $this->id;
    }

    public function setName($name): void {
        $this->name = $name;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setPrice($price): void {
        $this->price = $price;
    }

    public function getPrice(): int {
        return $this->price;
    }
}