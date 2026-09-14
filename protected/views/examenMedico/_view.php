<?php
/* @var $this ExamenMedicoController */
/* @var $data ExamenMedico */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_exa_medico')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_exa_medico), array('view', 'id'=>$data->id_exa_medico)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Cedula')); ?>:</b>
	<?php echo CHtml::encode($data->Cedula); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('des_asist_exa_medico')); ?>:</b>
	<?php echo CHtml::encode($data->des_asist_exa_medico); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('des_asist_exa_medico_siglas')); ?>:</b>
	<?php echo CHtml::encode($data->des_asist_exa_medico_siglas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('des_asist_exa_condicion')); ?>:</b>
	<?php echo CHtml::encode($data->des_asist_exa_condicion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_conf_asc_fecha')); ?>:</b>
	<?php echo CHtml::encode($data->id_conf_asc_fecha); ?>
	<br />


</div>