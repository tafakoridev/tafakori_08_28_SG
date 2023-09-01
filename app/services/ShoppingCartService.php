<?php
namespace app\Services;

use app\models\ShoppingCart;

class ShoppingCartService
{
    private $cart = [];

    public function __construct() {
        $this->loadCart();
    }

    public function getCartItems()
    {
        return $this->cart;
    }

    public function addToCart($product)
    {
        $productId = $product['id'];
        return $this->saveCart($productId);
    }

    public function removeFromCart($productId)
    {
        ShoppingCart::delete(['product_id' => $productId]);
    }

    public function clearCart()
    {
       ShoppingCart::delete([]);
    }

    private function loadCart()
    {
        $this->cart = ShoppingCart::findAllWith('products', 'product_id');
    }

    private function saveCart($productId)
    {
        return ShoppingCart::insert(['product_id' => $productId]);
    }
}
