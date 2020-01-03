<?php session_start();?>

<?php
    require_once ('private/paths.php');
?>

<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8"> 
            <meta name=viewport content="width=device-width, initial-scale=1" />
            <?php echo bootstrapCSS; ?>
            <!-- <link rel="stylesheet" type="text/css" href="../css/login.css"> -->
        </head>
        <body>
            <div class="container-fluid">
                <div class="row">
                    <?php require("./nav.til.php"); ?>
                </div>
            </div>
            <form action="./inc/login-processing.php" method="post">
                Username:
                    <input type="text" name="user_name" value="" id="username">
                    <?php
                        if(isset($_GET["welcome"])){
                            if($_GET["welcome"]=="no-user"){
                                echo "<p>User not found.</p>";
                            }
                        }
                    ?>
                    <br>
                Password:
                    <input type="password" name="password" value="" id="password">
                    <?php
                        if(isset($_GET["welcome"])){
                            if($_GET["welcome"]=="password-incorrect"){
                                echo "<p>Password Incorrect.</p>";
                            }
                        }
                    ?>
                    <br>
                <input type="submit" value="Submit" name="login-submit">  
                <br>
                <p>Don't have an account? <a href="sign-up.til.php">Sign up</a></p>          
                <?php 
                    if(isset($_GET["welcome"])){
                        if ($_GET["welcome"]=="empty") {
                            echo "<p>All fields must be replete!</p>";
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
    </html>    







