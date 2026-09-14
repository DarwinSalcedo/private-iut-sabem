<?php
/* @var $this HabilidadController */
/* @var $data Habilidad */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_habilidad')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_habilidad), array('view', 'id'=>$data->id_habilidad)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Cedula')); ?>:</b>
	<?php echo CHtml::encode($data->Cedula); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_carisma_lider')); ?>:</b>
	<?php echo CHtml::encode($data->num_carisma_lider); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_iniciativa_crea')); ?>:</b>
	<?php echo CHtml::encode($data->num_iniciativa_crea); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_manejo_conflitos')); ?>:</b>
	<?php echo CHtml::encode($data->num_manejo_conflitos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_coordinacion')); ?>:</b>
	<?php echo CHtml::encode($data->num_coordinacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_toma_decisiones')); ?>:</b>
	<?php echo CHtml::encode($data->num_toma_decisiones); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('num_TotHaPorc')); ?>:</b>
	<?php echo CHtml::encode($data->num_TotHaPorc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_TotHaNota')); ?>:</b>
	<?php echo CHtml::encode($data->num_TotHaNota); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_evaluador')); ?>:</b>
	<?php echo CHtml::encode($data->id_evaluador); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_conf_asc_fecha')); ?>:</b>
	<?php echo CHtml::encode($data->id_conf_asc_fecha); ?>
	<br />

	*/ ?>

</div>