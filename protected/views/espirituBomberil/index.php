<?php
/* @var $this EspirituBomberilController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Espiritu Bomberils',
);

$this->menu=array(
	array('label'=>'Create EspirituBomberil', 'url'=>array('create')),
	array('label'=>'Manage EspirituBomberil', 'url'=>array('admin')),
);
?>

<h1>Espiritu Bomberils</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
