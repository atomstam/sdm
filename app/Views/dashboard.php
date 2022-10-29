<h2>Dashboard Page</h2>
<?php $session = session(); ?>
<h3>Welcome back <?= $session->get('firstName'); ?></h3>
<br>
<a href="<?= base_url('/logout')?>" class="btn btn-danger">Logout</a>