<?php session_start();?>

<?php
    require_once ('../private/paths.php');
?>

<?php
    require ('../database/database-connect.php');

    if(isset($_POST["welcome"])){
        $first_name = mysqli_real_escape_string($link, $_POST["first_name"]);
        
        $last_name = mysqli_real_escape_string($link, $_POST["last_name"]);

        $username = mysqli_real_escape_string($link, $_POST["username"]);

        $email = mysqli_real_escape_string($link, $_POST["email"]);

        $password = mysqli_real_escape_string($link, $_POST["password"]);

        $confirm_password = mysqli_real_escape_string($link, $_POST["confirm_password"]);



        if(empty($first_name)||empty($last_name)||empty($username)||empty($email)||empty($password)||empty($confirm_password)){
            header("location: ../../assets/sign-up.til.php?welcome=empty");
            exit();
        }

        if(!preg_match("/^[a-zA-Z]*$/", $first_name)){
            header("location: ../../assets/sign-up.til.php?welcome=firstname-invalid");
            exit();
        }

        if(!preg_match("/^[a-zA-Z]*$/", $last_name)){
            header("location: ../../assets/sign-up.til.php?welcome=lastname-invalid");
            exit();
        }

        if(strlen($username)>20){
            header("location: ../../assets/sign-up.til.php?username-long");
            exit();
        }else{
            $sql="SELECT * FROM user WHERE username = ?";
            $username_stmt = mysqli_stmt_init($link);
           if(!mysqli_stmt_prepare($username_stmt, $sql)){
                  echo 'SQL error';
           }else{
             //bind parameters to the placeholder
             mysqli_stmt_bind_param($username_stmt, "s", $username);
             //run parameters inside Database
             mysqli_stmt_execute($username_stmt);
             $result = mysqli_stmt_get_result($username_stmt);
             if(mysqli_num_rows($result)>0){
                mysqli_stmt_close($username_stmt);
                 header("Location: ../../assets/sign-up.til.php?welcome=username-gone");
                 exit();
             }
              mysqli_stmt_close($username_stmt);
           }
        }

        if($email){
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
              header("Location: ../../assets/sign-up.til.php?welcome=email-invalid");
              exit();
            }
          }
          else{
            $sql="SELECT * FROM user WHERE user_email = ?";
            $email_stmt = mysqli_stmt_init($link);
             if(!mysqli_stmt_prepare($email_stmt, $sql)){
                    echo 'SQL error';
             }else{
               //bind parameters to the placeholder
               mysqli_stmt_bind_param($email_stmt, "s", $email);
               //run parameters inside Database
               mysqli_stmt_execute($email_stmt);
               $result = mysqli_stmt_get_result($email_stmt);
               if(mysqli_num_rows($result)>0){
                  mysqli_stmt_close($email_stmt);
                   header("Location: ../../assets/sign-up.til.php?welcome=email-gone");
                   exit();
               }
                mysqli_stmt_close($email_stmt);
             }
          }

          if(strlen($password)<6){
            header("Location: ../../assets/sign-up.til.php?welcome=password-short");
            exit();
          }

          if($password !== $confirm_password){
            header("Location: ../../assets/sign-up.til.php?welcome=password-invalid");
            exit();
        }
          else{
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql="INSERT INTO user (first_name, last_name, username, user_email, user_pass, date_join) Values(?, ?, ?, ?, ?, NOW())";
            $insert_signup_stmt = mysqli_stmt_init($link);
             if(!mysqli_stmt_prepare($insert_signup_stmt, $sql)){
                    echo 'SQL error';
             }else{
               //bind parameters to the placeholder
               mysqli_stmt_bind_param($insert_signup_stmt, "sssss", $first_name, $last_name, $username, $email, $password);
               //run parameters inside Database
               mysqli_stmt_execute($insert_signup_stmt);
               mysqli_stmt_close($insert_signup_stmt);
             }
        }
        mysqli_close($link);
        echo("Welcome to the Dragon's Bard!");
        header("Location: ../../assets/sign-up.til.php?welcome=success");
        exit();
    }
    else{
        mysqli_close($link);
        header("Location: ../../assets/sign-up.til.php");
        exit();
    }
?>