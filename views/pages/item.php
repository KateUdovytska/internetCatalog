<form action="#" method="GET">
    <input type="submit" value="#">
</form>
<table>
    <?php foreach ($data as $productItem): ?>
        <tr>
            <td>
                <h2><?php $productItem['name'] ?></h2>
            </td>
        </tr>
        <tr>
            <td>
                <pre><?php $productItem['description'] ?></pre>
            </td>
        </tr>
        <tr>
            <p><?php $productItem['price'] ?></p>
        </tr>
        <tr>
            <p><?php $productItem['article'] ?></p>
        </tr>
    <?php endforeach; ?>
</table>