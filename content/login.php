<div class="page-banner" style="background-color:#444;background-image: url(assets/uploads/banner_login.jpg);">
    <div class="inner">
        <h1>Connectez-vous</h1>
    </div>
</div>

<div class="page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="user-content">



                    <form action="manager/login.php" method="post">

                        <input type="hidden" name="_csrf" value="3f3b81eac541de9fd38d942dd0676aae"/>
                        <div class="row">

                            <div class="col-md-4">

                            </div>
                            <div class="col-md-4">
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
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Mot de passe</label>
                                    <input type="password" class="form-control" name="password" required>
                                </div>
                                <div class="form-group">
                                    <label for=""></label>
                                    <input type="submit" class="btn btn-primary" value="Se connecter" name="submit">
                                </div>
                                <a href="register.php" style="color:#e4144d;">S'inscrire</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>