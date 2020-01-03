<h1>Checkout</h1>
<a href="inventory.php?page=items">Go back to cart</a>

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
                      
                    $sql=substr($sql, 0, -1).") ORDER BY name ASC"; 
                    $query=mysqli_query($link, $sql);
                    $totalprice=0; 
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
    <br>
    <p>Please finish the card verification.</p>
    <div class="card-js">
        <input class="card-number my-custom-class">
        <input class="name" id="the-card-name-element">
        <input class="expiry-month">
        <input class="expiry-year">
        <input class="cvc">
    </div>
    <br>
    <div class="holder">
        <a class="btn btn-primary" href="inventory.php?page=finished">Pay Now</a>
    </div>
    