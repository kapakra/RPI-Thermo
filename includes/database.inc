
$con=mysqli_connect("192.168.1.107","temp","temp123","Temperature");

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

mysqli_close($con);

// Connects to your Database 
 $data = mysqli_connect("SELECT * FROM settings") 
 or die(mysql_error());  
 Print "<th>Name:</th> <td>".$data['value'] . "</td> "; 