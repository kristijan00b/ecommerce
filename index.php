<?php 
include_once 'config/Database.php';
include_once 'class/Item.php';

$database = new Database();
$db = $database->getConnection();

$item = new Item($db);

include('inc/header.php');
?>

<div class="FIX">
    <div class="div-block-12" id="vrh">
        <p class="paragraph-2">Uskoro veća i unapređenija online prodavnica. Prati i ostani obavešten!</p>
    </div>
    <section class="hero-heading-center wf-section">
        <div class="container">
            <div class="hero-wrapper">
                <div class="hero-split"><img src="images/LogoTemplateWhite.png" loading="lazy"
                        sizes="(max-width: 991px) 153.9375px, 215.5px" height="70" alt="" class="image" />
                    <h1 class="centered-heading margin-bottom-32px">Gaming Prodavnica</h1>
                    <p class="margin-bottom-24px"><strong>Najkvalitetnije gaming majice. <br /></strong>Uskoro
                        &gt;&gt;&gt; duksevi, gedžeti, periferija... i još mnogo toga! <br />Zaprati nas na društvenim
                        mrežama i ostani obavešten.</p><a href="#proizvodi"
                        class="button-primary w-button">Proizvodi</a>
                </div>
                <div class="hero-split">
                    <div class="div-block-13"><img src="images/banermajica.png" loading="lazy"
                            sizes="(max-width: 479px) 88vw, (max-width: 767px) 300px, (max-width: 991px) 350px, (max-width: 1439px) 43vw, 432.390625px"
                            alt="" class="shadow-two" /></div>
                </div>
            </div>
        </div>
    </section>
    <section class="hero-without-image wf-section">
        <div class="container-4">
            <div class="hero-wrapper-two">
                <h1 class="heading">Game over - Play again</h1>
                <p class="margin-bottom-24px-3">Naša strast prema gamingu inspirisala nas je da stvorimo jedinstvene i
                    kvalitetne majice koje će iskazivati vašu ljubav prema gaming kulturi.<br /><br />Svaka naša majica
                    je pažljivo dizajnirana sa posebnom pažnjom posvećenom detaljima. <br />Koristimo visokokvalitetne
                    materijale kako bismo vam pružili udobnost i trajnost, bez kompromisa.<br /><br />Pridružite se
                    <strong>gamy </strong>zajednici i pokažite svoju strast prema gamingu kroz naše unikatne majice.
                </p>
            </div>
        </div>
    </section>
</div>


    <section id="proizvodi" class="team-circles wf-section">
        <div class="container-3">
            <h2 class="centered-heading">Proizvodi</h2>
            <p class="centered-subheading">U ponudi je <strong>1.kolekcija<em> </em></strong>gaming
                majica.<br />Dostupne veličine: <strong>XXS</strong>, <strong>XS</strong>, <strong>S</strong>,
                <strong>M</strong>, <strong>L</strong>, <strong>XL</strong>.
            </p>
            <?php include_once('inc/korpa.php'); ?>
            
            <div class="team-grid">

            <?php 
			    $result = $item->itemsList();
			    while ($item = $result->fetch_assoc()) { 
			?>	

            
                <div id="w-node-_8fb6c526-eee1-a2cd-0a61-7469828bf8df-9833fc16" class="team-card">
                <a href="../gamy/product.php?id=<?php echo $item["id"]; ?>" class="kartica">
                    <div class="div-block-2"><img src="<?php echo $item["images"]; ?>" loading="lazy"
                            sizes="(max-width: 479px) 33vw, (max-width: 767px) 37vw, (max-width: 991px) 20vw, (max-width: 1439px) 21vw, 213.328125px"
                            alt="" class="team-member-image" /></div>
                    <div class="team-member-name"><?php echo $item["name"]; ?></div>
                    <p class="paragraph"><i>Sastav:</i> 100% pamuk <br><i>Zemlja porekla: </i>Srbija<br><i>Cena: </i><b><?php echo $item["price"]; ?> RSD</b></p>
                    
                </a>
                </div>
            

            <?php 
			    } 
			?>

            </div>
        </div>
    </section>

<?php include('inc/footer.php');?>