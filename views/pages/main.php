<?php session_unset(); ?>
<nav>
    <h2>Categories:</h2>
    <ul>
        <li>
            <a href="?category=cookies">Печенье</a>
        </li>
        <li>
            <a href="?category=cakes">Торты</a>
        </li>
        <li>
            <a href="?category=waffles">Вафли</a>
        </li>
        <li>
            <a href="?category=chocolate">Шоколад</a>
        </li>
        <li>
            <a href="?category=marshmallow">Зефир</a>
        </li>
    </ul>
</nav>
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