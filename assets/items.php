<?php 
  
    if(isset($_POST['submit'])){ 
          
        foreach($_POST['quantity'] as $key => $val) { 
            if($val==0) { 
                unset($_SESSION['items'][$key]); 
            }else{ 
                $_SESSION['items'][$key]['quantity']=$val; 
            } 
        } 
          
    } 
  
?> 
<h1>View cart</h1> 
<a href="inventory.php?page=products">Go back to products page</a> 
<form method="post" action="inventory.php?page=items"> 
      
    <table> 
          
        <tr> 
            <th>Name</th> 
            <th>Quantity</th> 
            <th>Price</th> 
            <th>Items Price</th> 
        </tr> 
          
        <?php 
          
                $sql="SELECT * FROM inventory WHERE inventory_id IN ("; 
                      
                    foreach($_SESSION['items'] as $id => $value) { 
                        $sql.=$id.","; 
                    } 
                      
                    $sql=substr($sql, 0, -1).") ORDER BY inventory_id ASC"; 
                    $query=mysqli_query($link, $sql);
                    $totalprice=0; 
                    $numrows = mysqli_num_rows($query);
                    if($numrows==0){
                        header("Location: inventory.php?page=products");
                    }
                    while($row=mysqli_fetch_array($query)){ 
                        
                        $subtotal=$_SESSION['items'][$row['inventory_id']]['quantity']*$row['price']; 
                        $totalprice+=$subtotal; 
        ?> 
                        <tr> 
                            <td><?php echo $row['name'] ?></td> 
                            <td><input type="text" name="quantity[<?php echo $row['inventory_id'] ?>]" size="5" value="<?php echo $_SESSION['items'][$row['inventory_id']]['quantity'] ?>" /></td> 
                            <td>$<?php echo $row['price'] ?></td> 
                            <td>$<?php echo $_SESSION['items'][$row['inventory_id']]['quantity']*$row['price'] ?></td> 
                        </tr> 
                    <?php 
                          
                    } 
        ?> 
                    <tr> 
                        <td colspan="4">Total Price: $<?php echo $totalprice ?></td> 
                    </tr> 
          
    </table> 
    <br /> 
    <button type="submit" name="submit">Update Cart</button> 
    <a href="inventory.php?page=checkout">Checkout</a>
</form> 
<br /> 
<p>To remove an item, set it's quantity to 0. </p>