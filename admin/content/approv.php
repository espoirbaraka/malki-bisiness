<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Stock
        </h1>
        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i> Acceuil</a></li>
            <li class="active">Stock</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php
        if (isset($_SESSION['error'])) {
            echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Erreur!</h4>
              " . $_SESSION['error'] . "
            </div>
          ";
            unset($_SESSION['error']);
        }
        if (isset($_SESSION['success'])) {
            echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Succès!</h4>
              " . $_SESSION['success'] . "
            </div>
          ";
            unset($_SESSION['success']);
        }
        ?>
        <div class="row">
            <div class="col-xs-12">
                <div class="box" style="overflow: auto;">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#liste" data-toggle="tab">Liste</a></li>
                                    <li><a href="#newagent" data-toggle="tab">Ajouter</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="active tab-pane" id="liste">
                                        <table id="example3" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Produit</th>
                                                    <th>Categorie</th>
                                                    <th>Prix d'achat</th>
                                                    <th>Prix de vente</th>
                                                    <th>Quantite en stock</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql = "SELECT * FROM t_approvisionnement
                                                        INNER JOIN t_produit
                                                        ON t_approvisionnement.CodeProduit=t_produit.CodeProduit
                                                        INNER JOIN t_categorie_produit
                                                        ON t_produit.CodeCategorie=t_categorie_produit.CodeCategorie";
                                                $req = $app->fetchPrepared($sql);
                                                foreach ($req as $row) {
                                                ?>
                                                    <tr>
                                                        <td><img src="<?php echo (!empty($row['Photo'])) ? 'img/' . $row['Photo'] : 'img/user.png'; ?>" style="width: 30px; height: 30px;"></td>
                                                        <td><?php echo $row['Produit']; ?></td>
                                                        <td><?php echo $row['Categorie']; ?></td>
                                                        <td><?php echo $row['Cout']; ?>$</td>
                                                        <td><?php echo $row['Prix']; ?>$</td>
                                                        <td><?php echo $row['Quantite']; ?></td>
                                                        <td>
                                                            <i class='fa fa-edit edit btn btn-primary btn-sm' data-id="<?php echo $row['CodeProduit'] ?>"></i>
                                                            <!-- <i class='fa fa-trash delete btn btn-danger btn-sm' data-id="<?php //echo $row['CodeProduit'] ?>"></i> -->
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>

                                        </table>
                                    </div>



                                    <div class="tab-pane" id="newagent">
                                        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="manager/create.php">
                                            
                                            <div class="form-group">
                                            <input type="hidden" name="event" value="CREATE_APPROV">
                                                <label for="numero" class="col-sm-2 control-label">Produit</label>
                                                <div class="col-sm-10">
                                                    <select name="produit" class="form-control" id="" required>
                                                        <option value="">-- Selectionner une produit --</option>
                                                        <?php
                                                        $sql = "SELECT * FROM t_produit";
                                                        $req = $app->fetchPrepared($sql);
                                                        foreach ($req as $row) {
                                                        ?>
                                                            <option value="<?php echo $row['CodeProduit']; ?>"><?php echo $row['Produit']; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="numero" class="col-sm-2 control-label">Prix</label>
                                                <div class="col-sm-10">
                                                    <input type="number" name="prix" class="form-control" required>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="photo" class="col-sm-2 control-label">Quantite</label>
                                                <div class="col-sm-10">
                                                    <input type="number" name="quantite" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" name="ajouter" class="btn btn-primary"><i class="fa fa-plus"></i> Ajouter</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div>
                            <!-- /.nav-tabs-custom -->
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->




                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>