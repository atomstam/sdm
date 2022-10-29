<h2><?= esc($title); ?></h2>

<?php if(!empty($users) && is_array($users)) :?>

    <?php foreach ($users as $users_item): ?>

        <h3><?= esc($users_item['firstName'].' '.$users_item['lastName']); ?></h3>
        <div class="main">
            <?= esc($users_item['email']); ?>
        </div>

    <?php endforeach ?>

<?php else : ?>

    <h3>No Users</h3>
    <p>Unable to find any user for you.</p>

<?php endif ?>