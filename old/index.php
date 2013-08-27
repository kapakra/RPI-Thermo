<?php

include '/includes/database.inc';

$homepage = file_get_contents('https://wakai.ninja.is/rest/v0/device/0813BB000904_0101_0_31/?user_access_token=gFwlNOoFnGOa1L0isDlnNyOkM72GSsFQnbcIEkQSIWU');
$tempraw = explode(':', $homepage);
$temp = explode(',', $tempraw[26]);

echo "temp is "; 
echo $temp[0];



// Connects to your Database 
 $data = mysqli_connect("SELECT * FROM settings") 
 or die(mysql_error());  
 Print "<th>Name:</th> <td>".$data['usertoken'] . "</td> "; 

 ?>
 <script>
 var listener = function () {
$.get("https://wakai.ninja.is/rest/v0/device/0813BB000904_0101_0_31/?user_access_token=gFwlNOoFnGOa1L0isDlnNyOkM72GSsFQnbcIEkQSIWU", {}, function(data) {
    $("#mydiv").html(data);
}));
};

var interval = setInterval(listener, 30000);
</scirpt>
</div name="mydiv"> </div>