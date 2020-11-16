<div class="addItem">
    <p>Добавить категорию</p>
    <form method="post">
        <input type="text" name="categoryName" placeholder="category name" required>
        <input type="submit" value="Add User">
    </form>
</div>

<div class="products-description">
    <table class="table_products">
        <tr>
            <th>Id</th>
            <th>Category</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($data  as $id => $category): ?>
            <tr>
                <td><?=$category['id']?></td>
                <td><?=$category['name']?></td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="delete_user" value="<?= $category['id'] ?>">
                        <button type="submit" value="del" class="delete"><i class="far fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>