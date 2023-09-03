<?php
session_start();

include 'db_conn.php';


if(isset($_POST['name']) && isset($_POST['usersname']) && isset($_POST['password']) && isset($_POST['repassword'])){

    function validation($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $nameusers = validation($_POST['name']);
    $users = validation($_POST['usersname']);
    $pass = validation($_POST['password']);
    $repass = validation($_POST['repassword']);

    $user_data = 'usersname='. $users. '&name='. $nameusers;

    
    if(empty($users)) {
        header("Location: ../signup.php?error=Username is required&$user_data");
        exit();
    } else if(empty($pass)) {
        header("Location: ../signup.php?error=Password is required&$user_data");
        exit();
    } else if(empty($nameusers)) {
        header("Location: ../signup.php?error=Name is required&$user_data");
        exit();
    } else if(empty($repass)) {
        header("Location: ../signup.php?error=Confirm Your Password&$user_data");
        exit();
    } else if($pass !== $repass) {
        header("Location: ../signup.php?error=The Password does not match&$user_data");
        exit();
    } 
    
    
    else {



        $sql = "SELECT * FROM account WHERE AccountName='$users' ";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            header("Location: ../signup.php?error=The username is taken by other&$user_data");
            exit();
        } else {
            $sql1= "INSERT INTO account(AccountName, Password, DisplayName) VALUES('$users','$pass','$nameusers')";
            $result1 = mysqli_query($conn, $sql1);
            if($result1){
                header("Location: ../login.php?success=Account has been created&$user_data");
                exit();
            } else{
                header("Location: ../signup.php?error=unknown error&$user_data");
                exit();
            }
        }

    } 
} else {
    header("Location: ../signup.php");
    exit();
}
?>