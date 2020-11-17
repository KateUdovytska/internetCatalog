<?php if ($_GET['page'] === 'admin'): ?>
    <div class="products-description">
        <table class="table_products">
            <caption>All Products</caption>
            <tr>
                <th>name</th>
                <th>img</th>
                <th>price</th>
                <th>ID</th>
                <th>Action</th>
            </tr>
            <?php foreach ($data as $product): ?>
                <tr>
                    <td><?= $product['name'] ?></td>
                    <td class="td_img">
                        <div id="square"><img src="<?= IMAGES_DIR . $product['image_name'] ?>"
                                              alt="<?= $product['image_name'] ?>" class="img_table"></div>
                    </td>
                    <td><?= $product['price'] ?>&#8372;</td>
                    <td><?= $product['id'] ?></td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="delete_id" value="<?= $product['id'] ?>">
                            <button type="submit" value="del" class="delete"><i class="far fa-trash-alt trash_img"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
<?php else: ?>
    <div class="category">
        <?php foreach ($data as $product): ?>
            <div class="product">
                <div class="product-box_h2"><h2><?= $product['name'] ?></h2></div>
                <div class="product-box_img"><img src="<?= IMAGES_DIR . $product['image_name'] ?>"
                                                  alt="<?= $product['image_name'] ?>"></div>
                <div class="product_price"><p>price: <?= $product['price'] ?> &#8372;</p></div>
                <div class="product_butt"><a href="?id=<?= $product['id'] ?>">Read more</a></div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>