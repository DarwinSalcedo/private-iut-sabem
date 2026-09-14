<?php
/* @var $this FuncionariosController */
/* @var $model Funcionarios */

$this->breadcrumbs=array(
	'Funcionarioses'=>array('index'),
	$model->id_funcionario=>array('view','id'=>$model->id_funcionario),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Funcionarios', 'url'=>array('index')),
	array('label'=>'Registrar Funcionarios', 'url'=>array('create')),
	array('label'=>'Ver Funcionarios', 'url'=>array('view', 'id'=>$model->id_funcionario)),
	array('label'=>'Manejo de Funcionarios', 'url'=>array('admin')),
	array('label'=>'Reportes por jerarquia', 'url'=>array('reportes')),
);
?>

<h1>Actualizar Funcionario <?php echo $model->Nombre; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'nivel'=>$nivel)); ?>