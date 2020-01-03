<?php  session_start(); ?>
<?php require(__DIR__."/assets/private/paths.php")  ?>
<!DOCTYPE html>

<html>
    <head>
        <?php echo bootstrapCSS;?>
        <link rel="stylesheet" type="text/css" href="css/index.css" />
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <?php require("./assets/index-nav.til.php"); ?>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <h1>Welcome to rent-a-car enterprises!!</h1>
                    <br/>
                <h3>We sell rentals to fit your dream! </h3>
                   
            </div>
        </div>

        <?php
                echo jquery;
                echo popper;
                echo bootstrapJS;
            ?>
    </body>
</html>