<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title) ?></title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        nav a { margin-right: 15px; font-weight: bold; text-decoration: none; }
        .card { border: 1px solid #ccc; border-radius: 8px; padding: 20px; width: 320px; margin-top: 15px; }
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
    <h1>User Profile</h1>

    <?php if (!empty($user)): ?>
        <div class="card">
            <p><strong>ID:</strong> <?= esc($user['id']) ?></p>
            <p><strong>Username:</strong> <?= esc($user['username']) ?></p>
            <p><strong>Full Name:</strong> <?= esc($user['full_name']) ?></p>
            <p><strong>Email:</strong> <?= esc($user['email']) ?></p>
            <p><strong>Created At:</strong> <?= esc($user['created_at']) ?></p>
        </div>
    <?php else: ?>
        <p>User record not found.</p>
    <?php endif; ?>
</body>
</html>