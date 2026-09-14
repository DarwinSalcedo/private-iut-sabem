
<h1>Actualizar mis Datos (<?php echo $datos->username; ?>)</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$datos,
	'attributes'=>array(		
		#'username',		
		#'correo',
		'cedula',

 array(
        'name'=>'Nombre de Usuario',
        'type'=>'raw',
          'value'=>$datos->username.' '.CHtml::link('editar', '#'
        , array( 'onclick'=>'$("#mydialog").dialog("open"); return false;',
    )),
    ),

     array(
        'name'=>'Correo',
        'type'=>'raw',
       'value'=>$datos->correo.' '.CHtml::link('editar', '#'
        , array( 'onclick'=>'$("#mydialog2").dialog("open"); return false;',
    )),
      #  'click'=>'$("#mydialog").dialog("open"); return false;',
    
    ),

	

))); ?>
<?php $this->renderPartial('_username', array('Username'=>$Username)); ?>
<?php $this->renderPartial('_correo', array('Correo'=>$Correo)); ?>

<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>



