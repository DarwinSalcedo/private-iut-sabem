<?php
/* @var $this PostuladosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Postuladoses',
);

$this->menu=array(
	array('label'=>'Solicitudes de Postulación', 'url'=>array('Postularse/index')),
	array('label'=>'Gestionar Postulados', 'url'=>array('admin')),
);
?>

<h1>Postulados</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
