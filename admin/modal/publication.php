<!-- Add -->
<div class="modal fade" id="adduser">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Ajouter une publication</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="manager/create.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="event" value="CREATE_PUBLICATION" required>
                        <label for="titre" class="col-sm-3 control-label">Titre</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="titre" name="titre" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="postnom" class="col-sm-3 control-label">Detail</label>

                        <div class="col-sm-9">
                            <textarea class="form-control" name="detail"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="prenom" class="col-sm-3 control-label">Image</label>

                        <div class="col-sm-9">
                            <input type="file" class="form-control" id="image" name="image" required>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
                <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Poster</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Suppression...</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="manager/delete.php">
                    <input type="hidden" class="publication" name="id">
                    <input type="hidden" name="event" value="DELETE_PUBLICATION">
                    <div class="text-center">
                        <p>SUPPRIMER LA PUBLICATION</p>
                        <h2 class="bold fullname"></h2>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
                <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</div>




