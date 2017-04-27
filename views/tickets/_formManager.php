

<?php 

$this->breadcrumbs=array(
	'Tickets'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
    array('label'=>Yii::t('ticketsModule.contentForm', 'LABEL.LIST.TICKET'),'url'=>array('index')),
    array('label'=>Yii::t('ticketsModule.contentForm', 'LABEL.MANAGE.TICKET'),'url'=>array('admin')),
);

?>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'type' => 'bordered condensed',
'attributes'=>array(
		'title',
		'description',
		'user_id' => array('name' => 'user_id', 'value' => $model->user->first_name.' '.$model->user->last_name),
		'create_date',
		'status' => array(
			'name' => 'status', 
			'type' => 'text',
			'value' => $model->statusName,
			'htmlOptions'=>array(
				'class'=>'success',
				),
		),
),
));
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'tickets-form',
	'enableAjaxValidation'=>false,
)); ?>
<?php echo $form->textField($model, 'status', array('class'=>'hidden','value'=>($model->status == Tickets::TICKET_NEW)? Tickets::TICKET_ACTIVE:Tickets::TICKET_SOLVED )); ?>
<?php if($model->status !== Tickets::TICKET_SOLVED AND $model->status !== Tickets::TICKET_FAILED): ?>
<div class="form-actions">
	
    
               <?php echo TbHtml::formActions(array(
    TbHtml::submitButton(($model->status == "N") ? Yii::t('ticketsModule.contentForm','TAKETOWORK') : Yii::t('ticketsModule.contentForm','RESOLVED') , array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
  
)); ?>
  
</div>
<?php endif; ?>
<?php $this->endWidget(); ?>
