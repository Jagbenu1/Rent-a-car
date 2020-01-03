<?php session_start();?>
<?php
    require_once("./private/paths.php");
    require('./database/database-connect.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <?php echo bootstrapCSS; ?>
        <link rel="stylesheet" type="text/css" href="../css/profile.css" />

    </head>
    <body>
    <div class="container-fluid">
            <div class="row">
                <?php require("./nav.til.php"); ?>
            </div>
        </div>
        <div class="container">
            <div class="row">
            <?php if(isset($_SESSION["u_id"]) && !empty($_SESSION["u_id"])): ?>

            <div>
                <h1>Welcome to rent-a-car, <?php echo($_SESSION["u_first_name"] . " " . $_SESSION["u_last_name"]); ?></h1>
                <br>
                <h1><?php echo('Username: '.$_SESSION["u_name"]);?></h1>
                <h1><?php echo('Email: ' . $_SESSION["u_email"]); ?></h1>
            </div>
            <?php else: ?>
                <?php header("Location: ../index.til.php"); exit();?>
            <?php endif;?>
            </div>
            
        </div>
    <?php
        echo jquery;
        echo popper;
        echo bootstrapJS;
    ?>
    </body>
</html>