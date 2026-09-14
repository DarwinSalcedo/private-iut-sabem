<?php
/* @var $this ConfigPlazaController */
/* @var $data ConfigPlaza */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_config_nota_plaza')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_config_nota_plaza), array('view', 'id'=>$data->id_config_nota_plaza)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Cod_Jerarquia')); ?>:</b>
	<?php echo CHtml::encode($data->Cod_Jerarquia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_plazas')); ?>:</b>
	<?php echo CHtml::encode($data->num_plazas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_nota_minima')); ?>:</b>
	<?php echo CHtml::encode($data->num_nota_minima); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_nota_final')); ?>:</b>
	<?php echo CHtml::encode($data->num_nota_final); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('des_orden_general')); ?>:</b>
	<?php echo CHtml::encode($data->des_orden_general); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('des_jerarq_orden')); ?>:</b>
	<?php echo CHtml::encode($data->des_jerarq_orden); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_conf_asc_fecha')); ?>:</b>
	<?php echo CHtml::encode($data->id_conf_asc_fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_tiempo_jerar')); ?>:</b>
	<?php echo CHtml::encode($data->num_tiempo_jerar); ?>
	<br />

	*/ ?>

</div>