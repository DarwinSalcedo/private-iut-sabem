<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

  <div class="row-fluid">
	<div class="span3">
		<div class="sidebar-nav">
        
		  <?php $numero=Alerta::model()->numero(); 
		  $this->widget('zii.widgets.CMenu', array(
			/*'type'=>'list',*/
			'encodeLabel'=>false,
			'items'=>array(
				array('label'=>'<i class="icon icon-home"></i>  Principal <span class="label label-info pull-right">Ir</span>', 'url'=>array('/site/principal'),'itemOptions'=>array('class'=>''),'visible'=> !Yii::app()->user->isGuest,),
				array('label'=>'<i class="icon icon-search"></i> Alertas <span class="label label-important pull-right"> '.$numero.' </span>', 'url'=>array('/alerta/index'),'visible'=> !Yii::app()->user->isGuest,),
				array(
					'label'=>'<i class="icon icon-file"></i> Reglamento de ascenso <span class="label label-info pull-right">Ver</span>',
					'url'=>array('/site/reglamento'),
					'visible'=> !Yii::app()->user->isGuest,
				),
				//array('label'=>'<i class="icon icon-envelope"></i> Acerca de SABEM <span class="badge badge-success pull-right">Ir</span>', 'url'=>'#','visible'=> !Yii::app()->user->isGuest,),
				// Include the operations menu
				array('label'=>'operaciones','items'=>$this->menu),
			),
			));?>
		</div>
        
		
    </div><!--/span-->
    <div class="span9">
    
    <!-- Include content pages -->
    <?php echo $content; ?>

	</div><!--/span-->
  </div><!--/row-->


<?php $this->endContent(); ?>
