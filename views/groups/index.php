<h1>Groups</h1>
<a href="/groups/create">Add Group</a>
<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Parent ID</th>
        <th>Name</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($groups as $group): ?>
        <tr>
            <td><?= htmlspecialchars($group->id) ?></td>
            <td><?= htmlspecialchars($group->parent_id) ?></td>
            <td><?= htmlspecialchars($group->name) ?></td>
            <td>
                <a href="/groups/edit?id=<?= htmlspecialchars($group->id) ?>">Edit</a> |
                <a href="/groups/delete?id=<?= htmlspecialchars($group->id) ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>