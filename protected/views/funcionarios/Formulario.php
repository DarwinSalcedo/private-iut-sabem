Formulario:

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'Modelo-form',
    'enableClientValidation'=>false,
    
)); ?>


<div class="row">
        <?php echo $form->labelEx($model,'pais'); ?>
        <?php echo $form->dropDownList($model,'pais',array('1'=>'Venezuela','2'=>'Colombia'),array('ajax' => array(
                            'type' => 'POST',
                            'url' => CController::createUrl('peticionajax'),
                            'update' => '#' . CHtml::activeId($model, 'estado'),                            
                            'success' => "function(data){                                 
                                jQuery('#Modelo_estado').val(data);
                                }",                            
                        ),)); ?>
        <?php echo $form->error($model,'pais'); ?>
    </div>

<div class="row">
        <?php echo $form->labelEx($model,'estado'); ?>
        <?php echo $form->textField($model,'estado'); ?>
        <?php echo $form->error($model,'estado'); ?>
        
    </div>


<div class="row buttons">
        <?php echo CHtml::submitButton('Guardar'); ?>
    </div>


<?php $this->endWidget(); ?>



Controllador Ajax:

  public function actionPeticionajax(){
            
            echo $_POST['Modelo']['pais'];
        }


        Agregas el "peticionajax" en el accessrules y listo﻿