<div class="box box-warning">
	<div class="box-header with-border">
	  <h3 class="box-title">Grievances</h3>

	  <div class="box-tools pull-right">
		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
		</button>
	  </div>
	  <!-- /.box-tools -->
	</div>
	<!-- /.box-header -->
	<div class="box-body">
	<table class="table ">
		<tr>
			<th>Sr. No.</th>
			<th>Subject</th>
			<th>Cteated On</th>
			<th class="actions">Action</th>
		</tr>
		<tbody>
			<?php foreach ($grievances as $grievance): ?>
			<tr>
				<td><?= $this->Number->format($grievance->id) ?></td>
				<td><?= h($grievance->subject) ?></td>
				<td><?= h($grievance->created_on) ?></td>
				<td class="actions">
					<?= $this->Html->link(__('Assign to other'), ['action' => 'view', $grievance->id]) ?>
					
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	</div>
	<!-- /.box-body -->
</div>
