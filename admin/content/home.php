<?php
$today = date('Y-m-d');
$year = date('Y');
$mois = date('m');
if(isset($_GET['year']) AND isset($_GET['month'])){
    $year = $_GET['year'];
    $mois = $_GET['month'];
}

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <p>
        Acceuil :: Admin
</p>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php
        if(isset($_SESSION['error'])){
            echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Erreur!</h4>
              ".$_SESSION['error']."
            </div>
          ";
            unset($_SESSION['error']);
        }
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
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-primary">
                    <div class="inner">
                        <?php
                        $sql1 = "SELECT COUNT(CodeProduit) as nbre FROM t_produit";
                        $req1 = $app->fetch($sql1);
                        ?>
                        <h3><?php echo $req1['nbre']; ?></h3>

                        <p>Produits</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>
                    <a href="#" class="small-box-footer">Plus d'info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box" style="background-color: #b7b1b3">
                    <div class="inner">
                        <?php
                        $sql2 = "SELECT COUNT(CodeCategorie) as nbre FROM t_categorie_produit";
                        $req2 = $app->fetch($sql2);
                        ?>
                        <h3><?php echo $req2['nbre']; ?></h3>

                        <p>Categories produit</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="#" class="small-box-footer">Plus d'info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box" style="background-color: #b30752">
                    <div class="inner">
                        <?php
                        $sql3 = "SELECT COUNT(CodeUser) as nbre FROM t_user WHERE CodeCategorie=2";
                        $req3 = $app->fetch($sql3);
                        ?>
                        <h3><?php echo $req3['nbre']; ?></h3>

                        <p>Clients</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-book"></i>
                    </div>
                    <a href="#" class="small-box-footer">Plus d'info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box" style="background-color: #b37b07">
                    <div class="inner">
                        <?php
                        $sql4 = "SELECT COUNT(CodePaiement) as nbre FROM t_paiement";
                        $req4 = $app->fetch($sql4);
                        ?>
                        <h3><?php echo $req4['nbre']; ?></h3>

                        <p>Ventes de ce mois </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="" class="small-box-footer">Plus d'info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Statistique des ventes</h3>
                        <div class="box-tools pull-right">
                            <form class="form-inline">
                                <div class="form-group">
                                    <select class="form-control input-sm" id="select_year">
                                        <?php
                                        for($i=2015; $i<=2040; $i++){
                                            $selected = ($i==$year)?'selected':'';
                                            echo "
                            <option value='".$i."' ".$selected.">".$i."</option>
                          ";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="chart">
                            <br>
                            <div id="legend" class="text-center"></div>
                            <canvas id="barChart" style="height:380px"></canvas>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>

  </div>


