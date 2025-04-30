<h1>Edit Group</h1>
<form method="post">
    <label>Parent ID:</label>
    <input type="number" name="parent_id" value="<?= htmlspecialchars($group->parent_id) ?>"><br><br>

    <label>Name:</label>
    <input type="text" name="name" value="<?= htmlspecialchars($group->name) ?>" required><br><br>

    <button type="submit">Update</button>
</form>
<a href="/groups">Back</a>

