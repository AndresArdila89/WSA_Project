<?php
    
    require_once "dbh.php";
    require_once "customer.php";
    require_once "customers.php";
    require_once "product.php";
    require_once "products.php";
    require_once "purchase.php";
    require_once "purchases.php";

    header('Content-type: text/plain');
    

    $dbh = new Dbh();
    if(isset($_POST['deleteRow']))
    {
        $id = htmlspecialchars($_POST['deleteRow']);
        $SQLQuery = 'CALL purchases_delete(:id)';
        $PDOStatement = $dbh->connect()->prepare($SQLQuery);
        $PDOStatement->bindParam(':id',$id);
        $PDOStatement->execute();
        $PDOStatement->closeCursor();
    }
    
    if(isset($_POST['date']))
    {   
        $date = date(htmlspecialchars($_POST['date']));
        $SQLQuery = 'CALL filter_by_date(:date)';
        $PDOStatement = $dbh->connect()->prepare($SQLQuery);
        $PDOStatement->bindParam(':date', $date);
        $PDOStatement->execute();
?>
    
    
    <tr>
    <th>#</th>
    <th>Delete</th>
    <th>Product Code</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>City</th>
    <th>Comment</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Sub Total</th>
    <th>Tax Amount</th>
    <th>Grand Total</th>
    </tr>
<?php
    while($row = $PDOStatement->fetch())
    {


?>
    <tr>
    <td><?php echo $counter= $counter + 1 ?></td>
    <td><?php echo "<button onclick='deletePurchase(this)' value=".$row['Id'].">delete</button>";?></td>
    <td><?php echo $row['Product Code'] ?></td>
    <td><?php echo $row['First Name'] ?></td>
    <td><?php echo $row['Last Name'] ?></td>
    <td><?php echo $row['City'] ?></td>
    <td><?php echo $row['Comments'] ?></td>
    <td><?php echo $row['Price'] ?></td>
    <td><?php echo $row['Quantity'] ?></td>
    <td><?php echo $row['Subtotal'] ?></td>
    <td><?php echo $row['Taxes Amount'] ?></td>
    <td><?php echo $row['Grand Total'] ?></td>

    </tr>
<?php
    }
        $PDOStatement->closeCursor();
    }
    ?>
   
  