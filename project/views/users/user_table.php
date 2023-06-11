<!--$this->users = [1 => ['name'=>'user1', 'age'=>'23', 'salary' => 1000],]-->
<?php
$users = $data['users'] ?? null;
$user_prop = $data['user_prop'] ?? null;
?>
<?php if (!empty($users)) : ?>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">name</th>
            <th scope="col">age</th>
            <th scope="col">salary</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user['name'] ?></td>
                <td><?= $user['age'] ?></td>
                <td><?= $user['salary'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <h2>Users not found</h2>
<?php endif; ?>
<?= $user_prop ?>