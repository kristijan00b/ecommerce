<?php
include('inc/prodheader.php');
include_once 'config/Database.php';
include_once 'class/Order.php';

$database = new Database();
$db = $database->getConnection();

$order = new Order($db);

if (isset($_POST["privData"])) {
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $mail = $_POST["mail"];
    $city = $_POST["city"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];

    foreach($_SESSION["cart"] as $keys => $values){
        $item_id = intval($values["item_id"]);
        $item_name = $values["item_name"];
        $item_price = intval($values["item_price"]);
        $item_quantity = intval($values["item_quantity"]);
        $item_size = $values["item_size"];
        $order_date = date('Y-m-d'); 

        if ($order->insert($item_id, $item_name, $item_price, $item_quantity, $order_date,
                    $name, $surname, $mail, $city, $address, $phone, $item_size)) {
                        
        } else {
            echo "Došlo je do greške, pkušaj ponovo.";
        }
    }

}			
?>

<body>
    <div class="checkoutPage">
        <div>
            <img src="./images/LogoTemplateDark.png" height="30px"> <br>
            <br>
            <div>
                <h5>Podaci o naručiocu:</h5>
                <p>Ime i Prezime: <span><?php  print_r($_POST["name"]); echo " "; print_r($_POST["surname"]); ?></span></p>
                <p>Telefon: <span><?php print_r($_POST["phone"]); ?></span></p>
                <p>E-mail: <span><?php print_r($_POST["mail"]); ?></span></p>
                <p>Adresa: <span><?php print_r($_POST["city"]); echo ", "; print_r($_POST["address"]); ?></span></p>
            </div>

            <br>
            <div>
                <h5>Podaci o narudžbini:</h5>
                <?php
					$orderTotal = 0;
                    $quant=0;
					foreach($_SESSION["cart"] as $keys => $values){
						$total = ($values["item_quantity"] * $values["item_price"]);
                        $quant += $values["item_quantity"] *250; 
						$orderTotal = $orderTotal + $total;
					}
				?>
                
                <p>Proizvodi: <span> <br><?php foreach($_SESSION["cart"] as $keys => $values){ 
                                                echo "- ", $values["item_name"]," ( ",$values["item_size"]," x ",$values["item_quantity"]," ) "; ?> <br> <?php
                                            }  ?></span></p>
                <p>Cena proizvoda: <span><?php echo $orderTotal; ?></span> RSD</p>
                <p>Cena dostave: <span><?php echo $quant ?></span> RSD</p>
                <p>Ukupno: <span><?php echo $orderTotal, " + ", $quant, " = ", $orderTotal + $quant; ; ?></span> RSD</p>
            </div>
            <br>
            <a href="./index.php" class="button-primary w-button">Nazad na sajt</a>

            
        </div>
    </div>
</body>