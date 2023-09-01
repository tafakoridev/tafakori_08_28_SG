# Git Repository for SarveCrm MVC PHP Framework

Welcome to the Git repository for SarveCrm, a lightweight and flexible MVC (Model-View-Controller) PHP framework designed for building web applications.

## Features

- **MVC Architecture**: Efficiently organize your codebase using the Model-View-Controller pattern.
- **Routing System**: Easily manage HTTP requests and define routes for your application.
- **Controllers**: Develop controllers to handle your application's logic.
- **Models**: Seamlessly interact with the database through models.
- **Views**: Render templates for your application's user interface.
- **Configuration**: Configure your application effortlessly using environment variables.
- **API and Web Routes**: Define both API and web routes for your project.

## Getting Started

1. Clone this Git repository to your local machine.
2. Install dependencies using Composer.
3. Configure your web server to point to the public directory.
4. Create a `.env` file for environment configuration.
5. Begin building your web application!

## Routes

- **API Routes**: Defined in `api.php` for API endpoints.
- **Web Routes**: Defined in `web.php` for web routes.

### API Routes (Defined in `api.php`)

- **POST /api/products**: Create a new product (Endpoint: `/api/products`, Controller: `ProductsController@store`).
- **POST /api/products/update**: Update a product (Endpoint: `/api/products/update`, Controller: `ProductsController@update`).
- **DELETE /api/products/{id}**: Delete a product by ID (Endpoint: `/api/products/{id}`, Controller: `ProductsController@delete`).
- **GET /api/shoppingcart**: Display the shopping cart (Endpoint: `/api/shoppingcart`, Controller: `ShoppingCartController@index`).
- **POST /api/cart/add/{id}**: Add a product to the cart (Endpoint: `/api/cart/add/{id}`, Controller: `ShoppingCartController@addToCart`).
- **DELETE /api/cart/remove/{id}**: Remove a product from the cart (Endpoint: `/api/cart/remove/{id}`, Controller: `ShoppingCartController@removeFromCart`).
- **POST /api/cart/checkout**: Checkout the cart (Endpoint: `/api/cart/checkout`, Controller: `ShoppingCartController@checkout`).

### Web Routes (Defined in `web.php`)

- **GET /**: Display the homepage (Endpoint: `/`, Controller: `ProductsController@index`).
- **GET /products/{id}**: Display product details by ID (Endpoint: `/products/{id}`, Controller: `ProductsController@show`).
- **GET /products/create/new**: Display the product creation form (Endpoint: `/products/create/new`, Controller: `ProductsController@create`).
- **GET /products**: Display a list of products (Endpoint: `/products`, Controller: `ProductsController@index`).
- **GET /products/update/{id}**: Display the product update form (Endpoint: `/products/update/{id}`, Controller: `ProductsController@edit`).

For detailed route information, refer to the [Routes](#routes) section in this README.

## Usage

1. Define your application's routes in the appropriate route file (`api.php` or `web.php`).
2. Develop controllers to manage your application's logic effectively.
3. Implement models to interact seamlessly with your database.
4. Utilize views to render templates for your user interface.

## Contribution

Contributions to this project are highly encouraged and welcome! If you're interested in contributing, please review the guidelines outlined in the [Contributing](#contributing) section.

## License

This project is open-source and distributed under the MIT License. Feel free to use, modify, and share it as needed.
