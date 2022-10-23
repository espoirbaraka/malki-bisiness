<?php
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'clearall') {
        unset($_SESSION['cart']);
    } elseif ($_GET['action'] == 'remove') {
        $id = $_GET['id'];
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['id'] == $id) {
                unset($_SESSION['cart'][$key]);
            }
        }
    }
}
?>


<div class="page-banner" style="background-image: url(assets/uploads/testimonial.jpg);">
    <div class="inner">
        <h1>Panier</h1>
    </div>
</div>

<div class="page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <?php

                if(isset($_SESSION['success'])){
                    echo "
                                <div class='alert alert-success alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                <h4><i class='icon fa fa-check'></i> Succès!</h4>
                                ".$_SESSION['success']."
                                </div>
                            ";
                    unset($_SESSION['success']);
                }
                ?>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h3>Panier</h3>
                </div>

                <?php
                if (!isset($_SESSION['cart'])) {
                    ?>
                    <div class="col-md-12 col-sm-12 col-xs-12 paira-gap-3 text-center
                paira-cartEmpty">
                        <h3 class="text-capitalize margin-top-40">Votre panier est vide!</h3>
                        <h5 class="margin-bottom-10">Passer votre commande ...</h5>
                    </div>
                    <?php
                } else {
                    $cout = 0;
                    foreach ($_SESSION['cart'] as $key => $value) {
                        ?>
                        <form action="manager/paiement_stripe.php" method="post" class="paira-cartNotEmpty">
                        <div class="col-md-12 col-sm-12 col-xs-12 margin-top-40">
                            <div class="cart-item-list">
                                <ul class="list-unstyled paira-cart-page-list">

                                    <li>
                                        <div class="col-md-2 col-sm-3 col-xs-12 margin-top-20">
                                            <a href="/products/free-demo-product-name-10?variant=25021667523">
                                                <img class="img-responsive thumbnail" src="admin/img/<?php echo $value['image']  ?>" alt="Free demo product name 10 - s / red / ramie">
                                            </a>
                                        </div>
                                        <div class="col-md-4 col-sm-3 col-xs-12 margin-top-40">
                                            <a href="/products/free-demo-product-name-10?variant=25021667523" class="margin-top-10"><strong><?php echo $value['name'] ?></strong></a>
                                        </div>
                                        <div class="col-md-2 col-sm-3 col-xs-12 margin-top-20">
                                            <h4 class="margin-top-20 margin-bottom-10"><span class="money"><?php echo $value['prix'] ?> $</span></h4>
                                        </div>
                                        <div class="col-md-2 col-sm-9 col-xs-12 margin-top-20">
                                            <div class="full-width">
                                                <input type="number" size="4" name="updates[]" min="0" value="<?php echo $value['quantite'] ?>" class="form-control pull-left paira-cart-quantity-25021667523 margin-bottom-10">
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-9 col-xs-12 margin-top-20">
                                            <a href="cart.php?action=remove&id=<?php echo $value['id'] ?>" class="btn btn-primary pull-left paira-cart-page-delete  margin-bottom-10"><i class="fa fa-times"></i></a>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>


                        <?php

                        $cout = $cout + $value['prix'] * $value['quantite'];
                    }
                    ?>
                    <input type="hidden" value="<?php echo number_format($cout) ?>" name="amount">

                    <div class="col-md-6 col-sm-6 col-xs-12 margin-top-40">

                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 margin-top-40">
                        <div class="cart-sub-total paira-cart-sub-total text-right">
                            <h2 class="margin-clear"><span class="money"><?php echo number_format($cout) ?> $</span></h2>
                            <p class="margin-top-15 margin-bottom-15">Valider votre commande </p>
                            <a href="cart.php?action=clearall" class="btn btn-danger btn-lg margin-top-15 text-uppercase">Vider le panier</a>

                            <?php
                            if(isset($_SESSION['client'])){
                                ?>
                                <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="pk_test_51KPUgIHLxZc21QViUqPXR1AopPv6mCYjVRLXdqKLLaGzLekBJ4Qzt86hC0TNpgViusua6Nu0VhH8eKZ8l8uenmYI00lTzevcoH" data-amount=<?php echo str_replace("", "", number_format($cout)) ?> data-name="" data-description="Effectuer votre paiement dans le compte de MALKI BUSINESS" data-image="" data-currency="usd" data-locale="auto">
                                </script>
                            <?php
                            }else{
                            ?>
                                <a href="login.php" class="btn btn-primary btn-lg margin-top-15 text-uppercase">Connectez-vous d'abord</a>
                                <?php
                            }
                            ?>


                        </div>
                    </div>
                    </form>
                    <?php
                }
                ?>


            </div>
        </div>
    </div>
</div>