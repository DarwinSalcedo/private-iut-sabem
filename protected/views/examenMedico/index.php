<?php
/* @var $this ExamenMedicoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Examen Medicos',
);

$this->menu=array(
	array('label'=>'Create ExamenMedico', 'url'=>array('create')),
	array('label'=>'Manage ExamenMedico', 'url'=>array('admin')),
);
?>

<h1>Examen Medicos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
