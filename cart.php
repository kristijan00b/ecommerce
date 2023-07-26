<?php 
session_start();
    include('inc/cartheader.php');
    include_once 'config/Database.php';

    $database = new Database();
    $db = $database->getConnection();

    

    if (isset($_POST["add"])) {
        $item_array = array(
            'gamy_id' => $_GET["id"],
            'item_name' => $_POST["item_name"],
            'item_price' => $_POST["item_price"],
            'item_id' => $_POST["item_id"],
            'item_quantity' => $_POST["quantity"],
            'item_size' => $_POST["size"],
            'item_images' => $_POST["item_images"]
        );
    
        if (isset($_SESSION["cart"])) {
            $count = count($_SESSION["cart"]);
    
            if ($count < 5) {
                $_SESSION["cart"][$count] = $item_array;
            } else {
                echo '<script>alert("Korpa je puna. Možete dodati najviše 5 proizvoda.")</script>';
            }
        } else {
            $_SESSION["cart"][0] = $item_array;
        }
    
        echo '<script>window.history.back();</script>';
        
    }

if(isset($_GET["action"])){
	if($_GET["action"] == "delete"){
		foreach($_SESSION["cart"] as $keys => $values){
			if($values["gamy_id"] == $_GET["id"] && $values["item_quantity"] == $_GET["quantity"] && $values["item_size"] == $_GET["size"]){
				unset($_SESSION["cart"][$keys]);			
                $_SESSION["cart"] = array_values($_SESSION["cart"]);			
				echo '<script>window.location="cart.php"</script>';
			}
		}
	}
}

?> 
<div class="div-block-19"><a href="./#proizvodi" class="button-primary izmenjen w-button">&lt; Nastavi kupovinu</a></div>
    <section class="hero-heading-left wf-section">
        <div class="container-6">
            <div class="hero-wrapper-3">
                
                <div class="hero-split-3">
                    <h3 class="heading-3">Izabrani proizvodi:</h3>
                    <p class="paragraph-6">Plaćanje pouzećem.</p>
                    

                    <?php
                    
                        if(!empty($_SESSION["cart"])){
                            $total = 0;
                            $quant=0;
			                foreach($_SESSION["cart"] as $keys => $values){
                                echo $keys;
                                $quant+=$values["item_quantity"];
                    ?>

                            <div class="div-block-18">
                                <div class="div-block-22">
                                    <a href="cart.php?action=delete&id=<?php echo $values["gamy_id"]?>&quantity=<?php echo $values["item_quantity"]; ?>&size=<?php echo $values["item_size"]; ?>"
                                        onclick="if(confirm('Da li ste sigurni?') === false) 
                                        { event.preventDefault() }"><span class="text-danger text-decoration-none">
                                        <img src="./images/remove.png" loading="lazy" sizes="100vw" height="20" alt="" class="image-4" />
                                        </span></a>

                                    <img src="<?php echo $values["item_images"]; ?>" loading="lazy" sizes="60px" height="60" alt="" class="image-4" />
                                    <h4 class="heading-4"><?php echo $values["item_name"]; ?></h4>
                                    <h4 class="heading-4"><?php echo $values["item_size"];?></h4>
                                    <h4 class="heading-4"><?php echo $values["item_quantity"]; ?></h4>
                                </div>
                                <div class="div-block-21">
                                    <h4 class="heading-4"><?php echo ($values["item_quantity"] * $values["item_price"]);?> RSD</h4>
                                </div>
                            </div>
                        <?php
                        $total = $total + ($values["item_quantity"] * $values["item_price"]);
                            }
                        ?>
                    

                            <div class="div-block-18 ukupno">
                                <div class="div-block-22">
                                    <h4 class="heading-4">Cena + Dostava:</h4>
                                </div>
                                <div class="div-block-21">
                                    <h4 class="heading-4"><?php echo $total; ?> RSD + <?php echo $quant*250; ?> RSD</h4><br> 
                                </div>
                            </div>
                            <div class="div-block-18 ukupno">
                                <div class="div-block-22">
                                    <h4 class="heading-4">Ukupno:</h4>
                                    
                                </div>
                                <div class="div-block-21">
                                <h4 class="heading-4"><?php echo $quant*250+$total; ?> RSD</h4><br>
                                </div>
                            </div>
                            

                        <?php
                            }
                        ?>
                </div>
                
                <div class="hero-split-3">
                    <div class="form-block w-form">
                            <form method="post" action="checkout.php?action=privData">
                                <label for="velicina" class="field-label popunipodatke">Podaci za dostavu</label>
                                <label for="name" class="field-label">Ime</label>
                                <input type="text" class="w-input" maxlength="256" name="name" data-name="name" placeholder="Marko" id="name" required="" />
                                <label for="surname" class="field-label">Prezime</label>
                                <input type="text" class="w-input" maxlength="256" name="surname" data-name="surname" placeholder="Marković" id="surname" required="" />
                                <label for="mail" class="field-label">E-mail</label>
                                <input type="email" class="w-input" maxlength="256" name="mail" data-name="mail" placeholder="marko@gmai.com" id="mail" required="" />
                                <label for="city" class="field-label">Grad</label>
                                <input type="text" class="w-input" maxlength="256" name="city" data-name="city" placeholder="Beograd, Zemun" id="city" required="" />
                                <label for="address" class="field-label">Adresa</label>
                                <input type="text" class="w-input" maxlength="256" name="address" data-name="address" placeholder="Prvomajska 100" id="address" required="" />
                                <label for="phone" class="field-label">Telefon</label>
                                <input type="tel" class="w-input" maxlength="256" name="phone" data-name="phone" placeholder="060112233" id="phone" required="" />
                                
                            <?php
                                if (!empty($_SESSION["cart"])) {
                            ?>
                            <input type="submit" value="Potvrda narudžbine" name="privData" class="button-primary w-button" />
                            <?php
                                } else {
                            ?>
                                    <input type="submit" value="Potvrda narudžbine" data-wait="Slanje..." class="button-primary w-button" style="opacity: 0.5;" disabled />
                            <?php
                                }
                                ?>
                            </form>
                        
                            
                    </div>
                </div>
            </div>
        </div>
    </section>