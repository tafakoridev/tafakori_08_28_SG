<?php

namespace App\Controllers;

use core\Controller;
use app\services\ProductsService;
use app\services\ShoppingCartService;

class ProductsController extends Controller
{
    private $productsService;
    private $shoppingCartService;

    public function __construct() {
        $this->productsService = new ProductsService();
        $this->shoppingCartService = new ShoppingCartService();
    }


    public function index()
    {
        $products = $this->productsService->getAllProducts();
        $carts = $this->shoppingCartService->getCartItems();
        $data = ['products' => $products, 'carts' => $carts];
        $this->view('products/index', $data);
    }

    
    public function create()
    {
       $this->view('products/create');
    }

    public function store() {
        $name = $this->input('name');
        $price = $this->input('price');
        $this->productsService->createProduct($name, $price);
        $this->redirect('/products');
    }

    public function show($id)
    {
        $product = $this->productsService->getProductById($id);
        if (!$product) {
            $this->notFound();
        }
        $data = ['product' => $product];
        $this->view('products/show', $data);
    }

    public function edit($id)
    {
        $product = $this->productsService->getProductById($id);
        if (!$product) {
            $this->notFound();
        }
        $data = ['product' => $product];
        $this->view('products/update', $data);
    }


    public function update()
    {
        $id = $this->input('id');
        $name = $this->input('name');
        $price = $this->input('price');
        $this->productsService->updateProduct($id, $name, $price);
        $product = $this->productsService->getProductById($id);
        if (!$product) {
            $this->notFound();
        }
        $this->index();
    }

    public function delete($id)
    {
       return $this->productsService->deleteProduct($id);
       
        //$this->redirect('/products');
    }
}
