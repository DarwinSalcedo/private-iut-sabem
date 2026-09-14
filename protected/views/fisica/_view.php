<?php
/* @var $this FisicaController */
/* @var $data Fisica */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_fisica')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_fisica), array('view', 'id'=>$data->id_fisica)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Cedula')); ?>:</b>
	<?php echo CHtml::encode($data->Cedula); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('des_fisica_asistencia')); ?>:</b>
	<?php echo CHtml::encode($data->des_fisica_asistencia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('des_fisica_siglas_asistencia')); ?>:</b>
	<?php echo CHtml::encode($data->des_fisica_siglas_asistencia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('des_fisica_condicion')); ?>:</b>
	<?php echo CHtml::encode($data->des_fisica_condicion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_fisica')); ?>:</b>
	<?php echo CHtml::encode($data->num_fisica); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_conf_asc_fecha')); ?>:</b>
	<?php echo CHtml::encode($data->id_conf_asc_fecha); ?>
	<br />


</div>