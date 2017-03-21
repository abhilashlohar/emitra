<div class="box box-warning">
	<div class="box-header with-border">
	  <h3 class="box-title">Grievance view</h3>

	  <div class="box-tools pull-right">
		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
		</button>
	  </div>
	  <!-- /.box-tools -->
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<span><b><?php echo $grievance->subject; ?></b></span><br/><span style="color:#989898;"><?php echo $grievance->created_on; ?></span><br/><br/>
		<p><?php echo $grievance->description; ?></p>
		Assign to :
		<div>
		<?php foreach($Users as $User){ ?>
			<div ><?= $this->Html->link(__('Assign to '.$User->name), ['action' => 'assignToOther', $grievance->id,$User->id],['class'=>'btn btn-primary']) ?></div><br/>
		<?php } ?>
		</div>
	</div>
	<!-- /.box-body -->
</div>
