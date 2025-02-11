<?php session_start();
if(isset($_SESSION['pn'])==0){
	header('Location: '."login.html");}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>FindPoolers</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">WayPool</h2>
            </div></div><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <div>
                <form action="destin.php" method="post">
                <h1 style="text-align:center;color:white;">Enter Your Destination:</h1><br>
                <input type="text" id="destin" name="destin"class = "input3" placeholder="Destination"><br><br>
                <button class="buttno">Submit</button>
                </form>
            </div>

    </div>
    
    
</body>
</html>
