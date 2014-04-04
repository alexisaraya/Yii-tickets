<div class="view span3">
	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->title), array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user->first_name.' '.$data->user->last_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_date')); ?>:</b>
	<?php echo CHtml::encode($data->create_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->statusName); ?>
	<br />
	<?php if(!empty($data->sla)): ?>
		<?php foreach($data->sla as $sla): ?>
		<b><?php echo (Tickets::getStatusName($sla->status)); ?>:</b>
		<?php echo $sla->datetime; ?>
		<br />
		<?php endforeach; ?>
	<?php endif; ?>
</div>