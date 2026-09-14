<?php
/* @var $this AuditoriaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Auditorias',
);

$this->menu=array(
	array('label'=>'Create Auditoria', 'url'=>array('create')),
	array('label'=>'Manage Auditoria', 'url'=>array('admin')),
);
?>

<h1>Auditorias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
