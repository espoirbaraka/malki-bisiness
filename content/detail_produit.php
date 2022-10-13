<?php
$produit = $_GET['produit'];
$req = "SELECT * FROM t_produit WHERE CodeProduit=$produit";
$produit = $app->fetch($req);

$categ = $produit['CodeCategorie'];
$req2 = "SELECT * FROM t_produit WHERE CodeCategorie=$categ";
$allproduit = $app->fetchPrepared($req2);


?>
<div class="page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="product">
                    <div class="row">
                        <div class="col-md-5">
                            <ul class="prod-slider">

                                <li style="background-image: url(admin/img/<?php echo $produit['Photo'] ?>);" data-toggle="modal" data-target="#<?php echo $produit['CodeProduit'] ?>"></li>


                            </ul>

                        </div>
                        <div class="col-md-7">
                            <div class="p-title"><h2><?php echo $produit['Produit'] ?></h2></div>
                            <div class="p-review">
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <div class="p-short-des">
                                <p>
                                <p><?php echo $produit['Description'] ?></p>
                                </p>
                            </div>
                            <form action="#" method="post">

                                <div class="p-price">
                                    <span style="font-size:14px;">Prix</span><br>
                                    <span><?php echo $produit['Prix'] ?> $</span>
                                </div>
                                <input type="hidden" name="p_current_price" value="20">
                                <input type="hidden" name="p_name" value="Star Wars Darth Vader">
                                <input type="hidden" name="p_featured_photo" value="product-featured-1.html">
                                <div class="p-quantity">
                                    Quantité <br>
                                    <input type="number" class="input-text qty" step="1" min="1" max="" name="p_qty"
                                           value="1" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric">
                                </div>
                                <div class="btn-cart btn-cart1">
                                    <input type="submit" value="Ajouter au panier" name="form_add_to_cart">
                                </div>
                            </form>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#description"
                                                                          aria-controls="description" role="tab"
                                                                          data-toggle="tab">Description</a></li>

                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="description"
                                     style="margin-top: -30px;">
                                    <p>
                                    <p><?php echo $produit['Description'] ?></p>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

<div class="product bg-gray pt_70 pb_70">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="headline">
                    <h2>Produits simulaires</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                <div class="product-carousel">

                    <?php
                    foreach ($allproduit as $row){
                        ?>
                        <div class="item">
                            <div class="thumb">
                                <div class="photo"
                                     style="background-image:url(admin/img/<?php echo $row['Photo'] ?>);"></div>
                                <div class="overlay"></div>
                            </div>
                            <div class="text">
                                <h3><a href="detail_produit?produit=<?php echo $row['CodeProduit'] ?>"><?php echo $row['Produit'] ?></a></h3>
                                <h4>
                                    <?php echo $row['Prix'] ?> $</h4>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <p><a href="detail_produit?produit=<?php echo $row['CodeProduit'] ?>">Ajouter au panier</a></p>
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