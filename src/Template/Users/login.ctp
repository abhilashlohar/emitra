<div class="box box-primary" style=" width: 40%; margin: auto; ">
	<div class="box-header with-border">
	  <h3 class="box-title">Login</h3>
	</div>
	<?= $this->Form->create() ?>
	  <div class="box-body">
		<div class="form-group">
		  <label for="exampleInputEmail1">Username</label>
		  <?php echo $this->Form->input('username', ['label'=>false,'class'=>'form-control']); ?>
		</div>
		<div class="form-group">
		  <label for="exampleInputEmail1">Password</label>
		  <?php echo $this->Form->input('password', ['label'=>false,'class'=>'form-control']); ?>
		</div>
	  </div>
	  <!-- /.box-body -->

	  <div class="box-footer">
		<button type="submit" class="btn btn-primary">Login</button>
	  </div>
	 <?= $this->Form->end() ?>
</div>
