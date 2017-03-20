<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Grievance'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="grievances index large-9 medium-8 columns content">
    <h3><?= __('Grievances') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('subject') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($grievances as $grievance): ?>
            <tr>
                <td><?= $this->Number->format($grievance->id) ?></td>
                <td><?= h($grievance->subject) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $grievance->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $grievance->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $grievance->id], ['confirm' => __('Are you sure you want to delete # {0}?', $grievance->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
