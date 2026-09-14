<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>



<?php  $this->beginWidget('zii.widgets.jui.CJuiDialog',array(
    'id'=>'mydialog2',
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'Actualizar',
        'autoOpen'=>false,
        'modal'=>true,      
        'width'=>300,
       # 'height'=>200,        
        'resizable'=>false,
        
        'overlay'=>array(
            'backgroundColor'=>'#000',
            'opacity'=>'0.5'
    ),
)));
 

    
echo "<div class='form'> ";

 $form=$this->beginWidget('CActiveForm',array( 
				
				'action'=>yii::app()->createUrl('usuario/Datos'),
				'id'=>'CorreoForm',
				#'enableClientValidation'=>true,
				'enableAjaxValidation'=>true,
				'clientOptions'=>array('validateOnSubmit'=>true),
				)); 



	echo $form->errorSummary($Correo); 

	
	echo "<div class='row'>";
		 echo $form->labelEx($Correo,'correo'); 
		 echo $form->textField($Correo,'correo',array('size'=>100,'maxlength'=>100)); 
		 echo $form->error($Correo,'correo');
	echo "</div>";

	

	echo "<div class='row buttons'>";
		 echo CHtml::submitButton('Actualizar'); 
	echo "</div>";

 $this->endWidget();

echo "</div>";

$this->endWidget('zii.widgets.jui.CJuiDialog');


?> 
