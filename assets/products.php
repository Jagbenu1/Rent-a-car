<?php 
  
    if(isset($_GET['action']) && $_GET['action']=="add"){ 
          
        $id=intval($_GET['id']); 
          
        if(isset($_SESSION['items'][$id])){ 
              
            $_SESSION['items'][$id]['quantity']++; 
             
        }else{ 
              
            $sql_s="SELECT * FROM `inventory`
                WHERE `inventory_id`={$id}"; 
            $query_s=mysqli_query($link, $sql_s); 
            if(mysqli_num_rows($query_s)!=0){ 
                $row_s=mysqli_fetch_array($query_s); 
                  
                $_SESSION['items'][$row_s['inventory_id']]=array( 
                        "quantity" => 1, 
                        "price" => $row_s['price'] 
                    ); 
            
            }else{ 
                  
                $message="This product id it's invalid!"; 
                  
            } 
              
        } 
          
    } 
  
?>


<h1>Inventory</h1> 
    <table> 
        <tr> 
            <th>Name</th> 
            <th>Description</th> 
            <th>Price</th> 
            <th>Action</th> 
        </tr> 
        <?php 
  
            $sql="SELECT * FROM `inventory` ORDER BY `inventory_id` ASC"; 
            $query=mysqli_query($link, $sql); 
            
            
            while ($row=mysqli_fetch_array($query)) { 
          
        ?> 
        <tr> 
            <td><?php echo $row['name'] ?></td> 
            <td><?php echo $row['description'] ?></td> 
            <td>$<?php echo $row['price'] ?></td> 
            <td><a href="inventory.php?page=products&action=add&id=<?php echo $row['inventory_id'] ?>">Add to cart</a></td> 
        </tr> 
        <?php 
                
            } 
        
        ?>
       
    </table>