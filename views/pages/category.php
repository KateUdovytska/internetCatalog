<a href="#" class="back">Back to menu</a>
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
            <tr class="description">
                <td><?= $product['description'] ?></td>
            </tr>
            <tr class="price">
                <td><?= $product['price'] ?></td>
            </tr>
        </table>
        <?php endforeach; ?>
    </div>