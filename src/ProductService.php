<?php

namespace AkmalKeisin\Test;

use Exception;

class ProductService {
    public function __construct(private ProductRepository $repository)
    {
        
    }

    public function register(Product $product): Product {
        if ($this->repository->findById($product->getId())) {
            throw new \Exception('Produk sudah ada');
        }

        return $this->repository->save($product);
    }

    public function delete(int $id): void {
        $product = $this->repository->findById($id);
        if ($product == null) {
            throw new Exception("Produk tidak ditemukan");
        }

        $this->repository->delete($product);
    }
}