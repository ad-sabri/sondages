<h1>Login</h1>
<?= $this->Form->create() ?>
<?= $this->Form->control('nickname') ?>
<?= $this->Form->control('password') ?>
<?= $this->Form->button('Se connecter') ?>
<?= $this->Form->end() ?>