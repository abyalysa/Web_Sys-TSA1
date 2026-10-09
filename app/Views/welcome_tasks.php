<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title) ?></title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background-color: #f2f2f2; }
        .btn-edit { color: blue; text-decoration: none; margin-right: 10px; }
        .btn-delete { color: red; text-decoration: none; }
    </style>
</head>
<body>
    <?= view('partials/nav') ?>
    <h1>Welcome — Today's Tasks (<?= date('Y-m-d') ?>)</h1>

    <?php if (!empty($tasks)): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Date</th>
                    <?php if (session()->get('isLoggedIn')): ?>
                        <th>Actions</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks as $task): ?>
                    <tr>
                        <td><?= esc($task['id']) ?></td>
                        <td><?= esc($task['title']) ?></td>
                        <td><?= esc($task['status']) ?></td>
                        <td><?= esc($task['task_date']) ?></td>
                        <?php if (session()->get('isLoggedIn')): ?>
                            <td>
                                <a href="<?= base_url('/tasks/edit/' . $task['id']) ?>" class="btn-edit">Edit</a>
                                <a href="<?= base_url('/tasks/delete/' . $task['id']) ?>" class="btn-delete" onclick="return confirm('Are you sure you want to archive this task?')">Delete</a>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No tasks scheduled for today.</p>
    <?php endif; ?>
</body>
</html>