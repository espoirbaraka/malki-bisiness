<?php
$categ = $_GET['categ'];
$req = "SELECT * FROM t_categorie_produit WHERE CodeCategorie=$categ";
$categorie = $app->fetch($req);

$req2 = "SELECT * FROM t_categorie_produit";
$allcateg = $app->fetchPrepared($req2);

$req3 = "SELECT * FROM t_produit WHERE CodeCategorie=$categ ORDER BY Counter DESC";
$produit = $app->fetchPrepared($req3);
?>
<div class="page-banner" style="background-image: url(assets/uploads/testimonial.jpg)">
    <div class="inner">
        <h1>Categorie: <?php echo $categorie['Categorie']; ?></h1>
    </div>
</div>

<div class="page">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h3>Categories</h3>
                <div id="left" class="span3">

                    <ul id="menu-group-1" class="nav menu">
                        <li class="cat-level-1 deeper parent">
                            <a class="" href="">
                                <span data-toggle="collapse" data-parent="#menu-group-1" href="#cat-lvl1-id-1"
                                      class="sign"><i class="fa fa-plus"></i></span>
                                <span class="lbl">Trouvez une categorie</span>
                            </a>
                            <ul class="children nav-child unstyled small collapse" id="cat-lvl1-id-1">
                                <?php
                                foreach ($allcateg as $row){
                                    ?>
                                    <li class="deeper parent">
                                        <a class="" href="detail_categorie?categ=<?php echo $row['CodeCategorie'] ?>">
                                        <span data-toggle="collapse" data-parent="#menu-group-1" href="#cat-lvl2-id-11"
                                              class="sign"><i class="fa fa-plus"></i></span>
                                            <span class="lbl lbl1"><?php echo $row['Categorie'] ?></span>
                                        </a>

                                    </li>
                                <?php
                                }
                                ?>

                            </ul>
                        </li>

                    </ul>


                    <div class="ad-section pt_50">
                        <img src="assets/uploads/ad-6.png" alt="Advertisement"></div>

                </div>
            </div>
            <div class="col-md-9">

                <h3>Tous les produits de categorie "<?php echo $categorie['Categorie'] ?>"</h3>
                <div class="product product-cat">

                    <div class="row">
                        <?php
                        foreach ($produit as $row){
                            ?>
                            <div class="col-md-4 item item-product-cat">
                                <div class="inner">
                                    <div class="thumb">
                                        <div class="photo"
                                             style="background-image:url(admin/img/<?php echo $row['Photo'] ?>);"></div>
                                        <div class="overlay"></div>
                                    </div>
                                    <div class="text">
                                        <h3><a href="detail_produit?produit=<?php echo $row['CodeProduit'] ?>"><?php echo $row['Produit'] ?></a>
                                        </h3>
                                        <h4>
                                            <?php echo $row['Prix'] ?> $
                                        </h4>
                                        <div class="rating">
                                        </div>
                                        <p><a href="detail_produit?produit=<?php echo $row['CodeProduit'] ?>">Ajouter au panier</a></p>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
