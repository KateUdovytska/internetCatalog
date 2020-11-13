<?php session_unset(); ?>
<div class="products-description">
    <table class="table_products">
        <caption>All Products</caption>
        <tr>
            <th>name</th>
            <th>img</th>
            <th>price</th>
            <th>ID</th>
        </tr>
        <?php foreach ($data as $product): ?>
            <tr>
                <td><?= $product['name'] ?></td>
                <td class="td_img"><img src="<?= IMAGES_DIR . $product['image_name'] ?>"
                         alt="<?= $product['image_name'] ?>" class="img_table"></td>
                <td><?= $product['price'] ?>$</td>
                <td><?= $product['id'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>