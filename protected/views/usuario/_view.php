<?php
/* @var $this UsuarioController */
/* @var $data Usuario */
?>
<?php if (yii::app()->user->getState('cedula') != $data->cedula)
	{?>
	<div class="view">

		
		<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
		<?php #echo CHtml::encode($data->username); ?>
		<?php echo CHtml::link(CHtml::encode($data->username), array('view', 'id'=>$data->id)); ?>
		<br />

		

		<b><?php echo CHtml::encode($data->getAttributeLabel('correo')); ?>:</b>
		<?php echo CHtml::encode($data->correo); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
		<?php echo CHtml::encode($data->estatus); ?>
		<br />
		</div>
<?php } ?>

