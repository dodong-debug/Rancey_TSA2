<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
</head>
<body>
    <h1>User Profile</h1>
    <nav>
        <a href="/">Today's Tasks</a> | 
        <a href="/tasks">All Tasks</a> | 
        <a href="/profile">Profile</a> | 
        <a href="/about">About</a>
    </nav>
    <hr>
    <?php if (!empty($user)): ?>
        <p><strong>Username:</strong> <?= esc($user['username'] ?? 'N/A') ?></p>
        <p><strong>Full Name:</strong> <?= esc($user['full_name'] ?? 'N/A') ?></p>
        <p><strong>Email:</strong> <?= esc($user['email'] ?? 'N/A') ?></p>
        <p><strong>Member Since:</strong> <?= esc($user['created_at'] ?? 'N/A') ?></p>
    <?php else: ?>
        <p>No user record found.</p>
    <?php endif; ?>
</body>
</html>