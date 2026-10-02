<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title) ?></title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        nav a { margin-right: 15px; font-weight: bold; text-decoration: none; }
        .card { border: 1px solid #ccc; border-radius: 8px; padding: 20px; width: 350px; margin-top: 15px; }
    </style>
</head>
<body>
    <nav>
        <a href="<?= base_url('/') ?>">Welcome</a>
        <a href="<?= base_url('/tasks') ?>">Task List</a>
        <a href="<?= base_url('/profile') ?>">Profile</a>
        <a href="<?= base_url('/about') ?>">About</a>
    </nav>
    <hr>
    <h1>About the Developer</h1>

    <div class="card">
        <h3><?= esc($developer['name']) ?></h3>
        <p><strong>Role:</strong> <?= esc($developer['role']) ?></p>
        <p><?= esc($developer['bio']) ?></p>
    </div>
</body>
</html>