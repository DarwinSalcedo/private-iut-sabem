<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>



<?php  $this->beginWidget('zii.widgets.jui.CJuiDialog',array(
    'id'=>'mydialog',
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'Actualizar',
        'autoOpen'=>false,
        'width'=>300,
       # 'height'=>200,        
        'resizable'=>false,
        'modal'=>true,
        'overlay'=>array(
            'backgroundColor'=>'#000',
            'opacity'=>'0.5'
        ),
    ),
));
 

    
echo "<div class='form'> ";

 $form=$this->beginWidget('CActiveForm',array( 
				
				'action'=>yii::app()->createUrl('usuario/Datos'),
				'id'=>'UsernameForm',
				#'enableClientValidation'=>true,
				'enableAjaxValidation'=>true,
				'clientOptions'=>array('validateOnSubmit'=>true),
				)); 



	echo $form->errorSummary($Username); 

	echo "<div class='row'>";
		 echo $form->labelEx($Username,'Nombre de Usuario'); 
		 echo $form->textField($Username,'username',array('size'=>20,'maxlength'=>20)); 
		 echo $form->error($Username,'username');
	echo "</div>";

	

	echo "<div class='row buttons'>";
		 echo CHtml::submitButton('Actualizar'); 
	echo "</div>";

 $this->endWidget();

echo "</div>";

$this->endWidget('zii.widgets.jui.CJuiDialog');


?> 
