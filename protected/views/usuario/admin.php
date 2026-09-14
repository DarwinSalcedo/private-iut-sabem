<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Usuario', 'url'=>array('index')),
	#array('label'=>'Create Usuario', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#usuario-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php
Yii::app()->getClientScript()->registerScript(
"activador_script",
"
	$(document).on('click','[rel=link_activador]',function(e) {
	   	e.preventDefault();
	   	var a = $(this).find('a');
		$.ajax({ url: a.attr('href'), type: 'post', 
			success: function(newlabel){
			a.html(newlabel);
		}, error: function(e){ alert('error:'+e.responseText); }});
	 });

",CClientScript::POS_HEAD);
?>


<h1>Manejo de Usuarios</h1>



<?php echo CHtml::link('Busqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'usuario-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'username',
		'cedula',
		'correo',

		 
		 	array(
			'class'=>'CLinkColumn',
			'header'=>'Enviar',
			'imageUrl'=>Yii::app()->baseUrl.'/images/carta.png',
			
			'labelExpression'=>'$data->correo',
		#	'url'=>Yii::app()->createUrl('/notificacion/create', array('correo'=>'$data->correo')),
			'urlExpression'=>'array("notificacion/create", "correo"=>$data->correo)',
			#'urlExpression'=>'"mailto://".$data->correo',

			'htmlOptions'=>array('style'=>'text-align:center'),
		),	
		
				array(
			'class'=>'CLinkColumn',
			'header'=>'Bloqueo',
			'labelExpression'=>'Yii::app()->controller->obtenerEtiqueta($data)',
			'urlExpression'=>'CHtml::normalizeUrl(array("ajaxactivador","id"=>$data->primarykey))',
			'htmlOptions'=>array('rel'=>'link_activador'),

		),
		
			array(
			'class'=>'CLinkColumn',
			'header'=>'Contraseña',
			'label'=>'Reiniciar',
			#'url'=>'Yii::app()->createUrl("activar" )',
			#'url'=>Yii::app()->createUrl('usuario/reiniciarPass'),
			#'url'=>Yii::app()->createUrl('/usuario/reiniciarPass', array('id'=>'$data->id')),
			'urlExpression'=>'CHtml::normalizeUrl(array("reiniciarPass","id"=>$data->primarykey))',
			'htmlOptions'=>array('style'=>'text-align:center'),
		),
		
			
		array(
            'class'=>'CButtonColumn',
                        'template' => '{view}  {delete} ',
                    /*    'buttons' => array(
                             'Reiniciar_pass' => array(
                                    'label'=>'Reiniciar Contraseña',
                                    'url'=>'Yii::app()->createUrl("activar" )',
                       ),    'nueva_accion' => array(
                                    'label'=>'Bloquear',
                                    'url'=>'Yii::app()->createUrl("url auntando a la acción" )',
                       ) )*/
            ),
            
       
		    
	

	),
)); ?>
