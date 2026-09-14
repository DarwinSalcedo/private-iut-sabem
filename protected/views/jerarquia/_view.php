<?php
/* @var $this JerarquiaController */
/* @var $data Jerarquia */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Cod_Jerarquia')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Cod_Jerarquia), array('view', 'id'=>$data->Cod_Jerarquia)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Descripcion_Jerarquia')); ?>:</b>
	<?php echo CHtml::encode($data->Descripcion_Jerarquia); ?>
	<br />


</div>