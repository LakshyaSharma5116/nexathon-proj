<?php session_start();
if(isset($_SESSION['pn'])==0){
	header('Location: '."http://localhost/wordpress/waypool/login.html");}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>FindPoolers</title>
    <link rel="stylesheet" href="style.css">
    <style>
    table{
    	font-family: Arial, sans-serif;
        color: wheat;
        margin: auto;
        padding: 20px;
        font-size: 30px;
    }
    th, td{
    	text-align: left;
        padding: 8px;
    }
    </style>
</head>
<body>
    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">WayPool</h2>
            </div>
         </div><br><br><br><br><br>
         <?php 

$num = $_SESSION[ 'pn' ];

$location = $_POST[ 'destin' ];

$conn = new mysqli( 'localhost' , 'root' , '' , 'waypool_db' , 3306 );

if( $conn->connect_error ){

  die('Connection Failed: '.$conn->connect_error);
}
else{

  $stmnt = $conn->prepare("UPDATE destinations SET destination = ? WHERE number=?");
  $stmnt_new = $conn->prepare( "select * from destinations where destination = ? " );

  $stmnt->bind_param( "si" , $location,$num );

  $stmnt_new->bind_param( "s" , $location );

  $stmnt->execute();

  $stmnt_new->execute();
  
  $result = $stmnt_new->get_result();

  if ($result->num_rows > 0) {
    // Output data of each row
    echo "<table border='1'>
            <tr>
                <th>Number</th>
                <th>Destination</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['number']) . "</td>
                <td>" . htmlspecialchars($row['destination']) . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No records found.";
}

  $stmnt->close();

  $stmnt_new->close();

  $conn->close();

}?>
<p1><a href="logout.php">Logout</a></p1>
    </div>
    
</body>
</html>