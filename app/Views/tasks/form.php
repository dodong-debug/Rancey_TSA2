<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($pageTitle) ?> - Tasks for Today</title>
</head>
<body>
    <h1><?= esc($pageTitle) ?></h1>
    <nav><a href="<?= site_url('/') ?>">Today's Tasks</a> | <a href="<?= site_url('tasks') ?>">All Tasks</a> | <a href="<?= site_url('profile') ?>">Profile</a> | <a href="<?= site_url('about') ?>">About</a></nav>
    <hr>

    <?php if (!empty($errors)): ?>
        <ul role="alert">
            <?php foreach ($errors as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="<?= esc($formAction) ?>" method="post">
        <?= csrf_field() ?>
        <p>
            <label for="title">Task title (required)</label><br>
            <input id="title" name="title" type="text" maxlength="150" value="<?= esc($task['title'] ?? old('title', '')) ?>" required>
        </p>
        <p>
            <label for="task_date">Task date (required)</label><br>
            <input id="task_date" name="task_date" type="date" value="<?= esc($task['task_date'] ?? old('task_date', '')) ?>" required>
        </p>
        <p>
            <label for="status">Status</label><br>
            <?php $currentStatus = $task['status'] ?? old('status', 'pending'); ?>
            <select id="status" name="status" required>
                <option value="pending" <?= $currentStatus === 'pending' ? 'selected' : '' ?>>Pending</option>
                <option value="completed" <?= $currentStatus === 'completed' ? 'selected' : '' ?>>Completed</option>
            </select>
        </p>
        <button type="submit">Save Task</button>
        <a href="<?= site_url('tasks') ?>">Cancel</a>
    </form>
</body>
</html>
