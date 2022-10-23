



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


<!-- <div class="ad-section pb_20">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <img src="assets/uploads/ad-3.png" alt="Advertisement"></div>
        </div>
    </div>
</div> -->


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

<div class="product bg-white pt_70 pb_30">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="headline">
                    <h2>Produit en GROS</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                <div class="product-carousel">
                <?php
    
    $curl = "http://localhost/byproduit_api/byproduit/router/produit/read.php?client_id=malekani_project&key=20a3238259f91e579d10395baa8498e79c020ec7";

    $data_array = array(
        'client_id' => 'client_id',
        'key' => 'key'

    );
    // $row = [];
    $data = http_build_query($data_array);
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $curl);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $resp = curl_exec($ch);

    if($e = curl_error($ch)){
        echo $e;
    }
    else{
        $response = json_decode($curl);
        print_r($response);
        $data = file_get_contents($curl);
        $produit = json_decode($data);

        // print_r($produit);
        foreach($produit as $row){
            ?>
                        <div class="item">
                            <div class="thumb">
                                <div class="photo"
                                     style="background-image:url(http://localhost/byproduit/admin/fichier/<?=$row->image_prod?>);"></div>
                                <div class="overlay"></div>
                            </div>
                            <div class="text">
                                <h3><a href="http://localhost/byproduit/produit.php"><?=$row->designation_prod;?></a></h3>
                                <h4>
                                <?=$row->prix_prod.''.'$';?> 
                            </h4>
                                <div class="rating">
                                </div>
                                <p><a href="detail_produit?produit=<?=$row->id_prod.''.'$';?>">Ajouter au panier</a></p>
                            </div>
                        </div>
                        <?php
                            }
                        }
                        curl_close($ch);
                    ?>



                </div>


            </div>
        </div>
    </div>
</div>



<!-- <div class="ad-section pb_20">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <img src="assets/uploads/ad-5.png" alt="Advertisement"></div>
        </div>
    </div>
</div> -->



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