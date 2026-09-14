<?php
/* @var $this PostularseController */
/* @var $model Postularse */

$this->breadcrumbs=array(
	'Postularses'=>array('index'),
	'Create',
);
if (yii::app()->user->checkAccess('admin'))
{
	$this->menu=array(
		array('label'=>'Aceptar Solicitudes', 'url'=>array('index')),
	);
}
?>

<?php $Funcionario = $model->getFuncionarioCed(yii::app()->user->getState('cedula')); ?>
<?php $Jerarquia = $model->getJerarquiaName($Funcionario->Cod_Jerarquia-1); ?>
<!--Se valida que exista un proceso de postulación activo y en proceso-->
<?php if($Jerarquia == -1): ?>
	<h3>Ud. ya ha alcanzado el máximo rango de jerarquía</h3>
<?php else: ?>
	<?php if($Fecha_Asc): ?>
			<!--Se valida que la fecha esté en el rango de fechas de postulación-->
			<?php if($model->check_in_range($Fecha_Asc->fecha_postulacion, $Fecha_Asc->fecha_proceso_asc, date('Y-m-d'))): ?>
				<!--Se valida si el usuario ya se ha postulado-->
					<?php if($PostExist == true): ?>	
						<?php $data = $model->getFuncionario(); ?>
					<!--Se valida si el usuario se postulo en este proceso o en otro-->
						<?php if($Fecha_Asc->id_conf_asc_fecha == $data->id_conf_asc_fecha): ?>
							<?php Yii::app()->user->setFlash('Success','Usted ya se ha postulado' ); ?>	
							<?php echo CHtml::link('Consultar estado de postulación',array('Postularse/View',
				                                         'id'=>$data->id_postularse)); ?>
					<!--Si no se ha postulado, se muestra el formulario de postulación-->
				        <?php else: ?>
				        	<h1>Postularse</h1>
							<h3>Para optar por el rango de <?php echo $Jerarquia ?></h3>
							<?php $this->renderPartial('_form', array('model'=>$model)); ?>
				        <?php endif;?>
					<?php endif;?>
					<!--Si no se ha postulado, se muestra el formulario de postulación-->
					<?php if($PostExist == false): ?>
							<h3>Para optar por el rango de <?php echo $Jerarquia ?></h3>
						<?php $this->renderPartial('_form', array('model'=>$model)); ?>
					<?php endif;?>
			<!--No está entre el rago de fechas-->
			<?php else: ?>
				<?php Yii::app()->user->setFlash('notice','No se ha creado un nuevo proceso de postulación' ); ?>	
			<?php endif;?>
	<!--No existe proceso de postulación activo-->
	<?php elseif(is_null($Fecha_Asc)): ?>
		<?php Yii::app()->user->setFlash('notice','El proceso de postulación no se ha habilitado' ); ?>	
	<?php endif;?>
<?php endif;?>