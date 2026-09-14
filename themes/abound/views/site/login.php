<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */
?>

<div class="row-fluid">
	<center>
    <div class="span4">
	<div>
	<h1>Ingresa <small>a tu cuenta</small></h1>
</div>
<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>"Acceso Privado",
	));
	
?>



    <p>Por favor llene los campos con los datos validos de acceso:</p>
    
    <div class="form" >
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'login-form',
        'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
    )); ?>
    
        
        <div class="input-prepend">
          <span class="add-on"><span class="icon-user"></span></span> 
		  <?php echo $form->textField($model,'username',array('class'=>'span10','placeholder'=>'Nombre de usuario','size'=>15,'maxlength'=>15)); ?>
        </div>
        <div class="input-prepend">
          <span class="add-on"><span class="icon-pencil"></span></span>
            <?php echo $form->passwordField($model,'password',array('class'=>'span10','placeholder'=>'contraseña','size'=>15,'maxlength'=>15)); ?>
        </div>
         <div class="row" >
            <?php echo $form->error($model,'username'); ?>
            <?php echo $form->error($model,'password'); ?>
        </div>
        <div class="row" >
            <?php echo CHtml::submitButton('Ingresar',array('class'=>'btn btn-primary btn-lg btn-block')); ?>
        </div>
    
	 <div class="row" style=" text-decoration:none" >
		<div style=" padding-top:5px;padding-right:25px; float:right">
	 <?php echo CHtml::link('Crear cuenta',array('site/registrar')); ?>
	 </div>
	 <div style=" padding-top:5px;padding-left:25px;float:left">
	<?php echo CHtml::link('Reiniciar contraseña',array('site/ReiniciarContrasena')); ?>
		</div>
	</div>
	
	
    <?php $this->endWidget(); ?>
    </div><!-- form -->


<?php $this->endWidget();?>

    </div>
    <div class="span6">
        <?php $baseUrl = Yii::app()->theme->baseUrl; ?>
    <div style="float:right" > 
<img src="<?php   echo $baseUrl;?>/img/tlf2.gif">
</div>

    </div>
</center>

</div >
