<?php
/* @var $this DesempenhoController */
/* @var $data Desempenho */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_desempe')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_desempe), array('view', 'id'=>$data->id_desempe)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Cedula')); ?>:</b>
	<?php echo CHtml::encode($data->Cedula); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_responsabilidad')); ?>:</b>
	<?php echo CHtml::encode($data->num_responsabilidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_productividad')); ?>:</b>
	<?php echo CHtml::encode($data->num_productividad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_conocimiento')); ?>:</b>
	<?php echo CHtml::encode($data->num_conocimiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_capacidad_delegar')); ?>:</b>
	<?php echo CHtml::encode($data->num_capacidad_delegar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_order_planificacion')); ?>:</b>
	<?php echo CHtml::encode($data->num_order_planificacion); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('num_TotDesemPorc')); ?>:</b>
	<?php echo CHtml::encode($data->num_TotDesemPorc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_TotDesemNota')); ?>:</b>
	<?php echo CHtml::encode($data->num_TotDesemNota); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_evaluador')); ?>:</b>
	<?php echo CHtml::encode($data->id_evaluador); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_conf_asc_fecha')); ?>:</b>
	<?php echo CHtml::encode($data->id_conf_asc_fecha); ?>
	<br />

	*/ ?>

</div>