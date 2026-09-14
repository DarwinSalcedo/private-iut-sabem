<?php
/* @var $this IngresoController */
/* @var $data Ingreso */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_usuario), array('view', 'id'=>$data->id_usuario)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Cedula')); ?>:</b>
	<?php echo CHtml::encode($data->Cedula); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Equipo')); ?>:</b>
	<?php echo CHtml::encode($data->Equipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Login')); ?>:</b>
	<?php echo CHtml::encode($data->Login); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Clave')); ?>:</b>
	<?php echo CHtml::encode($data->Clave); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Nombre')); ?>:</b>
	<?php echo CHtml::encode($data->Nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Apellidos')); ?>:</b>
	<?php echo CHtml::encode($data->Apellidos); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Condicion')); ?>:</b>
	<?php echo CHtml::encode($data->Condicion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TipoUsuario')); ?>:</b>
	<?php echo CHtml::encode($data->TipoUsuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cod_institucion')); ?>:</b>
	<?php echo CHtml::encode($data->cod_institucion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cod_nivel_acceso')); ?>:</b>
	<?php echo CHtml::encode($data->cod_nivel_acceso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('des_cambio_contraseña')); ?>:</b>
	<?php echo CHtml::encode($data->des_cambio_contraseña); ?>
	<br />

	*/ ?>

</div>