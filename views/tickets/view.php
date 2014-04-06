<?php
$this->breadcrumbs=array(
	'Tickets'=>array('index'),
	$model->title,
);

$this->menu=array(
array('label'=>'List Tickets','url'=>array('index')),
array('label'=>'Create Tickets','url'=>array('create')),
array('label'=>'Update Tickets','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Tickets','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Tickets','url'=>array('admin')),
);
?>

<h1><?php echo $model->title; ?></h1>

<?php 
$this->widget('bootstrap.widgets.TbDetailView',array(
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
<?php 
// echo "<pre>";
// print_r($model);
// echo "</pre>";
if(empty($model->sla[0])){
$this->widget('tickets.components.ConsiderSla', array(
    'params'=>array(
     	'create_time' => $model->create_date,
      'reaction_time' => new DateInterval('PT2H30M'),
      'spent_time' => new DateInterval('PT3H30M'),
      'start_work' => new DateInterval('PT8H30M'),
      'end_work' =>new DateInterval('PT17H30M'),
      // 'A_time' => $model->sla[0]->datetime,
      // 'S_time' => $model->sla[1]->datetime,
    )
	)); 
}elseif(!empty($model->sla[0]) && empty($model->sla[1])){
$this->widget('tickets.components.ConsiderSla', array(
    'params'=>array(
     	'create_time' => $model->create_date,
      'reaction_time' => new DateInterval('PT2H30M'),
      'spent_time' => new DateInterval('PT3H30M'),
      'start_work' => new DateInterval('PT8H30M'),
      'end_work' =>new DateInterval('PT17H30M'),
      'A_time' => $model->sla[0]->datetime,
      // 'S_time' => $model->sla[1]->datetime,
    )
	)); 
}elseif(!empty($model->sla[0]) && !empty($model->sla[1])){
$this->widget('tickets.components.ConsiderSla', array(
    'params'=>array(
     	'create_time' => $model->create_date,
      'reaction_time' => new DateInterval('PT2H30M'),
      'spent_time' => new DateInterval('PT3H30M'),
      'start_work' => new DateInterval('PT8H30M'),
      'end_work' =>new DateInterval('PT17H30M'),
      'A_time' => $model->sla[0]->datetime,
      'S_time' => $model->sla[1]->datetime,
    )
	)); 
}
?>

