<html>
  <head>    
     
   <?php 
   
   $status = file_get_contents('togglefiles/status.txt'); 
   
   	$needtotoggle =  $_GET["toggleheating"];
   
   if ($needtotoggle=="Heating Cntroller on/off") {
   	
   		if ($status == "Enabled") {
   			$myFile = "togglefiles/status.txt";
			$fh = fopen($myFile, 'w') or die("can't open file 1");
			$stringData = "Disabled";
			fwrite($fh, $stringData);
			fclose($fh);
			header( 'Location: toggle.php' ) ;
		} else {
			$myFile = "togglefiles/status.txt";
			$fh = fopen($myFile, 'w') or die("can't open file");
			$stringData = "Enabled";
			fwrite($fh, $stringData);
			fclose($fh);
			header( 'Location: toggle.php' ) ;
		};
		};
   ?>

  </head>
  <body>
    <div>
    <form action="toggle.php" meathod="get">
    <input type="submit" name="toggleheating" value="Heating Cntroller on/off">
    <p>Heating controller is <? echo $status; ?> </p>
          </div>
  </body>
</html>

