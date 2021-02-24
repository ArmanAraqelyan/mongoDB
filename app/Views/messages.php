<?php if (session()->has('error')) : ?>
    <p><?= session()->get('error')->listErrors() ?></p>
<?php endif; ?>

<?php if (session()->has('message')) : ?>
    <p><?= session()->get('message') ?></p>
<?php endif; ?>