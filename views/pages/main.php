<?php session_unset(); ?>
<div class="products-description">
    <h2>All products</h2>
    <div class="products">
        <?php foreach ($data as $product): ?>
            <table class="product">
                <tr>
                    <th><?= $product['name'] ?></th>
                </tr>
                <tr class="image">
                    <td>
                        <img src="<?= IMAGES_DIR . $product['image_name'] ?>" alt="<?= $product['image_name'] ?>">
                    </td>
                </tr>
                <tr class="price">
                    <td><?= $product['price'] ?>$</td>
                </tr>
                <tr class="readMore">
                    <td>
                        <button><a href="?id=<?= $product['id'] ?>">Read more</a></button>
                    </td>
                </tr>
            </table>
        <?php endforeach; ?>
    </div>
</div>