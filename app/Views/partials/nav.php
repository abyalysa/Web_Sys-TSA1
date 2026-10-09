<nav style="margin-bottom: 15px;">
    <a href="<?= base_url('/') ?>">Welcome</a> | 
    <a href="<?= base_url('/tasks') ?>">Task List</a> | 
    <a href="<?= base_url('/profile') ?>">Profile</a> | 
    <a href="<?= base_url('/about') ?>">About</a> | 
    <?php if (session()->get('isLoggedIn')): ?>
        <a href="<?= base_url('/tasks/new') ?>" style="color: green; font-weight: bold;">+ New Task</a> | 
        <span>Logged in as <strong><?= esc(session()->get('username')) ?></strong></span> | 
        <a href="<?= base_url('/logout') ?>" style="color: red;">Logout</a>
    <?php else: ?>
        <a href="<?= base_url('/login') ?>" style="font-weight: bold;">Login</a>
    <?php endif; ?>
</nav>
<hr>

<?php if (session()->getFlashdata('success')): ?>
    <p style="color: green; font-weight: bold;"><?= session()->getFlashdata('success') ?></p>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <p style="color: red; font-weight: bold;"><?= session()->getFlashdata('error') ?></p>
<?php endif; ?>