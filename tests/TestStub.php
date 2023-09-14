<?php

namespace AkmalKeisin\Test;

use Exception;
use PHPUnit\Framework\TestCase;

class TestStub extends TestCase {
    private ProductRepository $repository;
    private ProductService $service;

    public function setUp(): void
    {
        $this->repository = $this->createStub(ProductRepository::class);
        $this->service = new ProductService($this->repository);
    }

    public function testStub() 
    {
        $product = new Product(1, 'Test Products', 2000);

        $this->repository
            ->method('findById')
            ->willReturn($product);
        
        $this->assertEquals($product, $this->repository->findById(1));
    }

    public function testStubMap() 
    {
        $product = new Product(1, 'Test Products', 2000);
        $product2 = new Product(2, 'Test Products 2', 3000);

        $this->repository
            ->method('findById')
            ->willReturnMap([
                [1, $product],
                [2, $product2]
            ]);
        
        $this->assertSame($product, $this->repository->findById(1));
        $this->assertSame($product2, $this->repository->findById(2));
    }

    public function testStubCallback()
    {
        $this->repository->method('findById')
            ->willReturnCallback(function(int $id) {
                $product = new Product($id, "test product $id", 2000 + $id);
                return $product;
            });
        
        $this->assertEquals(1, $this->repository->findById(1)->getId());
        $this->assertEquals(2, $this->repository->findById(2)->getId());
        $this->assertEquals(3, $this->repository->findById(3)->getId());
    }

    public function testRegisterSuccess()
    {
        $this->repository->method('findById')->willReturn(null);
        $this->repository->method('save')->willReturnArgument(0);

        $product = new Product(1, 'Test product 1', 2000);
        $result = $this->service->register($product);

        $this->assertEquals($product->getId(), $result->getId());
        $this->assertEquals($product->getName(), $result->getName());
    }

    public function testRegisterFailed()
    {
        $this->expectException(Exception::class);
        $productInDb = new Product(1, 'Product 1', 2000);

        $this->repository->method('findById')->willReturn($productInDb);
        $this->repository->method('save')->willReturnArgument(0);

        $product = new Product(1, 'Product 1', 200);
        $result = $this->service->register($product);
    }

    public function testDeleteSuccess()
    {
        $product = new Product(1, 'Test Produk 1', 2000);

        $this->repository->method('findById')->willReturn($product);
        $this->service->delete(1);
        $this->assertTrue(true, "success");
    }

    public function testDeleteFailed()
    {
        $this->expectException(Exception::class);
        $this->repository->method('findById')->willReturn(null);
        $this->service->delete(1);
    }
}