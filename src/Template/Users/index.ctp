<div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Users</h3>
      <div class="pull-right box-tools">
        <?= $this->Html->link(__('Add New'), ['action' => 'Add'],['class'=>'btn btn-primary ']) ?>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <?php $page_no=$this->Paginator->current('menuItems'); $page_no=($page_no-1)*20; ?>
        <table class="table table-bordered">
             <thead>
                <tr>
                    <th scope="col">Sr. No.</th>
                    <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                </tr>
            </thead>
            <tbody>
               <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= h(++$page_no) ?></td>
                    <td><?= h($user->name) ?></td>
                    <td><?= h($user->username) ?></td>
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
    <!-- /.box-body -->
  </div>

