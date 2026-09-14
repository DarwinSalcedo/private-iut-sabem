<?php
/* @var $this InstitucionController */
/* @var $data Institucion */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('cod_institucion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->cod_institucion), array('view', 'id'=>$data->cod_institucion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_institucion')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_institucion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('siglas_institucion')); ?>:</b>
	<?php echo CHtml::encode($data->siglas_institucion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Cod_Conf_Gobernacion')); ?>:</b>
	<?php echo CHtml::encode($data->Cod_Conf_Gobernacion); ?>
	<br />


</div>