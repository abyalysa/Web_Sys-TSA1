<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title) ?></title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .form-box { width: 350px; padding: 20px; border: 1px solid #ccc; border-radius: 6px; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; }
        .form-group input, .form-group select { width: 100%; padding: 8px; box-sizing: border-box; }
        button { padding: 10px 15px; background: #007bff; color: white; border: none; cursor: pointer; }
        .error-list { color: red; }
    </style>
</head>
<body>
    <?= view('partials/nav') ?>
    <h2>Edit Task</h2>

    <?php if (session()->getFlashdata('errors')): ?>
        <ul class="error-list">
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <div class="form-box">
        <form action="<?= base_url('/tasks/update/' . $task['id']) ?>" method="post">
            <?= csrf_field() ?>
            <div class="form-group">
                <label>Task Title *</label>
                <input type="text" name="title" value="<?= old('title', $task['title']) ?>" required>
            </div>
            <div class="form-group">
                <label>Task Date *</label>
                <input type="date" name="task_date" value="<?= old('task_date', $task['task_date']) ?>" required>
            </div>
            <div class="form-group">
                <label>Status</label>
                <select name="status">
                    <option value="pending" <?= $task['status'] === 'pending' ? 'selected' : '' ?>>Pending</option>
                    <option value="completed" <?= $task['status'] === 'completed' ? 'selected' : '' ?>>Completed</option>
                </select>
            </div>
            <button type="submit">Update Task</button>
        </form>
    </div>
</body>
</html>