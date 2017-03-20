<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Login'), ['action' => 'edit', $login->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Login'), ['action' => 'delete', $login->id], ['confirm' => __('Are you sure you want to delete # {0}?', $login->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Logins'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Login'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="logins view large-9 medium-8 columns content">
    <h3><?= h($login->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($login->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($login->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($login->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mobile') ?></th>
            <td><?= h($login->mobile) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gcm Id') ?></th>
            <td><?= h($login->gcm_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($login->id) ?></td>
        </tr>
    </table>
</div>
