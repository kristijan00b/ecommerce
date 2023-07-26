<?php 
include_once 'config/Database.php';
include_once 'class/Order.php';

$database = new Database();
$db = $database->getConnection();

$order = new Order($db);


include('inc/header.php');

$correct_password = "admin123";
?>
    <form method="post" action="">
        <label for="password">PW:</label>
        <input type="password" name="password" required>
        <input type="submit" name="submit" value="Pristupi">
    </form>
<?php
if (isset($_POST['submit'])) {
    $password = $_POST['password'];

    if ($password === $correct_password) {
        ?>
        

<body>
    

        <?php 
            $countorders=0;
			$result = $order->ordersList();
			while ($order = $result->fetch_assoc()) { 
                $countorders++;
		?>	
            <div class="team-card">
                    <table style="text-align:left;">
                        <tr style="background-color: #ffd222; ">
                            <th> <?php echo $order["order_date"];?> </th>
                        </tr>
                        <tr>
                            <td> <?php echo $order["item_name"]; ?> </td>
                            <td> <?php echo $order["item_quantity"]," * ",$order["item_size"]," = ",intval($order["item_quantity"])*intval($order["item_price"]); ?> </td>
                        </tr>
                        <tr>
                            <td> <?php echo $order["client_name"]," ", $order["client_surname"];?></td>
                            <td> <?php echo $order["client_city"],", ", $order["client_address"];?> </td>
                            <td> <?php echo $order["client_phone"];?> </td>
                            <td> <?php echo $order["client_mail"];?> </td>
                        </tr>
                    </table>
                
            </div>
            <br>
        <?php 
			} 
            echo "Broj narudžbina: ", $countorders;
		?>
    <br> <br>
</body>
<?php
    } else {
        echo "Greška! Pokušaj ponovo.";
    }
}
?>