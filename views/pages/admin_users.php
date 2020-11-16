<div class="addItem">
    <p>Добавить пользователя</p>
    <form method="post" class="registrationForm">
        <input type="text" name="userLogin" placeholder="login" required>
        <input type="password" name="userPassword" placeholder="password" required>
        <input type="password" name="confPassword" placeholder="confirm the password" required>
        <input type="submit" value="Add User">
    </form>
</div>

<div class="table_products">
    <table>
        <tr>
            <th>№</th>
            <th>User</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($data  as $id => $user): ?>
        <tr>
            <td><?=$user['id']?></td>
            <td><?=$user['login']?></td>
            <td>
                <form method="POST">
                    <input type="hidden" name="delete_user" value="<?= $user['id'] ?>">
                    <button type="submit" value="del" class="delete"><i class="far fa-trash-alt"></i></button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>