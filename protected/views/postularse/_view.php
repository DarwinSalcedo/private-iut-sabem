<?php
/* @var $this PostularseController */
/* @var $data Postularse */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_postularse')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_postularse), array('view', 'id'=>$data->id_postularse)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cedula')); ?>:</b>
	<?php echo CHtml::encode($data->cedula); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apellido')); ?>:</b>
	<?php echo CHtml::encode($data->apellido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cargo')); ?>:</b>
	<?php echo CHtml::encode($data->cargo); ?>
	<br />


</div>