
   <p id="current"></p>    
            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>  
      <script> 

 $(document).ready(function() {

    function functionloadcur(){
      jQuery.get('togglefiles/currenttemp.txt', function(data) {
       var curtmp = data;

    document.getElementById("current").innerHTML= curtmp;
       setTimeout(functionloadcur, 5000);
    });
    }

    setTimeout(functionloadcur, 10);
});

</script>