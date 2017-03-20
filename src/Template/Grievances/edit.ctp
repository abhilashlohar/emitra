<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $grievance->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $grievance->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Grievances'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="grievances form large-9 medium-8 columns content">
    <?= $this->Form->create($grievance) ?>
    <fieldset>
        <legend><?= __('Edit Grievance') ?></legend>
        <?php
            echo $this->Form->input('subject');
            echo $this->Form->input('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
