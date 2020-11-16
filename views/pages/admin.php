<?php if ($_SESSION['check']) : ?>
    <div class="addItem">
        <p>Добавить товар</p>
        <form method="post" enctype="multipart/form-data">
            <input type="text" name="name" placeholder="name" required>
            <input type="text" name="price" placeholder="price" required>
            <textarea name="description" placeholder="description" required></textarea>
            <input type="text" name="vendorCode" placeholder="vendor code" required>
            <select name="category" required>
                <option selected disabled>select category</option>
                <option value="1">cookies</option>
                <option value="2">chocolate</option>
                <option value="5">waffles</option>
                <option value="7">marshmallow</option>
                <option value="9">cakes</option>
            </select>
            <input type="file" name="image" required accept="image/*">
            <input type="submit" value="Send">
        </form>
    </div>

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
                    <td class="td_img"><img src="<?= IMAGES_DIR . $product['image_name'] ?>"
                                            alt="<?= $product['image_name'] ?>" class="img_table"></td>
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
<?php else : ?>
    <div class='admin'>
        <div class="admin-box">
            <p>Войти в панель администратора</p>
            <form method='post'>
                <input type='text' placeholder='login' class='input' name='login' required><br>
                <input type='password' placeholder='password' class='input' name='password' required><br>
                <input type='submit' value='Sign in' class='button'>
            </form>
        </div>
    </div>
<?php endif; ?>