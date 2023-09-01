<?php

namespace app\Services;

use app\models\Product;

class ProductsService
{
    private $product;
    public function __construct()
    {
        $this->product = new Product;
    }

    public function getAllProducts()
    {
        $products = $this->product::findAll([]);
        return $products;
    }

    public function getProductById($id)
    {
        $product = $this->product::find($id);
        return $product;
    }

    public function createProduct($name, $price)
    {
        $product = $this->product::insert([
            'name' => $name,
            'price' => $price
        ]);
        return $product;
    }

    public function updateProduct($id, $name, $price)
    {
        $product = $this->product::update(['id' => $id], [
            'name' => $name,
            'price' => $price
        ]);
        return $product;
    }

    public function deleteProduct($id)
    {
        $product = $this->product::delete(['id' => $id]);
        return $product;
    }
}
