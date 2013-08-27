<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<p id="currenttemp">Hello World!</p>
<script type="text/javascript"> 


 $(document).ready(function() {

    function functionToLoadFile(){
      jQuery.get('py/temp.txt', function(data) {
       var myvar = data;
       var parts = myvar.split(" ");
       var tempr = parts[0];

    document.getElementById("currenttemp").innerHTML= tempr;
       setTimeout(functionToLoadFile, 5000);
    });
    }

    setTimeout(functionToLoadFile, 10);
});

</script>
