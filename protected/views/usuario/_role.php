<div class="center-block">

<?php 
	/*if (yii::app()->user->checkAccess('admin'))
	{
		$form=$this->beginWidget("CActiveForm");?>	
		<h4>Registrar un nuevo rol</h4>
		<div class="row">
			<?php echo $form->labelEx($role,'Nombre'); ?>
			<?php echo $form->textField($role,'name'); ?>
			<?php echo $form->error($role,'name'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($role,'Descripcion'); ?>
			<?php echo $form->textArea($role,'description'); ?>
			<?php echo $form->error($role,'description'); ?>
		</div>
		
		<div class="row">
			<?php echo CHtml::submitButton("Nuevo Rol",array("class"=>"btn btn-primary")); ?>
		</div>

<?php $this->endWidget();}*/
?>
<div class="span3" >
<?php #si el usuario esta bloqueado o no 
$verificar=$model->bloqueado($model->id);
?>
		<div>
		<h4>Estatus del Usuario<h4>
		<div class='btn'>		
		<?php echo CHtml::link($verificar?"Bloquear":"Desbloquear",array("usuario/Bloquear","id"=>$model->id));  ?>
		 </div> 
		 </div>
</div>
				
			<div class="span3" >
					<h5>Permisos de usuario</h5>
					<ul class="nav nav-tabs nav-stacked">
					<?php foreach(yii::app()->authManager->getAuthItems() as $data):?>
						
							<?php $disponible=yii::app()->authManager->checkAccess($data->name,$model->id) //devuelve un boolenano que manejare  ?>
							<li>
								<h4><?php if($data->name ==='admin')
											 echo 'Administrador';
								          elseif($data->name ==='demo')
								          	 echo 'Visitante';
								          else
								          	echo $data->name
								  ?>
								 </h4>
							 <div>		
							<?php echo CHtml::link($disponible?"Activado":"Desactivado",array("usuario/asignarPermiso","id"=>$model->id,"item"=>$data->name),array('class'=>$disponible?"btn btn-primary":"btn btn-secundary"));  ?>
							
							</div>
							
							
						</li>
					<?php endforeach    ?>
					</ul>
			</div>

</div>

