<h1>Edit Product</h1>
<form method="post">
    Group ID: <input type="text" name="group_id" value="<?= $product->group_id ?>"><br>
    Name: <input type="text" name="name" value="<?= $product->name ?>"><br>
    Price: <input type="text" name="price" value="<?= $product->price ?>"><br>
    <button type="submit">Save</button>
</form>