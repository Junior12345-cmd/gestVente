<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-10">
        <h1 class="m-0 text-dark"><?= $titrePage;?></h1>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<style>
    .glass {
        padding-top: 10px;
        width: 100%;
        background: rgba(0, 0, 0, 0.5);
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        backdrop-filter: blur(5px);
        -webkit--backdrop-filter: blur(5px);
        border-radius: 10px;
        border: 1px solid rgba(0,0,0,0.18);
    }
</style>
<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                
                <div class="row mt-3">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body py-0">
                                <ul class="list-group list-group-unbordered">
                                    <li class="list-group-item">
                                        <b><i class="fas fa-envelope mr-1"></i> Email</b> <a class="float-right"><?php if( ($user->getEmail())==null){ echo "Rien! Veuillez ajouté";}else{ echo($user->getEmail()); } ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b><i class="fas fa-phone-alt mr-1"></i> Téléphone</b> <a class="float-right"><?php     if( ($user->getTelephone())==null){ echo "Rien! Veuillez ajouté";}else{ echo($user->getTelephone()); } ?></a>
                                    </li>
                                  
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="" style="background-color: white; background-size: 100%; background-position: center; border-radius: 3px; padding-bottom: 1px;">
                            <div class="glass">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle bg-dark"
                                    src=""
                                    alt="Image de l'Utilisateur">
                                </div>

                                <h3 class="profile-username text-center font-weight-bold text-white"><?= $user->getEmail();?></h3>

                                <p class="text-muted text-center">
                                    <?php
                                        if($user->getPoste() == 'Admin') {
                                            echo '<span class="badge badge-success" >Administrateur</span>';
                                        }
                                        else if($user->getPoste() == 'User') {
                                            echo '<span class="badge badge-info">Manager</span>';
                                        }
                                    ?>
                                    <?php
                                        if($user->getEtat() == "Active") {
                                            echo '<span class="badge badge-info" >Activé</span>';
                                        }
                                        elseif($user->getEtat() == "Inactif") {
                                            echo '<span class="badge badge-danger">Désactivé</span>';
                                        }
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body py-0 ">
                                <ul class="list-group list-group-unbordered ">
                                    <li class="list-group-item">
                                        <button class="btn btn-block btn-sm btn-info updateBtn" id=""><i class="fas fa-edit mr-1"></i>Modifier infos compte</button>
                                    </li>
                                    <li class="list-group-item">
                                        <button class="btn btn-block btn-sm btn-danger deleteBtn" id=""><i class="fas fa-trash mr-1"></i>Supprimer compte</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                <!-- <a href="#" class="btn btn-primary btn-block"><b>Contacter</b></a> -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

<!-- updateModal -->
<div class="modal fade" id="updateModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header bg-info">
            <h4 class="modal-title">Modification d'infos compte</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="color: white;">&times;</span>
            </button>
        </div>
        <form action="<?=HOST;?>up-users.html" method="post" id="form_id">
            <div class="modal-body mt-3">
                <input type="hidden" name="values[idUser]" value="<?= $user->getId() ?>" id="m_idUser" required>               
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" value="<?= $user->getEmail() ?>" name="values[email]" id="m_email" required>
                </div>
                
                <div class="form-group">
                    <label for="telephone">Téléphone</label>
                    <input type="number" class="form-control" value="<?= $user->getTelephone() ?>" name="values[telephone]" id="m_telephone" required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" name="values[password]" value ="<?= $user->getPassword() ?>" id="m_password">
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <input type="submit" value="Modifier" name="modifier" class="btn btn-block btn-outline-info">
            </div>
        </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- deleteModal -->
<div class="modal fade" id="deleteModal">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header bg-danger">
            <h4 class="modal-title">Suppression</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="color: white;">&times;</span>
            </button>
        </div>
        <div class="modal-body mt-3">
            <div class="container">
                <p>Voulez vous vraiment supprimer le compte ?</p>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <a href="changer-etat.html/id/<?= $user->getId() ?>" id="delete_id"><button type="button" class="btn btn-block btn-outline-danger">Oui</button></a>
                    </div>
                    <div class="col-sm-6">
                        <button type="button" class="btn btn-block btn-outline-primary" data-dismiss="modal">Non</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>

$(document).ready(function () {
    $('.updateBtn').on('click', function(){
        $('#updateModal').modal('show');
    }); 

    $('.deleteBtn').on('click', function(){
        $('#deleteModal').modal('show');
    }); 
});

$(function () {
    $('[data-tog="tooltip"]').tooltip()
});

function selectionner(selectId, optionValToSelect) {

    var selectElement = document.getElementById(selectId);
    var selectOptions = selectElement.options;
    for (var opt, j = 0; opt = selectOptions[j]; j++) {
        if (opt.value == optionValToSelect) {
            selectElement.selectedIndex = j;
            break;
        }
    }
}

</script>