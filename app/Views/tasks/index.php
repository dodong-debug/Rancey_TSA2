<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All Tasks - Tasks for Today</title>
</head>
<body>
    <h1>All Tasks Listing</h1>
    <nav>
        <a href="<?= site_url('/') ?>">Today's Tasks</a> |
        <a href="<?= site_url('tasks') ?>">All Tasks</a> |
        <a href="<?= site_url('profile') ?>">Profile</a> |
        <a href="<?= site_url('about') ?>">About</a>
        <?php if (session()->get('logged_in') === true): ?>
            | Logged in as <?= esc(session()->get('username')) ?>
            <form action="<?= site_url('logout') ?>" method="post" style="display:inline"><?= csrf_field() ?><button type="submit">Logout</button></form>
        <?php else: ?>
            | <a href="<?= site_url('login') ?>">Login</a>
        <?php endif; ?>
    </nav>
    <hr>

    <?php if ($message = session()->getFlashdata('success')): ?><p><?= esc($message) ?></p><?php endif; ?>
    <?php if ($message = session()->getFlashdata('error')): ?><p role="alert"><?= esc($message) ?></p><?php endif; ?>

    <?php if (session()->get('logged_in') === true): ?>
        <p><a href="<?= site_url('tasks/new') ?>">+ New Task</a></p>
    <?php endif; ?>

    <table border="1" cellpadding="10">
        <thead>
            <tr><th>ID</th><th>Title</th><th>Status</th><th>Date</th><?php if (session()->get('logged_in') === true): ?><th>Actions</th><?php endif; ?></tr>
        </thead>
        <tbody>
        <?php if (!empty($tasks)): ?>
            <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?= esc($task['id']) ?></td>
                <td><?= esc($task['title']) ?></td>
                <td><?= esc($task['status']) ?></td>
                <td><?= esc($task['task_date']) ?></td>
                <?php if (session()->get('logged_in') === true): ?>
                <td>
                    <a href="<?= site_url('tasks/' . $task['id'] . '/edit') ?>">Edit</a>
                    <form action="<?= site_url('tasks/' . $task['id'] . '/delete') ?>" method="post" style="display:inline" onsubmit="return confirm('Archive this task?');">
                        <?= csrf_field() ?>
                        <button type="submit">Delete</button>
                    </form>
                </td>
                <?php endif; ?>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="<?= session()->get('logged_in') === true ? '5' : '4' ?>">No active tasks found.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
