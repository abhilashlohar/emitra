<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?= $this->Form->create($user) ?>
              <div class="box-body">
                <div class="form-group">
                  <?php echo $this->Form->input('name', ['class'=>'form-control']); ?>
                </div>
                <div class="form-group">
                  <?php echo $this->Form->input('username', ['class'=>'form-control']); ?>
                </div>
                <div class="form-group">
                  <?php echo $this->Form->input('password', ['class'=>'form-control']); ?>
                </div>
              <div class="box-footer">
                <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
              </div>
            <?= $this->Form->end() ?>
          </div>
    </div>
</div>
