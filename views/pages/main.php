<div class="category">
    <?php foreach ($data as $product): ?>
        <div class="product">
            <div class="product-box_h2"><h2><?= $product['name'] ?></h2></div>
            <div class="product-box_img item_img"><img src="<?= IMAGES_DIR . $product['image_name'] ?>"
                                                       alt="<?= $product['image_name'] ?>"></div>
            <div class="product_price"><p>price: <?= $product['price'] ?> &#8372;</p></div>
            <div class="product_butt"><a href="?id=<?= $product['id'] ?>">Read more</a></div>
        </div>
    <?php endforeach; ?>
</div>