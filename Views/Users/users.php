<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-10">
        <h1 class="m-0 text-dark">Liste des utilisateurs</h1>
        </div><!-- /.col -->
        <div class="col-sm-2">
            <button class="btn btn-primary btn-sm btn-block" data-tog="tooltip" data-placement="bottom" title="Ajout manuel" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus" aria-hidden="true"></i> Ajouter</button>
        </div>
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card table-responsive">
                    <div class="card-body">
                        <style>
                            td {
                                white-space: nowrap;
                            }
                        </style>
                        <table id="table_users" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">N°</th>
                                    <th hidden scope="col">id user</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th  scope="col">Téléphone</th>
                                    <th  scope="col">Password</th>
                                    <th  scope="col">Profil</th>
                                    <th  scope="col">Etat</th>
                                    <th  scope="col">Actions</th>                                    
                                </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                    <th scope="col">N°</th>
                                    <th hidden scope="col">id user</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th  scope="col">Téléphone</th>
                                    <th   scope="col">Password</th>
                                    <th  scope="col">Profil</th>
                                    <th  scope="col">Etat</th>
                                    <th  scope="col">Actions</th>                                   
                                </tr>
                            </tfoot>
                            <tbody>
                                   <?php
                                        $num=1;
                                        foreach($users as $user):
                                                
                                    ?>
                                <tr>
                                     <td><?= $num ?> </td>
                                    <td hidden><?= $user->getIdUser(); ?> </td>
                                    <td ><?php if(is_null($user->getUsername())){ echo '<span class="badge badge-success" >Rien</span>';}else{ echo $user->getUsername(); } ?> </td>
                                    <td><?php if(is_null($user->getEmail())){ echo '<span class="badge badge-success" >Rien</span>';}else{ echo $user->getEmail(); } ?>  </td>
                                    <td><?php if(is_null($user->getTelephone())){ echo '<span class="badge badge-success" >Rien</span>';}else{ echo $user->getTelephone(); } ?></td>
                                    <td><?php if(is_null($user->getPassword())){ echo '<span class="badge badge-success" >Rien</span>';}else{ echo $user->getPassword(); } ?></td>
                                    <td>
                                        <?php 
                                            if($user->getProfil() ==1) {
                                                echo '<span class="badge badge-success" >Admin</span>';
                                            }
                                            else if($user->getProfil() ==2) {
                                                echo '<span class="badge badge-info">Enseignant</span>';
                                            }
                                            else if($user->getProfil() ==3) {
                                                echo '<span class="badge badge-info">Etudiant</span>';
                                            }
                                            else if($user->getProfil() ==4) {
                                                echo '<span class="badge badge-info">Parent</span>';
                                            }
                                            
                                        ?>
                                    </td>
                                    <td>
                                         <?php 
                                            if($user->getEtat() == 1) {
                                                echo '<span class="badge badge-info" >Activé</span>';
                                            }
                                            else if($user->getEtat() ==2) {
                                                echo '<span class="badge badge-success">Désactivé</span>';
                                            }
                                            else if($user->getEtat() ==0) {
                                                echo '<span class="badge badge-success">En attente</span>';
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="<?= HOST;?>detail-users.html/idUser/<?= $user->getIdUser(); ?>"><button type="button" data-tog="tooltip" data-placement="bottom" title="Details" class="btn btn-xs btn-warning text-white"><i class="fas fa-folder-open" aria-hidden="true"></i></button></a>
                                        <button type="button" data-tog="tooltip" data-placement="bottom" title="Modifier" class="btn btn-xs btn-info text-white updateBtn" data-toggle="modal" data-target="#updateUsers"><i class="fas fa-edit" aria-hidden="true"></i></button>
                                        <button type="button" data-tog="tooltip" data-placement="bottom" title="Supprimer" class="btn btn-xs btn-danger deleteBtn" data-toggle="modal" data-target="#deleteUsers"><i class="fas fa-trash" aria-hidden="true"></i></button>                                      
                                    </td>
                                </tr>
                                 <?php 
                                    $num++;
                                    endforeach?>
                            </tbody>
                            
                            
                        </table>
                    </div>
                    <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->


<!-- addModal -->
<div class="modal fade" id="addModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header bg-primary">
            <h4 class="modal-title">Nouvelle utilisateur</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span style="color: white;" aria-hidden="true">&times;</span>
            </button>
        </div>
            <form   action="add-users.html" method="post" enctype="multipart/form-data" id="form_id">
                <div class="modal-body mt-3">

                    <div class="row">
                        <div class="col form-group">
                            <label for="idUser">idUser </label>
                            <input type="hidden" class="form-control" name="values[idUser]" id="idUser" >
                        </div>
                        <div class="col form-group">
                            <label for="username">Username </label>
                            <input type="text" class="form-control" name="values[username]" id="username" >
                        </div>
                
                        <div class=" col form-group">
                            <label for="password">Mot de passe </label>
                            <input type="password" class="form-control" name="values[password]" id="password" >
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col form-group">
                            <label for="email">Email </label>
                            <input type="text" class="form-control" name="values[email]" id="email" >
                        </div>
                    </div>
                    <div class="form-group">
                            <label for="telephone">Telephone </label>
                            <input type="int" class="form-control" name="values[telephone]" id="telephone" data-validate = "Téléphone valide est requis: 90010204">
                    </div>
                    <div class="form-group">
                        <label for="profil">Profil</label>
                        <select class="form-control" id="profil" name="values[profil]">
                            <option value="1">Admin</option>
                            <option value="2">Enseignant</option>
                            <option value="3">Etudiant</option>
                            <option value="4">Parent</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="etat" >Etat</label>
                        <select  class="form-control"  name="values[etat]" id="etat">
                            <option value="1" >Activé</option>
                            <option value="2" >Désactivé</option>
                            <option value="0" >En attente</option>
                        </select>
                    </div>
                </div>
                    <div class="modal-footer justify-content-between">
                         <input type="submit" value="Créer" name="creer" class="btn btn-block btn-outline-primary">
                    </div>
            </form>
        </div>
    </div>
</div>
<!-- end addModal -->

<!-- updateUsers -->
<div class="modal fade" id="updateUsers">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header bg-warning">
            <h4 class="modal-title">Modification</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span style="color: white;" aria-hidden="true">&times;</span>
            </button>
        </div>
            <form action="edit-users.html" method="post" enctype="multipart/form-data" id="form">
            <div class="modal-body mt-3">
                    
                    <div class="form-group">
                        <label for="idUser" hidden >id users </label>
                        <input type="hidden" class="form-control" name="values[idUser]"  id="m_idUser" >
                    </div>
                <div class="row">
                    <div class="col form-group">
                        <label for="username">Username </label>
                        <input type="text" class="form-control" name="values[username]"  id="m_username" >
                    </div>
                    <div class="col form-group">
                        <label for="hidden">Password </label>
                        <input type="hidden" class="form-control" name="values[passsword]"   id="m_passsword" >
                    </div>
                </div>
                <div class="form-group">
                        <label for="email">Email </label>
                        <input type="text" class="form-control" name="values[email]"  id="m_email" >
                </div>              
                <div class="form-group">
                        <label for="telephone">Telephone </label>
                        <input type="int" class="form-control" name="values[telephone]"  id="m_telephone" >
                </div>
                
                <div class="form-group">
                        <label for="profil">Profil</label>
                        <select class="form-control" id="m_profil" name="values[profil]" >
                            <option value="1">Admin</option>
                            <option value="2">Enseignant</option>
                            <option value="3">Etudiant</option>
                            <option value="4">Parent</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="etat">Etat</label>
                        <select class="form-control" id="m_etat" name="values[etat]" >
                            <option value="1">Activé</option>
                            <option value="2">Désactiver</option>
                            <option value="0">En attente</option>
                        </select>
                    </div>
            </div>
                <div class="modal-footer justify-content-between">
                    <input type="submit" value="Modifier" name="modifier" class="btn btn-block btn-outline-warning">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end updateClasse -->

<!-- deleteModal -->
<div class="modal fade" id="deleteUsers">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header bg-danger">
            <h4 class="modal-title">Suppression</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body mt-3">
            <div class="container">
                <p>Voulez vous vraiment supprimer cet utilisateur ?</p>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <a href="" id="delete_id"><button type="button" class="btn btn-block btn-outline-danger">Oui</button></a>
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

        $('#updateUsers').modal('show');
    
        // Get the table row data.
        $tr = $(this).closest('tr');
    
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

       alert(data[7]);exit;
    
        $('#m_idUser').val(data[1]);
        $('#m_username').val(data[2]);
        $('#m_email').val(data[3]);
        $('#m_telephone').val(data[4]);
        $('#m_password').val(data[5]);
        selectionner('#m_profil', data[6]);
        selectionner('#m_etat', data[7]);
        // $('#m_profil').val(data[9]);
        // $('#m_etat').val(data[10]);
        
      

    }); 
});

$(document).ready(function () {
    $('.deleteBtn').on('click', function(){
        
        $('#deleteUsers').modal('show');
    
        // Get the table row data.
        $tr = $(this).closest('tr');
    
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();
        document.getElementById("delete_id").href = "delete-users.html/idUser/"+data[1];

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

$(document).ready(function () {
    bsCustomFileInput.init();
});

$(function () {
    $("#table_users").DataTable({
        "responsive": false,
        "autoWidth": false,
        "language" : {
            
            "sEmptyTable":     "Aucun utilisateur disponible pour le moment",
            "sInfo":           "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
            "sInfoEmpty":      "Affichage de l'élément 0 à 0 sur 0 élément",
            "sInfoFiltered":   "(filtré à partir de _MAX_ éléments au total)",
            "sInfoPostFix":    "",
            "sInfoThousands":  ",",
            "sLengthMenu":     "Afficher _MENU_ éléments",
            "sLoadingRecords": "Chargement...",
            "sProcessing":     "Traitement...",
            "sSearch":         "Rechercher :",
            "sZeroRecords":    "Aucun élément correspondant trouvé",
            "oPaginate": {
                "sFirst":    "Premier",
                "sLast":     "Dernier",
                "sNext":     "Suivant",
                "sPrevious": "Précédent"
            },
            "oAria": {
                "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                "sSortDescending": ": activer pour trier la colonne par ordre décroissant"
            },
            "select": {
                    "rows": {
                        "_": "%d lignes sélectionnées",
                        "0": "Aucune ligne sélectionnée",
                        "1": "1 ligne sélectionnée"
                    } 
            }
        }
    });
});

</script>