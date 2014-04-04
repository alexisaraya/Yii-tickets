<h1>Заявки</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'template' => '{items}',
'itemView'=>'_view',
)); ?>

<?php
$this->menu=array(
array('label'=>'Create Tickets','url'=>array('create')),
array('label'=>'Manage Tickets','url'=>array('admin')),
);
?>
