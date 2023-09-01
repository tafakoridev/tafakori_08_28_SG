<body class="container justify-content-center align-items-center">
    <div class="column col-9">

        <div class="column shadow bg-white p-2  justify-content-center align-items-center">
            <h5 class="product_title">سبد خرید</h5>
            <button class="small hide" id="selected"></button>
            <div class="row">
                <?php foreach ($carts as $carts) : ?>
                    <div id="item-<?= $carts['id'] ?>" class="col-4 c-pointer p-2 shadow bg-white m-2 column justify-content-center align-items-center relative">
                        <div class="absolute left-5 top-5" style="font-size: 10px;" onclick="select(<?= $carts['id'] ?>)" >select</div>
                        <img class="img-50" src="/images/product.png" alt="product image">
                        <h4><?= $carts['name']; ?></h4>
                        <span style="font-size: 12px;"><?= $carts['price']; ?> تومان</span>
                        <button class="small danger" onclick="removeFromCart(<?= $carts['id'] ?>)">
                            حذف از سبد
                        </button>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <h1 class="product_title">محصولات</h1>
        <div class="row">
            <?php foreach ($products as $product) : ?>
                <div class="col-4 c-pointer p-2 shadow bg-white m-2 column justify-content-center align-items-center">
                    <img class="img-50" src="/images/product.png" alt="product image">
                    <h4><a href="'/products/<?= $product['id'] ?>'"><?= $product['name']; ?></a></h4>
                    <span style="font-size: 12px;"><?= $product['price']; ?> تومان</span>
                    <button class="small" onclick="addToCart(<?= $product['id']; ?>)">
                        افزودن به سبد
                    </button>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</body>
<?php
include_once __DIR__ . "/../footer.php";
?>