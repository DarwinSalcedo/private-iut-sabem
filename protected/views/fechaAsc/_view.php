<?php
/* @var $this FechaAscController */
/* @var $data FechaAsc */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_conf_asc_fecha')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_conf_asc_fecha), array('view', 'id'=>$data->id_conf_asc_fecha)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_proceso_asc')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_proceso_asc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('des_proceso_asc')); ?>:</b>
	<?php echo CHtml::encode($data->des_proceso_asc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('des_estatus_cond')); ?>:</b>
	<?php echo CHtml::encode($data->des_estatus_cond); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_postulacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_postulacion); ?>
	<br />

	<!--Se agregan los porcentajes de las evaluaciones -->

	<b><?php echo CHtml::encode($data->getAttributeLabel('porc_academico')); ?>:</b>
	<?php echo CHtml::encode($data->porc_academico); ?>%
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('porc_antiguedad')); ?>:</b>
	<?php echo CHtml::encode($data->porc_antiguedad); ?>%
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('porc_desempenho')); ?>:</b>
	<?php echo CHtml::encode($data->porc_desempenho); ?>%
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('porc_mejoram_prof')); ?>:</b>
	<?php echo CHtml::encode($data->porc_mejoram_prof); ?>%
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('porc_cursos')); ?>:</b>
	<?php echo CHtml::encode($data->porc_cursos); ?>%
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('porc_condecor')); ?>:</b>
	<?php echo CHtml::encode($data->porc_condecor); ?>%
	<br />


</div>