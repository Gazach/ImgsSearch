<?php 
    session_start();
    if(isset($_SESSION['ID']) && isset($_SESSION['username'])){
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../Icon.PNG">
    <title>Document</title>
</head>
<body>
    Hello, You Login As <?php echo $_SESSION['username']?> <a href="code/logoutcode.php">Log out</a>
</body>
</html>
<?php  } else {

header("Location: login.php?error=You_Should_Login_First");
exit();
} ?>