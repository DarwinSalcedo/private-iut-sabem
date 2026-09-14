<?php
/* @var $this CondicionController */
/* @var $data Condicion */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Cod_Condicion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Cod_Condicion), array('view', 'id'=>$data->Cod_Condicion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Descripcion_Condicion')); ?>:</b>
	<?php echo CHtml::encode($data->Descripcion_Condicion); ?>
	<br />


</div>