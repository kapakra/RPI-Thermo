<link rel="stylesheet" type="text/css" href="css/toggles.css">
<?
//error_reporting(E_ALL); 
//ini_set('display_errors','1');
$savedtemp = $_GET['newtemp'];
if ($savedtemp != "") {
$myFile = "newtemp.txt";
$fh = fopen($myFile, 'w') or die("can't open file");
$stringData = $savedtemp;
fwrite($fh, $stringData);
fclose($fh);
}

   $status = file_get_contents('togglefiles/status.txt');
   
   	$needtotoggle =  $_GET["toggleheating"];
   
   if ($needtotoggle=="Heating Cntroller") {
   	
   		if ($status == "Enabled") {
   			$myFile = "togglefiles/status.txt";
			$fh = fopen($myFile, 'w') or die("can't open file 1");
			$stringData = "Disabled";
			fwrite($fh, $stringData);
			fclose($fh);
			header( 'Location: dial.php' ) ;
		} else {
			$myFile = "togglefiles/status.txt";
			$fh = fopen($myFile, 'w') or die("can't open file");
			$stringData = "Enabled";
			fwrite($fh, $stringData);
			fclose($fh);
			header( 'Location: dial.php' ) ;
		};
		};
?>

<style>
.button {
display: block;
width: 130px;
height: 40px;
background: #4E9CAF;
padding: 10px;
text-align: center;
border-radius: 5px;
color: white;
font-weight: bold;
 text-decoration: none;
}
</style>

<!DOCTYPE html>
<html>
    <head>
        <title>Temp</title>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>

   
  </head>
  <body>


        <script src="js/jquery.knob.js"></script>


 
        <script>
            $(function($) {

                $(".knob").knob({
                    change : function (value) {
                
                      console.log("change : " + value);
                    },
                    release : function (value) {

                    document.getElementById("newtemp").value= value;
					document.forms["savetemp"].submit();

                        //console.log(this.$.attr('value'));
                        console.log("release : " + value);
                        
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
$rit = file_get_contents('newtemp.txt');
?>

<div><script>$('.toggle').toggles({clicker:$('toggle')});</script></div>
    

    
    <form id="onoff" name="onoff" meathon="post">
     <input type="hidden" name="toggleheating" id="toggleheating" value="Heating Cntroller">
    <p>Heating controller is <? echo $status; ?> </p>
    </form>
            <a class="button" href="#" onclick="document.onoff.submit(); return false" >Enable/Disable Controller</a>
      
    <form id="savetemp" >
    
 <input type="hidden" name="newtemp" id="newtemp" value="">
 <input type="hidden" name="oldtemp" id="oldtemp" value="">
        </form>
        <div style="clear:both"></div>
        
       <div style="float:left; margin-right: 10px; ">  <? include 'Includes/currenttempdial.php'; ?> </div>
     
            <div style="float:left">  <? include 'Includes/currenttempdial2.php'; ?> </div>
    
        
        <div id="big" class="demo" style="height:800px;width:100%">
            <p></p>
      <input data-skin="tron" value='<? echo $rit ?>' data-fgColor="#222222" data-displayPrevious=true class="knob" data-min="0" data-step="0.1" data-max="30" data-width="700" data-height="700" data-thickness=".2" > </script>
     
     
        </div>

    </body>
</html>