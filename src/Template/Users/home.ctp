<div style="margin-bottom: 7px;font-size: 16px;color: #797878;">Complaints status | last 30 dyas</div>
<div class="row">
	<div class="col-md-4 col-sm-6 col-xs-12">
	  <div class="info-box bg-red">
		<span class="info-box-icon"><i class="fa fa-fw fa-exclamation-triangle"></i></span>

		<div class="info-box-content">
		  <span class="info-box-text">Pending complaints</span>
		  <span class="info-box-number">41</span>

		  <div class="progress">
			<div class="progress-bar" style="width: 12%"></div>
		  </div>
			  <span class="progress-description">
				<i class="fa fa-fw fa-level-down"></i> 12%
			  </span>
		</div>
		<!-- /.info-box-content -->
	  </div>
	  <!-- /.info-box -->
	</div>
	<div class="col-md-4 col-sm-6 col-xs-12">
	  <div class="info-box bg-yellow">
		<span class="info-box-icon"><i class="fa fa-fw fa-share"></i></span>

		<div class="info-box-content">
		  <span class="info-box-text">Transfered to next level</span>
		  <span class="info-box-number">19</span>

		  
		</div>
		<!-- /.info-box-content -->
	  </div>
	  <!-- /.info-box -->
	</div>
	<div class="col-md-4 col-sm-6 col-xs-12">
	  <div class="info-box bg-green">
		<span class="info-box-icon"><i class="fa fa-fw fa-check"></i></span>

		<div class="info-box-content">
		  <span class="info-box-text">Closed complaints</span>
		  <span class="info-box-number">57</span>

		  <div class="progress">
			<div class="progress-bar" style="width: 32%"></div>
		  </div>
			  <span class="progress-description">
				<i class="fa fa-fw fa-level-up"></i> 32% 
			  </span>
		</div>
		<!-- /.info-box-content -->
	  </div>
	  <!-- /.info-box -->
	</div>
</div>


<div class="row">
	<div class="col-md-8">
		<div class="box box-warning">
			<div class="box-header with-border">
			  <h3 class="box-title">Recent Grievances</h3>

			  <div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
				</button>
			  </div>
			  <!-- /.box-tools -->
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			<table class="table ">
				<tbody>
					<tr>
					  <th>Sr. No.</th>
					  <th>Subject</th>
					  <th>Cteated On</th>
					</tr>
					<?php $i=0; foreach($Grievances as $Grievance){ $i++; ?>
					<tr>
					  <td><?= h($i) ?></td>
					  <td><?= h($Grievance->subject) ?></td>
					  <td><?= h($Grievance->created_on) ?></td>
					</tr>
					<?php } ?>
					<tr>
					  <td colspan="3" align="right">
					  <?= $this->Html->link(__('See all grievances'), ['controller'=>'grievances','action' => 'index']) ?>
					  </td>
					</tr>
				</tbody>
			</table>
			</div>
			<!-- /.box-body -->
		</div>
	</div>
	<div class="col-md-4">
	<?= $this->Html->link(__('Add new service'), ['controller'=>'services','action' => 'add']) ?>
	</div>
</div>