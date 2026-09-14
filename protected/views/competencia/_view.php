<?php
/* @var $this CompetenciaController */
/* @var $data Competencia */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_competencia')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_competencia), array('view', 'id'=>$data->id_competencia)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Cedula')); ?>:</b>
	<?php echo CHtml::encode($data->Cedula); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_demuestra_eficaz')); ?>:</b>
	<?php echo CHtml::encode($data->num_demuestra_eficaz); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_respetado_meritos')); ?>:</b>
	<?php echo CHtml::encode($data->num_respetado_meritos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_nunca_decisi_impul')); ?>:</b>
	<?php echo CHtml::encode($data->num_nunca_decisi_impul); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_habla_diccion_cohe')); ?>:</b>
	<?php echo CHtml::encode($data->num_habla_diccion_cohe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_actualizado_bom')); ?>:</b>
	<?php echo CHtml::encode($data->num_actualizado_bom); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('num_TotComPorc')); ?>:</b>
	<?php echo CHtml::encode($data->num_TotComPorc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_TotComNota')); ?>:</b>
	<?php echo CHtml::encode($data->num_TotComNota); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_evaluador')); ?>:</b>
	<?php echo CHtml::encode($data->id_evaluador); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_conf_asc_fecha')); ?>:</b>
	<?php echo CHtml::encode($data->id_conf_asc_fecha); ?>
	<br />

	*/ ?>

</div>