<?php session_start();

$num = $_POST[ 'phone_number' ];

$password = $_POST[ 'pass'];

$conn = new mysqli( 'localhost' , 'root' , '' , 'waypool_db' , 3306 );

if( $conn->connect_error ){
  die( 'Connection Failed: '.$conn->connect_error);

}
else{
$query = "SELECT * FROM users_db WHERE number = '$num'";

$result = $conn->query($query);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
    	echo 'found!';
        header('Location: '."http://localhost/wordpress/waypool/loginerror1.html");
    } else {
        
  $stmnt = $conn->prepare( "insert into users_db( number , password , destination ) values( ? , ? , ? )");
  $stmnt1 = $conn->prepare("insert into destinations( number, destination ) values(?,?)");}
  
  $a = "Null";
  
  $stmnt-> bind_param( "iss" , $num , $password , $a );
  
  $stmnt1-> bind_param( "is" , $num , $password );

  $stmnt->execute();
  
  $stmnt1->execute();

  $stmnt->close();
  
  $stmnt1->close();

  $conn->close();

$_SESSION['pn']=$num;
$newURL = "http://localhost/wordpress/waypool/destination.php";

header('Location: '.$newURL);
}else{echo 'Error: ' . mysqli_error();}}
?>