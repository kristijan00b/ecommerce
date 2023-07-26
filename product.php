<?php 
session_start();
include_once 'config/Database.php';
include_once 'class/Item.php';

$database = new Database();
$db = $database->getConnection();

$item = new Item($db);

include('inc/prodheader.php');
?>

<?php
if (isset($_GET['id'])) {
    $item_id = $_GET['id'];
    
    // Dohvatanje podataka o stavki na osnovu ID-ja
    $item_details = $item->getItemById($item_id);
    
    // Provera da li je pronađena stavka
    if ($item_details) {
        $item_id = $item_details['id'];
        $item_name = $item_details['name'];
        $item_price = $item_details['price'];
        $item_description = $item_details['description'];
        $item_images = $item_details['images'];
        $item_images_front = $item_details['images_front'];
        $item_images_back = $item_details['images_back'];
?>

<div class="div-block-19"><a href="./#proizvodi" class="button-primary izmenjen w-button">&lt; Nastavi kupovinu</a></div>

    <section class="hero-heading-right-3 wf-section">
        <form method="post" action="cart.php?action=add&id=<?php echo $item_id; ?>">
            <input type="hidden" name="item_name" value="<?php echo $item_name; ?>">
			<input type="hidden" name="item_price" value="<?php echo $item_price; ?>">
			<input type="hidden" name="item_images" value="<?php echo $item_images; ?>">
			<input type="hidden" name="item_id" value="<?php echo $item_id; ?>">

            <div class="container-7">
                <div class="hero-wrapper-4">
                    <div class="hero-split-4"><img id="velikaSlika"
                            src="<?php echo $item_images; ?>"
                            loading="lazy"
                            sizes="(max-width: 479px) 94vw, (max-width: 767px) 95vw, (max-width: 991px) 92vw, (max-width: 1439px) 43vw, 432.390625px"
                            alt="" class="shadow-two-5" />
                            <div class="div-block-20">
                                <a href="#" onclick="promenifokus(0)">
                                    <img src="<?php echo $item_images; ?>"
                                    loading="lazy" sizes="(max-width: 479px) 60px, 100px" height="100"
                                    alt="" class="imagesingle activeimagesingle" />
                                </a>
                                <a href="#" onclick="promenifokus(1)">
                                    <img src="<?php echo $item_images_back; ?>"
                                    loading="lazy" sizes="(max-width: 479px) 60px, 100px" height="100"
                                    alt="" class="imagesingle" />
                                </a>
                                <a href="#" onclick="promenifokus(2)">
                                    <img src="<?php echo $item_images_front; ?>"
                                    loading="lazy" sizes="(max-width: 479px) 60px, 100px" height="100"
                                    alt="" class="imagesingle" />
                                </a>
                            </div></div>
                    <div class="hero-split-4">
                        
                        <h1><strong><?php echo $item_name; ?></strong></h1>
                        <p class="margin-bottom-24px-7"><em>Sastav:</em> <strong>100% pamuk</strong><br />‍<em>Zemlja
                                porekla:</em> <strong>Srbija</strong> 
                                
                                <br><em>Dostava:</em> ≈<strong>250</strong> RSD/kom.


                            <br />‍<em>Cena:</em> <strong><?php echo $item_price; ?></strong> RSD</p>
                                <label for="quantity">Izaberi količinu</label>
                                <input id="quantity" name="quantity" type="number" value="1" min="1" max="3">
                                <label for="size"> Izaberi veličinu:</label>
                                <select name="size" id="size"> 
                                    <option value="XXS">XXS</option>
                                    <option value="XS">XS</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                </select> <br>
                                <input type="submit" name="add" class="button-primary w-button" value="Dodaj u korpu">
                                
                                <?php include_once('inc/korpa.php'); ?>
                    </div>
                </div>
            </div>
        </form>
    </section>
<?php
    }}
?>

<script>
    function promenifokus(indeks) {
    var maliSlike = [
      "<?php echo $item_images; ?>",
      "<?php echo $item_images_back; ?>",
      "<?php echo $item_images_front; ?>"
    ];
  
    var velikaSlika = document.getElementById("velikaSlika");
    velikaSlika.src = maliSlike[indeks];
  
    var maleSlike = document.getElementsByClassName("imagesingle");
    for (var i = 0; i < maleSlike.length; i++) {
      if (i === indeks) {
        maleSlike[i].classList.add("activeimagesingle");
      } else {
        maleSlike[i].classList.remove("activeimagesingle");
      }
    }
  }
  
</script>


<?php include('inc/footer.php');?>