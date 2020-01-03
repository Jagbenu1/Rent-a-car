<?php 
   session_start();
   

    // session_destroy(); 
    require ('./database/database-connect.php');
    require_once ('private/paths.php');
    if(isset($_GET['page'])){ 
          
        $pages=array("products", "items", "checkout", "finished"); 
          
        if(in_array($_GET['page'], $pages)) { 
              
            $_page=$_GET['page']; 
              
        }else{ 
              
            $_page="products"; 
              
        } 
          
    }else{ 
          
        $_page="products"; 
          
    } 
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
  
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
      
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <?php echo bootstrapCSS; ?>
    <link rel="stylesheet" href="../css/reset.css" /> 
    <link rel="stylesheet" href="../css/style.css" /> 
    <link rel="stylesheet" href="../css/card-js.min.css" type="text/css">
    
    <style type="text/css">
    .my-custom-class {
      border: 1px dashed #f00 !important;
    }
    </style>
      
    <title>Shopping cart</title> 
  
</head> 
  
<body>
    <div class="container-fluid">
        <div class="row">
            <?php require("./nav.til.php"); ?>
        </div>
    </div> 
      
    <div id="container"> 
  
        <div id="main"> 

        <?php require($_page.".php"); ?>
              
        </div><!--end main-->
          
        <div id="sidebar"> 
        <h1>Cart</h1> 
<?php 
  
    if(isset($_SESSION['items'])){ 
          
        $sql="SELECT * FROM inventory WHERE inventory_id IN ("; 
                      
        foreach($_SESSION['items'] as $id => $value) { 
            $sql.=$id.","; 
        } 
                     
        $sql=substr($sql, 0, -1).") ORDER BY inventory_id ASC"; 
        $query=mysqli_query($link, $sql);
        
        if(!empty($query)){
        while($row=mysqli_fetch_array($query)){ 
              
    ?> 
            <p><?php echo $row['name'] ?> x <?php echo $_SESSION['items'][$row['inventory_id']]['quantity'] ?></p> 
        <?php 
              
            } 
        }
        ?> 
        <hr /> 
        <a href="inventory.php?page=items">Go to cart</a> 
     
    <?php 
          
    }else{ 
          
        echo "<p>Your Cart is empty. Please add some products.</p>"; 
          
    } 
?>
              
        </div><!--end sidebar-->
  
    </div><!--end container-->

    <?php
        echo jquery;
        echo popper;
        echo bootstrapJS;
    ?>
    <script src="../js/card-js.min.js"></script>

</body> 
</html>