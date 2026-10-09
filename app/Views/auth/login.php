<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Tasks for Today</title>
</head>
<body>
    <h1>Login</h1>
    <nav><a href="<?= site_url('/') ?>">Today's Tasks</a> | <a href="<?= site_url('tasks') ?>">All Tasks</a> | <a href="<?= site_url('profile') ?>">Profile</a> | <a href="<?= site_url('about') ?>">About</a></nav>
    <hr>

    <?php if ($message = session()->getFlashdata('error')): ?>
        <p role="alert"><?= esc($message) ?></p>
    <?php endif; ?>
    <?php if ($message = session()->getFlashdata('success')): ?>
        <p><?= esc($message) ?></p>
    <?php endif; ?>
    <?php if (!empty($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="<?= site_url('login') ?>" method="post">
        <?= csrf_field() ?>
        <p>
            <label for="username">Username</label><br>
            <input id="username" name="username" type="text" maxlength="50" value="<?= esc($username ?? old('username', '')) ?>" required autocomplete="username">
        </p>
        <p>
            <label for="password">Password</label><br>
            <input id="password" name="password" type="password" required autocomplete="current-password">
        </p>
        <button type="submit">Login</button>
    </form>
</body>
</html>
