<!DOCTYPE html>
<html>
    <?

?>
    <head>
        <title>Temp</title>
   
  </head>
  <body>

     
        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
        <script src="js/jquery.knob.js"></script>

        <script>
            $(function($) {

                $(".knob").knob({
                    change : function (value) {
                
              
                    },
                    cancel : function () {
                        console.log("cancel : ", this);
                    },
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
        <style>
            body{
              padding: 0;
              margin: 0px 50px;
              font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
              font-weight: 300;
              text-rendering: optimizelegibility;
            }
            p{font-size: 30px; line-height: 30px}
            div.demo{text-align: center; width: 280px; float: left}
            div.demo > p{font-size: 20px}
        </style>
    </head>
    <body>
    <?
$currentt = file_get_contents('togglefiles/currenttemp.txt');
?>

<div><script>$('.toggle').toggles({clicker:$('toggle')});</script></div>
    
        <div style="clear:both"></div>
        <div id="big" class="demo" style="height:800px;width:100%">
            <p></p>
      <input data-skin="tron" value='<? echo $currentt ?>' data-fgColor="#222222" data-displayPrevious=true class="knob" data-min="0" data-step="0.1" data-max="30" data-width="700" data-height="700" data-thickness=".2" > </script>
     
     

</div>
<script>

</script>
    </body>
</html>