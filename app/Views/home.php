<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?> | POS System</title>
</head>
<body>

    <nav>
        <a href="<?= base_url('/') ?>">Home</a> |
        <a href="<?= base_url('about') ?>">About</a> |
        <a href="<?= base_url('customers') ?>">Customer Accounts</a> |
        <a href="<?= base_url('users') ?>">User Accounts</a>
    </nav>

    <hr>

    <h1>POS System</h1>

    <h2>Welcome to Our Point-of-Sale System</h2>

    <p>
        This is the first version of our basic POS application
        built using CodeIgniter 4.
    </p>

    <p>
        Use the navigation menu above to view the different pages
        of the system.
    </p>

</body>
</html>