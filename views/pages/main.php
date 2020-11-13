<div class="products">
    <nav>
        <h2>Categories:</h2>
        <ul>
            <li><a href="?category=cookies">Печенье</a></li>
            <li><a href="?category=cakes">Торты</a></li>
            <li><a href="?category=waffles">Вафли</a></li>
            <li><a href="?category=chocolate">Шоколад</a></li>
            <li><a href="?category=marshmallow">Зефир</a></li>
        </ul>
    </nav>
    <h2>All products</h2>
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