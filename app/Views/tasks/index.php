<!DOCTYPE html>
<html>
<head>
    <title>All Tasks</title>
</head>
<body>
    <h1>All Tasks Listing</h1>
    <nav>
        <a href="/">Today's Tasks</a> | 
        <a href="/tasks">All Tasks</a> | 
        <a href="/profile">Profile</a> | 
        <a href="/about">About</a>
    </nav>
    <hr>
    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Status</th>
            <th>Date</th>
        </tr>
        <?php if (!empty($tasks)): ?>
            <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?= esc($task['id']) ?></td>
                <td><?= esc($task['title']) ?></td>
                <td><?= esc($task['status']) ?></td>
                <td><?= esc($task['task_date']) ?></td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="4">No tasks found.</td></tr>
        <?php endif; ?>
    </table>
</body>
</html>