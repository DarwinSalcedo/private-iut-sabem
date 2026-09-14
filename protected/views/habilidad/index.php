<?php
/* @var $this HabilidadController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Habilidads',
);

$this->menu=array(
	array('label'=>'Create Habilidad', 'url'=>array('create')),
	array('label'=>'Manage Habilidad', 'url'=>array('admin')),
);
?>

<h1>Habilidads</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
