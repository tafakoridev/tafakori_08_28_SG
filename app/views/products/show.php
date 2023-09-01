<body class="container justify-content-center align-items-center">
    <div class="column col-9">
        <h1 class="product_title"><?= $product['name'] ?></h1>
        <div class="row">
        <div onclick="redirect('/products/<?= $product['id'] ?>')" class="col-12 c-pointer p-2 shadow bg-white m-2 column justify-content-center align-items-center">
            <img class="img-50" src="/images/product.png" alt="product image">
            <h4><?= $product['name']; ?></h4>
            <span style="font-size: 12px;"><?= $product['price']; ?> تومان</span>
            <button class="small"  onclick="redirect()">
                افزودن به سبد
            </button>
          </div>
        </div>
       
    </div>
</body>
<?php
include_once __DIR__."/../footer.php";
?>