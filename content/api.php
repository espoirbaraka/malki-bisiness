
<!-- <div class="page-banner" style="background-image: url(assets/uploads/testimonial.jpg)">
    <div class="inner">
        <h1>Categorie: </h1>
    </div>
</div> -->

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
                        </li>

                    </ul>


                    <div class="ad-section pt_50">
                        <img src="assets/uploads/ad-6.png" alt="Advertisement"></div>

                </div>
            </div>
            <div class="col-md-9">

                <!-- <h3>Tous les produits de categorie "<?php echo $categorie['Categorie'] ?>"</h3> -->
                <div class="product product-cat">

                    <div class="row">
                    <?php
    
    $curl = "http://localhost:81/byproduit_api/byproduit/router/produit/read.php?client_id=malekani_project&key=20a3238259f91e579d10395baa8498e79c020ec7";

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
                            <div class="col-md-4 item item-product-cat">
                                <div class="inner">
                                    <div class="thumb">
                                        <div class="photo"
                                             style="background-image:url(http://localhost:81/byproduit/admin/fichier/<?=$row->image_prod?>);"></div>
                                        <div class="overlay"></div>
                                    </div>
                                    <div class="text">
                                        <h3><a href="http://localhost:81/byproduit/produit.php"><?=$row->designation_prod;?></a>
                                        </h3>
                                        <h4>
                                        <?=$row->prix_prod.''.'$';?>
                                        </h4>
                                        <div class="rating">
                                        </div>
                                        <p><a href="detail_produit?produit=<?=$row->id_prod.''.'$';?>">Ajouter au panier</a></p>
                                    </div>
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
</div>
