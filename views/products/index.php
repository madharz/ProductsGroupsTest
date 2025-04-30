<h1>Products</h1>
<a href="/products/create">Add Product</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Group ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($products as $product): ?>
        <tr>
            <td><?= $product->id ?></td>
            <td><?= $product->group_id ?></td>
            <td><?= $product->name ?></td>
            <td><?= $product->price ?></td>
            <td>
                <a href="/products/edit?id=<?= $product->id ?>">Edit</a> |
                <a href="/products/delete?id=<?= $product->id ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>