<div class="users form large-4 ">
<?= $this->Flash->render() ?>
<?= $this->Form->create() ?>
<fieldset>
    <legend><?= __('Please enter your username and password') ?></legend>
    <?= $this->Form->control('username') ?>
    <?= $this->Form->control('password') ?>
</fieldset>
<?= $this->Form->button(__('Login')); ?>
    <?=$this->Html->link('Register Now', array('action'=>'add', 'controller'=>'users'));?>.
<?= $this->Form->end() ?>
</div>