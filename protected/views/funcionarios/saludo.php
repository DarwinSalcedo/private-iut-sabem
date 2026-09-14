
<?php

?>

<h1><i><?php echo " ".$model->jerarquia->Descripcion_Jerarquia." ".$model->Nombre." ".$model->Apellidos; ?></i><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/jerarquias/<?php echo $model->jerarquia->Cod_Jerarquia ?>_horizontal.png" alt=""></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(		
      'Cedula' ,
      'Nombre',
      'Apellidos' ,
      #'Fecha_Ingreso' ,
	   array('name'=>'Fecha_Ingreso','value'=>$model->CambiarFecha($model->Fecha_Ingreso)), 
      'jerarquia.Descripcion_Jerarquia',
      'Equipo' ,
     # 'num_equipo_anterior',
      'condicion.Descripcion_Condicion' ,
      'institucion.nombre_institucion' ,      
     'genero.Descripcion_sexo',
	 
	),
	
	
	
));
/*
$this->Widget('ext.highcharts.HighchartsWidget', array(
   'options'=>array(
      'title' => array('text' => 'Fruit Consumption'),
      'xAxis' => array(
         'categories' => array('Apples', 'Bananas', 'Oranges')
      ),
      'yAxis' => array(
         'title' => array('text' => 'Fruit eaten')
      ),
      'series' => array(
         array('name' => 'Jane', 'data' => array(1, 0, 4)),
         array('name' => 'John', 'data' => array(5, 7, 3))
      )
   )
));


$this->widget('ext.highcharts.HighmapsWidget', array(
    'options' => array(
        'title' => array(
            'text' => 'Highmaps basic demo',
        ),
        'mapNavigation' => array(
            'enabled' => true,
            'buttonOptions' => array(
                'verticalAlign' => 'bottom',
            )
        ),
        'colorAxis' => array(
            'min' => 0,
        ),
        'series' => array(
            array(
                'data' => array(
                    array('hc-key' => 'de-ni', 'value' => 0),
                    array('hc-key' => 'de-hb', 'value' => 1),
                    array('hc-key' => 'de-sh', 'value' => 2),
                    array('hc-key' => 'de-be', 'value' => 3),
                    array('hc-key' => 'de-mv', 'value' => 4),
                    array('hc-key' => 'de-hh', 'value' => 5),
                    array('hc-key' => 'de-rp', 'value' => 6),
                    array('hc-key' => 'de-sl', 'value' => 7),
                    array('hc-key' => 'de-by', 'value' => 8),
                    array('hc-key' => 'de-th', 'value' => 9),
                    array('hc-key' => 'de-st', 'value' => 10),
                    array('hc-key' => 'de-sn', 'value' => 11),
                    array('hc-key' => 'de-br', 'value' => 12),
                    array('hc-key' => 'de-nw', 'value' => 13),
                    array('hc-key' => 'de-bw', 'value' => 14),
                    array('hc-key' => 'de-he', 'value' => 15),
                ),
                'mapData' => 'js:Highcharts.maps["countries/de/de-all"]',
                'joinBy' => 'hc-key',
                'name' => 'Random data',
                'states' => array(
                    'hover' => array(
                        'color' => '#BADA55',
                    )
                ),
                'dataLabels' => array(
                    'enabled' => true,
                    'format' => '{point.name}',
                )
            )
        )
    )
));


$this->widget('ext.highcharts.HighchartsWidget', array(
    'scripts' => array(
        'modules/exporting',
        'themes/grid-light',
    ),
    'options' => array(
        'title' => array(
            'text' => 'Combination chart',
        ),
        'xAxis' => array(
            'categories' => array('Apples', 'Oranges', 'Pears', 'Bananas', 'Plums'),
        ),
        'labels' => array(
            'items' => array(
                array(
                    'html' => 'Total fruit consumption',
                    'style' => array(
                        'left' => '50px',
                        'top' => '18px',
                        'color' => 'js:(Highcharts.theme && Highcharts.theme.textColor) || \'black\'',
                    ),
                ),
            ),
        ),
        'series' => array(
            array(
                'type' => 'column',
                'name' => 'Jane',
                'data' => array(3, 2, 1, 3, 4),
            ),
            array(
                'type' => 'column',
                'name' => 'John',
                'data' => array(2, 3, 5, 7, 6),
            ),
            array(
                'type' => 'column',
                'name' => 'Joe',
                'data' => array(4, 3, 3, 9, 0),
            ),
            array(
                'type' => 'spline',
                'name' => 'Average',
                'data' => array(3, 2.67, 3, 6.33, 3.33),
                'marker' => array(
                    'lineWidth' => 2,
                    'lineColor' => 'js:Highcharts.getOptions().colors[3]',
                    'fillColor' => 'white',
                ),
            ),
            array(
                'type' => 'pie',
                'name' => 'Total consumption',
                'data' => array(
                    array(
                        'name' => 'Jane',
                        'y' => 13,
                        'color' => 'js:Highcharts.getOptions().colors[0]', // Jane's color
                    ),
                    array(
                        'name' => 'John',
                        'y' => 23,
                        'color' => 'js:Highcharts.getOptions().colors[1]', // John's color
                    ),
                    array(
                        'name' => 'Joe',
                        'y' => 19,
                        'color' => 'js:Highcharts.getOptions().colors[2]', // Joe's color
                    ),
                ),
                'center' => array(100, 80),
                'size' => 100,
                'showInLegend' => false,
                'dataLabels' => array(
                    'enabled' => false,
                ),
            ),
        ),
    )
));*/
?>

