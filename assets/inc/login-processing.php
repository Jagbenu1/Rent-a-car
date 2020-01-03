<?php session_start();?>

<?php
    require_once ('../private/paths.php');
?>

<?php
require ('../database/database-connect.php');

if(isset($_POST["login-submit"])){
    $user_name = mysqli_real_escape_string($link, $_POST["user_name"]);

    $password = mysqli_real_escape_string($link, $_POST["password"]);

    $dbpass = password_hash($password, PASSWORD_DEFAULT);

    if(empty($user_name)||empty($password)){
        header("Location: ../../assets/login.til.php?welcome=empty");
        exit();
    }
    else{
        $sql="SELECT * FROM user WHERE username = ?";
        $user_name_stmt = mysqli_stmt_init($link);
        if(!mysqli_stmt_prepare($user_name_stmt, $sql)){
            echo 'SQL error';
        }else{
            //bind parameters to the placeholder
            mysqli_stmt_bind_param($user_name_stmt, "s", $user_name);
            //run parameters inside Database
            mysqli_stmt_execute($user_name_stmt);
            $result = mysqli_stmt_get_result($user_name_stmt);


            if(mysqli_num_rows($result)===0){
               mysqli_stmt_close($user_name_stmt);
                header("Location: ../../assets/login.til.php?welcome=no-user");
                exit();
            }else{

                while($row = mysqli_fetch_assoc($result)){
                    $passTest = password_verify($password, $dbpass);
                    echo $passTest;
                    
                    if($passTest==false){
                        // echoecho $row["user_pass"];
                        //  $password;
                        // header("Location: ../../assets/login.til.php?welcome=password-incorrect");
                        // exit();
                    }elseif($passTest==true){
                        $_SESSION["u_id"]=$row["user_id"];
                        $_SESSION["u_first_name"]=$row["first_name"];
                        $_SESSION["u_last_name"]=$row["last_name"];
                        $_SESSION["u_name"]=$row["username"];
                        $_SESSION["u_email"]=$row["user_email"];

                        header("Location: ../../index.til.php");
                        exit();
                    }
                }
            }
             mysqli_stmt_close($user_name_stmt);
        }
    }
}else{
    mysqli_close($link);
    header("Location: ../../assets/login.til.php");
    exit();
}

?>