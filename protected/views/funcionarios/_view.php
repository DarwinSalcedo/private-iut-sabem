<?php
/* @var $this FuncionariosController */
/* @var $data Funcionarios */
?>

<div class="view">

	<b><?php #echo CHtml::encode($data->getAttributeLabel('Identificacion')); ?></b>
	<?php #echo CHtml::link(CHtml::encode($data->id_funcionario), array('view', 'id'=>$data->id_funcionario)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Cedula')); ?>:</b>
	<?php #echo CHtml::encode($data->Cedula); ?>
	<?php echo CHtml::link(CHtml::encode($data->Cedula), array('view', 'id'=>$data->id_funcionario)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Nombre')); ?>:</b>
	<?php echo CHtml::encode($data->Nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Apellidos')); ?>:</b>
	<?php echo CHtml::encode($data->Apellidos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha_Ingreso')); ?>:</b>
	<?php echo CHtml::encode($data->CambiarFecha($data->Fecha_Ingreso)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Jerarquia')); ?>:</b>
	<?php echo CHtml::encode($data->jerarquia->Descripcion_Jerarquia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Institucion')); ?>:</b>
	<?php echo CHtml::encode($data->institucion->nombre_institucion); ?>
	<br /><br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('num_equipo_anterior')); ?>:</b>
	<?php echo CHtml::encode($data->num_equipo_anterior); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Cod_Condicion')); ?>:</b>
	<?php echo CHtml::encode($data->Cod_Condicion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cod_institucion')); ?>:</b>
	<?php echo CHtml::encode($data->cod_institucion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Observacion')); ?>:</b>
	<?php echo CHtml::encode($data->Observacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Sexo')); ?>:</b>
	<?php echo CHtml::encode($data->Sexo); ?>
	<br />

	*/ ?>

</div>
