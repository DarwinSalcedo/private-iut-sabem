<?php
/* @var $this PostularseController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Postularses',
);

$this->menu=array(
	array('label'=>'Lista de Postulados', 'url'=>array('postulados/index')),
	array('label'=>'Gestionar Postulados', 'url'=>array('postulados/admin')),
);
?>

<h1>Solicitudes de Postulación</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
