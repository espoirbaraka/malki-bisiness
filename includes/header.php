<body>

<div id="fb-root"></div>

<div class="top">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="left">
                    <ul>
                        <li><i class="fa fa-envelope-o"></i> info@malki.com</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="right">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="header">
    <div class="container">
        <div class="row inner">
            <div class="col-md-6 logo">
                <a href="index"><img src="assets/uploads/malki.png" alt="logo image"></a>
            </div>



            <div class="col-md-3 search-area right">
                <form class="navbar-form navbar-left" role="search"
                      action="search.php?search=" method="GET">
                    <div class="form-group">
                        <input type="text" class="form-control search-top" placeholder="Rechercher un produit"
                               name="search" required>
                    </div>
                    <button type="submit" class="btn btn-default">Chercher</button>
                </form>
            </div>

            <div class="col-md-3 right">
                <ul>


                    <?php
                    if (isset($_SESSION['client'])) {
                        ?>
                        <ul class="list-inline margin-clear pull-right">
                            <li><a href="manager/logout.php"><?php echo $_SESSION['username']; ?></a></li>

                        </ul>
                        <?php
                    } else {
                        ?>
                        <li><a href="login"><i class="fa fa-sign-in"></i> Se connecter</a></li>
                        <?php
                    }
                    ?>



                    <?php
                    if (isset($_SESSION['cart'])) {
                        $cout = 0;
                        foreach($_SESSION['cart'] as $key => $value)
                        {
                            $cout = $cout + $value['prix'] * $value['quantite'];
                        }
                        ?>
                        <li class="dropdown cart-menu-body
                                        paira-cart-menu-body">
                            <a href="cart.php" class="padding-bottom-10"><i class="fa fa-shopping-cart"></i>
                                <span class="paira-cart-total-price"><span class="money"><?php echo number_format($cout) ?> $</span></span>
                                <span class="badge
                                                paira-cart-item-count"><?php echo count($_SESSION['cart']) ?></span></a>
                        </li>
                        <?php
                    }
                    ?>


                </ul>
            </div>
        </div>
    </div>
</div>

<div class="nav">
    <div class="container">
        <div class="row">
            <div class="col-md-12 pl_0 pr_0">
                <div class="menu-container">
                    <div class="menu">
                        <ul>
                            <li><a href="index">Acceuil</a></li>

                            <li><a href="">Categorie</a>
                                <ul>
                                    <?php
                                    $req = "SELECT * FROM t_categorie_produit ORDER BY Categorie";
                                    $categ = $app->fetchPrepared($req);
                                    foreach ($categ as $row){
                                        ?>
                                        <li><a href="detail_categorie?categ=<?php echo $row['CodeCategorie'] ?>"><?php echo $row['Categorie'] ?></a>
                                        </li>
                                    <?php
                                    }
                                    ?>

                                </ul>
                            </li>

                            <li><a href="gallerie">Gallerie</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>