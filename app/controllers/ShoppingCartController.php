<?php

namespace App\Controllers;

use Core\Controller;
use App\Services\ShoppingCartService;
use App\Services\ProductsService;

class ShoppingCartController extends Controller
{
    private $shoppingCartService;
    private $productsService;

    public function __construct() {
        $this->shoppingCartService = new ShoppingCartService();
        $this->productsService = new ProductsService();
    }

    public function index()
    {
        // Retrieve the shopping cart items
        $cartItems = $this->shoppingCartService->getCartItems();

        // Pass data to the view
        $data = [
            'cartItems' => $cartItems,
        ];

        $this->json($data);
    }

    public function addToCart($productId)
    {
        $result = [];
        // Add the product to the shopping cart
        $product = $this->productsService->getProductById($productId);
        if ($product) {
            $result = $this->shoppingCartService->addToCart($product);
        }

        // Redirect back to the product listing page or show a success message
        $this->json($result);
    }

    public function removeFromCart($productId)
    {
        if ($productId) {
            header("Content-Type: application/json", 204);
           $this->shoppingCartService->removeFromCart($productId);
        }
    }

    public function checkout()
    {
        // Implement the checkout process here
        // This could involve processing payment, updating inventory, etc.

        // Clear the shopping cart after checkout
        $this->shoppingCartService->clearCart();

        // Redirect to a thank you page or order summary
        $this->redirect('/checkout/thankyou');
    }
}
