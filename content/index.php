



<div class="product pt_70 pb_70">
    <div class="container">

        <div class="row">
            <div class="col-md-12">

                <div class="product-carousel">

                    <?php
                    $sql2 = "SELECT * FROM t_produit ORDER BY Counter desc";
                    $produit = $app->fetchPrepared($sql2);
                    foreach ($produit as $row){
                        ?>
                        <div class="item">
                            <div class="thumb">
                                <div class="photo"
                                     style="background-image:url(admin/img/<?php echo $row['Photo'] ?>);"></div>
                                <div class="overlay"></div>
                            </div>
                            <div class="text">
                                <h3><a href="detail_produit.php?produit=<?php echo $row['CodeProduit']; ?>"><?php echo $row['Produit']; ?></a></h3>
                                <h4>
                                    <?php echo $row['Prix']; ?>$

                                </h4>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>

                                <p><a href="detail_produit?produit=<?php echo $row['CodeProduit']; ?>">Ajouter au panier</a></p>
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


<div class="ad-section pb_20">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <img src="assets/uploads/ad-3.png" alt="Advertisement"></div>
        </div>
    </div>
</div>


<div class="product bg-gray pt_70 pb_30">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="headline">
                    <h2>les Plus vendus</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                <div class="product-carousel">
                    <?php
                    $sql2 = "SELECT * FROM t_produit ORDER BY Counter desc";
                    $produit = $app->fetchPrepared($sql2);
                    foreach ($produit as $row){
                        ?>
                        <div class="item">
                            <div class="thumb">
                                <div class="photo"
                                     style="background-image:url(admin/img/<?php echo $row['Photo'] ?>);"></div>
                                <div class="overlay"></div>
                            </div>
                            <div class="text">
                                <h3><a href="detail_produit?produit=<?php echo $row['CodeProduit']; ?>"><?php echo $row['Produit']; ?></a></h3>
                                <h4>
                                    <?php echo $row['Prix']; ?>$ </h4>
                                <div class="rating">
                                </div>
                                <p><a href="detail_produit?produit=<?php echo $row['CodeProduit']; ?>">Ajouter au panier</a></p>
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




<div class="ad-section pb_20">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <img src="assets/uploads/ad-5.png" alt="Advertisement"></div>
        </div>
    </div>
</div>



<section class="home-newsletter">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="single">
                    <form action="#" method="post">
                        <input type="hidden" name="_csrf" value="3f3b81eac541de9fd38d942dd0676aae"/>
                        <h2>S'abonner aux notifications</h2>
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Adresse mail"
                                   name="email_subscribe">
                            <span class="input-group-btn">
			         	<button class="btn btn-theme" type="submit" name="form_subscribe">S'abonner</button>
			         	</span>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>