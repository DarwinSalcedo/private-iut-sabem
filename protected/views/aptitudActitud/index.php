<?php
/* @var $this AptitudActitudController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Aptitud Actituds',
);

$this->menu=array(
	array('label'=>'Create AptitudActitud', 'url'=>array('create')),
	array('label'=>'Manage AptitudActitud', 'url'=>array('admin')),
);
?>

<h1>Aptitud Actituds</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
