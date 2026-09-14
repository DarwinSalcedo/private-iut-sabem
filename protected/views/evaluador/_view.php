<?php
/* @var $this EvaluadorController */
/* @var $data Evaluador */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_evaluador')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_evaluador), array('view', 'id'=>$data->id_evaluador)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Cedula')); ?>:</b>
	<?php echo CHtml::encode($data->Cedula); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CedEvaluador')); ?>:</b>
	<?php echo CHtml::encode($data->CedEvaluador); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_conf_asc_fecha')); ?>:</b>
	<?php echo CHtml::encode($data->id_conf_asc_fecha); ?>
	<br />


</div>