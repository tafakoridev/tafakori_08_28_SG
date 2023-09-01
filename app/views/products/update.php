<body class="container justify-content-center align-items-center">
    <div class="column col-6">
        <h1 class="product_title"> ویرایش محصول</h1>
        <form method="post" action="/api/products/update" class="column col-12">
            <input type="hidden" name="id" value="<?= $product['id'] ?>">
            <input type="text" name="name" value="<?= $product['name'] ?>" placeholder="نام محصول">
            <input type="text" name="price" value="<?= $product['price'] ?>" placeholder="قیمت محصول">
            <button>
                ذخیره
            </button>
        </form>
    </div>
</body>