<?php
/* @var $this AptitudActitudController */
/* @var $data AptitudActitud */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_aptitud')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_aptitud), array('view', 'id'=>$data->id_aptitud)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Cedula')); ?>:</b>
	<?php echo CHtml::encode($data->Cedula); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_puntualidad_asist')); ?>:</b>
	<?php echo CHtml::encode($data->num_puntualidad_asist); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_presentacion_apar')); ?>:</b>
	<?php echo CHtml::encode($data->num_presentacion_apar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_actitud_institucion')); ?>:</b>
	<?php echo CHtml::encode($data->num_actitud_institucion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_actitud_superiores')); ?>:</b>
	<?php echo CHtml::encode($data->num_actitud_superiores); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_cooperacion')); ?>:</b>
	<?php echo CHtml::encode($data->num_cooperacion); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('num_TotApPorc')); ?>:</b>
	<?php echo CHtml::encode($data->num_TotApPorc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_TotAcNota')); ?>:</b>
	<?php echo CHtml::encode($data->num_TotAcNota); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_evaluador')); ?>:</b>
	<?php echo CHtml::encode($data->id_evaluador); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_conf_asc_fecha')); ?>:</b>
	<?php echo CHtml::encode($data->id_conf_asc_fecha); ?>
	<br />

	*/ ?>

</div>