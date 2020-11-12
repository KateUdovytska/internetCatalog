<div class="category">
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
                <td><?= $product['price'] ?></td>
            </tr>
            <a href="?id=<?= $product['id'] ?>"></a>
        </table>
    <?php endforeach; ?>
</div>