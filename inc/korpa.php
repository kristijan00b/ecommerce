<div class="nav-korpa">
    <div class="nav-korpa-sadrzaj">
        <h5 class="korpah5">Korpa (<span>
                                        <?php
                                            if(isset($_SESSION["cart"])){
                                            $count = count($_SESSION["cart"]); 
                                            echo "$count"; 
                                                }
                                            else
                                                echo "0";
                                        ?>
                                        </span>)</h5>
        <a href="./cart.php" class="button-primary w-button" >Pregledaj korpu</a>
    </div>
 </div>