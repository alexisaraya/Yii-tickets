<?php
$this->breadcrumbs=array(
	'Tickets'=>array('index'),
	'Create',
);

$this->menu=array(
    array('label'=>Yii::t('ticketsModule.contentForm', 'LABEL.LIST.TICKET'),'url'=>array('index')),
    array('label'=>Yii::t('ticketsModule.contentForm', 'LABEL.MANAGE.TICKET'),'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('ticketsModule.contentForm', 'LABEL.CREATE.TICKET') ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>