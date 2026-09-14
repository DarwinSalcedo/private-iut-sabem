<?php
/* @var $this PsiquicaController */
/* @var $data Psiquica */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_psiquica')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_psiquica), array('view', 'id'=>$data->id_psiquica)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Cedula')); ?>:</b>
	<?php echo CHtml::encode($data->Cedula); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('des_psi_asistencia')); ?>:</b>
	<?php echo CHtml::encode($data->des_psi_asistencia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('des_psi_siglas_asistencia')); ?>:</b>
	<?php echo CHtml::encode($data->des_psi_siglas_asistencia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('des_psi_condicion')); ?>:</b>
	<?php echo CHtml::encode($data->des_psi_condicion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_conf_asc_fecha')); ?>:</b>
	<?php echo CHtml::encode($data->id_conf_asc_fecha); ?>
	<br />


</div>