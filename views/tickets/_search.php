<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textField($model,'id',array('class'=>'span5')); ?>

		<?php echo $form->textField($model,'title',array('class'=>'span5','maxlength'=>255)); ?>

		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textField($model,'user_id',array('class'=>'span5')); ?>

		<?php echo $form->textField($model,'create_date',array('class'=>'span5')); ?>

		<?php echo $form->textField($model,'status',array('class'=>'span5','maxlength'=>1)); ?>

	<div class="form-actions">
	
            
            <?php echo TbHtml::formActions(array(
    TbHtml::submitButton('Search', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
  
)); ?>
	</div>

<?php $this->endWidget(); ?>
