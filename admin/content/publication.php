<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Publications
        </h1>
        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i> Acceuil</a></li>
            <li class="active">Publications</li>
        </ol>
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
        <div class="row">
            <div class="col-xs-12">
                <div class="box" style="overflow: auto;">
                    <div class="box-header">
                        <a href="#adduser" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Nouveau</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example3" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Titre</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sql = "SELECT * FROM t_publication";
                            $req = $app->fetchPrepared($sql);
                            foreach($req as $row){
                                ?>
                                <tr>
                                    <td><img src="<?php echo (!empty($row['Photo'])) ? 'img/' . $row['Photo'] : 'img/user.png'; ?>" style="width: 30px; height: 30px;"></td>
                                    <td><?php echo $row['Titre']; ?></td>
                                    <td><?php echo $row['Created_on']; ?></td>
                                    <td>
                                        <i class='fa fa-trash delete btn btn-danger btn-sm' data-id="<?php echo $row['CodePub'] ?>"></i>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>

                            </tbody>

                        </table>
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




