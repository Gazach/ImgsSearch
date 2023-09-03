
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="../Icon.PNG">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <form action="code/logincode.php" method="post">
        <img src="../img/Icons.jpg" alt="" width="150" height="55">
        <h2>Login Here</h2>
        <?php if(isset($_GET['error'])) { ?>
            <p class="ErrorAlert"><?php echo $_GET['error']?></p>
        <?php } ?>
        <?php if(isset($_GET['success'])) { ?>
            <p class="SuccessAlert"><?php echo $_GET['success']?></p>
        <?php } ?>
        <label >Username</label>
        <input type="text" name="uname" placeholder="Type your username here">
        <label >Password</label>
        <input type="password" name="password" placeholder="Type your password here">
        <button type="submit">Login</button>
        <a href="signup.php">Create account here</a>
    </form>
</body>
</html>