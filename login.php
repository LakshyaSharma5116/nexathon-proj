<?php session_start();

$phone = $_POST[ 'phone_number' ];

$password = $_POST[ 'pass1' ];

$conn = new mysqli( 'localhost' , 'root' , '' , 'waypool_db' , 3306 );

$stmnt = $conn->prepare( "select * from users_db where password = ?" );

$stmnt->bind_param( "s" , $password );

$stmnt->execute();

$result = $stmnt->get_result();

if( $result->num_rows > 0 ){
  $a = 1;
}
else {
  $a = 0;
};

$stmnt->close(); 
$conn->close();

if( $a == 1 ){
$_SESSION['pn']=$phone;
header('Location: '."http://localhost/wordpress/waypool/destination.php" );
}
else{

header('Location: '."http://localhost/wordpress/waypool/loginerror.html" );
};

?>