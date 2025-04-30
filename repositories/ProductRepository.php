<?php

namespace repositories;

use models\Product;
use RedBeanPHP\R;

class ProductRepository
{
    public function create(array $data): Product
    {
        $product = R::dispense('products');
        $product->group_id = $data['group_id'];
        $product->name = $data['name'];
        $product->price = $data['price'];

        R::store($product);

        return $this->mapToModel($product);
    }
    public function getProductList(): array
    {
        $products = R::findAll('products');
        $resultProducts = [];
        foreach ($products as $product){
            $resultProducts[] = $this->mapToModel($product);
        }
        return $resultProducts;
    }

    public function findById(int $id): Product
    {
        $product = R::load('products', $id);
        if(!$product->getID()){
            throw new \Exception('Product not found.');
        }
        return $this->mapToModel($product);
    }

    public function update(int $id, array $data): void
    {
        $product = R::load('products', $id);
        $product->group_id = $data['group_id'];
        $product->name = $data['name'];
        $product->price = $data['price'];
        R::store($product);

    }

    public function delete(int $id): void
    {
        $resultProduct = R::load('products', $id);
        R::trash($resultProduct);
    }

    private function mapToModel(object $product): Product
    {
        return new Product(
            $product->id,
            $product->group_id,
            $product->name,
            $product->price
        );
    }
}