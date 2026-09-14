<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$baseUrl = Yii::app()->theme->baseUrl; 
?>

<div class="row-fluid">
  <div class="span3 ">
    <a class="brand" href="<?php echo yii::app()->createUrl('/Postularse/create'); ?>">
        <div class="stat-block">
          <ul>
            <li class="stat-count"><span>Postulación</span></li>        
             <li class="stat-percent">
                <span class="text-success stat-percent">Ir</span>
            </li>       
          </ul>     
        </div>
    </a>
  </div>
  <div class="span3 ">
    <a class="brand" href="<?php echo yii::app()->createUrl('usuario/datos'); ?>">
        <div class="stat-block">
          <ul>
            <li class="stat-count"><span>Actualizar Datos</span></li>
            <li class="stat-percent"><span class="text-success stat-percent">Ir</span></li>
          </ul>
        </div>
    </a>
  </div>
  <div class="span3 ">
    <a class="brand" href="<?php echo yii::app()->createUrl('Funcionarios/ascenso'); ?>">
        <div class="stat-block">
          <ul>
            <li class="stat-count"><span>Rango Ascenso</span></li>
            <li class="stat-percent"><span class="text-success stat-percent">Ir</span></li>
          </ul>
        </div>
    </a>
  </div>
  <div class="span3 ">
    <a class="brand" href="<?php echo yii::app()->createUrl("/Funcionarios/saludo");?>">
        <div class="stat-block">
          <ul>
            <li class="stat-count"><span>Saludo</span></li>
            <li class="stat-percent"><span><span class="text-success stat-percent">Ir</span></li>
          </ul>
        </div>
    </a>
  </div>
</div>

<div class="row-fluid">

    
	<div class="span9">
        <img src='<?php echo $baseUrl;?>/img/big/News.png'/>
	</div>
	<div class="span3">
		<div class="summary">
          <ul>
          	<li>
          		<span class="summary-title">Fecha de Postulación</span>
                <span class="summary-icon">
                	<img src="<?php echo $baseUrl ;?>/img/icons/Calendar.png" width="36" height="36" alt="Fecha de Postulación">
                </span>
                <span class="summary-number"><?php echo ucwords($FechaPostulacion) ?></span>
                <span class="summary-title"><?php echo $StatusPost ?></span>

            </li>
            <br>
            <li>
                <span class="summary-title">Fecha de Ascenso</span>
                <span class="summary-icon">
                    <img src="<?php echo $baseUrl ;?>/img/icons/Calendar.png" width="36" height="36" alt="Fecha de Postulación">
                </span>
                <span class="summary-number"><?php echo ucwords($FechaAscenso) ?></span>
                <span class="summary-title"><?php echo $StatusPro ?></span>
            </li>
            <li>

            </li>
            <li>

            </li>
            <li>

            </li>
        
          </ul>
        </div>

	</div>
</div>


<div class="row-fluid">
	<div class="span6">
	  
	</div><!--/span-->
	<div class="span6">

        	
	</div><!--/span-->
</div><!--/row-->

<div class="row-fluid">
	<div class="span6">
	 
	</div><!--/span-->
    <div class="span6">

    </div>
	<!--<div class="span2">
    	<input class="knob" data-width="100" data-displayInput=false data-fgColor="#5EB95E" value="35">
    </div>
	<div class="span2">
     	<input class="knob" data-width="100" data-cursor=true data-fgColor="#B94A48" data-thickness=.3 value="29">
    </div>
	<div class="span2">
         <input class="knob" data-width="100" data-min="-100" data-fgColor="#F89406" data-displayPrevious=true value="44">     	
	</div><!--/span-->
</div><!--/row-->

          


<script>
            $(function() {

                $(".knob").knob({
                    /*change : function (value) {
                        //console.log("change : " + value);
                    },
                    release : function (value) {
                        console.log("release : " + value);
                    },
                    cancel : function () {
                        console.log("cancel : " + this.value);
                    },*/
                    draw : function () {

                        // "tron" case
                        if(this.$.data('skin') == 'tron') {

                            var a = this.angle(this.cv)  // Angle
                                , sa = this.startAngle          // Previous start angle
                                , sat = this.startAngle         // Start angle
                                , ea                            // Previous end angle
                                , eat = sat + a                 // End angle
                                , r = 1;

                            this.g.lineWidth = this.lineWidth;

                            this.o.cursor
                                && (sat = eat - 0.3)
                                && (eat = eat + 0.3);

                            if (this.o.displayPrevious) {
                                ea = this.startAngle + this.angle(this.v);
                                this.o.cursor
                                    && (sa = ea - 0.3)
                                    && (ea = ea + 0.3);
                                this.g.beginPath();
                                this.g.strokeStyle = this.pColor;
                                this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
                                this.g.stroke();
                            }

                            this.g.beginPath();
                            this.g.strokeStyle = r ? this.o.fgColor : this.fgColor ;
                            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
                            this.g.stroke();

                            this.g.lineWidth = 2;
                            this.g.beginPath();
                            this.g.strokeStyle = this.o.fgColor;
                            this.g.arc( this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
                            this.g.stroke();

                            return false;
                        }
                    }
                });

                // Example of infinite knob, iPod click wheel
                var v, up=0,down=0,i=0
                    ,$idir = $("div.idir")
                    ,$ival = $("div.ival")
                    ,incr = function() { i++; $idir.show().html("+").fadeOut(); $ival.html(i); }
                    ,decr = function() { i--; $idir.show().html("-").fadeOut(); $ival.html(i); };
                $("input.infinite").knob(
                                    {
                                    min : 0
                                    , max : 20
                                    , stopper : false
                                    , change : function () {
                                                    if(v > this.cv){
                                                        if(up){
                                                            decr();
                                                            up=0;
                                                        }else{up=1;down=0;}
                                                    } else {
                                                        if(v < this.cv){
                                                            if(down){
                                                                incr();
                                                                down=0;
                                                            }else{down=1;up=0;}
                                                        }
                                                    }
                                                    v = this.cv;
                                                }
                                    });
            });
        </script>