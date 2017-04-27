<h1><?php echo Yii::t('ticketsModule.contentForm', 'LABEL.REQUEST'); ?> </h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'template' => '{items}',
'itemView'=>'_view',
)); ?>

<?php
$this->menu=array(
array('label'=>Yii::t('ticketsModule.contentForm', 'LABEL.CREATE.TICKET'),'url'=>array('create')),
array('label'=>Yii::t('ticketsModule.contentForm', 'LABEL.MANAGE.TICKET'),'url'=>array('admin')),
);
?>
