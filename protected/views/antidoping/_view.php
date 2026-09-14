<?php
/* @var $this AntidopingController */
/* @var $data Antidoping */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_antidoping')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_antidoping), array('view', 'id'=>$data->id_antidoping)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Cedula')); ?>:</b>
	<?php echo CHtml::encode($data->Cedula); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('des_antid_asistencia')); ?>:</b>
	<?php echo CHtml::encode($data->des_antid_asistencia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('des_antid_siglas_asistencia')); ?>:</b>
	<?php echo CHtml::encode($data->des_antid_siglas_asistencia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('des_antid_condicion')); ?>:</b>
	<?php echo CHtml::encode($data->des_antid_condicion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_conf_asc_fecha')); ?>:</b>
	<?php echo CHtml::encode($data->id_conf_asc_fecha); ?>
	<br />


</div>