<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'tickets-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
	<?php echo $form->textField($model,'title',array('class'=>'span5','maxlength'=>255)); ?>
	<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
<div class="form-actions">
	
               <?php echo TbHtml::formActions(array(
    TbHtml::submitButton($model->isNewRecord ? 'Nuevo' : 'Actualizar', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
  
)); ?>
</div>
<?php $this->endWidget(); ?>
