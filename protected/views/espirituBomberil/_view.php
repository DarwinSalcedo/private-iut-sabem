<?php
/* @var $this EspirituBomberilController */
/* @var $data EspirituBomberil */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_espiritu_bom')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_espiritu_bom), array('view', 'id'=>$data->id_espiritu_bom)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Cedula')); ?>:</b>
	<?php echo CHtml::encode($data->Cedula); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_disciplinado')); ?>:</b>
	<?php echo CHtml::encode($data->num_disciplinado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_demuestra_mistica')); ?>:</b>
	<?php echo CHtml::encode($data->num_demuestra_mistica); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_abnegado')); ?>:</b>
	<?php echo CHtml::encode($data->num_abnegado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_demuestra_inden')); ?>:</b>
	<?php echo CHtml::encode($data->num_demuestra_inden); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_demuestra_comp')); ?>:</b>
	<?php echo CHtml::encode($data->num_demuestra_comp); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('num_TotEspPorc')); ?>:</b>
	<?php echo CHtml::encode($data->num_TotEspPorc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_TotEspNota')); ?>:</b>
	<?php echo CHtml::encode($data->num_TotEspNota); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_evaluador')); ?>:</b>
	<?php echo CHtml::encode($data->id_evaluador); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_conf_asc_fecha')); ?>:</b>
	<?php echo CHtml::encode($data->id_conf_asc_fecha); ?>
	<br />

	*/ ?>

</div>