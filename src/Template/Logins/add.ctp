<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Logins'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="logins form large-9 medium-8 columns content">
    <?= $this->Form->create($login) ?>
    <fieldset>
        <legend><?= __('Add Login') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('username');
            echo $this->Form->input('password');
            echo $this->Form->input('mobile');
            echo $this->Form->input('gcm_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
