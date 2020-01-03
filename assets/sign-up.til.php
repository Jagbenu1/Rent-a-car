<?php session_start();?>

<?php
    require_once ('private/paths.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name=viewport content="width=device-width, initial-scale=1" />
        <?php echo bootstrapCSS ?>
        <link rel="stylesheet" type="text/css" href="../css/sign-up.css">
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <?php require("./nav.til.php"); ?>
            </div>
        </div>

        <form action="./inc/sign-up-processing.php" method="post" id="form">
        
        First name: 
            <input type="text" name="first_name" value="" id="firstname">
            <?php
                if(isset($_GET["welcome"])){
                    if($_GET["welcome"]=="firstname-invalid"){
                        echo "<p>The seems to be a weird first name</p>";
                    }
                }
            ?>
            <br>
        Last name: 
            <input type="text" name="last_name" value="" id="lastname">
            <?php
                if(isset($_GET["welcome"])){
                    if($_GET["welcome"]=="lastname-invalid"){
                        echo "<p>The seems to be a weird last name</p>";
                    }
                }
            ?>
            <br>
        Username: 
            <input type="text" name="username" value="" id="username">
            <?php 
                if(isset($_GET["welcome"])){
                    if($_GET["welcome"]=="username-gone"){
                        echo "<p>That username has been pilfered!</p>";
                    }elseif ($_GET["welcome"]=="username-long") {
                        echo "<p>That username is too long!</p>";
                    }
                }
            ?>
            <br>
        Email:
            <input type="text" name="email" value="" id="email">
            <?php
                if(isset($_GET["welcome"])){
                    if($_GET["welcome"]=="email-invalid"){
                        echo "<p>That email is unacceptable!</p>";
                    }elseif($_GET["welcome"]=="email-gone"){
                        echo "<p> That email is already employed! </p>";
                    }
                }
            ?>
            <br>
        Password:
            <input type="password" name="password" value="" id="password">
            <?php
                if(isset($_GET["welcome"])){
                    if($_GET["welcome"]=="password-short"){
                        echo "<p> That password must be 6 ciphers or more! </p>";
                    }
                }
            ?>
            <br>
        Confirm Password: 
            <input type="password" name="confirm_password" value="" id="confirm_password">
            <?php
                if(isset($_GET["welcome"])){
                    if($_GET["welcome"]=="password-invalid"){
                        echo "<p>Passwords do not harmonize!</p>";
                    }
                }
            ?>
            <br>
        
            <input type="submit" value="Submit" name="welcome">
            
            <?php
                if(isset($_GET["welcome"])){
                    if ($_GET["welcome"]=="empty") {
                        echo "<p>All fields must be replete!</p>";
                    }elseif($_GET["welcome"]=="success"){
                        echo "<p>Sign up successful!</p>";
                    }
                }
            ?>

        </form>
        <?php
            echo jquery;
            echo popper;
            echo bootstrapJS;
        ?>
    </body>