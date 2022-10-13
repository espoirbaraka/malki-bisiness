<?php
$req2 = "SELECT * FROM t_produit";
$photo = $app->fetchPrepared($req2);
?>
<div class="page-banner" style="background-image: url(assets/uploads/testimonial.jpg);">
    <div class="inner">
        <h1>Nos images</h1>
    </div>
</div>

<div class="page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="gal-container">

                    <?php
                    foreach ($photo as $row){
                        ?>
                        <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                            <div class="box">
                                <a href="#" data-toggle="modal" data-target="#<?php echo $row['CodeProduit'] ?>">
                                    <img src="admin/img/<?php echo $row['Photo'] ?>" alt="Photo 6">
                                </a>
                                <div class="modal fade" id="<?php echo $row['CodeProduit'] ?>" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <div class="modal-body">
                                                <img src="admin/img/<?php echo $row['Photo'] ?>" alt="Photo 6">
                                            </div>
                                            <div class="col-md-12 description">
                                                <h4>Photo</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>


                    <div class="pagination">
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>