<?php
/* @var $this PostuladosController */
/* @var $data Postulados */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_postulados')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_postulados), array('view', 'id'=>$data->id_postulados)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_conf_asc_fecha')); ?>:</b>
	<?php echo CHtml::encode($data->id_conf_asc_fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Cedula')); ?>:</b>
	<?php echo CHtml::encode($data->Cedula); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_postulacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_postulacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hora_postulacion')); ?>:</b>
	<?php echo CHtml::encode($data->hora_postulacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cedula_fun_recepcion')); ?>:</b>
	<?php echo CHtml::encode($data->cedula_fun_recepcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('des_datos_receptor')); ?>:</b>
	<?php echo CHtml::encode($data->des_datos_receptor); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Cod_Jerarquia')); ?>:</b>
	<?php echo CHtml::encode($data->Cod_Jerarquia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_asc_fecha')); ?>:</b>
	<?php echo CHtml::encode($data->id_asc_fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_fecha_ingreso')); ?>:</b>
	<?php echo CHtml::encode($data->id_fecha_ingreso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_modificar')); ?>:</b>
	<?php echo CHtml::encode($data->num_modificar); ?>
	<br />

	*/ ?>

</div>