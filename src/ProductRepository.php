<?php

namespace AkmalKeisin\Test;

interface ProductRepository {
    function findById(): ?Product;

    function findAll(): array;

    function save(): Product;

    function delete(): void;
}