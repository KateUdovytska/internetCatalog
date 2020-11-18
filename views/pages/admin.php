<?php if (isset($_SESSION['message'])): ?>
    <div class="message_error">
        <p><?= $_SESSION['message'] ?></p>
        <?php unset($_SESSION['message']); ?>
    </div>
<?php endif; ?>
<?php if ($_SESSION['check']) : ?>
    <?php if ($_GET['admin_page'] === 'add_product'): ?>
        <div class="admin-box flex-align-items_center flex-just-cont_center">
            <div class="addItem">
                <p>Добавить товар</p>
                <form method="post" enctype="multipart/form-data">
                    <input type="text" name="name" placeholder="name" required value="<?= $_SESSION['name'] ?>">
                    <input type="number" name="price" placeholder="price" required>
                    <textarea name="description" placeholder="description"
                              required><?= $_SESSION['description'] ?></textarea>
                    <input type="text" name="vendorCode" placeholder="vendor code" required
                           value="<?= $_SESSION['vendorCode'] ?>">
                    <select name="category" required>
                        <option <?php if (empty($_SESSION['category'])) echo 'selected' ?> disabled>select category
                        </option>
                        <?php foreach ($categories as $category): ?>
                            <option <?php if ($_SESSION['category'] == $category['id']) echo 'selected' ?>
                                    value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <input type="file" name="image" required accept="image/*">
                    <input type="submit" value="Добавить">
                </form>
            </div>
        </div>
    <?php elseif ($_GET['admin_page'] === 'add_user'): ?>
        <div class="admin-box">
            <div class="addItem">
                <p>Добавить нового пользователя</p>
                <form method="post">
                    <input type="text" name="userLogin" placeholder="login" required>
                    <input type="password" name="userPassword" placeholder="password" required>
                    <input type="password" name="confPassword" placeholder="confirm password" required>
                    <input type="submit" value="Добавить">
                </form>
            </div>
            <table class="admin-table">
                <tr>
                    <th>#id</th>
                    <th>Name Users</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($data as $user): ?>
                    <tr>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['login'] ?></td>
                        <td>
                            <form method="POST">
                                <input type="hidden" name="delete_user_id" value="<?= $user['id'] ?>">
                                <button type="submit" value="del" class="delete"><i
                                            class="far fa-trash-alt trash_img"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    <?php elseif ($_GET['admin_page'] === 'add_category'): ?>
        <div class="admin-box">
            <div class="addItem">
                <p>Добавить новую категорию</p>
                <form method="post">
                    <input type="text" name="name" placeholder="category name" required>
                    <input type="submit">
                </form>
            </div>
            <table class="admin-table">
                <tr>
                    <th>#id</th>
                    <th>Name Category</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($data as $category): ?>
                    <tr>
                        <td><?= $category['id'] ?></td>
                        <td><?= $category['name'] ?></td>
                        <td>
                            <form method="POST">
                                <input type="hidden" name="delete_category_id" value="<?= $category['id'] ?>">
                                <button type="submit" value="del" class="delete"><i
                                            class="far fa-trash-alt trash_img"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    <?php else: ?>
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
                                <button type="submit" value="del" class="delete"><i
                                            class="far fa-trash-alt trash_img"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

        <div class="admin_logout">
            <form method="post">
                <input type="hidden" name="logout" value="true">
                <input type="submit" value="Log out">
            </form>
        </div>
    <?php endif; ?>
<?php else : ?>
    <div class='admin'>
        <div class="admin-box">
            <p>Войти в панель администратора</p>
            <form method='post'>
                <input type='text' placeholder='login' class='input' name='login' required autofocus><br>
                <input type='password' placeholder='password' class='input' name='password' required><br>
                <input type='submit' value='Sign in' class='button'>
            </form>
        </div>
    </div>
<?php endif; ?>