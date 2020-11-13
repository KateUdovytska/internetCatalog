<?php if ($_SESSION['check']) : ?>
    <div class="addItem">
        <p>Добавить товар</p>
        <form method="post" enctype="multipart/form-data">
            <input type="text" name="name" placeholder="name" required value="<?= $_SESSION['name'] ?>">
            <input type="number" name="price" placeholder="price" required >
            <textarea name="description" placeholder="description" required><?= $_SESSION['description'] ?></textarea>
            <input type="text" name="vendorCode" placeholder="vendor code" required value="<?= $_SESSION['vendorCode'] ?>">
            <select name="category" required>
                <option <?php if(empty($_SESSION['category'])) echo 'selected'?> disabled>select category</option>
                <option <?php if($_SESSION['category'] == 1) echo 'selected'?> value="1">cookies</option>
                <option <?php if($_SESSION['category'] == 2) echo 'selected'?> value="2">chocolate</option>
                <option <?php if($_SESSION['category'] == 5) echo 'selected'?> value="5">waffles</option>
                <option <?php if($_SESSION['category'] == 7) echo 'selected'?> value="7">marshmallow</option>
                <option <?php if($_SESSION['category'] == 9) echo 'selected'?> value="9">cakes</option>
            </select>
            <input type="file" name="image" required accept="image/*">
            <input type="submit" value="Send">
        </form>
    </div>
    <div class="products">
        <?php foreach ($data as $id => $product): ?>
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
                <tr class="delete">
                    <td>
                        <form method="POST">
                            <input type="hidden" name="delete_id" value="<?= $product['id'] ?>">
                            <button type="submit" value="del" class="delete"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            </table>
        <?php endforeach; ?>
    </div>
<?php else : ?>
    <div class='admin'>
        <p>Войти в панель администратора</p>
        <form method='post'>
            <input type='text' placeholder='login' class='input' name='login' required><br>
            <input type='password' placeholder='password' class='input' name='password' required><br>
            <input type='submit' value='Sign in' class='button'>
        </form>
    </div>
<?php endif; ?>