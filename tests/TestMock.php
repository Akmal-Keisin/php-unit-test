<?php

namespace AkmalKeisin\Test;

use Exception;
use PHPUnit\Framework\TestCase;

class TestMock extends TestCase {
    private ProductRepository $repository;
    private ProductService $service;

    public function setUp(): void
    {
        $this->repository = $this->createMock(ProductRepository::class);
        $this->service = new ProductService($this->repository);
    }

    // public function testMock()
    // {
    //     $product = new Product(1, "Test Product", 2000);
    //     $this->repository->expects($this->once())
    //         ->method("findById")
    //         ->willReturn($product);
        
    //     $result = $this->repository->findById(1);
        
    //     $this->assertSame($product, $result);
    // }

    public function testMockDelete()
    {
        $product = new Product(1, 'Test Product', 2000);
        
        $this->repository->expects($this->once())
            ->method('delete')
            ->with(self::equalTo($product));

        $this->repository->expects($this->once())
            ->method('findById')
            ->willReturn($product);

        $this->service->delete(1);
        $this->assertTrue(true, 'Success');
    }

    public function testMockDeleteFailed()
    {
        $this->repository->expects($this->never())
            ->method('delete');
        $this->expectException(Exception::class);
        
        $this->repository->expects($this->once())
            ->method('findById')
            ->willReturn(null);
        
        $this->service->delete(1);
        $this->assertTrue(true, 'Success');
    }
}