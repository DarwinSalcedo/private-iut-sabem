<?php

 echo "<br>";
           
             $this->widget('ext.highcharts.HighchartsWidget', array(
                'scripts' => array(
                    'modules/exporting',
                    'themes/grid-light',
                ),
                'options' => array(
                    'title' => array(
                        'text' => 'Resutados del Desempeño',
                    ),
                    'yAxis' => array(
                        'title' => array('text'=> 'Puntuancion'),
                        'max' => 20,
                    ), 'xAxis' => array(
                        'categories' => array('Espiritu Bomberil', 'Competencia', 'Desempeño', 'Actitud', 'Habilidad'),
                    ),
                    'labels' => array(
                        'items' => array(
                            array(
                               # 'html' => 'Total fruit consumption',
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
                            'name' => $model->Apellidos,
                            'data' => array($desempeno['EspirituBomberil'],
                            $desempeno['competencia'],
                            $desempeno['desempenho'],
                            $desempeno['aptitud'],
                            $desempeno['habilidad']),

                        ),
                    ),
                )
            ));

echo "<div id='resultadoestadistica' style='font-size:15px'> La sumatoria de tus notas te da un puntaje de  ".$desempeno['suma']." puntos  </div>";
?>